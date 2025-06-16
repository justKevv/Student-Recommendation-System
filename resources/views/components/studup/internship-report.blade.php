@props(['applicationId' => null])

<div x-data="internshipReport({{ $applicationId ?? 'null' }})" class="w-[650px] bg-white rounded-[30px] shadow-[0px_0px_19.899999618530273px_0px_rgba(0,0,0,0.10)] p-6 space-y-4">
    <div class="flex justify-between items-center">
        <h2 class="text-main text-2xl font-semibold font-['Poppins']">Internship Report</h2>
    </div>

    @if($applicationId)
        <div class="flex flex-col gap-4">
            <!-- Weekly Report Downloads -->
            <div class="border border-gray-200 rounded-lg p-4">
                <h3 class="text-lg font-semibold text-main mb-3">Weekly Reports</h3>

                <div class="flex items-center gap-3 mb-3">
                    <label for="week-selector" class="text-sm font-medium text-main">Select Week:</label>
                    <input
                        type="date"
                        id="week-selector"
                        x-model="selectedWeekStart"
                        class="px-3 py-2 text-sm border border-gray-300 rounded-md"
                    >
                </div>

                <div class="flex items-center gap-2">
                    <button
                        @click="downloadWeeklyReport('pdf')"
                        class="flex items-center px-3 py-2 text-sm text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        :disabled="!selectedWeekStart"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Download PDF
                    </button>
                    <button
                        @click="downloadWeeklyReport('csv')"
                        class="flex items-center px-3 py-2 text-sm text-blue-700 bg-blue-100 rounded-md hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-400"
                        :disabled="!selectedWeekStart"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Download CSV
                    </button>
                </div>

                <div class="mt-2 text-xs text-gray-500" x-show="selectedWeekStart">
                    <span x-text="'Selected week: ' + formatDateRange(selectedWeekStart)"></span>
                </div>
            </div>

            <!-- Monthly Report Downloads -->
            <div class="border border-gray-200 rounded-lg p-4">
                <h3 class="text-lg font-semibold text-main mb-3">Monthly Reports</h3>

                <div class="flex items-center gap-3 mb-3">
                    <label for="month-selector" class="text-sm font-medium text-main">Select Month:</label>
                    <input
                        type="month"
                        id="month-selector"
                        x-model="selectedMonth"
                        class="px-3 py-2 text-sm border border-gray-300 rounded-md"
                    >
                </div>

                <div class="flex items-center gap-2">
                    <button
                        @click="downloadMonthlyReport('pdf')"
                        class="flex items-center px-3 py-2 text-sm text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        :disabled="!selectedMonth"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Download PDF
                    </button>
                    <button
                        @click="downloadMonthlyReport('csv')"
                        class="flex items-center px-3 py-2 text-sm text-blue-700 bg-blue-100 rounded-md hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-400"
                        :disabled="!selectedMonth"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Download CSV
                    </button>
                </div>

                <div class="mt-2 text-xs text-gray-500" x-show="selectedMonth">
                    <span x-text="'Selected month: ' + formatMonth(selectedMonth)"></span>
                </div>
            </div>
        </div>
    @else
        <div class="py-6 text-center text-gray-500">
            <p>No internship application found. Reports are available only for active internships.</p>
        </div>
    @endif
</div>

<script>
    function internshipReport(applicationId) {
        return {
            applicationId: applicationId,
            selectedWeekStart: null,
            selectedMonth: null,

            formatDateRange(startDate) {
                if (!startDate) return '';

                const start = new Date(startDate);
                const end = new Date(start);
                end.setDate(end.getDate() + 6); // Add 6 days to get a 7-day week

                const startFormatted = start.toLocaleDateString('en-US', {
                    month: 'short',
                    day: 'numeric',
                    year: 'numeric'
                });

                const endFormatted = end.toLocaleDateString('en-US', {
                    month: 'short',
                    day: 'numeric',
                    year: 'numeric'
                });

                return `${startFormatted} to ${endFormatted}`;
            },

            formatMonth(yearMonth) {
                if (!yearMonth) return '';

                const [year, month] = yearMonth.split('-');
                const date = new Date(year, month - 1, 1);

                return date.toLocaleDateString('en-US', {
                    month: 'long',
                    year: 'numeric'
                });
            },

            downloadWeeklyReport(format) {
                if (!this.applicationId || !this.selectedWeekStart) {
                    alert('Please select a week first');
                    return;
                }

                const url = `/student-logs/${this.applicationId}/download-week/${this.selectedWeekStart}?format=${format}`;
                window.open(url, '_blank');
            },

            downloadMonthlyReport(format) {
                if (!this.applicationId || !this.selectedMonth) {
                    alert('Please select a month first');
                    return;
                }

                const url = `/student-logs/${this.applicationId}/download-month/${this.selectedMonth}?format=${format}`;
                window.open(url, '_blank');
            }
        };
    }
</script>
