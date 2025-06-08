@extends('layout.app', [
    'userName' => 'Yuma Akhunza',
    'userProfileImage' => 'https://placehold.co/50x50'
])
{{-- {{ dd($companyData) }} --}}

@section('title')
    Detail Company
@endsection

@section('content')
    <div class="container mx-auto min-h-screen font-sans">
        <div class="flex flex-col gap-8 lg:flex-row">
            <div class="space-y-6 lg:w-2/3">
                <x-company.internship :company="$companyData->name" :img="$companyData->profile_picture"/>

                <x-company.about :company="$companyData->name" :description="$companyData->description" />

                <x-company.hiring :positions="$companyData->internships" />

                <x-company.nicetohave :items="$companyData->nice_to_have" />
            </div>
            <div class="space-y-6 lg:w-1/3">
                <x-company.information
                    :industryField="Str::title(str_replace('_', ' ', $companyData->industry_field))"
                    :address="$companyData->address"
                    :city="$companyData->city"
                    :province="$companyData->province"
                    :email="$companyData->email"
                    :website="$companyData->website"
                    :updateDate="$companyData->updated_at->format('M j, Y')"/>
            </div>
        </div>
    </div>
@endsection
