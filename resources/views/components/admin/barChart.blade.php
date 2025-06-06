@props([
    'BarChartTittle' => 'Bar Chart',
])

<div class="flex-shrink-0 w-[396px] h-[535px] bg-white rounded-[30px] shadow-[0px_0px_20px_0px_rgba(0,0,0,0.05)] px-6 py-6">
    <div class="space-y-4">
        <div class="space-y-4">
        <div class="flex justify-between items-center">
            <h2 class="text-main text-black text-xl font-medium font-['Poppins']">
                {{ $BarChartTittle }}
            </h2>
        </div>
    </div>
    </div>
</div>
