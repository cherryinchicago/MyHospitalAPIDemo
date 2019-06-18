<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\PasswordValidator;

class PasswordValidatorTest extends TestCase{
    public function testValidPasssword(){
        //arrange
        $validator = new PasswordValidator;

        //act
        $result = $validator->check('The8igC0d');
        
        //assert
        $this->assertTrue($result);
    }
    public function testInvalidLessThan8Chars(){
        //arrange
        $validator = new PasswordValidator;

        //act
        $result = $validator->check('The8igC');
        
        //assert
        $this->assertFalse($result);
    }
    public function testInvalidLessThan1Digit(){
        //arrange
        $validator = new PasswordValidator;

        //act
        $result1 = $validator->check('TheBigC');
        $result2 = $validator->check('TheBigCod');
        
        //assert
        $this->assertFalse($result1);
        $this->assertFalse($result2);
    }
    public function testSilly1to8(){
        //arrange
        $validator = new PasswordValidator;

        //act
        $result = $validator->check('12345678');
        
        //assert
        $this->assertFalse($result);
    }
    public function test1Upper1lower(){
        //arrange
        $validator = new PasswordValidator;

        //act
        $result3 = $validator->check('The8igDeal');
        $result4 = $validator->check('the8igdeal');
        
        //assert
        $this->assertTrue($result3);
        $this->assertFalse($result4);
    }
    public function testAdminPW(){
        //arrange
        $validator = new PasswordValidator;

        //act
        $result5 = $validator->check('The8igCod',true);
        $result6 = $validator->check('123AbcDe',false);

        //assert
        $this->assertFalse($result5);
        $this->assertTrue($result6);
    }
}