<?php

use Faker\Factory as Faker;
use App\Models\Sujet;
use App\Repositories\SujetRepository;

trait MakeSujetTrait
{
    /**
     * Create fake instance of Sujet and save it in database
     *
     * @param array $sujetFields
     * @return Sujet
     */
    public function makeSujet($sujetFields = [])
    {
        /** @var SujetRepository $sujetRepo */
        $sujetRepo = App::make(SujetRepository::class);
        $theme = $this->fakeSujetData($sujetFields);
        return $sujetRepo->create($theme);
    }

    /**
     * Get fake instance of Sujet
     *
     * @param array $sujetFields
     * @return Sujet
     */
    public function fakeSujet($sujetFields = [])
    {
        return new Sujet($this->fakeSujetData($sujetFields));
    }

    /**
     * Get fake data of Sujet
     *
     * @param array $postFields
     * @return array
     */
    public function fakeSujetData($sujetFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'label' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $sujetFields);
    }
}
