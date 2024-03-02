<?php 
namespace App\models;
use PDO;
use App\Database\Conection;

class modelUsuario {
  
    public static function getTasks() {
        $query = 'SELECT * FROM tb_tarefas';
        $stmt = Conection::getInstanciaDb()->prepare($query);
        $stmt->execute();
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    public static function addTask($task) {
        $query = 'INSERT INTO tb_tarefas (m_tarefa) VALUES (:dados)';
        $stmt = Conection::getInstanciaDb()->prepare($query);
        $stmt->execute(array(':dados' => $task));
    }

    public static function updateTask($id, $task,$nstatus,$dataa) {
        $query = "UPDATE tb_tarefas set m_tarefa = :task, status = :nstatus, data_atualizacao = :dataa WHERE id_tarefa = :id";
        $stmt = Conection::getInstanciaDb()->prepare($query);
        $stmt->execute(array(':id' => $id, ':task' => $task, ':nstatus'=>$nstatus,':dataa'=>$dataa));
    }

    public static function deleteTask($id) {
        $query = "DELETE FROM tb_tarefas WHERE id_tarefa = :id";
        var_dump($id);
        $stmt = Conection::getInstanciaDb()->prepare($query);
        $stmt->execute([':id' => $id]);
    }
}

?>
