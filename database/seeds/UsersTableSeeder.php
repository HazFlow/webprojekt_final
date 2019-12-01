<?php

use Illuminate\Database\Seeder;

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
	        'name' => 'Florian',
	        'username' => 'florian',
	        'email' => 'florian@gmail.com',
	        'password' => bcrypt('password'),
	        'my_password' => 'password',
	        'user_type' => 'Admin'
        ]);
    }
}
