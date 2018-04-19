<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SujetApiTest extends TestCase
{
    use MakeSujetTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateSujet()
    {
        $sujet = $this->fakeSujetData();
        $this->json('POST', '/api/v1/sujets', $sujet);

        $this->assertApiResponse($sujet);
    }

    /**
     * @test
     */
    public function testReadSujet()
    {
        $sujet = $this->makeSujet();
        $this->json('GET', '/api/v1/sujets/'.$sujet->id);

        $this->assertApiResponse($sujet->toArray());
    }

    /**
     * @test
     */
    public function testUpdateSujet()
    {
        $sujet = $this->makeSujet();
        $editedSujet = $this->fakeSujetData();

        $this->json('PUT', '/api/v1/sujets/'.$sujet->id, $editedSujet);

        $this->assertApiResponse($editedSujet);
    }

    /**
     * @test
     */
    public function testDeleteSujet()
    {
        $sujet = $this->makeSujet();
        $this->json('DELETE', '/api/v1/sujets/'.$sujet->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/sujets/'.$sujet->id);

        $this->assertResponseStatus(404);
    }
}
