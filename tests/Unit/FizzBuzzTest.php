<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\FizzBuzz;

class FizzBuzzTest extends TestCase
{
    public function testShouldProcess1()
    {
        //Arrange
        $fizzBuzz = new FizzBuzz;

        //Act
        $output = $fizzBuzz->processNumber(1);

        //Assert
        $this->assertEquals("1", $output);
    }
    public function testShouldProcess2()
    {
        //Arrange
        $fizzBuzz = new FizzBuzz;

        //Act
        $output = $fizzBuzz->processNumber(2);

        //Assert
        $this->assertEquals("2", $output);
    }
    public function testShouldProcess3()
    {
        $fizzBuzz = new FizzBuzz;
        $this->assertEquals("fizz", $fizzBuzz->processNumber(3));
    } 
    public function testShouldProcess5()
    {
        $fizzBuzz = new FizzBuzz;
        $this->assertEquals("buzz", $fizzBuzz->processNumber(5));
    }   
    public function testShouldProcess6()
    {
        $fizzBuzz = new FizzBuzz;
        $this->assertEquals("fizz", $fizzBuzz->processNumber(6));
    }  
    public function testShouldProcess15()
    {
        $fizzBuzz = new FizzBuzz;
        $this->assertEquals("fizzbuzz", $fizzBuzz->processNumber(15));
    }  
    public function testShouldProcessFizzBuzz()
    {
        $fizzBuzz = new FizzBuzz;
        $this->assertEquals("fizzbuzz", $fizzBuzz->processNumber(15));
        $this->assertEquals("fizzbuzz", $fizzBuzz->processNumber(30));
    }  
    public function testShouldExecute()
    {
        $fizzBuzz = new FizzBuzz;
        $this->assertEquals(["1","2","fizz","buzz"], $fizzBuzz->execute([1,2,3,5]));
        $this->assertEquals(["fizzbuzz","16","17","buzz"], $fizzBuzz->execute([15,16,17,20]));
        $this->assertEquals(["fizzbuzz"], $fizzBuzz->execute([30]));
    } 
}
