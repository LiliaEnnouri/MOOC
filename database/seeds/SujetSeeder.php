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
            'sujet_id' => 1,
            'label' => 'Informatique',
            'description' => 'youll find info things here',
        ]);

        DB::table('Sujets')->insert([
            'sujet_id' => 2,
            'label' => 'Arts',
            'description' => 'youll find Arty things here',
        ]);

        DB::table('Sujets')->insert([
            'sujet_id' => 3,
            'label' => 'Comptabilité',
            'description' => 'youll find compta things here',
        ]);
    }
}
