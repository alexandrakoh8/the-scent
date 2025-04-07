<?php
require_once __DIR__.'/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Initialize DB connection
$db = new PDO(
    "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}",
    $_ENV['DB_USER'],
    $_ENV['DB_PASSWORD']
);

// Route handling
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/':
        require __DIR__.'/views/landing.php';
        break;
    case '/products':
        require __DIR__.'/views/products.php';
        break;
    case '/cart':
        require __DIR__.'/views/cart.php';
        break;
    default:
        http_response_code(404);
        require __DIR__.'/views/404.php';
        break;
}
