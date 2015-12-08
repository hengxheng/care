<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $admin = array(
                'user_type' => 'admin', 
                'email' => 'admin@carenation.com',
                'status' => 'Active',
                'password' => bcrypt('123456')               
            );

        DB::table('users')->insert($admin);

        Model::reguard();
    }
}
