<?php
include_once "database.php";
class Functions
{
    function __construct()
    {
        $this->pdo = new Database();
    }

    function get()
    {
        if (isset($_GET['id'])) {
            $sql = $this->pdo->connect()->prepare("SELECT * FROM peliculas WHERE id=:id");
            $sql->bindValue(':id', $_GET['id']);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            header("HTTP/1.1 200");
            echo json_encode($sql->fetchAll());
            exit;
        } else {
            $sql = $this->pdo->connect()->prepare("SELECT * FROM peliculas");
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            header("HTTP/1.1 200");
            echo json_encode($sql->fetchAll());
            exit;
        }
    }

    function post()
    {
        $sql = "INSERT INTO peliculas (id, nombre, director, descripcion, imagen) VALUES (:id, :nombre, :director, :descripcion, :imagen)";
        $statement = $this->pdo->connect()->prepare($sql);
        $statement->bindValue(":id", $_POST['id']);
        $statement->bindValue(":nombre", $_POST['nombre']);
        $statement->bindValue(":director", $_POST['director']);
        $statement->bindValue("descripcion", $_POST['descripcion']);
        $statement->bindValue(":imagen", $_POST['imagen']);
        $statement->execute();
        $stat = $this->pdo->connect()->lastInsertId();
        if ($stat) {
            header("HTTP/1.1 200 OK");
            echo json_encode($stat);
            exit;
        }
    }

    function put()
    {
        $sql = "UPDATE peliculas SET nombre=:nombre, director=:director, descripcion=:descripcion, imagen=:imagen where id=:id";
        $statement = $this->pdo->connect()->prepare($sql);
        $statement->bindValue(":nombre", $_GET['nombre']);
        $statement->bindValue(":director", $_GET['director']);
        $statement->bindValue("descripcion", $_GET['descripcion']);
        $statement->bindValue(":imagen", $_GET['imagen']);
        $statement->bindValue(":id", $_GET['id']);
        $statement->execute();
        header("HTTP/1.1 200 OK");
        exit;
    }

    function delete()
    {
        $sql = "DELETE FROM peliculas where id=:id";
        $statement = $this->pdo->connect()->prepare($sql);
        $statement->bindValue(":id", $_GET['id']);
        $statement->execute();
        header("HTTP/1.1 200 OK");
        exit;
    }

   
}
