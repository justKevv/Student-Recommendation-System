@props([
    'BarChartTittle' => 'Bar Chart',
])

<div class="flex-shrink-0 w-[320px] h-[620px] bg-white rounded-[30px] shadow-[0px_0px_20px_0px_rgba(0,0,0,0.05)] px-4 py-4
            flex flex-col text-center">
    <div class="space-y-4">
        <div class="space-y-4">
        <div class="flex items-center justify-between">
            <h2 class="text-main text-black text-xl font-medium font-['Poppins']">
                {{ $BarChartTittle }}
            </h2>
        </div>
    </div>
    </div>
</div>
