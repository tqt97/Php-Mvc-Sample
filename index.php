<?php

declare(strict_types=1);

require_once './Core/Init.php';

// Kiểm tra xem request có controller hay không ? Nêu có thì sử dụng đó, ngược lại sẽ trả về home
$controller = isset($_REQUEST['controller']) ? $_REQUEST['controller'] : 'home'; 
$controllerName = ucfirst($controller . 'Controller');
$action = strtolower($_REQUEST['action'] ?? 'index');

require_once './Controllers/' . $controllerName . '.php';

$controller = new $controllerName();
$controller->$action();
