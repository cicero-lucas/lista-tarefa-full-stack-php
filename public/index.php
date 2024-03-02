<?php
require "../vendor/autoload.php";
use App\models\modelUsuario;

header("Access-Control-Allow-Origin: *");
// Permitir solicitações com métodos POST, GET, PUT, DELETE e OPTIONS
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
// Permitir os cabeçalhos Content-Type e Authorization
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Verifique se é uma solicitação OPTIONS (preflight)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

$request_method = $_SERVER['REQUEST_METHOD'];

switch ($request_method) {
    case 'GET':
        modelUsuario::getTasks();
        break;
    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        modelUsuario::addTask($data['task']);
        break;
    case 'PUT':
        $data = json_decode(file_get_contents('php://input'), true);
        
        modelUsuario::updateTask($data['id'], $data['task'], $data['status'],$data['dataAtualizacao']);
        break;
    case 'DELETE':
        $data = json_decode(file_get_contents('php://input'), true);
        modelUsuario::deleteTask($data['id']);
        break;
    default:
        http_response_code(405);
        echo json_encode(array('message' => 'Método não permitido'));
        break;
}
?>

