<tr>
    <td class="px-6 py-4 text-sm text-gray-700">{{ $no }}</td>
    <td class="px-6 py-4 text-sm text-gray-700">{{ $name }}</td>
    <td class="px-6 py-4 text-sm text-gray-700">{{ $email }}</td>
    <td class="px-6 py-4 text-sm text-gray-700">{{ $contact }}</td>
    <td class="px-6 py-4">
        <div class="flex justify-center">
            <div x-data="{ open: false }" class="inline-block relative text-left">
                <button @click="open = !open" class="p-2 rounded-full hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                    <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
                    </svg>
                </button>

                <div x-show="open" @click.away="open = false"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     class="absolute right-full z-20 py-1 mt-2 mr-2 w-40 bg-white rounded-md shadow-lg origin-top-right">
                    <a href="#" class="block px-4 py-2 text-sm text-blue-600 hover:bg-blue-50">
                        <span class="flex items-center">
                            <svg class="mr-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            Detail
                        </span>
                    </a>
                    <a href="#" class="block px-4 py-2 text-sm text-main hover:bg-gray-100">
                        <span class="flex items-center">
                            <svg class="mr-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit
                        </span>
                    </a>
                    <a href="#" class="block px-4 py-2 text-sm text-redgoon hover:bg-red-100">
                        <span class="flex items-center">
                            <svg class="mr-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            Delete
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </td>
</tr>

<script src="//unpkg.com/alpinejs" defer></script>