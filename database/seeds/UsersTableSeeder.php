<?php
/**
 * UsersTableSeeder.php
 * Created by @anonymoussc on 03/25/2018 9:08 AM.
 */

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'     => 'rn',
            'email'    => 'rn@rn.com',
            'phone'    => '999888777665',
            'password' => password_hash('1234', PASSWORD_BCRYPT),
        ]);
    }
}
