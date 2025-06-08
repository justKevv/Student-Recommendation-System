<?php

namespace Database\Factories;

use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fakerEN = FakerFactory::create('en_US');
        $provinceMap = [
            'Aceh' => 'Aceh', 'Sumatera Utara' => 'North Sumatra', 'Sumatera Barat' => 'West Sumatra',
            'Riau' => 'Riau', 'Jambi' => 'Jambi', 'Sumatera Selatan' => 'South Sumatra', 'Bengkulu' => 'Bengkulu',
            'Lampung' => 'Lampung', 'Kepulauan Bangka Belitung' => 'Bangka Belitung Islands',
            'Kepulauan Riau' => 'Riau Islands', 'DKI Jakarta' => 'Jakarta', 'Jawa Barat' => 'West Java',
            'Jawa Tengah' => 'Central Java', 'Yogyakarta' => 'Yogyakarta Special Region',
            'Jawa Timur' => 'East Java', 'Banten' => 'Banten', 'Bali' => 'Bali',
            'Nusa Tenggara Barat' => 'West Nusa Tenggara', 'Nusa Tenggara Timur' => 'East Nusa Tenggara',
            'Kalimantan Barat' => 'West Kalimantan', 'Kalimantan Tengah' => 'Central Kalimantan',
            'Kalimantan Selatan' => 'South Kalimantan', 'Kalimantan Timur' => 'East Kalimantan',
            'Kalimantan Utara' => 'North Kalimantan', 'Sulawesi Utara' => 'North Sulawesi',
            'Sulawesi Tengah' => 'Central Sulawesi', 'Sulawesi Selatan' => 'South Sulawesi',
            'Sulawesi Tenggara' => 'Southeast Sulawesi', 'Gorontalo' => 'Gorontalo',
            'Sulawesi Barat' => 'West Sulawesi', 'Maluku' => 'Maluku', 'Maluku Utara' => 'North Maluku',
            'Papua Barat' => 'West Papua', 'Papua' => 'Papua',
        ];

        $industries = ['Technology', 'E-commerce', 'Finance & Banking', 'Healthcare', 'Education', 'Creative Agency', 'Manufacturing', 'Retail'];

        $indonesianProvince = fake()->state();
        $englishProvince = $provinceMap[$indonesianProvince] ?? $indonesianProvince;

        return [
            'name' => fake()->company,
            'address' => fake()->streetAddress,
            'city' => fake()->city,
            'postal_code' => fake()->postcode,
            'province' => $englishProvince,
            'website' => 'https://' . fake()->domainName(),
            'email' => fake()->unique()->safeEmail(),
            'industry_field' => fake()->randomElement($industries),
            'description' => $fakerEN->paragraph(3),
            'nice_to_have' => [
                $fakerEN->sentence(8),
                $fakerEN->sentence(8),
                $fakerEN->sentence(8),
            ],
        ];
    }
}
