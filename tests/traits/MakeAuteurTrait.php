<?php

use Faker\Factory as Faker;
use App\Models\Auteur;
use App\Repositories\AuteurRepository;

trait MakeAuteurTrait
{
    /**
     * Create fake instance of Auteur and save it in database
     *
     * @param array $auteurFields
     * @return Auteur
     */
    public function makeAuteur($auteurFields = [])
    {
        /** @var AuteurRepository $auteurRepo */
        $auteurRepo = App::make(AuteurRepository::class);
        $theme = $this->fakeAuteurData($auteurFields);
        return $auteurRepo->create($theme);
    }

    /**
     * Get fake instance of Auteur
     *
     * @param array $auteurFields
     * @return Auteur
     */
    public function fakeAuteur($auteurFields = [])
    {
        return new Auteur($this->fakeAuteurData($auteurFields));
    }

    /**
     * Get fake data of Auteur
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAuteurData($auteurFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nom' => $fake->word,
            'prenom' => $fake->word,
            'description' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $auteurFields);
    }
}
