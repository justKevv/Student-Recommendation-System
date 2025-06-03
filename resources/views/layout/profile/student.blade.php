<x-dashboard.layout gap="30px">
    <div class="space-y-5">
        <x-profile.user-profile name="Yuma Akhansa" avatarImage="https://placehold.co/50x50"/>
        <x-profile.student-information />
        <x-profile.skills :skills="['Sosial', 'Logging', 'Lalala', 'wow']"/>
    </div>
    {{-- Right Column --}}
    <div class="space-y-5">
        <x-profile.right-panel title="Experience">
            @php
                $experiences = [
                    [
                        'title' => 'Front End Developer',
                        'company' => 'Google Indonesia',
                        'employmentType' => 'Full Time',
                        'duration' => 'Mar 2022 - Present • 2 yrs 2 mo',
                        'descriptionPoints' => [
                            'Developed and maintained responsive user interfaces for high-traffic web applications using React.js and TypeScript.',
                            'Collaborated with UX/UI designers and back-end developers to ensure seamless integration of APIs and design system',
                            'Implemented best practices for code organization, performance optimization, and accessibility standards.',
                            'Participated in code reviews and contributed to the team\'s knowledge base through documentation and mentoring junior developers.',
                            'Led the migration of legacy code to modern frameworks, resulting in a 30% improvement in load times and user engagement.'
                        ]
                    ],
                    [
                        'title' => 'Software Engineer Intern',
                        'company' => 'Tech Startup',
                        'employmentType' => 'Internship',
                        'duration' => 'Jun 2021 - Feb 2022 • 9 mo',
                        'descriptionPoints' => [
                            'Assisted in developing web applications using Laravel and Vue.js.',
                            'Participated in daily standups and sprint planning sessions.',
                            'Wrote unit tests and helped improve code coverage by 15%.'
                        ]
                    ],
                ];
            @endphp

            @foreach($experiences as $experience)
                <x-profile.experience-item
                    :title="$experience['title']"
                    :company="$experience['company']"
                    :employmentType="$experience['employmentType']"
                    :duration="$experience['duration']"
                    :descriptionPoints="$experience['descriptionPoints']"
                />
                @if(!$loop->last)
                    <hr class="my-4 border-gray-300">
                @endif
            @endforeach
        </x-profile.right-panel>
        <x-profile.right-panel title="Project">
            @php
                $projects = [
                    [
                        'title' => 'E-commerce Platform',
                        'description' => 'A full-stack e-commerce platform with user authentication, shopping cart, payment integration, and admin dashboard. Built with modern web technologies for optimal performance.',
                        'media' => 'https://placehold.co/400x200',
                        'technologies' => ['Laravel', 'Vue.js', 'Tailwind CSS', 'MySQL'],
                        'projectUrl' => 'https://demo.example.com',
                        'githubUrl' => 'https://github.com/justKevv/ecommerce'
                    ],
                    [
                        'title' => 'Task Management App',
                        'description' => 'A collaborative task management application with real-time updates, team collaboration features, and project tracking capabilities.',
                        'media' => 'https://placehold.co/400x200',
                        'technologies' => ['React', 'Node.js', 'Socket.io', 'MongoDB'],
                        'projectUrl' => 'https://taskapp.example.com',
                        'githubUrl' => 'https://github.com/justKevv/task-manager'
                    ],
                ];
            @endphp

            @foreach($projects as $project)
                <x-profile.project-item
                    :title="$project['title']"
                    :description="$project['description']"
                    :media="$project['media']"
                    :technologies="$project['technologies']"
                    :projectUrl="$project['projectUrl']"
                    :githubUrl="$project['githubUrl']"
                />
                @if(!$loop->last)
                    <hr class="my-6 border-gray-300">
                @endif
            @endforeach
        </x-profile.right-panel>
        <x-profile.right-panel title="Certification">
            <x-profile.certificate-item
                certificateName="AWS Certified Solutions Architect"
                issuingOrganization="Amazon Web Services"
                date="January 2024"
                description="Validates expertise in designing distributed systems and applications on the AWS platform"
                imagePath="https://placehold.co/400x200"
                certificateUrl="https://aws.amazon.com/verification"
            />
         </x-profile.right-panel>
        <x-profile.right-panel title="Curriculum Vitae" :addicon="false">
            <x-profile.cv-item
                cvName="Kevin_Bramasta_CV.pdf"
                cvPath="/path/to/your/cv.pdf" {{-- Replace with actual CV path --}}
            />
        </x-profile.right-panel>
    </div>
</x-dashboard.layout>
