<?php
require_once ('conf/db.php');
/*
 * Straightforward base class for repositories, making it easier to retrieve the required connection from other repositories.
 */

class BaseRepository
{


    protected  function getConnection()
    {

        return new mysqli(DB::$host, DB::$user, DB::$pass, DB::$name);
    }
}