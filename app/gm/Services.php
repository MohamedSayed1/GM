<?php
/**
 * Created by PhpStorm.
 * User: msaye
 * Date: 2/24/2019
 * Time: 12:17 AM
 */

namespace App\gm;


class Services
{
    private $errors; //array of errors

    public function setError($error)
    {
        if (is_array($error))
            $this->errors = $error;
        else
            $this->errors[] = $error;
    }

    public function errors()
    {
        return $this->errors;
    }
}