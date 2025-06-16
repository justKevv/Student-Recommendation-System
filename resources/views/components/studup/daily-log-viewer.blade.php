@props(['applicationId' => null])

<div x-data="dailyLogViewer({{ $applicationId ?? 'null' }})"
     class="w-[650px] bg-white rounded-[30px] shadow-[0px_0px_19.899999618530273px_0px_rgba(0,0,0,0.10)] p-6 space-y-4">
    <h2 class="text-main text-2xl font-semibold font-['Poppins']">Daily Log</h2>

    <!-- Date Selector -->
    <div class="flex items-center gap-4">
        <label for="log-date-picker" class="text-sm font-medium text-main">View logs for:</label>
        <input
            type="date"
            id="log-date-picker"
            x-model="selectedDate"
            @change="loadLogsForDate()"
            class="px-3 py-2 text-sm border border-gray-300 rounded-md"
            :value="selectedDate"
        >
    </div>

    <!-- Loading State -->
    <div x-show="loading" class="py-4 text-center">
        <span class="text-gray-500">Loading logs...</span>
    </div>

    <!-- No Logs Message -->
    <div x-show="!loading && logs.length === 0" class="py-8 text-center">
        <p class="text-gray-500">No logs found for the selected date.</p>
    </div>

    <!-- Logs Display -->
    <div x-show="!loading && logs.length > 0" class="space-y-4">
        <template x-for="log in logs" :key="log.id">
            <div class="p-4 space-y-3 border border-gray-200 rounded-lg">
                <div class="flex items-start justify-between">
                    <span class="text-sm text-gray-500" x-text="formatDate(log.log_date)"></span>
                    <span class="text-xs text-gray-400" x-text="formatTime(log.created_at)"></span>
                </div>

                <div class="text-main text-base font-normal font-['Poppins']" x-html="log.description"></div>

                <!-- Media Display -->
                <div x-show="log.media_path">
                    <div class="mt-3">
                        <h4 class="mb-2 text-sm font-semibold text-main">Attached File:</h4>
                        <!-- Display image directly if it's an image type -->
                        <template x-if="isImageFile(log.media_path)">
                            <img :src="log.media_path"
                                class="h-auto max-w-full border border-gray-200 rounded-md shadow-sm max-h-64"
                                @click="window.open(log.media_path, '_blank')"
                                :alt="'Log attachment'"
                                style="cursor: pointer;">
                        </template>
                        <!-- For non-image files, show a file link -->
                        <template x-if="!isImageFile(log.media_path)">
                            <a :href="log.media_path"
                              target="_blank"
                              class="inline-flex items-center px-3 py-1 text-sm text-blue-800 bg-blue-100 rounded-md hover:bg-blue-200">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                                </svg>
                                View File
                            </a>
                        </template>
                    </div>
                </div>

                <!-- Supervisor Feedback Display (read-only) -->
                <div x-show="log.supervisor_feedback" class="p-3 mt-3 rounded-md bg-gray-50">
                    <h4 class="mb-1 text-sm font-semibold text-main">Supervisor Feedback:</h4>
                    <p class="text-sm text-gray-700" x-text="log.supervisor_feedback"></p>
                </div>
            </div>
        </template>
    </div>
</div>

<script>
    function dailyLogViewer(applicationId) {
        return {
            applicationId: applicationId,
            selectedDate: new Date().toISOString().split('T')[0], // Today's date
            logs: [],
            loading: false,

            init() {
                this.loadLogsForDate();
            },

            async loadLogsForDate() {
                if (!this.applicationId || !this.selectedDate) {
                    console.error('Missing applicationId or selectedDate', { applicationId: this.applicationId, selectedDate: this.selectedDate });
                    return;
                }

                this.loading = true;
                try {
                    const url = `/student-logs/by-date?application_id=${this.applicationId}&log_date=${this.selectedDate}`;
                    console.log('Fetching logs from:', url);

                    const response = await fetch(url);
                    const data = await response.json();

                    console.log('Response data:', data);

                    if (data.success) {
                        this.logs = data.data;
                        console.log('Logs loaded:', this.logs.length);
                    } else {
                        console.error('API returned error:', data);
                    }
                } catch (error) {
                    console.error('Error loading logs:', error);
                } finally {
                    this.loading = false;
                }
            },

            formatDate(dateString) {
                const date = new Date(dateString);
                return date.toLocaleDateString('en-US', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });
            },

            formatTime(dateTimeString) {
                const date = new Date(dateTimeString);
                return date.toLocaleTimeString('en-US', {
                    hour: '2-digit',
                    minute: '2-digit'
                });
            },

            isImageFile(filePath) {
                return /\.(jpg|jpeg|png|gif|bmp|webp)$/i.test(filePath);
            }
        }
    }
</script>
