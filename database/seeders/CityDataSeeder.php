<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CityDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
	        [
	        	'state_id' => 1,
	            'city_name' => "Alangad",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Allapra",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Aluva",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Ambalamedu",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Ambalamugal",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Amballur",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Angamaly",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Arakkunnam",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Chelamattom",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Chembarakky",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Chendamangalam",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Chengamanad",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Cheranallur",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Cheruvattoor",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Choornikkara",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Chowwera",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Edachira",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Edappally",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Edathala",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Elamkunnapuzha",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Eloor",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Eramalloor",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Ernakulam",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Irumpanam",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Kadamakkudy",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Kadayiruppu",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Kadungalloor",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Kakkanad",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Kalady",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Kalamassery",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Kanayannur",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Kanjoor",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Kaprikkad",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Karumalloor",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Keezhmad",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Kizhakkumbhagom",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Kochi",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Kolenchery",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Koonammavu",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Koothattukulam",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Koovappady",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Kothamangalam",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Kottuvally",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Kumbalam",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Kumbalangy",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Kundannoor",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Kunnathunad",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Kunnukara",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Kureekkad",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Malayattoor",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Malayidomthuruth",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Manakunnam",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Manjaly",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Maradu",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Marampilly",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Mattoor",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Moolampilly",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Moothakunnam",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Mulamthuruthy",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Mulavukad",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Muvattupuzha",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Nayarambalam",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Nedumbassery",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Nedungad",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Njarackal",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "North Paravur",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Oorakkad",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Palliyangadi",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Pampakuda",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Paravur",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Payyal",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Perumbavoor",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Perumpadappu, Ernakulam",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Pezhakkappilly",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Piravom",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Pizhala",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Ponjassery",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Pukkattupadi",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Puliyanam",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Puthencruz",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Puthenvelikkara",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Puthuvype",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Thamarachal",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Thekkumbhagom",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Thiruvankulam",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Thottakkattukara",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Thrippunithura",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Thuruthipilly",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Udayamperoor",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Vadakkekara",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Vadakkumbhagom",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Varappuzha",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Vazhakkala",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Vazhakulam",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Velloorkunnam",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Venduvazhy",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Vengola",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Vengoor ",
	            'created_at' => now()
	        ],
			[
	        	'state_id' => 1,
	            'city_name' => "Vyttila",
	            'created_at' => now()
	        ],
	    ];
	    DB::table('beheco_city')->insert($cities);
    }
}
