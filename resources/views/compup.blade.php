@extends('layout.app', [
    'userName' => 'Adevian Fairuz',
    'userProfileImage' => 'https://placehold.co/50x50'
])

@section('title')
    Companies
@endsection

@section('content')
<div>
    @php
        // Data perusahaan hardcoded sesuai gambar terbaru.
        $jobListings = [
            ['city' => 'Malang', 'company_name' => 'PT Bamboo', 'applied_count' => 2, 'logo_url' => 'https://placehold.co/64x64/0047AB/FFFFFF?text=B', 'logo_bg_color' => 'bg-blue-600'],
            ['city' => 'Gambir, Jakarta Pusat, DKI Jakarta', 'company_name' => 'PT Space', 'applied_count' => 1, 'logo_url' => 'https://placehold.co/64x64/008080/FFFFFF?text=G', 'logo_bg_color' => 'bg-teal-500'],
            ['city' => 'Sawangan, Depok, Jawa Barat', 'company_name' => 'Hartono Group', 'applied_count' => 1, 'logo_url' => 'https://placehold.co/64x64/34D399/FFFFFF?text=gradin', 'logo_bg_color' => 'bg-green-400'],
            ['city' => 'Penjaringan, Jakarta Utara, DKI Jakarta', 'company_name' => 'Salim Group', 'applied_count' => 1, 'logo_url' => 'https://placehold.co/64x64/EF4444/FFFFFF?text=WOOKY', 'logo_bg_color' => 'bg-red-500'],
            ['city' => 'Palopo, Makassar, Sulawesi Selatan', 'company_name' => 'PT Indofood', 'applied_count' => 2, 'logo_url' => 'https://placehold.co/64x64/718096/FFFFFF?text=SENA', 'logo_bg_color' => 'bg-gray-500'],
            ['city' => 'Rungkut, Surabaya, Jawa Timur, Depok, Jawa Barat', 'company_name' => 'Go Group', 'applied_count' => 3, 'logo_url' => 'https://placehold.co/64x64/EF4444/FFFFFF?text=V', 'logo_bg_color' => 'bg-red-500'],
            ['city' => 'Singkawang, Kalimantan Barat', 'company_name' => 'PT Cosmos', 'applied_count' => 1, 'logo_url' => 'https://placehold.co/64x64/10B981/FFFFFF?text=AdHllc', 'logo_bg_color' => 'bg-emerald-500'],
            ['city' => 'Kepanebon Bunguntapan, Kab. Bantul', 'company_name' => 'PT Aloe', 'applied_count' => 1, 'logo_url' => 'https://placehold.co/64x64/F97316/FFFFFF?text=Y', 'logo_bg_color' => 'bg-orange-500'],
            ['city' => 'Mojokerto, Jawa Timur', 'company_name' => 'PT Alam', 'applied_count' => 1, 'logo_url' => 'https://placehold.co/64x64/EF4444/FFFFFF?text=MOOKT', 'logo_bg_color' => 'bg-red-500'],
            ['city' => 'Denpasar, Bali', 'company_name' => 'Hasta Group', 'applied_count' => 2, 'logo_url' => 'https://placehold.co/64x64/374151/FFFFFF?text=SENA', 'logo_bg_color' => 'bg-gray-800'],
            ['city' => 'Jayapura, Papua', 'company_name' => 'Ogram Group', 'applied_count' => 1, 'logo_url' => 'https://placehold.co/64x64/008080/FFFFFF?text=G', 'logo_bg_color' => 'bg-teal-500'],
            ['city' => 'Kupang, Nusa Tenggara Timur', 'company_name' => 'KG Group', 'applied_count' => 1, 'logo_url' => 'https://placehold.co/64x64/0047AB/FFFFFF?text=KG', 'logo_bg_color' => 'bg-blue-600'],
        ];
    @endphp

    <x-compup.company :job-listings="$jobListings"/>
</div>
@endsection