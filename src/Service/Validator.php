<?php


namespace App\Service;


class Validator
{

    public function isPhone($phone)
    {
        return preg_match("/^[0-9 ]*$/", $phone);
    }
    public function isEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    public function verifyInput($var)
    {
        $var = trim($var);
        $var = stripcslashes($var);
        $var = htmlspecialchars($var);
        return $var;
    }


}