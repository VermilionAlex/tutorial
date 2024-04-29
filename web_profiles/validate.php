<?php
//check if number is within range
function is_number($number, $min =0, $max = 1000){
        return ($number >= $min && $number <= $max);

    }
    //check if our input is text
    function is_text($text, $min = 0, $max = 1000){
        $length = mb_strlen($text);
        return ($length >= $min && $length <= $max);
    }

    //check for password
    function is_password($password): bool{

    //check if password is at least 8 characters long and contains at least one uppercase letter, one lowercase letter, and one number
        if(mb_strlen($password) >= 8
            and preg_match('/[A-Z]/', $password)
            and preg_match('/[a-z]/', $password)
            and preg_match('/[0-9]/', $password)
        ){
            return true;
        }
        return false;
    }

