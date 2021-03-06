<?php
try {
    spl_autoload_register(function (string $className) {
        require_once __DIR__ . '/../app/' . $className . '.php';
    });

    $route = $_GET['route'] ?? '';
    $routes = require __DIR__ . '/../config/routes.php';

    $isRouteFound = false;
    foreach ($routes as $pattern => $controllerAndAction) {
        preg_match($pattern, $route, $matches);
        if (!empty($matches)) {
            $isRouteFound = true;
            break;
        }
    }

    if (!$isRouteFound) {
        throw new \Exceptions\NotFoundException();
    }

    unset($matches[0]);

    $controllerName = $controllerAndAction[0];
    $actionName = $controllerAndAction[1];

    $controller = new $controllerName();
    $controller->$actionName(...$matches);
} catch (\Exceptions\DbException $e) {
    $view = new \Views\View(__DIR__ . '/../app/Views/templates/errors');
    $view->renderHtml('500.php', ['error' => $e->getMessage()], 500);
} catch (\Exceptions\NotFoundException $e) {
    $view = new \Views\View(__DIR__ . '/../app/Views/templates/errors');
    $view->renderHtml('404.php', ['error' => $e->getMessage()], 404);
} catch (\Exceptions\UnauthorizedException $e) {
    $view = new \Views\View(__DIR__ . '/../app/Views/templates/errors');
    $view->renderHtml('401.php', ['error' => $e->getMessage()], 401);
}