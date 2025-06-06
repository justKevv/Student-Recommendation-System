@props([
    'no' => '1',
    'company' => 'Jasa Ayah Corp.',
    'position' => 'UI & UX',
    'image' => 'https://placehold.co/32x32',
    'location' => 'Malang',
    'type' => 'Hybrid',
    'date' => '27 May 2025',
    'status' => 'pending',
    'href' => '#',
])

<tr>
    <td class="px-6 py-4">{{ $no }}</td>
    <td class="flex gap-2 items-center px-6 py-4 relative">
        <a href="{{ $href }}" class="absolute inset-0 z-10 focus:outline-none"></a>
        <img src="{{ $image }}" class="object-cover w-8 h-8 rounded-full" alt="Jasa Ayah Corp.">
        {{ $company }}
    </td>
    <td class="px-6 py-4">{{ $position }}</td>
    <td class="px-6 py-4">{{ $location }}</td>
    <td class="px-6 py-4">{{ $type }}</td>
    <td class="px-6 py-4">{{ $date }}</td>
    <td class="px-6 py-4">
        <x-dynamic-component :component="'status.' . $status" />
    </td>
</tr>
