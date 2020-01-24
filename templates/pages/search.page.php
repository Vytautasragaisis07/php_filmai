<h2>Filmo paieška</h2>
<?php
$dsn= "mysql:host=$host; dbname=$db";
try{
    $conn = new PDO($dsn, $username, $password);
    if($conn){

        $stmt = $conn->query("SELECT * FROM filmai");
        $filmai = $stmt->fetchAll();
    }
}catch (PDOException $e){

    echo $e->getMessage();
}?>
<form method="post">
    <div class="form-group">
        <label for="title">Filmo pavadinimas</label>
        <input type="text" id="title" class="form-control" list="pavadinimai" placeholder="Filmo pavadinimas" name="title">
        <datalist id="pavadinimai">
            <?php foreach($filmai as $filmas) :?>
            <option value="<?=$filmas['pavadinimas'];?>">
            <?php endforeach;?>
        </datalist>
    </div>
    <button type="submit" classs="btn btn-primary" name="search">Ieškoti</button>
</form>

<?php
if (isset($_POST['search'])) :?>

    <?php
    $searchIT = $_POST['title'];
    $uzklausa = $conn->query ("SELECT id, pavadinimas, metai, rezisierius, imdb,
                                                aprasymas FROM filmai
                                                WHERE pavadinimas like '$searchIT'");
    $filmams = $uzklausa->fetchAll();
    $uzklausa->bindValue(1, "%searchIT%", PDO::PARAM_STR);
    ?>
    <table class="table table-bordered">
        <?php
        foreach ($filmams as $filmas):?>
            <tr>
                <br>
                <td><?=$filmas['id'];?></td>
                <td><?=$filmas['pavadinimas'];?></td>
                <td><?=$filmas['metai'];?></td>
                <td><?=$filmas['imdb'];?></td>
                <td><?=$filmas['aprasymas'];?></td>
            </tr>
        <?php endforeach;?>
    </table>
<?php endif;?>
