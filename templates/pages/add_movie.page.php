<?php
$dsn= "mysql:host=$host; dbname=$db";

try {
    $conn = new PDO($dsn, $username, $password);
    if ($conn) {

        $stmt = $conn->query("SELECT * FROM filmai");
        $filmai = $stmt->fetchAll();
    }
}catch (PDOException $e){

    echo $e->getMessage();
}
    if (isset($_POST['add'])) {
        try {
            if ($conn) {
                $sql = "INSERT INTO filmai (pavadinimas, aprasymas, metai, rezisierius, imdb, genre_id)
VALUES (:pavadinimas,:aprasymas,:metai,:rezisierius,:imdb,:zanras)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':pavadinimas', $_POST['title'], PDO: :PARAM_STR);
                $stmt->bindParam(':aprasymas', $_POST['description'], PDO: :PARAM_STR);
                $stmt->bindParam(':metai', $_POST['year'], PDO: :PARAM_STR);
                $stmt->bindParam(':rezisierius', $_POST['director'], PDO: :PARAM_STR);
                $stmt->bindParam(':imdb', $_POST['imdb'], PDO: :PARAM_STR);
                $stmt->bindParam(':zanras', $_POST['genre'], PDO: :PARAM_STR);
                $stmt->execute();
                header('Location:/?page=visi');

        }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
?>