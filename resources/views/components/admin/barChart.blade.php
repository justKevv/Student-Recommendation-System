@props([
    'BarChartTittle' => 'Bar Chart',
    'internshipCounts' => []
])

<div class="flex-shrink-0 w-[396px] h-[535px] bg-white rounded-[30px] shadow-[0px_0px_20px_0px_rgba(0,0,0,0.05)] px-6 py-6">
    <div class="space-y-4">
        <div class="space-y-4">
            <div class="flex justify-between items-center">
                <h2 class="text-main text-black text-xl font-medium font-['Poppins']">
                    {{ $BarChartTittle }}
                </h2>
            </div>
            <div class="relative w-full h-full">
                <canvas id="internshipBarChart" height="600"></canvas>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('internshipBarChart').getContext('2d');
        const internshipCounts = @json($internshipCounts);

        const labels = internshipCounts.map(item => item.company_name);
        const data = internshipCounts.map(item => item.internship_count);

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Number of Internships',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    barPercentage: 1.0,
                    categoryPercentage: 1.0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Internships',
                            font: {
                                size: 16
                            }
                        },
                        ticks: {
                            font: {
                                size: 14
                            }
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Company Name',
                            font: {
                                size: 16
                            }
                        },
                        ticks: {
                            font: {
                                size: 14
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Internships by Company',
                        font: {
                            size: 18
                        }
                    }
                }
            }
        });
    });
</script>
@endpush
