<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TexteApiTest extends TestCase
{
    use MakeTexteTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTexte()
    {
        $texte = $this->fakeTexteData();
        $this->json('POST', '/api/v1/textes', $texte);

        $this->assertApiResponse($texte);
    }

    /**
     * @test
     */
    public function testReadTexte()
    {
        $texte = $this->makeTexte();
        $this->json('GET', '/api/v1/textes/'.$texte->id);

        $this->assertApiResponse($texte->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTexte()
    {
        $texte = $this->makeTexte();
        $editedTexte = $this->fakeTexteData();

        $this->json('PUT', '/api/v1/textes/'.$texte->id, $editedTexte);

        $this->assertApiResponse($editedTexte);
    }

    /**
     * @test
     */
    public function testDeleteTexte()
    {
        $texte = $this->makeTexte();
        $this->json('DELETE', '/api/v1/textes/'.$texte->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/textes/'.$texte->id);

        $this->assertResponseStatus(404);
    }
}
