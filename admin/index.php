<?php
session_start();
//session_destroy();
require_once '../inc/database.php';

include_once("modelAdmin/modelAdmin.php");
include_once("modelAdmin/modelAdminPaintings.php");
//include_once("modelAdmin/modelAdminStyle.php");

include_once("controllerAdmin/controllerAdmin.php");
include_once("controllerAdmin/controllerAdminPaintings.php");

include('routeAdmin/routingAdmin.php'); //!!!!

echo $response;
