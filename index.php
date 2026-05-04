<?php
// index.php
require __DIR__ . '/vendor/autoload.php';
require_once './config/Database.php';

// Instanciar Router
$router = new \Bramus\Router\Router();

// Agrupar rutas de la API
$router->mount('/api', function() use ($router) {

    // --- RUTAS DE AUTENTICACIÓN ---
    $router->post('/login', function() {
        // Aquí llamarás a: (new AuthController())->login();
        echo json_encode(["msg" => "Este es el endpoint de login"]);
    });

    // --- RUTAS DE USUARIOS (CRUD) ---
    $router->mount('/usuarios', function() use ($router) {
        
        $router->get('/', function() { /* Listar usuarios */ });
        $router->get('/(\d+)', function($id) { /* Ver un usuario */ });
        $router->post('/', function() { /* Crear usuario */ });
        $router->put('/(\d+)', function($id) { /* Actualizar usuario */ });
        $router->delete('/(\d+)', function($id) { /* Eliminar usuario */ });
        
    });

    // --- RUTAS DE VENTAS ---
    $router->post('/ventas', function() { /* Registrar venta */ });
});

$router->run();