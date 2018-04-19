<?php

use App\Models\Cours;
use App\Repositories\CoursRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CoursRepositoryTest extends TestCase
{
    use MakeCoursTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CoursRepository
     */
    protected $coursRepo;

    public function setUp()
    {
        parent::setUp();
        $this->coursRepo = App::make(CoursRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCours()
    {
        $cours = $this->fakeCoursData();
        $createdCours = $this->coursRepo->create($cours);
        $createdCours = $createdCours->toArray();
        $this->assertArrayHasKey('id', $createdCours);
        $this->assertNotNull($createdCours['id'], 'Created Cours must have id specified');
        $this->assertNotNull(Cours::find($createdCours['id']), 'Cours with given id must be in DB');
        $this->assertModelData($cours, $createdCours);
    }

    /**
     * @test read
     */
    public function testReadCours()
    {
        $cours = $this->makeCours();
        $dbCours = $this->coursRepo->find($cours->id);
        $dbCours = $dbCours->toArray();
        $this->assertModelData($cours->toArray(), $dbCours);
    }

    /**
     * @test update
     */
    public function testUpdateCours()
    {
        $cours = $this->makeCours();
        $fakeCours = $this->fakeCoursData();
        $updatedCours = $this->coursRepo->update($fakeCours, $cours->id);
        $this->assertModelData($fakeCours, $updatedCours->toArray());
        $dbCours = $this->coursRepo->find($cours->id);
        $this->assertModelData($fakeCours, $dbCours->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCours()
    {
        $cours = $this->makeCours();
        $resp = $this->coursRepo->delete($cours->id);
        $this->assertTrue($resp);
        $this->assertNull(Cours::find($cours->id), 'Cours should not exist in DB');
    }
}
