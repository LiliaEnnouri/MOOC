<?php

use Illuminate\Database\Seeder;

class SujetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Sujets')->delete();
        DB::table('Sujets')->insert([
            'id' => 1,
            'label' => 'Informatique'
        ]);

        DB::table('Sujets')->insert([
            'id' => 2,
            'label' => 'Arts'
        ]);

        DB::table('Sujets')->insert([
            'id' => 3,
            'label' => 'Comptabilité'
        ]);
    }
}
