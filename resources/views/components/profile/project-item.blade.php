@props([
    'projectId' => null,
    'userId' => null,
    'title' => 'Default Project Title',
    'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
    'media' => 'https://placehold.co/40x40',
    'technologies' => ['HTML', 'CSS', 'JavaScript', 'PHP', 'Laravel'],
    'projectUrl' => 'https://example.com',
    'githubUrl' => 'https://github.com/justKevv'
])

<div class="relative mt-4 group">
    <!-- Edit and Delete buttons for individual project -->
    @if($projectId && $userId)
        <div class="absolute top-0 right-0 z-10 flex space-x-1 opacity-0 group-hover:opacity-100">
            @if (auth()->user()->role != 'admin' && auth()->user()->id == $userId)

            <!-- Edit button -->
            <button
                class="p-2 transition-colors duration-200 bg-white border border-gray-300 rounded-full shadow-sm hover:bg-gray-200"
                aria-haspopup="dialog" aria-expanded="false"
                aria-controls="hs-vertically-centered-modal-edit-project-{{ $projectId }}-area-{{ $userId }}"
                data-hs-overlay="#hs-vertically-centered-modal-edit-project-{{ $projectId }}-area-{{ $userId }}"
                title="Edit Project">
                <img src="https://ik.imagekit.io/1qy6epne0l/next-step/assets/fluent_edit-16-filled.png" class="w-3.5 h-3.5" alt="Edit">
            </button>

            <!-- Delete button -->
            <x-profile.delete-button
                :route="route('student.project.destroy', $projectId)"
                :itemId="$projectId"
                itemType="project"
                title="Delete Project"
                description="Are you sure you want to delete this project? This action cannot be undone." />
            @endif
        </div>
    @endif

    <div class="flex flex-col gap-4 lg:flex-row">

        @if($media)
            <div class="flex-shrink-0 lg:w-1/3">
                <img src="{{ $media }}" alt="{{ $title }}" class="object-cover w-full h-48 border border-gray-200 rounded-lg lg:h-32">
            </div>
        @endif

        <div class="flex-1">
            <div class="flex items-start justify-between">
                {{-- Title with proper right margin to avoid button overlap --}}
                <h3 class="text-lg font-semibold text-gray-800 font-['Poppins'] {{ ($projectId && $userId) ? 'pr-20' : '' }}">{{ $title }}</h3>
            </div>

            {{-- Project Links - Moved below title to avoid overlap --}}
            @if($projectUrl || $githubUrl)
                <div class="flex gap-2 mt-2">
                    @if($projectUrl)
                        <a href="{{ $projectUrl }}" target="_blank" class="text-redgoon hover:text-redgoon2 text-sm font-medium font-['Poppins'] whitespace-nowrap">
                            <svg class="inline w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.25 5.5a.75.75 0 00-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 00.75-.75v-4a.75.75 0 011.5 0v4A2.25 2.25 0 0112.75 17h-8.5A2.25 2.25 0 012 14.75v-8.5A2.25 2.25 0 014.25 4h5a.75.75 0 010 1.5h-5z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M6.194 12.753a.75.75 0 001.06.053L16.5 4.44v2.81a.75.75 0 001.5 0v-4.5a.75.75 0 00-.75-.75h-4.5a.75.75 0 000 1.5h2.553l-9.056 8.194a.75.75 0 00-.053 1.06z" clip-rule="evenodd"/>
                            </svg>
                            Live
                        </a>
                    @endif
                    @if($githubUrl)
                        <a href="{{ $githubUrl }}" target="_blank" class="text-gray-600 hover:text-gray-800 text-sm font-['Poppins'] whitespace-nowrap">
                            <svg class="inline w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 0C4.477 0 0 4.484 0 10.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0110 4.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.203 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.942.359.31.678.921.678 1.856 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0020 10.017C20 4.484 15.522 0 10 0z" clip-rule="evenodd"/>
                            </svg>
                            Code
                        </a>
                    @endif
                </div>
            @endif

            {{-- Project Description --}}
            @if($description)
                <p class="text-sm text-gray-700 font-['Poppins'] mt-2 leading-relaxed">{{ Str::limit($description, 200) }}</p>
            @endif

            {{-- Technologies Used --}}
            @if(count($technologies) > 0)
                <div class="flex flex-wrap gap-2 mt-3">
                    @foreach($technologies as $tech)
                        <span class="px-2 py-1 bg-skillbg text-main outline-2 outline-skilloutline text-xs font-medium rounded-full font-['Poppins']">
                            {{ $tech }}
                        </span>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
