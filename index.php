<?php
include 'vendor/autoload.php';
include 'env.php';

session_start();

$url = parse_url($_SERVER["REQUEST_URI"]);
$path = isset($url["path"]) ? $url["parth"] : "/";

use App\Controller\HomeController;

$homeController = new HomeController();

if (isset($_SESSION["connected"]) && $_SESSION["connected"] == true ) {
    if (isset($_SESSION["grant"]) && $_SESSION["grant"] == "ROLE_ADMIN") {
        switch ($path) {
            case '/':
                $homeController->index();
                break;
            case '/work/page':
                $workPageController->addWork();
                break;
        }
    } else {
        switch ($path) {
            case '/':
                $homeController->index();
                break;
        }
    }
} else {
    switch ($path) {
        case '/':
            $homeController->index();
            break;
    }
}
        
    
