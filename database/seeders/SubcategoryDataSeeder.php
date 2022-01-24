<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategoryDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories = [
	        [
			    'category_id' => "1",
			    'subcategory_name' => "Ambulance Service",
			    'created_at' => now()
			],
			[
			    'category_id' => "1",
			    'subcategory_name' => "Crane And Recovery Service",
			    'created_at' => now()
			],
			[
			    'category_id' => "1",
			    'subcategory_name' => "Fire And Safety",
			    'created_at' => now()
			],
			[
			    'category_id' => "1",
			    'subcategory_name' => "Medical Shops",
			    'created_at' => now()
			],
			[
			    'category_id' => "1",
			    'subcategory_name' => "Hospital",
			    'created_at' => now()
			],
			[
			    'category_id' => "1",
			    'subcategory_name' => "Petrol Pump",
			    'created_at' => now()
			],
			[
			    'category_id' => "1",
			    'subcategory_name' => "Police Station",
			    'created_at' => now()
			],
			[
			    'category_id' => "3",
			    'subcategory_name' => "Bakery",
			    'created_at' => now()
			],
			[
			    'category_id' => "3",
			    'subcategory_name' => "Food",
			    'created_at' => now()
			],
			[
			    'category_id' => "3",
			    'subcategory_name' => "Restaurants",
			    'created_at' => now()
			],
			[
			    'category_id' => "3",
			    'subcategory_name' => "Hotel And Accommodation",
			    'created_at' => now()
			],
			[
			    'category_id' => "3",
			    'subcategory_name' => "Hotels",
			    'created_at' => now()
			],
			[
			    'category_id' => "3",
			    'subcategory_name' => "Fruits & Juice Shops",
			    'created_at' => now()
			],
			[
			    'category_id' => "4",
			    'subcategory_name' => "Apartments",
			    'created_at' => now()
			],
			[
			    'category_id' => "4",
			    'subcategory_name' => "Real Estate",
			    'created_at' => now()
			],
			[
			    'category_id' => "4",
			    'subcategory_name' => "Resort",
			    'created_at' => now()
			],
			[
			    'category_id' => "4",
			    'subcategory_name' => "Home Stay",
			    'created_at' => now()
			],
			[
			    'category_id' => "4",
			    'subcategory_name' => "Hostels",
			    'created_at' => now()
			],
			[
			    'category_id' => "4",
			    'subcategory_name' => "Hotel And Accommodation",
			    'created_at' => now()
			],
			[
			    'category_id' => "4",
			    'subcategory_name' => "Hotels",
			    'created_at' => now()
			],
			[
			    'category_id' => "4",
			    'subcategory_name' => "Accounting",
			    'created_at' => now()
			],
			[
			    'category_id' => "4",
			    'subcategory_name' => "Advocates",
			    'created_at' => now()
			],
			[
			    'category_id' => "4",
			    'subcategory_name' => "Architects",
			    'created_at' => now()
			],
			[
			    'category_id' => "4",
			    'subcategory_name' => "Auditing",
			    'created_at' => now()
			],
			[
			    'category_id' => "4",
			    'subcategory_name' => "Business Consultants",
			    'created_at' => now()
			],
			[
			    'category_id' => "4",
			    'subcategory_name' => "Cargo Services",
			    'created_at' => now()
			],
			[
			    'category_id' => "4",
			    'subcategory_name' => "Counselling Service",
			    'created_at' => now()
			],
			[
			    'category_id' => "4",
			    'subcategory_name' => "Courier Service",
			    'created_at' => now()
			],
			[
			    'category_id' => "4",
			    'subcategory_name' => "Educational Consultancy",
			    'created_at' => now()
			],
			[
			    'category_id' => "4",
			    'subcategory_name' => "Man Power Agencies",
			    'created_at' => now()
			],
			[
			    'category_id' => "4",
			    'subcategory_name' => "Hr Consultancy",
			    'created_at' => now()
			],
			[
			    'category_id' => "4",
			    'subcategory_name' => "Tax Consultants",
			    'created_at' => now()
			],
			[
			    'category_id' => "4",
			    'subcategory_name' => "Shipping",
			    'created_at' => now()
			],
			[
			    'category_id' => "4",
			    'subcategory_name' => "Software Development Company",
			    'created_at' => now()
			],
			[
			    'category_id' => "4",
			    'subcategory_name' => "Advertising Agencies",
			    'created_at' => now()
			],
			[
			    'category_id' => "4",
			    'subcategory_name' => "Advertising",
			    'created_at' => now()
			],
			[
			    'category_id' => "4",
			    'subcategory_name' => "Branding",
			    'created_at' => now()
			],
			[
			    'category_id' => "4",
			    'subcategory_name' => "Data Entry Works",
			    'created_at' => now()
			],
			[
			    'category_id' => "4",
			    'subcategory_name' => "Document Writing",
			    'created_at' => now()
			],
			[
			    'category_id' => "4",
			    'subcategory_name' => "GPS Tracker Solutions",
			    'created_at' => now()
			],
			[
			    'category_id' => "4",
			    'subcategory_name' => "Security Agencies",
			    'created_at' => now()
			],
			[
			    'category_id' => "4",
			    'subcategory_name' => "Investigation And Detectives Agency",
			    'created_at' => now()
			],
			[
			    'category_id' => "6",
			    'subcategory_name' => "Aluminium Fabrication Works",
			    'created_at' => now()
			],
			[
			    'category_id' => "6",
			    'subcategory_name' => "Plumber",
			    'created_at' => now()
			],
			[
			    'category_id' => "6",
			    'subcategory_name' => "Electrician",
			    'created_at' => now()
			],
			[
			    'category_id' => "2",
			    'subcategory_name' => "Eye Care",
			    'created_at' => now()
			],
			[
			    'category_id' => "2",
			    'subcategory_name' => "Eye Care and Optical",
			    'created_at' => now()
			],
			[
			    'category_id' => "2",
			    'subcategory_name' => "Ayurveda",
			    'created_at' => now()
			],
			[
			    'category_id' => "2",
			    'subcategory_name' => "Ayurveda Products and Treatment",
			    'created_at' => now()
			],
			[
			    'category_id' => "2",
			    'subcategory_name' => "Dental Clinic",
			    'created_at' => now()
			],
			[
			    'category_id' => "2",
			    'subcategory_name' => "Hospital",
			    'created_at' => now()
			],
			[
			    'category_id' => "2",
			    'subcategory_name' => "Laboratories",
			    'created_at' => now()
			],
			[
			    'category_id' => "2",
			    'subcategory_name' => "Medical Shops",
			    'created_at' => now()
			],
			[
			    'category_id' => "2",
			    'subcategory_name' => "Home Nursing",
			    'created_at' => now()
			],
			[
			    'category_id' => "2",
			    'subcategory_name' => "Blood Bank",
			    'created_at' => now()
			],
			[
			    'category_id' => "2",
			    'subcategory_name' => "Pharmaceuticals Distributors",
			    'created_at' => now()
			],
			[
			    'category_id' => "2",
			    'subcategory_name' => "Medical equipment",
			    'created_at' => now()
			],
			[
			    'category_id' => "8",
			    'subcategory_name' => "KSRTC Bus Stand",
			    'created_at' => now()
			],
			[
			    'category_id' => "8",
			    'subcategory_name' => "Private Bus Stand",
			    'created_at' => now()
			],
			[
			    'category_id' => "8",
			    'subcategory_name' => "Amusement Parks",
			    'created_at' => now()
			],
			[
			    'category_id' => "8",
			    'subcategory_name' => "Clubs",
			    'created_at' => now()
			],
			[
			    'category_id' => "8",
			    'subcategory_name' => "KSRTC Bus Station",
			    'created_at' => now()
			],
			[
			    'category_id' => "8",
			    'subcategory_name' => "Museum",
			    'created_at' => now()
			],
			[
			    'category_id' => "8",
			    'subcategory_name' => "Shopping Mall",
			    'created_at' => now()
			],
			[
			    'category_id' => "7",
			    'subcategory_name' => "Building And Construction",
			    'created_at' => now()
			],
			[
			    'category_id' => "7",
			    'subcategory_name' => "Cement Retailing",
			    'created_at' => now()
			],
			[
			    'category_id' => "7",
			    'subcategory_name' => "Ceramic Tiles Dealer",
			    'created_at' => now()
			],
			[
			    'category_id' => "7",
			    'subcategory_name' => "Home Care",
			    'created_at' => now()
			],
			[
			    'category_id' => "7",
			    'subcategory_name' => "Furniture",
			    'created_at' => now()
			],
			[
			    'category_id' => "7",
			    'subcategory_name' => "Tiles, Granite, Marbles",
			    'created_at' => now()
			],
			[
			    'category_id' => "7",
			    'subcategory_name' => "Cleaning Services",
			    'created_at' => now()
			],
			[
			    'category_id' => "7",
			    'subcategory_name' => "Automation",
			    'created_at' => now()
			],
			[
			    'category_id' => "7",
			    'subcategory_name' => "Interior Designers",
			    'created_at' => now()
			],
			[
			    'category_id' => "7",
			    'subcategory_name' => "Security Systems",
			    'created_at' => now()
			],
			[
			    'category_id' => "7",
			    'subcategory_name' => "Interlock",
			    'created_at' => now()
			],
			[
			    'category_id' => "11",
			    'subcategory_name' => "Automobile Dealers",
			    'created_at' => now()
			],
			[
			    'category_id' => "11",
			    'subcategory_name' => "Automotive",
			    'created_at' => now()
			],
			[
			    'category_id' => "11",
			    'subcategory_name' => "Cycle Shops",
			    'created_at' => now()
			],
			[
			    'category_id' => "11",
			    'subcategory_name' => "Driving Schools",
			    'created_at' => now()
			],
			[
			    'category_id' => "11",
			    'subcategory_name' => "Spare Parts",
			    'created_at' => now()
			],
			[
			    'category_id' => "11",
			    'subcategory_name' => "Pollution Testing Centres",
			    'created_at' => now()
			],
			[
			    'category_id' => "11",
			    'subcategory_name' => "Tyre Shops",
			    'created_at' => now()
			],
			[
			    'category_id' => "11",
			    'subcategory_name' => "Workshops",
			    'created_at' => now()
			],
			[
			    'category_id' => "12",
			    'subcategory_name' => "Colleges",
			    'created_at' => now()
			],
			[
			    'category_id' => "12",
			    'subcategory_name' => "Dance",
			    'created_at' => now()
			],
			[
			    'category_id' => "12",
			    'subcategory_name' => "Day Care and Play Schools",
			    'created_at' => now()
			],
			[
			    'category_id' => "12",
			    'subcategory_name' => "Distance Education",
			    'created_at' => now()
			],
			[
			    'category_id' => "12",
			    'subcategory_name' => "Education",
			    'created_at' => now()
			],
			[
			    'category_id' => "12",
			    'subcategory_name' => "PSC Coaching",
			    'created_at' => now()
			],
			[
			    'category_id' => "12",
			    'subcategory_name' => "IELTS Training",
			    'created_at' => now()
			],
			[
			    'category_id' => "12",
			    'subcategory_name' => "Pre School",
			    'created_at' => now()
			],
			[
			    'category_id' => "12",
			    'subcategory_name' => "Schools",
			    'created_at' => now()
			],
			[
			    'category_id' => "12",
			    'subcategory_name' => "Technical Education",
			    'created_at' => now()
			],
			[
			    'category_id' => "12",
			    'subcategory_name' => "Tuition Centres",
			    'created_at' => now()
			],
			[
			    'category_id' => "13",
			    'subcategory_name' => "Bank",
			    'created_at' => now()
			],
			[
			    'category_id' => "13",
			    'subcategory_name' => "Currency, Money Transfer, Foreign Exchange",
			    'created_at' => now()
			],
			[
			    'category_id' => "13",
			    'subcategory_name' => "Finance And Banking",
			    'created_at' => now()
			],
			[
			    'category_id' => "13",
			    'subcategory_name' => "Gold Loan",
			    'created_at' => now()
			],
			[
			    'category_id' => "13",
			    'subcategory_name' => "Money Transfer& Foreign Exchange",
			    'created_at' => now()
			],
			[
			    'category_id' => "9",
			    'subcategory_name' => "Boutique",
			    'created_at' => now()
			],
			[
			    'category_id' => "9",
			    'subcategory_name' => "Dress Or Apparels",
			    'created_at' => now()
			],
			[
			    'category_id' => "9",
			    'subcategory_name' => "Jewellery",
			    'created_at' => now()
			],
			[
			    'category_id' => "9",
			    'subcategory_name' => "Shoes And Bags",
			    'created_at' => now()
			],
			[
			    'category_id' => "9",
			    'subcategory_name' => "Textiles",
			    'created_at' => now()
			],
			[
			    'category_id' => "9",
			    'subcategory_name' => "Beauty Parlour",
			    'created_at' => now()
			],
			[
			    'category_id' => "9",
			    'subcategory_name' => "Wedding Centres",
			    'created_at' => now()
			],
			[
			    'category_id' => "9",
			    'subcategory_name' => "Hair Fixing",
			    'created_at' => now()
			],
			[
			    'category_id' => "9",
			    'subcategory_name' => "Tattoo Parlour",
			    'created_at' => now()
			],
			[
			    'category_id' => "9",
			    'subcategory_name' => "Foot Ware Shops",
			    'created_at' => now()
			],
			[
			    'category_id' => "14",
			    'subcategory_name' => "Tour And Travels",
			    'created_at' => now()
			],
			[
			    'category_id' => "14",
			    'subcategory_name' => "Railway Reservation",
			    'created_at' => now()
			],
			[
			    'category_id' => "14",
			    'subcategory_name' => "House Boating",
			    'created_at' => now()
			],
			[
			    'category_id' => "16",
			    'subcategory_name' => "Auditorium",
			    'created_at' => now()
			],
			[
			    'category_id' => "16",
			    'subcategory_name' => "Event Management",
			    'created_at' => now()
			],
			[
			    'category_id' => "16",
			    'subcategory_name' => "Beauty Parlour",
			    'created_at' => now()
			],
			[
			    'category_id' => "16",
			    'subcategory_name' => "Caters",
			    'created_at' => now()
			],
			[
			    'category_id' => "16",
			    'subcategory_name' => "Studio",
			    'created_at' => now()
			],
			[
			    'category_id' => "16",
			    'subcategory_name' => "Marriage Arrangements",
			    'created_at' => now()
			],
			[
			    'category_id' => "16",
			    'subcategory_name' => "Wedding Centres",
			    'created_at' => now()
			],
			[
			    'category_id' => "15",
			    'subcategory_name' => "Laptop Sales & Service",
			    'created_at' => now()
			],
			[
			    'category_id' => "15",
			    'subcategory_name' => "Home Appliances",
			    'created_at' => now()
			],
			[
			    'category_id' => "15",
			    'subcategory_name' => "Computer Centres",
			    'created_at' => now()
			],
			[
			    'category_id' => "15",
			    'subcategory_name' => "Mobile Phone Sales and Service",
			    'created_at' => now()
			],
			[
			    'category_id' => "15",
			    'subcategory_name' => "Watch Shops",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Aluminium Products and Services",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Antique Shops",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Fancy Shops",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Battery, Inverter Shops",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Book Store",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Hardware Shops",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Cold Storage",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Distributors",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Eco Friendly Products",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Electrical And Electronics",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Electrical Shops",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Lottery Agents",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Fireworks And Explosive",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Fish And Meat Shop",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Flex Printing and Designing",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Flower Shops",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Foot Ware Shops",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Fruits & Juice Shops",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Furniture",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Gift And Fancy",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Graphics Designing and Printing",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Printing And Publishing",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Provision Store",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Rubber Dealers",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Stationery",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Supermarkets",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Tailoring Shops",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Paper Products",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Photostat",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Plastic Products",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Sanitary And Hardware",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Shoes And Bags",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Shops And Stores",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Upholstery Works",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Vegetable Merchant",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Drinking And Mineral Water Supply",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Light House",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Iron And Steel",
			    'created_at' => now()
			],
			[
			    'category_id' => "17",
			    'subcategory_name' => "Aquarium",
			    'created_at' => now()
			],
			[
			    'category_id' => "18",
			    'subcategory_name' => "Cable Tv",
			    'created_at' => now()
			],
			[
			    'category_id' => "18",
			    'subcategory_name' => "Entertainments",
			    'created_at' => now()
			],
			[
			    'category_id' => "18",
			    'subcategory_name' => "Cinema Theatres",
			    'created_at' => now()
			],
			[
			    'category_id' => "18",
			    'subcategory_name' => "Modelling, Ad Film",
			    'created_at' => now()
			],
			[
			    'category_id' => "18",
			    'subcategory_name' => "Fm Radio Stations",
			    'created_at' => now()
			],
			[
			    'category_id' => "18",
			    'subcategory_name' => "Press",
			    'created_at' => now()
			],
			[
			    'category_id' => "21",
			    'subcategory_name' => "Akshaya Centres",
			    'created_at' => now()
			],
			[
			    'category_id' => "21",
			    'subcategory_name' => "Internet Cafe",
			    'created_at' => now()
			],
			[
			    'category_id' => "21",
			    'subcategory_name' => "Telecom Service",
			    'created_at' => now()
			],
			[
			    'category_id' => "10",
			    'subcategory_name' => "Fitness Centre",
			    'created_at' => now()
			],
			[
			    'category_id' => "10",
			    'subcategory_name' => "Yoga Centres",
			    'created_at' => now()
			],
			[
			    'category_id' => "20",
			    'subcategory_name' => "Sports",
			    'created_at' => now()
			],
			[
			    'category_id' => "19",
			    'subcategory_name' => "Hiring And Rental",
			    'created_at' => now()
			],
			[
			    'category_id' => "19",
			    'subcategory_name' => "Taxy",
			    'created_at' => now()
			],
			[
			    'category_id' => "19",
			    'subcategory_name' => "Lorry",
			    'created_at' => now()
			],
			[
			    'category_id' => "19",
			    'subcategory_name' => "Goods Vehicles",
			    'created_at' => now()
			],
			[
			    'category_id' => "19",
			    'subcategory_name' => "Autorickshaw",
			    'created_at' => now()
			],
			[
			    'category_id' => "19",
			    'subcategory_name' => "Bus",
			    'created_at' => now()
			],
			[
			    'category_id' => "19",
			    'subcategory_name' => "Mini Bus",
			    'created_at' => now()
			],
			[
		        'category_id' => "19",
		        'subcategory_name' => "Camera Rental",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "19",
		        'subcategory_name' => "Car Rental",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "19",
		        'subcategory_name' => "Bike Rental",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "19",
		        'subcategory_name' => "Cycle Rental",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "29",
		        'subcategory_name' => "Astrology",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "29",
		        'subcategory_name' => "Religious Services",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "23",
		        'subcategory_name' => "Society",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "23",
		        'subcategory_name' => "Government Offices",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "30",
		        'subcategory_name' => "Transportation",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "30",
		        'subcategory_name' => "Railway Reservation",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "30",
		        'subcategory_name' => "Bus Reservation",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "30",
		        'subcategory_name' => "Flight Ticket Booking",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "30",
		        'subcategory_name' => "Ship Ticket Booking",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "5",
		        'subcategory_name' => "Septic Tank Cleaning Service",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "5",
		        'subcategory_name' => "Borewell",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "5",
		        'subcategory_name' => "Cleaning Services",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "5",
		        'subcategory_name' => "Dry Cleaning",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "5",
		        'subcategory_name' => "Laundry",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "5",
		        'subcategory_name' => "Insurance",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "5",
		        'subcategory_name' => "Solar Products",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "5",
		        'subcategory_name' => "Security Systems",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "5",
		        'subcategory_name' => "Roofing",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "5",
		        'subcategory_name' => "Service And Repair",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "25",
		        'subcategory_name' => "Agricultural Equipment",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "25",
		        'subcategory_name' => "Air Conditioning & Refrigerator",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "25",
		        'subcategory_name' => "Industrial Goods and Services",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "25",
		        'subcategory_name' => "Medical equipment",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "26",
		        'subcategory_name' => "Candles",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "26",
		        'subcategory_name' => "Cleaning Chemicals",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "26",
		        'subcategory_name' => "Coconut Products",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "26",
		        'subcategory_name' => "Drinking And Mineral Water Supply",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "26",
		        'subcategory_name' => "Manufacturing And Distribution",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "26",
		        'subcategory_name' => "T Shirt Printing",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "28",
		        'subcategory_name' => "Agricultural",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "28",
		        'subcategory_name' => "Agricultural Nursery",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "28",
		        'subcategory_name' => "Art And Culture",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "28",
		        'subcategory_name' => "Associations",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "28",
		        'subcategory_name' => "Charitable Trust",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "28",
		        'subcategory_name' => "Farm",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "28",
		        'subcategory_name' => "Fertilizer",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "28",
		        'subcategory_name' => "Fuel",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "28",
		        'subcategory_name' => "Swimming Pools",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "28",
		        'subcategory_name' => "Scrap",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "28",
		        'subcategory_name' => "Saw Mill",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "28",
		        'subcategory_name' => "Pets Kennels",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "28",
		        'subcategory_name' => "Orphanage",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "28",
		        'subcategory_name' => "Online Shopping",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "28",
		        'subcategory_name' => "Old Age Homes",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "28",
		        'subcategory_name' => "Waste Disposal",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "28",
		        'subcategory_name' => "Water And Water Treatment",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "28",
		        'subcategory_name' => "Wood And Wood Works",
		        'created_at' => now()
		    ],
			[
		        'category_id' => "28",
		        'subcategory_name' => "Water Service",
		        'created_at' => now()
		    ],
		];
		DB::table('beheco_subcategory')->insert($subcategories);
    }
}
