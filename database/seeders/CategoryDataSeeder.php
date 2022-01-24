<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'id' => 1,
                'category_name' => "Emergency Services",
                'icon' => 'alert.svg',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => now()
            ],
            [
                'id' => 2,
                'category_name' => "Healthcare",
                'icon' => 'healthcare.svg',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => now()
            ],
            [
                'id' => 3,
                'category_name' => "Food & Beverages",
                'icon' => 'food.svg',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => now()
            ],
            [
                'id' => 4,
                'category_name' => "Rooms & Rentals",
                'icon' => 'room.svg',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => now()
            ],
            [
                'id' => 5,
                'category_name' => "Professional Services",
                'icon' => 'professionals.svg',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => now()
            ],
            [
                'id' => 6,
                'category_name' => "Experts",
                'icon' => 'experts.svg',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => now()
            ],
            [
                'id' => 7,
                'category_name' => "Home & Office",
                'icon' => 'home&office.svg',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => now()
            ],
            [
                'id' => 8,
                'category_name' => "City Attractions",
                'icon' => 'publicplaces.svg',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => now()
            ],
            [
                'id' => 9,
                'category_name' => "Fashion & Beauty",
                'icon' => 'dress.svg',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => now()
            ],
            [
                'id' => 10,
                'category_name' => "Health & Fitness",
                'icon' => 'gym.svg',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => now()
            ],
            [
                'id' => 11,
                'category_name' => "Automobile",
                'icon' => 'automobile.svg',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => now()
            ],
            [
                'id' => 12,
                'category_name' => "Educational Institutions",
                'icon' => 'educational.svg',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => now()
            ],
            [
                'id' => 13,
                'category_name' => "Financial institutions",
                'icon' => 'financial.svg',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => now()
            ],
            [
                'id' => 14,
                'category_name' => "Travel & Tourism",
                'icon' => 'travel.svg',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => now()
            ],
            [
                'id' => 15,
                'category_name' => "Electronics",
                'icon' => 'electricals.svg',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => now()
            ],
            [
                'id' => 16,
                'category_name' => "Wedding & Events",
                'icon' => 'wedding.svg',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => now()
            ],
            [
                'id' => 17,
                'category_name' => "Retail & Wholesale",
                'icon' => 'retail.svg',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => now()
            ],
            [
                'id' => 18,
                'category_name' => "Media & Entertainment",
                'icon' => 'media.svg',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => now()
            ],
            [
                'id' => 19,
                'category_name' => "Hire & Rental",
                'icon' => 'rent.svg',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => now()
            ],
            [
                'id' => 20,
                'category_name' => "Sports",
                'icon' => 'sports.svg',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => now()
            ],
            [
                'id' => 21,
                'category_name' => "Telecom",
                'icon' => 'telecom.svg',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => now()
            ],
            [
                'id' => 22,
                'category_name' => "Astro",
                'icon' => 'astro.svg',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => now()
            ],
            [
                'id' => 23,
                'category_name' => "Government Offices",
                'icon' => 'govt.svg',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => now()
            ],
            [
                'id' => 24,
                'category_name' => "Reservations",
                'icon' => 'train.svg',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => now()
            ],
            [
                'id' => 25,
                'category_name' => "Equipment & Repair",
                'icon' => 'equipement.svg',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => now()
            ],
            [
                'id' => 26,
                'category_name' => "Manufactures",
                'icon' => 'factory.svg',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => now()
            ],
            [
                'id' => 27,
                'category_name' => "Agriculture",
                'icon' => 'agri.svg',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => now()
            ],
            [
                'id' => 28,
                'category_name' => "Other",
                'icon' => 'other.svg',
                'status' => 'active',
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => now()
            ]
        ];
        foreach ($categories as $category) {
	        if (DB::table('beheco_category')->where('id', $category['id'])->count()) {
	            continue;
	        }
	        unset($categories['id']);
	        DB::table('beheco_category')->insert($category);
        }
    }
}
