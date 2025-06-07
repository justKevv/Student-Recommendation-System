@props([
    'no' => '',
    'name' => '',
    'industry_field' => '',
    'city' => '',
    'email' => '',
    'is_active' => true,
])

<tr class="border-b border-gray-100 transition hover:bg-gray-50">
    <td class="px-6 py-4 text-gray-700 text-md">{{ $no }}</td>
    <td class="px-6 py-4 text-gray-700 text-md">{{ $name }}</td>
    <td class="px-6 py-4 text-gray-700 text-md">{{ $industry_field }}</td>
    <td class="px-6 py-4 text-gray-700 text-md">{{ $city }}</td>
    <td class="px-6 py-4 text-gray-700 text-md">{{ $email }}</td>
    <td class="px-6 py-4">
        <div class="flex justify-center">
            <div class="inline-flex relative hs-dropdown">
                <button id="hs-dropdown-custom-icon-trigger" type="button" class="flex z-20 justify-center items-center text-sm font-semibold text-gray-800 bg-white rounded-lg border border-gray-200 hs-dropdown-toggle size-9 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                  <svg class="flex-none text-gray-600 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                </button>

                <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-2xl rounded-lg mt-2 z-50 border border-gray-200" role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-custom-icon-trigger">
                  <div class="p-1 space-y-0.5">
                    <a class="flex gap-x-3.5 items-center px-3 py-2 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100" href="#">
                      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                      </svg>
                      Detail
                    </a>
                    <a class="flex gap-x-3.5 items-center px-3 py-2 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100" href="#">
                      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                      </svg>
                      Edit
                    </a>
                    <a class="flex gap-x-3.5 items-center px-3 py-2 text-sm text-red-600 rounded-lg hover:bg-red-50 focus:outline-hidden focus:bg-red-50" href="#">
                      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                      </svg>
                      Delete
                    </a>
                  </div>
                </div>
              </div>
        </div>
    </td>
</tr>
