@props([
    'supervisorName' => isset($user) && $user->role === 'supervisor' ? $user->name : 'Supervisor',
    'supervisorRole' => 'Supervisor',
    'supervisorImage' => isset($user) && $user->profile_picture ? $user->profile_picture : 'https://placehold.co/50x50',
    'applicationId' => isset($application) ? $application->id : null,
    'isSupervisor' => isset($user) && $user->role === 'supervisor'
])

<div x-data="supervisorComment({{ $applicationId ?? 'null' }}, {{ $isSupervisor ? 'true' : 'false' }})"
     class="w-[650px] bg-white rounded-[30px] shadow-[0px_0px_19.899999618530273px_0px_rgba(0,0,0,0.10)] p-6 space-y-4">
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-4">
            <img src="{{ $supervisorImage }}" alt="{{ $supervisorName }}'s profile picture" class="size-14 rounded-full object-cover" loading="lazy">
            <div>
                <p class="text-main text-xl font-medium font-['Poppins']">{{ $supervisorName }}</p>
                <p class="text-neutral-500 text-sm font-normal font-['Poppins']">{{ $supervisorRole }}</p>
            </div>
        </div>

        <!-- Log Selector (only for supervisors) -->
        <div x-show="isSupervisor && logsWithoutFeedback.length > 0" class="flex items-center gap-2">
            <label for="log-selector" class="text-sm font-medium text-main">Select log:</label>
            <select
                id="log-selector"
                x-model="selectedLogId"
                @change="loadSelectedLog()"
                class="px-3 py-2 text-sm border border-gray-300 rounded-md"
            >
                <option value="" disabled selected>-- Select a log --</option>
                <template x-for="log in logsWithoutFeedback" :key="log.id">
                    <option :value="log.id" x-text="formatLogOption(log)"></option>
                </template>
            </select>
        </div>
    </div>

    <!-- No logs needing feedback message -->
    <div x-show="isSupervisor && logsWithoutFeedback.length === 0" class="p-4 text-center">
        <p class="text-gray-500">All logs have already received feedback.</p>
    </div>

    <!-- Loading State -->
    <div x-show="loading" class="py-4 text-center">
        <span class="text-gray-500">Loading...</span>
    </div>

    <!-- If a specific log is selected, show details -->
    <div x-show="selectedLog" class="p-4 border border-gray-200 rounded-lg">
        <div class="flex items-start justify-between mb-3">
            <span class="text-sm text-gray-500" x-text="formatDate(selectedLog?.log_date)"></span>
            <span class="text-xs text-gray-400" x-text="formatTime(selectedLog?.created_at)"></span>
        </div>
        <div class="text-main text-base font-normal font-['Poppins'] mb-3" x-html="selectedLog?.description"></div>
    </div>

    <!-- Feedback textarea - only shown for logs without feedback -->
    <div class="w-full bg-neutral-100 rounded-[15px] px-5 py-4"
         x-show="isSupervisor && selectedLog && !selectedLog.supervisor_feedback">
        <textarea
            x-model="feedbackText"
            class="w-full resize-none outline-none bg-transparent text-main text-base font-normal font-['Poppins']"
            rows="4"
            placeholder="Enter your feedback here..."
        ></textarea>

        <div class="flex justify-end mt-3">
            <button
                @click="submitFeedback()"
                class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                :disabled="isSubmitting || isEmptyFeedback"
            >
                <span x-show="!isSubmitting">Submit Feedback</span>
                <span x-show="isSubmitting">Submitting...</span>
            </button>
        </div>
    </div>

    <!-- Display existing feedback for this log -->
    <div x-show="selectedLog && selectedLog.supervisor_feedback" class="p-4 bg-gray-50 rounded-lg">
        <h4 class="mb-2 text-sm font-semibold text-main">Feedback:</h4>
        <p class="text-gray-700" x-text="selectedLog.supervisor_feedback"></p>
    </div>

    <!-- Display for non-supervisors when no log is selected -->
    <div x-show="!isSupervisor && !selectedLog" class="p-4 text-center">
        <p class="text-gray-500">No log selected. Please select a log to view feedback.</p>
    </div>

    <!-- Log selection for non-supervisors -->
    <div x-show="!isSupervisor && logs.length > 0" class="flex items-center gap-2">
        <label for="user-log-selector" class="text-sm font-medium text-main">View feedback for:</label>
        <select
            id="user-log-selector"
            x-model="selectedLogId"
            @change="loadSelectedLog()"
            class="px-3 py-2 text-sm border border-gray-300 rounded-md"
        >
            <option value="" disabled selected>-- Select a log --</option>
            <template x-for="log in logs" :key="log.id">
                <option :value="log.id" x-text="formatLogOption(log)"></option>
            </template>
        </select>
    </div>

    <!-- No feedback message -->
    <div x-show="!isSupervisor && selectedLog && !selectedLog.supervisor_feedback" class="p-4 text-center">
        <p class="text-gray-500">No feedback available for this log entry.</p>
    </div>
