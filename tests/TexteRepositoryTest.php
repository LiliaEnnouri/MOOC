<?php

use App\Models\Texte;
use App\Repositories\TexteRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TexteRepositoryTest extends TestCase
{
    use MakeTexteTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TexteRepository
     */
    protected $texteRepo;

    public function setUp()
    {
        parent::setUp();
        $this->texteRepo = App::make(TexteRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTexte()
    {
        $texte = $this->fakeTexteData();
        $createdTexte = $this->texteRepo->create($texte);
        $createdTexte = $createdTexte->toArray();
        $this->assertArrayHasKey('id', $createdTexte);
        $this->assertNotNull($createdTexte['id'], 'Created Texte must have id specified');
        $this->assertNotNull(Texte::find($createdTexte['id']), 'Texte with given id must be in DB');
        $this->assertModelData($texte, $createdTexte);
    }

    /**
     * @test read
     */
    public function testReadTexte()
    {
        $texte = $this->makeTexte();
        $dbTexte = $this->texteRepo->find($texte->id);
        $dbTexte = $dbTexte->toArray();
        $this->assertModelData($texte->toArray(), $dbTexte);
    }

    /**
     * @test update
     */
    public function testUpdateTexte()
    {
        $texte = $this->makeTexte();
        $fakeTexte = $this->fakeTexteData();
        $updatedTexte = $this->texteRepo->update($fakeTexte, $texte->id);
        $this->assertModelData($fakeTexte, $updatedTexte->toArray());
        $dbTexte = $this->texteRepo->find($texte->id);
        $this->assertModelData($fakeTexte, $dbTexte->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTexte()
    {
        $texte = $this->makeTexte();
        $resp = $this->texteRepo->delete($texte->id);
        $this->assertTrue($resp);
        $this->assertNull(Texte::find($texte->id), 'Texte should not exist in DB');
    }
}
