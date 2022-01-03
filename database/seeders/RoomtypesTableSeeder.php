<?php

namespace Database\Seeders;

use App\Models\Roomtype;
use Illuminate\Database\Seeder;

class RoomtypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roomtype::truncate();


        Roomtype::create([
            'roomtypes_id' => '101',
            'roomtypes_desc' => 'SINGLE BED WITH WIFI AND TV. SUITABLE FOR A TRAVELLER OR BACKPACKER',
            'roomtypes_size' => '1',
            'roomtypes_name' => 'SINGLE',
            'roomtypes_price' => '150',
        ]);

        Roomtype::create([
            'roomtypes_id' => '102',
            'roomtypes_desc' => 'QUEEN BED WITH WIFI AND TV. SUITABLE FOR A MARRIED COUPLE FOR HONEYMOON',
            'roomtypes_size' => '2',
            'roomtypes_name' => 'DOUBLE',
            'roomtypes_price' => '200',
        ]);

        Roomtype::create([
            'roomtypes_id' => '103',
            'roomtypes_desc' => 'KING BED AND 2 SINGLE BED WITH WIFI AND TV. SUITABLE FOR FAMILY FOR VACATION',
            'roomtypes_size' => '4',
            'roomtypes_name' => 'DELUXE',
            'roomtypes_price' => '300',
        ]);
    }
}
