<?php

use Illuminate\Database\Seeder;

class AuteurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Auteurs')->delete();
        DB::table('Auteurs')->insert([
            'id' => 1,
            'nom' => 'nom1',
            'prenom' => 'prenom1',
            'description' => 'Brief thing on cvBrief thing on cvBrief thing on cv',
        ]);

        DB::table('Auteurs')->insert([
            'id' => 2,
            'nom' => 'nom2',
            'prenom' => 'prenom2',
            'description' => 'Brieazdazdf thing on cvBriazdazdazdef thing on cvBrief thing on cv',
        ]);

        DB::table('Auteurs')->insert([
            'id' => 3,
            'nom' => 'nom3',
            'prenom' => 'prenom3',
            'description' => 'dzajddd thing on cvBrief thing on cvBrief thing on cv',
        ]);

    }
}
