<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Hospital;

class HospitalApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetAllHospitals()
    {
        // Arrange
        $numberOfHospitals = 10;
        factory(Hospital::class, $numberOfHospitals)->create();

        $response = $this->get('api/hospitals');
    // dd(json_decode($response->getContent()));
        $response->assertJsonCount($numberOfHospitals);
        $response->assertStatus(200);
    }
    public function testGetHospital() {
        // Arrange - create a hospital, get the id
        $expected = factory(Hospital::class)->create();
        factory(Hospital::class, 5)->create();

        // Act - make a json call to /api/hospitals/{id}
        $response = $this->get('api/hospitals/'.$expected->id);

        // Assert - check that status 200
        //        - check that the data matches (name, address, etc)
        $response->assertJson(['id'=>$expected->id, 'name' => $expected->name]);
        $response->assertStatus(200);
       

    }
    //public function testWhenHospitalNotFound() {
        // Arrange - create 10 hospitals - generate random id > 10
        // Act - make a json call to /api/hospitals/{id}
        // Assert - check that status 404
    //}
    
}
