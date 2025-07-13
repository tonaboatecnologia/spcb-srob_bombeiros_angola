<?php
require_once("../config/config.php");
require_once(DIRREQ . "src/vendor/autoload.php");
include(DIRREQ . "src/helpers/variables.php");

use Src\Classes\ClassSessions;

$session = new ClassSessions();
if (isset($session)) {
    #sessions
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
        ob_start();
    }
    #dispatcher
   $Dispatch = new App\Dispatch();
    #headers
    header("content-Type: text/html; charset=utf-8");
    header("Projet-Name: " . DEVPROJECTNAME);
    header("Corporation: " . DEVCOMPANY);
    header("Developer: " . DEVNAME);
    header("Github: " . DEVGITHUB);
    header("Localization: " . LOCALIZATION);
    header("Country-Code: " . COUNTRYCODE);
    header("Latitude: " . LATITUDE);
    header("Longitude: " . LONGITUDE);
    header("Date-Time: " . DATATIME);

}