@extends('layout.app', [
    'userName' => 'Yuma Akhansa',
    'userProfileImage' => 'https://placehold.co/50x50'
])

@section('title')
    Dashboard
@endsection

@section('content')
    <x-dashboard.layout>
        <!-- Main Content Area -->
        <x-dashboard.main-content>
            <!-- Hero Banner Section -->
            <x-dashboard.hero-banner />
            <!-- Current Internship Section -->
            <x-dashboard.internship-section title="Your Internship" :isEmpty="true" />
            <!-- Continue Looking Section -->
            <x-dashboard.continue-looking title="Continue Looking">
                {{--
                    Last Seen Internship Component

                    <x-last-seen /> accepts the following props:

                    - imageUrl      : (string) Main image URL for the internship or company. Defaults to a placeholder if not provided.
                    - position      : (string) Job position title (e.g., "Frontend Developer").
                    - companies     : (string) Name of the company or organization.
                    - type          : (string) Employment type (e.g., "Remote", "On-site", "Hybrid").
                    - href          : (string) URL to the internship detail page.
                    - tags          : (array) List of tags or skills (e.g., ['Remote', 'JavaScript', 'React']).
                    - companyLogo   : (string|null) URL for the company logo. Falls back to `imageUrl` if null.
                    - class         : (string) Additional CSS classes for styling.

                    Example usage:
                    <x-last-seen
                        imageUrl="https://internship-image.com/image.jpg"
                        position="UI/UX Designer Intern"
                        companies="Creative Agency Ltd"
                        type="Hybrid"
                        :tags="['Design', 'Figma', 'Prototyping']"
                        companyLogo="https://company.com/logo.png"
                        href="/internships/456"
                        class="mb-3"
                    />
                --}}
                <x-last-seen />
                <x-last-seen />
                <x-last-seen />
            </x-dashboard.continue-looking>
        </x-dashboard.main-content>
        <!-- Sidebar -->
        <x-dashboard.sidebar>
            {{--
                Recommended Internship Component

                <x-recommended /> accepts the following props:

                - imageUrl   : (string) URL of the company logo. Defaults to a placeholder if not provided.
                - title      : (string) Title of the internship position.
                - agency     : (string) Name of the company or agency offering the internship.
                - timeLeft   : (string) Time remaining to apply (e.g., "3 days left").
                - quota      : (int) Number of available positions.
                - href       : (string) URL to the internship detail page.
                - isUrgent   : (bool) Indicates if the internship is urgent. Displays a badge and animation if true.
                - class      : (string) Additional CSS classes for customization.

                Example usage:
                <x-recommended
                    imageUrl="https://company-logo.com/logo.png"
                    title="Frontend Developer Intern"
                    agency="Tech Solutions Inc"
                    timeLeft="3 days left"
                    :quota="5"
                    href="/internships/123"
                    :isUrgent="true"
                    class="mb-4"
                />
            --}}
            <x-recommended />
            <x-recommended />
            <x-recommended />
        </x-dashboard.sidebar>
    </x-dashboard.layout>
@endsection
