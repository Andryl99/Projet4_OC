<?php

class Manager
{
    protected function dbConnect(){
        $db = new PDO('mysql:host=db5000248723.hosting-data.io;dbname=dbs242957;charset=utf8', 'dbu141761', 'Jandra997!!forteroche');
        return $db;
    }
}