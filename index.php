<?php  
include '../E-DCL/core/core.php';  
$page = isset($_GET['page']) ? $_GET['page'] : 'login';  
  
switch ($page) {  
    case "login":  
        require '../E-DCL/control/login/controller.php';  
        $controller = new loginSet;  
        $controller->login();  
        break;  
    case "user":  
        require '../E-DCL/control/user/controller.php';  
        $controller = new userSet;  
        $controller->showUser();  
        break;  
    case "dashboard":  
        require '../E-DCL/control/dashboard/controller.php';  
        $controller = new dashboardSet;  
        $controller->showMenu();  
        break;  
    case "logout":  
        require '../E-DCL/control/login/controller.php';  
         $controller = new loginSet;  
        $controller->logout();  
        break;  
    default:  
        header('location: index.php?page=login');  
        exit;  
}  
?>  