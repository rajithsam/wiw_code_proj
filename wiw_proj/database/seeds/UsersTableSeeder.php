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
        'name'=>'Jess Tayooser',
        'role'=>'employee',
        'email'=>'jesstayooser@werk.com'
      ]);
      DB::table('users')->insert([
        'name'=>'Manny Gerr',
        'role'=>'manager',
        'email'=>'mannygerr@werk.com'
      ]);
      DB::table('users')->insert([
        'name'=>'Emmy P Lee',
        'role'=>'employee',
        'phone'=>'5551231234'
      ]);
      DB::table('users')->insert([
        'name'=>'Wuhr Kerr',
        'role'=>'employee',
        'email'=>'wuhrkerr@werk.com',
        'phone'=>'5553214321'
      ]);
      DB::table('users')->insert([
        'name'=>'Sue Pervisor',
        'role'=>'manager',
        'phone'=>'5551234321'
      ]);
    }
}
