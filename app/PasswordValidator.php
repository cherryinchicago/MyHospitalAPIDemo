<?php

namespace App;

class PasswordValidator{
    public function check($password, $isAdmin = false){
        if($isAdmin == true){
            if(strlen($password)<10){
                return false;
            }
            if($password=='12345678'){
                return false;
            }
            if( preg_match_all('/[a-z]/',$password)<1 || preg_match_all('/[A-Z]/',$password)<1 ) {
                return false;
            }
        }
        if($password=='12345678'){
            return false;
        }
        if(strlen($password)<8){
            return false;
        }
        if(preg_match_all('/[0-9]/',$password)<1){
            return false;
        }
        if( preg_match_all('/[a-z]/',$password)<1 || preg_match_all('/[A-Z]/',$password)<1 ) {
            return false;
        }
        return true;
    }
}