{{-- filepath: resources/views/components/manageuser/item.blade.php --}}
@props([
    'no' => '',
    'name' => '',
    'email' => '',
    'role' => '',
])

<tr class="border-b border-gray-100 hover:bg-gray-50 transition">
    <td class="px-6 py-4 text-sm text-gray-600">{{ $no }}</td>
    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $name }}</td>
    <td class="px-6 py-4 text-sm text-gray-600">{{ $email }}</td>
    <td class="px-6 py-4">
        @if($role === 'Student')
            <span class="inline-flex items-center gap-2 px-4 py-1 rounded-full bg-[#E3F1EF] border border-[#8AC7B8] text-[#3B8172] text-xs font-semibold">
                <svg class="w-4 h-4" fill="none" stroke="#3B8172" stroke-width="2" viewBox="0 0 20 20"><rect x="4" y="6" width="12" height="8" rx="2"/><path d="M8 10h4"/></svg>
                Student
            </span>
        @elseif($role === 'Admin')
            <span class="inline-flex items-center gap-2 px-4 py-1 rounded-full bg-[#F3DEDE] border border-[#D9A5A5] text-[#A05B5B] text-xs font-semibold">
                <svg class="w-4 h-4" fill="none" stroke="#A05B5B" stroke-width="2" viewBox="0 0 20 20"><rect x="5" y="5" width="10" height="10" rx="2"/></svg>
                Admin
            </span>
        @elseif($role === 'Supervisor')
            <span class="inline-flex items-center gap-2 px-4 py-1 rounded-full bg-[#FFF6E3] border border-[#F5D98A] text-[#B89B3B] text-xs font-semibold">
                <svg class="w-4 h-4" fill="none" stroke="#B89B3B" stroke-width="2" viewBox="0 0 20 20"><path d="M10 4v4m0 4v4m-4-4h8"/></svg>
                Supervisor
            </span>
        @endif
    </td>
    <td class="px-6 py-4">
        <div class="flex justify-center">
            <button class="px-4 py-1 rounded-full bg-gray-100 text-gray-700 text-xs font-semibold hover:bg-gray-200 transition">
                Detail
            </button>
        </div>
    </td>
</tr>