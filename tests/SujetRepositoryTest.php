<?php

use App\Models\Sujet;
use App\Repositories\SujetRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SujetRepositoryTest extends TestCase
{
    use MakeSujetTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var SujetRepository
     */
    protected $sujetRepo;

    public function setUp()
    {
        parent::setUp();
        $this->sujetRepo = App::make(SujetRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateSujet()
    {
        $sujet = $this->fakeSujetData();
        $createdSujet = $this->sujetRepo->create($sujet);
        $createdSujet = $createdSujet->toArray();
        $this->assertArrayHasKey('id', $createdSujet);
        $this->assertNotNull($createdSujet['id'], 'Created Sujet must have id specified');
        $this->assertNotNull(Sujet::find($createdSujet['id']), 'Sujet with given id must be in DB');
        $this->assertModelData($sujet, $createdSujet);
    }

    /**
     * @test read
     */
    public function testReadSujet()
    {
        $sujet = $this->makeSujet();
        $dbSujet = $this->sujetRepo->find($sujet->id);
        $dbSujet = $dbSujet->toArray();
        $this->assertModelData($sujet->toArray(), $dbSujet);
    }

    /**
     * @test update
     */
    public function testUpdateSujet()
    {
        $sujet = $this->makeSujet();
        $fakeSujet = $this->fakeSujetData();
        $updatedSujet = $this->sujetRepo->update($fakeSujet, $sujet->id);
        $this->assertModelData($fakeSujet, $updatedSujet->toArray());
        $dbSujet = $this->sujetRepo->find($sujet->id);
        $this->assertModelData($fakeSujet, $dbSujet->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteSujet()
    {
        $sujet = $this->makeSujet();
        $resp = $this->sujetRepo->delete($sujet->id);
        $this->assertTrue($resp);
        $this->assertNull(Sujet::find($sujet->id), 'Sujet should not exist in DB');
    }
}
