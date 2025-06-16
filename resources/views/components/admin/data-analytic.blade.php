@props([
    'StatisticDataTitle' => 'Statistic Data',
    'studentOutcomeTrends' => []
])
<div class="relative pt-5 w-full min-w-0 h-64 h-auto md-10">


    <div class="flex justify-between items-center mb-4">

    </div>    

    <div class="w-full min-h-[400px] bg-white rounded-[30px] shadow-[0px_0px_20px_0px_rgba(0,0,0,0.05)] p-6">
        <div class="space-y-4">
            <div class="flex justify-between items-center">
                <h2 class="text-main text-black text-xl font-medium font-['Poppins']">
                    {{ $StatisticDataTitle }}
                </h2>
            </div>
            <div class="relative w-full h-[300px]">
                <canvas id="studentOutcomeTrendChart"></canvas>
            </div>
        </div>
    </div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('studentOutcomeTrendChart').getContext('2d');
        const studentOutcomeTrends = @json($studentOutcomeTrends);

        const labels = Object.keys(studentOutcomeTrends);
        const allTypes = Array.from(new Set(Object.values(studentOutcomeTrends).flatMap(Object.keys)));
        const colors = [
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(201, 203, 207, 1)',
            'rgba(255, 205, 86, 1)'
        ];

        const datasets = allTypes.map((type, index) => {
            const data = labels.map(month => studentOutcomeTrends[month][type] || 0);
            return {
                label: type,
                data: data,
                borderColor: colors[index % colors.length],
                backgroundColor: colors[index % colors.length].replace('1)', '0.2)'),
                fill: true,
                tension: 0.1
            };
        });

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: datasets
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Internships'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Month'
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Internship Trends by Type'
                    }
                }
            }
        });
    });
</script>
@endpush
