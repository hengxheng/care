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

       $demo_users = array(
                ['id' => 1, 'firstname' => 'John', 'lastname' => 'Jack', 'user_type' => 'seeker', 'email' => 'test@testemail.com', 'phone' => '1234', 'password' => '123', 'created_at' => new DateTime, 'updated_at' => new DateTime],
                ['id' => 2, 'firstname' => 'Jill', 'lastname' => 'May', 'user_type' => 'provider', 'email' => 'test1@testemail.com', 'phone' => '4321', 'password' => '123', 'created_at' => new DateTime, 'updated_at' => new DateTime]
            );
        DB::table('users')->insert($demo_users);

        $demo_giver = array(
                ['uid' => 2, 'gender' => 'female', 'address1' => 'High St', 'address2' => '11', 'suburb' => 'Burwood', 'state' => "nsw", 'postcode' => '2133', 'created_at' => new DateTime, 'updated_at' => new DateTime]
            );

        $demo_seeker = array(
                ['uid' => 1, 'premium' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime]
            );

        DB::table('giver')->insert($demo_giver);
        DB::table('seeker')->insert($demo_seeker);

        Model::reguard();
    }
}
