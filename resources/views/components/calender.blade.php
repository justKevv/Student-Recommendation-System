@props(['applicationId' => null])

@php
    $now = \Carbon\Carbon::now();
    $currentMonth = $now->month;
    $currentYear = $now->year;
    $currentDay = $now->day;
@endphp

<div x-data="calendar({{ $currentMonth }}, {{ $currentYear }}, {{ $currentDay }}, {{ $applicationId ?? 'null' }})"
    class="w-full p-4 text-white rounded-[30px] shadow-lg bg-main">
    <!-- Header: Month and Year with Navigation -->
    <div class="flex items-center justify-between mb-3">
        <button @click="previousMonth()" class="text-gray-400 hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        <h2 class="text-xl font-semibold" x-text="monthNames[currentMonth - 1] + ' ' + currentYear"></h2>
        <button @click="nextMonth()" class="text-gray-400 hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>
    </div>

    <!-- Days of the Week -->
    <div class="grid grid-cols-7 gap-1 mb-2 text-sm text-center text-gray-400">
        <div>M</div>
        <div>T</div>
        <div>W</div>
        <div>T</div>
        <div>F</div>
        <div>S</div>
        <div>S</div>
    </div>

    <!-- Dates Grid -->
    <div class="grid grid-cols-7 gap-2 text-center">
        <template x-for="cell in calendar" :key="cell.id">
            <div :class="cell.classes" @click="cell.day && onDateClick(cell.day)">
                <span x-text="cell.day"></span>
            </div>
        </template>
    </div>

    <!-- Legend -->
    <div class="flex items-center space-x-4 text-sm mt-4">
        <div class="flex items-center space-x-2">
            <span class="w-4 h-4 bg-yellow-500 rounded-full"></span>
            <span>Done</span>
        </div>
        <div class="flex items-center space-x-2">
            <span class="w-4 h-4 border border-white rounded-full"></span>
            <span>Current Day</span>
        </div>
    </div>
</div>

