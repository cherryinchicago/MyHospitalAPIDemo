<?php
namespace App;

class FizzBuzz{
    public function processNumber($input){
        if($input%15 == 0)
            return "fizzbuzz";
        if($input%3 == 0)
            return "fizz";
        if($input%5 == 0)
            return "buzz";
        return $input;
    }
    public function execute($input){
        $result = array();
        foreach($input as $data){
            $number = $this->processNumber($data);
            array_push($result,$number);
        }
        return $result;
    }
}