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
    public function verifyHttpCode($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER	, true);
//        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        $code_response = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);
        return $code_response;
    }

}