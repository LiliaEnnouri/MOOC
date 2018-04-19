<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CoursApiTest extends TestCase
{
    use MakeCoursTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCours()
    {
        $cours = $this->fakeCoursData();
        $this->json('POST', '/api/v1/cours', $cours);

        $this->assertApiResponse($cours);
    }

    /**
     * @test
     */
    public function testReadCours()
    {
        $cours = $this->makeCours();
        $this->json('GET', '/api/v1/cours/'.$cours->id);

        $this->assertApiResponse($cours->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCours()
    {
        $cours = $this->makeCours();
        $editedCours = $this->fakeCoursData();

        $this->json('PUT', '/api/v1/cours/'.$cours->id, $editedCours);

        $this->assertApiResponse($editedCours);
    }

    /**
     * @test
     */
    public function testDeleteCours()
    {
        $cours = $this->makeCours();
        $this->json('DELETE', '/api/v1/cours/'.$cours->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/cours/'.$cours->id);

        $this->assertResponseStatus(404);
    }
}
