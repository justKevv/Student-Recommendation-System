@props([
    'studentSupervisorCounts' => ['students' => 0, 'supervisors' => 0],
    'studentInternshipPercentage' => '',
    'internshipTypeDistribution'
])

<div class="w-full max-w-none lg:max-w-[800px] xl:max-w-[900px] 2xl:max-w-[1000px] h-64 grid grid-cols-3 gap-6">
    <!-- Card 1: Internship Type Distribution Pie Chart -->
    <div class="relative flex-1 h-full">
        <div class="w-full h-full bg-white rounded-[30px] p-6 flex flex-col justify-between">
            <div class="flex flex-1 justify-center items-center">
                <canvas id="internshipTypeChart" height="200"></canvas>
            </div>
            <div class="text-center text-black text-xs font-medium font-['Poppins'] mt-2">
                Internship Type Distribution
            </div>
        </div>
    </div>

    <!-- Card 2: Student vs Supervisor Pie Chart -->
    <div class="relative flex-1 h-full">
        <div class="w-full h-full bg-white rounded-[30px] p-6 flex flex-col justify-between">
            <div class="flex flex-1 justify-center items-center">
                <canvas id="studentSupervisorPieChart" height="200"></canvas>
            </div>
            @push('scripts')
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Internship Type Distribution Chart
                    const internshipTypeData = @json($internshipTypeDistribution);
                    const internshipTypeLabels = Object.keys(internshipTypeData);
                    const internshipTypeValues = Object.values(internshipTypeData);

                    const typeColors = {
                        'remote': 'rgba(75, 192, 192, 0.6)',
                        'on_site': 'rgba(255, 99, 132, 0.6)',
                        'hybrid': 'rgba(54, 162, 235, 0.6)',
                    };

                    const backgroundColors = internshipTypeLabels.map(label => typeColors[label] || 'rgba(201, 203, 207, 0.6)');
                    const borderColors = internshipTypeLabels.map(label => typeColors[label] ? typeColors[label].replace('0.6', '1') : 'rgba(201, 203, 207, 1)');

                    const ctxInternshipType = document.getElementById('internshipTypeChart').getContext('2d');
                    new Chart(ctxInternshipType, {
                        type: 'pie',
                        data: {
                            labels: internshipTypeLabels.map(label => label.replace('_', ' ').replace(/\b\w/g, l => l.toUpperCase())),
                            datasets: [{
                                data: internshipTypeValues,
                                backgroundColor: backgroundColors,
                                borderColor: borderColors,
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    position: 'bottom',
                                },
                                title: {
                                    display: true,
                                    text: 'Internship Type Distribution',
                                    font: {
                                        size: 18
                                    }
                                }
                            }
                        }
                    });

                    // Student vs Supervisor Pie Chart (existing chart)
                    const ctxStudentSupervisor = document.getElementById('studentSupervisorPieChart').getContext('2d');
                    const studentSupervisorCounts = @json($studentSupervisorCounts);

                    new Chart(ctxStudentSupervisor, {
                        type: 'pie',
                        data: {
                            labels: ['Students', 'Supervisors'],
                            datasets: [{
                                data: [studentSupervisorCounts.students, studentSupervisorCounts.supervisors],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.6)',
                                    'rgba(54, 162, 235, 0.6)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    position: 'bottom',
                                },
                                title: {
                                    display: true,
                                    text: 'Student vs Supervisor Distribution',
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
            <div class="text-center text-black text-xs font-medium font-['Poppins'] mt-2">
                Student vs Supervisor Distribution
            </div>
        </div>
    </div>

    <!-- Card 3: Student Internship -->
    <div class="relative flex-1 h-full">
        <div class="w-full h-full bg-white rounded-[30px] p-6 flex flex-col justify-between">
            <div class="flex flex-1 justify-center items-center">
                <h2 class="text-center text-[80px] font-semibold text-[#2C2C2C]">{{ $studentInternshipPercentage }}%</h2>
            </div>
            <hr class="my-3 w-full border-t border-gray-200">
            <p class="text-lg font-medium leading-snug text-center text-black">
                Students with<br>Accepted Internship
            </p>
        </div>
    </div>

    {{-- <!-- Kontainer 2 -->
    <div class="relative flex-1 min-w-0">
        <div class="flex justify-between items-center mb-4">
            <!-- Header Kontainer 2 -->
        </div>
        <div class="w-full h-80 bg-white rounded-[30px] shadow-[0px_0px_20px_0px_rgba(0,0,0,0.05)] p-6">
            <!-- Isi Kontainer 2 -->
            <h2 class="text-center text-[80px] font-semibold text-[#FFC107]">55%</h2>
        <hr class="my-3 w-full border-t border-gray-200">
        <p class="text-lg font-medium leading-snug text-center text-black">
            Supervisor can<br>Intern
        </p>
        </div>
    </div>

    <!-- Kontainer 3 -->
    <div class="relative flex-1 min-w-0">
        <div class="flex justify-between items-center mb-4">
            <!-- Header Kontainer 3 -->
        </div>
        <div class="w-full h-80 bg-white rounded-[30px] shadow-[0px_0px_20px_0px_rgba(0,0,0,0.05)] p-6">
            <!-- Isi Kontainer 3 -->
             <h2 class="text-center text-[80px] font-semibold text-[#2C2C2C]">75%</h2>
        <hr class="my-3 w-full border-t border-gray-200">
        <p class="text-lg font-medium leading-snug text-center text-black">
            Student<br>Intership
        </p>
        </div>
    </div> --}}
</div>
