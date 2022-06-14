<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Room::create([
            'rooms_id' => '1',
            'roomtypes_id' => '101',
        ]);

        Room::create([
            'rooms_id' => '2',
            'roomtypes_id' => '101',
        ]);

        Room::create([
            'rooms_id' => '3',
            'roomtypes_id' => '101',
        ]);

        Room::create([
            'rooms_id' => '4',
            'roomtypes_id' => '102',
        ]);

        Room::create([
            'rooms_id' => '5',
            'roomtypes_id' => '102',
        ]);

        Room::create([
            'rooms_id' => '6',
            'roomtypes_id' => '102',
        ]);

        Room::create([
            'rooms_id' => '7',
            'roomtypes_id' => '102',
        ]);

        Room::create([
            'rooms_id' => '8',
            'roomtypes_id' => '103',
        ]);

        Room::create([
            'rooms_id' => '9',
            'roomtypes_id' => '103',
        ]);

        Room::create([
            'rooms_id' => '10',
            'roomtypes_id' => '103',
        ]);

        Room::create([
            'rooms_id' => '11',
            'roomtypes_id' => '103',
        ]);
    
    }
}
