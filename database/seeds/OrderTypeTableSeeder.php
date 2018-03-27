<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_type')->insert([
            'name'        => 'PLA',
            'description' => 'Origin Locker, Destination Address',
        ]);

        DB::table('order_type')->insert([
            'name'        => 'PAL',
            'description' => 'Origin Address, Destination Locker',
        ]);

        DB::table('order_type')->insert([
            'name'        => 'PLL',
            'description' => 'Origin Locker, Destination Locker',
        ]);
    }
}
