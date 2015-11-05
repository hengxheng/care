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

        $demo_services = array(
                ['id' => 1, 'Personal Care'],
                ['id' => 2, 'Companionship'],
                ['id' => 3, 'Transportation']
            );

        $demo_quolifications = array(
                ['id' => 1, 'First Aid'],
                ['id' => 2, 'CPR']
            );


        DB::table('service')->insert($demo_services);
        DB::table('quolification')->insert($demo_quolifications);

        Model::reguard();
    }
}
