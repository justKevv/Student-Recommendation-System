@php
    $now = \Carbon\Carbon::now();
    $currentMonth = $now->month;
    $currentYear = $now->year;
    $currentDay = $now->day;
@endphp

<div x-data="calendar({{ $currentMonth }}, {{ $currentYear }}, {{ $currentDay }})"
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
    </div> <!-- Dates Grid -->
    <div class="grid grid-cols-7 gap-2 text-center">
        <template x-for="cell in calendar" :key="cell . id">
            <div :class="cell . classes">
                <span x-text="cell.day"></span>
            </div>
        </template>
    </div>

    <!-- Legend -->
    <div class="flex items-center space-x-4 text-sm">
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

<script>
    function calendar(currentMonth, currentYear, currentDay) {
        return {
            currentMonth: currentMonth,
            currentYear: currentYear,
            actualCurrentDay: currentDay,
            actualCurrentMonth: currentMonth,
            actualCurrentYear: currentYear,
            monthNames: [
                'January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December'
            ],

            get calendar() {
                const daysInMonth = new Date(this.currentYear, this.currentMonth, 0).getDate();
                const firstDay = new Date(this.currentYear, this.currentMonth - 1, 1).getDay();
                // Convert Sunday (0) to 7 for Monday start
                const firstDayAdjusted = firstDay === 0 ? 6 : firstDay - 1;

                const cells = [];
                let cellId = 0;                // Empty cells before first day
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
                    const isDone = (day === 15 && this.currentMonth === 5); // May 15th

                    let classes = 'p-1 h-8';
                    if (isDone) {
                        classes = 'flex items-center justify-center bg-yellow-500 rounded-full h-8 w-8';
                    } else if (isToday) {
                        classes = 'flex items-center justify-center bg-istoday border border-white rounded-full h-8 w-8';
                    }

                    cells.push({
                        id: cellId++,
                        day: day,
                        classes: classes
                    });
                }                // Fill remaining cells to complete the grid (always 6 rows = 42 cells)
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
            },

            nextMonth() {
                if (this.currentMonth === 12) {
                    this.currentMonth = 1;
                    this.currentYear++;
                } else {
                    this.currentMonth++;
                }
            }
        }
    }
</script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
