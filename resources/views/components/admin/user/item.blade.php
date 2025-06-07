@props([
    'no' => '',
    'name' => '',
    'email' => '',
    'phone' => '',
    'role' => '',
    'user' => null,
])



<tr class="border-b border-gray-100 transition hover:bg-gray-50">
    <td class="px-6 py-4 text-gray-600 text-md">{{ $no }}</td>
    <td class="px-6 py-4 font-medium text-gray-900 text-md">{{ $name }}</td>
    <td class="px-6 py-4 text-gray-600 text-md">{{ $email }}</td>
    <td class="px-6 py-4 text-gray-600 text-md">{{ $phone }}</td>
    <td class="px-6 py-4">
        @if ($role === 'student')
            <span class="inline-flex gap-2 items-center px-4 py-1 text-sm font-normal rounded-full bg-approved">
                Student
            </span>
        @elseif($role === 'admin')
            <span class="inline-flex gap-2 items-center px-4 py-1 text-sm font-normal rounded-full bg-rejected">
                Admin
            </span>
        @elseif($role === 'supervisor')
            <span class="inline-flex gap-2 items-center px-4 py-1 text-sm font-normal rounded-full bg-pending">
                Supervisor
            </span>
        @endif
    </td>
    <td class="px-6 py-4">
        <div class="flex justify-center">
            <div class="inline-flex relative hs-dropdown">
                <button id="hs-dropdown-custom-icon-trigger-{{ $no }}" type="button"
                    class="flex z-20 justify-center items-center text-sm font-semibold text-gray-800 bg-white rounded-lg border border-gray-200 hs-dropdown-toggle size-9 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                    aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                    <svg class="flex-none text-gray-600 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="1" />
                        <circle cx="12" cy="5" r="1" />
                        <circle cx="12" cy="19" r="1" />
                    </svg>
                </button>

                <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-2xl rounded-lg mt-2 z-50 border border-gray-200"
                    role="menu" aria-orientation="vertical"
                    aria-labelledby="hs-dropdown-custom-icon-trigger-{{ $no }}">
                    <div class="p-1 space-y-0.5">
                        @if ($role != 'admin')
                            <div
                                class="flex gap-x-3.5 items-center px-3 py-2 text-sm text-gray-800 rounded-lg select-none hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                    </path>
                                </svg>
                                Detail
                            </div>
                        @endif
                        <button type="button"
                            class="flex gap-x-3.5 items-center px-3 py-2 w-full text-sm text-left text-gray-800 rounded-lg select-none hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100"
                            aria-haspopup="dialog" aria-expanded="false"
                            aria-controls="hs-edit-modal-{{ $no }}"
                            data-hs-overlay="#hs-edit-modal-{{ $no }}">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            Edit
                        </button>
                        <button type="button"
                            class="flex gap-x-3.5 items-center px-3 py-2 w-full text-sm text-left rounded-lg select-none text-redgoon hover:bg-red-50 focus:outline-hidden focus:bg-red-50"
                            aria-haspopup="dialog" aria-expanded="false"
                            aria-controls="hs-delete-modal-{{ $no }}"
                            data-hs-overlay="#hs-delete-modal-{{ $no }}">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                </path>
                            </svg>
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </td>
</tr>

<form action="{{ route('user.management.destroy', $user->id) }}" method="post">
    @csrf
    @method('delete')
    <div id="hs-delete-modal-{{ $no }}"
        class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none flex items-center justify-center"
        role="dialog" tabindex="-1" aria-labelledby="hs-delete-modal-{{ $no }}-label">
        <div
            class="m-3 opacity-0 transition-all ease-out hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:max-w-lg sm:w-full">
            <div class="flex flex-col bg-white rounded-xl border shadow-sm pointer-events-auto">
                <div class="flex justify-between items-center px-4 py-3 border-b border-gray-200">
                    <h3 id="hs-delete-modal-{{ $no }}-label" class="font-bold text-gray-800">
                        Confirm Delete
                    </h3>
                    <button type="button"
                        class="inline-flex gap-x-2 justify-center items-center text-gray-800 bg-gray-100 rounded-full border border-transparent size-8 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                        aria-label="Close" data-hs-overlay="#hs-delete-modal-{{ $no }}">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="m18 6-12 12"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="overflow-y-auto p-4 text-center">
                    <p class="text-gray-800">
                        Are you sure you want to delete <strong>{{ $name }}</strong>? This action cannot be
                        undone.
                    </p>
                </div>
                <div class="flex gap-x-2 justify-end items-center px-4 py-3 border-t border-gray-200">
                    <button type="button"
                        class="inline-flex gap-x-2 items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white rounded-lg border border-gray-200 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#hs-delete-modal-{{ $no }}">
                        Cancel
                    </button>
                    <button type="submit"
                        class="inline-flex gap-x-2 items-center px-3 py-2 text-sm font-medium text-white bg-red-600 rounded-lg border border-transparent hover:bg-red-700 focus:outline-none focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Edit Modal Component -->
<x-admin.user.edit-modal :user="$user" :no="$no" :role="$role" />
