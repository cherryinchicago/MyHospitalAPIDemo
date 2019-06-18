<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Hospital;

class HospitalDatabaseTest extends TestCase
{
    use RefreshDatabase, WithFaker; 

    protected function setUp(): void 
    {

        parent::setUp();

        for ($i = 0; $i < 10; $i++){
            $name = $this->faker()->words(4,true);
            $address = $this->faker()->streetAddress;
            $numberOfBeds = $this->faker()->numberBetween(10,10000);
            $numberOfDoctors = $this->faker()->numberBetween(1,1000);
            $hospital = Hospital::create($name, $address, $numberOfBeds, $numberOfDoctors);
            $hospital->save();

            /*$name = 'Naresuan University Hospital';
            $address = '99 Moo 9 Thapho Muang Phitsanulok';
            $numberOfBeds = 5000;
            $numberOfDoctors = 333;
            $hospital = Hospital::create($name, $address, $numberOfBeds, $numberOfDoctors);
            $hospital->save();*/
        }
    }

    public function testSaveModel()
    {
        //arrange
        $name = 'Naresuan University Hospital';
        $address = '99 Moo 9 Thapho Muang Phitsanulok';
        $numberOfBeds = 5000;
        $numberOfDoctors = 333;
        $hospital = Hospital::create($name, $address, $numberOfBeds, $numberOfDoctors);

        //act
        $hospital->save();

        //assert
        $this->assertDatabaseHas('hospitals', [
            'name' => $name,
            'address' => $address,
            'numberOfBeds' => $numberOfBeds,
            'numberOfDoctors' => $numberOfDoctors]);
    }
    public function testUpdateModel(){
        //arrange
        $name = 'Naresuan University Hospital2';
        $address = '99 Moo 9 Thapho Muang Phitsanulok';
        $numberOfBeds = 5000;
        $numberOfDoctors = 333;
        $hospital = Hospital::create($name, $address, $numberOfBeds, $numberOfDoctors);
        $hospital->save();

        //act
        $hospital->name = 'NU Hospital';
        $hospital->save();

        //assert
        $this->assertDatabaseHas('hospitals', ['name'=>'NU Hospital']);
        $this->assertDatabaseMissing('hospitals', ['name'=>$name]);
    }
}
