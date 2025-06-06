@props([
    'no' => '1',
    'nim' => '2341720200',
    'name' => 'budi',
    'study' => 'D-IV Example Program',
    'role' => 'UI & UX',
    'status' => 'pending',
])

<tr>
    <td class="px-6 py-4">{{ $no }}</td>
    <td class="px-6 py-4">{{ $nim }}</td>
    <td class="px-6 py-4">{{ $name }}</td>
    <td class="px-6 py-4">{{ $study }}</td>
    <td class="px-6 py-4">{{ $role }}</td>
    <td class="px-6 py-4">
        <x-dynamic-component :component="'status.' . $status" />
    </td>
    <td class="px-6 py-4">
        <button class="px-6 py-2 text-sm font-medium text-white rounded-full bg-main hover:bg-neutral-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-500">
            Detail
        </button>
    </td>
</tr>
