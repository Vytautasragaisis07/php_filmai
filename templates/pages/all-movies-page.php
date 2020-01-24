<h2>Visi filmai</h2>
<?php
$dsn= "mysql:host=$host; dbname=$db";
try{
    $conn = new PDO($dsn, $username, $password);
    if($conn){

        $stmt = $conn->query("SELECT filmai.id, filmai.pavadinimas, filmai.aprasymas,
        filmai.metai, filmai.imdb, filmai.zanrai_id, filmai.rezisierius, zanrai.pavadinimas As zanro
        FROM filmai
        INNER JOIN zanrai ON filmai.zanrai_id=zanrai.id");
        $filmai = $stmt->fetchAll();
    }
}catch (PDOException $e){

    echo $e->getMessage();
}?>
<table class="table table-bordered">
    <tr>
        <?php
        foreach($filmai as $filmas):?>
    <tr>
        <td><?=$filmas['id'];?></td>
        <td><?=$filmas['pavadinimas'];?></td>
        <td><?=$filmas['aprasymas'];?></td>
        <td><?=$filmas['metai'];?></td>
        <td><?=$filmas['rezisierius'];?></td>
        <td><?=$filmas['imdb'];?></td>
        <td><?=$filmas['zanro'];?></td>
        <td><a href="?page=atnaujinti&id<?=$filmas['id'];?>">Redaguoti</td>
        <td><a href="?page=salinti&id<?=$filmas['id'];?>">Šalinti</td>
    </tr>
    <?php endforeach; ?>
    </tr>
</table>
