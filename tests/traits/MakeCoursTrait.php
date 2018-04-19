<?php

use Faker\Factory as Faker;
use App\Models\Cours;
use App\Repositories\CoursRepository;

trait MakeCoursTrait
{
    /**
     * Create fake instance of Cours and save it in database
     *
     * @param array $coursFields
     * @return Cours
     */
    public function makeCours($coursFields = [])
    {
        /** @var CoursRepository $coursRepo */
        $coursRepo = App::make(CoursRepository::class);
        $theme = $this->fakeCoursData($coursFields);
        return $coursRepo->create($theme);
    }

    /**
     * Get fake instance of Cours
     *
     * @param array $coursFields
     * @return Cours
     */
    public function fakeCours($coursFields = [])
    {
        return new Cours($this->fakeCoursData($coursFields));
    }

    /**
     * Get fake data of Cours
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCoursData($coursFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'label' => $fake->word,
            'description' => $fake->word,
            'nombre_heures' => $fake->randomDigitNotNull,
            'auteur_id' => $fake->randomDigitNotNull,
            'sujet_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $coursFields);
    }
}