</div>

<script>
    function supervisorComment(applicationId, isSupervisor) {
        return {
            applicationId: applicationId,
            isSupervisor: isSupervisor,
            logs: [],
            logsWithoutFeedback: [],
            selectedLogId: "",
            selectedLog: null,
            feedbackText: "",
            loading: false,
            isSubmitting: false,

            get isEmptyFeedback() {
                return !this.feedbackText || this.feedbackText.trim() === '';
            },

            init() {
                if (this.applicationId) {
                    this.loadLogs();
                }
            },

            async loadLogs() {
                this.loading = true;
                try {
                    const response = await fetch(`/student-logs/${this.applicationId}`);
                    const data = await response.json();

                    if (data.success) {
                        this.logs = data.data;

                        // Filter logs without feedback for supervisors
                        this.logsWithoutFeedback = this.logs.filter(log => !log.supervisor_feedback);

                        console.log('Logs loaded:', this.logs.length);
                        console.log('Logs without feedback:', this.logsWithoutFeedback.length);
                    } else {
                        console.error('API returned error:', data);
                    }
                } catch (error) {
                    console.error('Error loading logs:', error);
                } finally {
                    this.loading = false;
                }
            },

            loadSelectedLog() {
                if (!this.selectedLogId) {
                    this.selectedLog = null;
                    this.feedbackText = "";
                    return;
                }

                this.selectedLog = this.logs.find(log => log.id == this.selectedLogId);
                if (this.selectedLog) {
                    this.feedbackText = this.selectedLog.supervisor_feedback || "";
                }
            },

            formatLogOption(log) {
                const date = new Date(log.log_date);
                return `${date.toLocaleDateString()} - ${log.description.substring(0, 30).replace(/<[^>]*>/g, '')}${log.description.length > 30 ? '...' : ''}`;
            },

            formatDate(dateString) {
                if (!dateString) return '';
                const date = new Date(dateString);
                return date.toLocaleDateString('en-US', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });
            },

            formatTime(dateTimeString) {
                if (!dateTimeString) return '';
                const date = new Date(dateTimeString);
                return date.toLocaleTimeString('en-US', {
                    hour: '2-digit',
                    minute: '2-digit'
                });
            },

            async submitFeedback() {
                if (!this.applicationId) {
                    console.error('Missing applicationId');
                    return;
                }

                if (!this.selectedLogId) {
                    alert("Please select a log entry to provide feedback.");
                    return;
                }

                if (this.isEmptyFeedback) {
                    alert("Please enter feedback before submitting.");
                    return;
                }

                this.isSubmitting = true;

                try {
                    // Get CSRF token
                    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
                    if (!csrfToken) {
                        throw new Error('CSRF token not found');
                    }

                    const response = await fetch(`/student-logs/${this.selectedLogId}/feedback`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            feedback: this.feedbackText
                        })
                    });

                    const data = await response.json();

                    if (data.success) {
                        // Update the log in the local array
                        this.logs = this.logs.map(log => {
                            if (log.id == this.selectedLogId) {
                                return {...log, supervisor_feedback: this.feedbackText};
                            }
                            return log;
                        });

                        // Update the logs without feedback
                        this.logsWithoutFeedback = this.logsWithoutFeedback.filter(log => log.id != this.selectedLogId);

                        // Update selected log
                        this.selectedLog = {...this.selectedLog, supervisor_feedback: this.feedbackText};

                        alert("Feedback submitted successfully!");

                        // Reset selection if there are no more logs to provide feedback for
                        if (this.logsWithoutFeedback.length === 0) {
                            this.selectedLogId = "";
                            this.selectedLog = null;
                        } else {
                            // Select the next log without feedback
                            this.selectedLogId = this.logsWithoutFeedback[0].id;
                            this.loadSelectedLog();
                        }
                    } else {
                        console.error('Error submitting feedback:', data);
                        alert('Error submitting feedback: ' + (data.message || 'Unknown error'));
                    }
                } catch (error) {
                    console.error('Error submitting feedback:', error);
                    alert('Error submitting feedback: ' + error.message);
                } finally {
                    this.isSubmitting = false;
                }
            }
        }
    }
</script>
