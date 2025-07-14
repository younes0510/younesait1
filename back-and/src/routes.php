<?php
require_once __DIR__ . '/Controller/UserController.php';

// Exemple de route simple
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($uri === '/api/users' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    UserController::list();
} elseif ($uri === '/api/users' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    UserController::create();
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Not found']);
}