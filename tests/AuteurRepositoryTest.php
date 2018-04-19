<?php

use App\Models\Auteur;
use App\Repositories\AuteurRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuteurRepositoryTest extends TestCase
{
    use MakeAuteurTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AuteurRepository
     */
    protected $auteurRepo;

    public function setUp()
    {
        parent::setUp();
        $this->auteurRepo = App::make(AuteurRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAuteur()
    {
        $auteur = $this->fakeAuteurData();
        $createdAuteur = $this->auteurRepo->create($auteur);
        $createdAuteur = $createdAuteur->toArray();
        $this->assertArrayHasKey('id', $createdAuteur);
        $this->assertNotNull($createdAuteur['id'], 'Created Auteur must have id specified');
        $this->assertNotNull(Auteur::find($createdAuteur['id']), 'Auteur with given id must be in DB');
        $this->assertModelData($auteur, $createdAuteur);
    }

    /**
     * @test read
     */
    public function testReadAuteur()
    {
        $auteur = $this->makeAuteur();
        $dbAuteur = $this->auteurRepo->find($auteur->id);
        $dbAuteur = $dbAuteur->toArray();
        $this->assertModelData($auteur->toArray(), $dbAuteur);
    }

    /**
     * @test update
     */
    public function testUpdateAuteur()
    {
        $auteur = $this->makeAuteur();
        $fakeAuteur = $this->fakeAuteurData();
        $updatedAuteur = $this->auteurRepo->update($fakeAuteur, $auteur->id);
        $this->assertModelData($fakeAuteur, $updatedAuteur->toArray());
        $dbAuteur = $this->auteurRepo->find($auteur->id);
        $this->assertModelData($fakeAuteur, $dbAuteur->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAuteur()
    {
        $auteur = $this->makeAuteur();
        $resp = $this->auteurRepo->delete($auteur->id);
        $this->assertTrue($resp);
        $this->assertNull(Auteur::find($auteur->id), 'Auteur should not exist in DB');
    }
}
