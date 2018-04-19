<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuteurApiTest extends TestCase
{
    use MakeAuteurTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAuteur()
    {
        $auteur = $this->fakeAuteurData();
        $this->json('POST', '/api/v1/auteurs', $auteur);

        $this->assertApiResponse($auteur);
    }

    /**
     * @test
     */
    public function testReadAuteur()
    {
        $auteur = $this->makeAuteur();
        $this->json('GET', '/api/v1/auteurs/'.$auteur->id);

        $this->assertApiResponse($auteur->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAuteur()
    {
        $auteur = $this->makeAuteur();
        $editedAuteur = $this->fakeAuteurData();

        $this->json('PUT', '/api/v1/auteurs/'.$auteur->id, $editedAuteur);

        $this->assertApiResponse($editedAuteur);
    }

    /**
     * @test
     */
    public function testDeleteAuteur()
    {
        $auteur = $this->makeAuteur();
        $this->json('DELETE', '/api/v1/auteurs/'.$auteur->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/auteurs/'.$auteur->id);

        $this->assertResponseStatus(404);
    }
}
