<h2>Filmo Salinimas</h2>
<?php
$dsn= "mysql:host=$host; dbname=$db";
try{
    $conn = new PDO($dsn, $username, $password);
    if($conn){
        $thisId = $_GET['id'];
        $stmt = $conn->query("SELECT filmai.id as movies_id, filmai.pavadinimas, filmai.metai, filmai.rezisierius, filmai.imdb,
                                        filmai.aprasymas, filmai.zanrai_id, zanrai.id, zanrai.pavadinimas as genre_name FROM filmai
                                        INNER JOIN  zanrai ON filmai.zanrai_id=zanrai.id
                                        WHERE filmai.id=$thisId");
        $filmai = $stmt->fetchAll();

    }
}catch (PDOException $e){

    echo $e->getMessage();
}?>

<?php
if (isset($_POST['submit'])) {
    $stmt = $conn->query("DELETE FROM filmai WHERE id=$thisId");
    header('Location:/vytautas/php_filmai/templates/?page=visi');
}

?>

<h3>Ar tikrai norite ištrinti šį filmą?</h3>
<table class="table table-bordered">
    <tr>
        <?php
        foreach ($filmai as $filmas):?>
    </tr>
    <tr>
        <td><?=$filmas['movies_id'];?></td>
        <td><?=$filmas['pavadinimas'];?></td>
        <td><?=$filmas['metai'];?></td>
        <td><?=$filmas['rezisierius'];?></td>
        <td><?=$filmas['imdb'];?></td>
        <td><?=$filmas['genre_name'];?></td>
        <td><?=$filmas['aprasymas'];?></td>
    </tr>
    <?php endforeach;?>
</table>

<form method="post">
    <button type="submit" class="btn btn-primary" name="submit">Ištrinti</button>
</form>