<!-- Student Log Modal -->
<div id="student-log-modal" class="hs-overlay hidden fixed top-0 start-0 z-[80] w-full h-full overflow-x-hidden overflow-y-auto pointer-events-none">
    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
        <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
            <div class="flex justify-between items-center py-3 px-4 border-b">
                <h3 class="font-bold text-gray-800">
                    Add Daily Log
                </h3>
                <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#student-log-modal">
                    <span class="sr-only">Close</span>
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m18 6-12 12"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-4 overflow-y-auto">
                <form id="student-log-form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="log-application-id" name="application_id" value="{{ $applicationId }}">
                    <input type="hidden" id="log-date" name="log_date">

                    <div class="mb-4">
                        <label for="log-description" class="block text-sm font-medium text-gray-700 mb-2">
                            Daily Activity Description
                        </label>
                        <textarea
                            id="log-description"
                            name="description"
                            rows="4"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Describe your daily activities..."
                            required
                        ></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="log-media" class="block text-sm font-medium text-gray-700 mb-2">
                            Attach File (Optional)
                        </label>
                        <input
                            type="file"
                            id="log-media"
                            name="media"
                            accept=".jpg,.jpeg,.png,.pdf,.doc,.docx"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        >
                        <p class="text-xs text-gray-500 mt-1">Supported formats: JPG, PNG, PDF, DOC, DOCX (Max: 2MB)</p>
                    </div>
                </form>
            </div>
            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#student-log-modal">
                    Cancel
                </button>
                <button type="button" id="save-log-btn" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    Save Log
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function calendar(currentMonth, currentYear, currentDay, applicationId) {
        return {
            currentMonth: currentMonth,
            currentYear: currentYear,
            actualCurrentDay: currentDay,
            actualCurrentMonth: currentMonth,
            actualCurrentYear: currentYear,
            applicationId: applicationId,
            loggedDates: [],
            monthNames: [
                'January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December'
            ],

            init() {
                this.loadLoggedDates();
                this.setupModalHandlers();
            },

            async loadLoggedDates() {
                if (!this.applicationId) return;

                try {
                    const response = await fetch(`/student-logs/${this.applicationId}`);
                    const data = await response.json();

                    if (data.success) {
                        this.loggedDates = data.data.map(log => log.log_date);
                        // Force calendar UI to re-render with updated dates
                        this.currentMonth = this.currentMonth;
                    }
                } catch (error) {
                    console.error('Error loading logged dates:', error);
                }
            },

            setupModalHandlers() {
                const saveBtn = document.getElementById('save-log-btn');
                const form = document.getElementById('student-log-form');

                if (saveBtn && form) {
                    saveBtn.addEventListener('click', this.saveLog.bind(this));
                }
            },

            onDateClick(day) {
                if (!this.applicationId) {
                    alert('No application selected. Cannot add log entry.');
                    return;
                }

                const selectedDate = `${this.currentYear}-${String(this.currentMonth).padStart(2, '0')}-${String(day).padStart(2, '0')}`;

                // Set the date in the hidden input
                document.getElementById('log-date').value = selectedDate;

                // Clear previous form data
                document.getElementById('log-description').value = '';
                document.getElementById('log-media').value = '';

                // Open the modal using Preline's HSOverlay
                window.HSOverlay.open(document.getElementById('student-log-modal'));
            },

            async saveLog() {
                const form = document.getElementById('student-log-form');
                const formData = new FormData(form);
                const saveBtn = document.getElementById('save-log-btn');

                // Show loading state
                saveBtn.disabled = true;
                saveBtn.textContent = 'Saving...';

                try {
                    const response = await fetch('/student-logs', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    });

                    const data = await response.json();

                    if (data.success) {
                        // Close modal
                        window.HSOverlay.close(document.getElementById('student-log-modal'));

                        // Show success message
                        alert('Log entry saved successfully!');

                        // Reload logged dates to update calendar
                        await this.loadLoggedDates();

                        // Reset form
                        form.reset();
                    } else {
                        alert('Error saving log entry. Please try again.');
                    }
                } catch (error) {
                    console.error('Error saving log:', error);
                    alert('Error saving log entry. Please try again.');
                } finally {
                    // Reset button state
                    saveBtn.disabled = false;
                    saveBtn.textContent = 'Save Log';
                }
            },

            get calendar() {
                const daysInMonth = new Date(this.currentYear, this.currentMonth, 0).getDate();
                const firstDay = new Date(this.currentYear, this.currentMonth - 1, 1).getDay();
                // Convert Sunday (0) to 7 for Monday start
                const firstDayAdjusted = firstDay === 0 ? 6 : firstDay - 1;

                const cells = [];
                let cellId = 0;

                // Empty cells before first day
                for (let i = 0; i < firstDayAdjusted; i++) {
                    cells.push({
                        id: cellId++,
                        day: '',
                        classes: 'p-1 h-8'
                    });
                }

                // Days of the month
                for (let day = 1; day <= daysInMonth; day++) {
                    const isToday = (this.currentYear === this.actualCurrentYear &&
                        this.currentMonth === this.actualCurrentMonth &&
                        day === this.actualCurrentDay);

                    const dateString = `${this.currentYear}-${String(this.currentMonth).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                    const isDone = this.loggedDates.includes(dateString);

                    let classes = 'p-1 h-8 cursor-pointer hover:bg-gray-600 rounded';
                    if (isDone) {
                        classes = 'flex items-center justify-center bg-yellow-500 rounded-full h-8 w-8 cursor-pointer hover:bg-yellow-600';
                    } else if (isToday) {
                        classes = 'flex items-center justify-center bg-istoday border border-white rounded-full h-8 w-8 cursor-pointer hover:bg-gray-600';
                    }

                    cells.push({
                        id: cellId++,
                        day: day,
                        classes: classes
                    });
                }

                // Fill remaining cells to complete the grid (always 6 rows = 42 cells)
                const totalCells = firstDayAdjusted + daysInMonth;
                const remainingCells = 42 - totalCells; // Always fill to 42 cells (6 rows)
                for (let i = 0; i < remainingCells; i++) {
                    cells.push({
                        id: cellId++,
                        day: '',
                        classes: 'p-1 h-8'
                    });
                }

                return cells;
            },

            previousMonth() {
                if (this.currentMonth === 1) {
                    this.currentMonth = 12;
                    this.currentYear--;
                } else {
                    this.currentMonth--;
                }
                this.loadLoggedDates();
            },

            nextMonth() {
                if (this.currentMonth === 12) {
                    this.currentMonth = 1;
                    this.currentYear++;
                } else {
                    this.currentMonth++;
                }
                this.loadLoggedDates();
            }
        }
    }
</script>
