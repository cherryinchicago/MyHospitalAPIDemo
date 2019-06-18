<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Hospital;
use App\Exceptions\ValidationException;

class HospitalModelTest extends TestCase
{
    public function testCreateModel()
    {
        //arrange
        $name = 'Naresuan University Hospital';
        $address = '99 Moo 9 Thapho Muang Phitsanulok';
        $numberOfBeds = 5000;
        $numberOfDoctors = 333;

        //act
        $hospital = Hospital::create($name, $address, $numberOfBeds, $numberOfDoctors);

        //assert
        $this->assertEquals($name, $hospital->name, 'Set hospital name');
        $this->assertEquals($address, $hospital->address, 'Set address');
        $this->assertEquals($numberOfBeds, $hospital->numberOfBeds, 'Set numeberOfBeds');
        $this->assertEquals($numberOfDoctors, $hospital->numberOfDoctors, 'Set numeberOfDoctors');
    }
    public function testNonNumericBedsAndDoctors(){
        //act
        $hospital = Hospital::create('Phra Buddhachinarat', 'Phitsanulok', null, 'unknown');

        //assert
        $this->assertEquals(0, $hospital->numberOfBeds, 'Null numeberOfBeds should be 0');
        $this->assertEquals(0, $hospital->numberOfDoctors, 'String numeberOfDoctors should be 0');
    }
    public function testInvalidNumericBedsAndDoctors(){
        //act
        $hospital = Hospital::create('Phra Buddhachinarat', 'Phitsanulok', -50, 4.4);

        //assert
        $this->assertEquals(0, $hospital->numberOfBeds, 'Negative numeberOfBeds should be 0');
        $this->assertEquals(4, $hospital->numberOfDoctors, 'Float numeberOfDoctors cast to int');
    }
    public function testEmptyNameThrows(){
        //arrange
        $this->expectException(ValidationException::class);
        //$this->expectExceptionMessage('Invalid name');
        $this->expectExceptionMessageRegExp('/name/');
        
        //act
        $hospital = Hospital::create('', 'Phitsanulok', 100, 10);
    }
}
