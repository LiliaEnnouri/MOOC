<?php

use Faker\Factory as Faker;
use App\Models\Texte;
use App\Repositories\TexteRepository;

trait MakeTexteTrait
{
    /**
     * Create fake instance of Texte and save it in database
     *
     * @param array $texteFields
     * @return Texte
     */
    public function makeTexte($texteFields = [])
    {
        /** @var TexteRepository $texteRepo */
        $texteRepo = App::make(TexteRepository::class);
        $theme = $this->fakeTexteData($texteFields);
        return $texteRepo->create($theme);
    }

    /**
     * Get fake instance of Texte
     *
     * @param array $texteFields
     * @return Texte
     */
    public function fakeTexte($texteFields = [])
    {
        return new Texte($this->fakeTexteData($texteFields));
    }

    /**
     * Get fake data of Texte
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTexteData($texteFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nom' => $fake->word,
            'cours_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $texteFields);
    }
}
