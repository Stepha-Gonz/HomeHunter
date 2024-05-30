<?php

use Model\ActiveRecord;
require __DIR__ . '/../vendor/autoload.php';
$dotenv= Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeload();

require 'funciones.php';
require 'config/database.php';
//conectar DB

$db=conectarDB();
ActiveRecord::setDB($db)

























































?>