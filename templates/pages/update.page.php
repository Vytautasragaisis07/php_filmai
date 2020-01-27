<h2>Filmo Redagavimas</h2>
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
        $filmai = $stmt->fetch();

    }
}catch (PDOException $e){

    echo $e->getMessage();

}?>

<?php if (isset($_POST['submit'])){
    try {
        if ($conn){

            $sql = "UPDATE filmai SET pavadinimas = :pavadinimas,
            aprasymas = :aprasymas,
            metai = :metai,
            rezisierius = :rezisierius,
            imdb = :imdb,
            pavadinimas = :pavadinimas";


            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':pavadinimas', $_POST['movie_title'], PDO::PARAM_STR);
            $stmt->bindParam(':metai', $_POST['movie_date'], PDO::PARAM_STR);
            $stmt->bindParam(':rezisierius', $_POST['director'], PDO::PARAM_STR);
            $stmt->bindParam(':imdb', $_POST['movie_rating'], PDO::PARAM_STR);
            $stmt->bindParam(':zanrai_id', $_POST['genres_id'], PDO::PARAM_STR);
            $stmt->bindParam(':aprasymas', $_POST['notes'], PDO::PARAM_STR);
            $stmt->execute();

        }
    } catch (PDOException $e) {

        echo $e->getMessage();
    }
}

?>
<form method="post">
    <div class="form-group">
        <label for="Movie_name">Pavadinimas</label>
        <input type="text" class="form-control" id="pavadinimas" value="<?=$filmai['pavadinimas']?>" placeholder="Pavadinimas" name="movie_title">
    </div>
    <div class="form-group">
        <label for="director">Director</label>
        <input type="text" class="form-control" id="Director" value="<?=$filmai['rezisierius']?>" placeholder="Director" name="director">
    </div>
    <div class="form-group">
        <label for="movie_rating">Metai</label>
        <select class="form-control form-control-sm" value="<?=$filmai['metai']?>" name="movie_date">
            <?php
            for ($i = 1900; $i < 2021; $i++):?>
                <option><?= $i ?></option>
            <?php endfor; ?>
        </select>
        <div class="form-group">
            <label for="Movie_date">IMDB</label>
            <select class="form-control form-control-sm" value="<?=$filmai['imdb']?>" name="movie_rating">
                <?php
                for ($i = 10; $i <= 100; $i++):?>
                    <option><?= $i / 10 ?></option>
                <?php endfor; ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <?php
        $dsn = "mysql:host=$host; dbname=$db";
        try {
            $conn = new PDO($dsn, $username, $password, $options);
            if ($conn) {
                $stmt = $conn->query("SELECT * FROM zanrai");
                $zanrai = $stmt->fetchAll();
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        } ?>
        <label for="about">Pasirinkite žanrą</label>
        <select class="form-control form-control-sm" name="genres_id">
            <?php
            foreach ($zanrai as $zanras):?>
                <option value="<?= $zanras['id'] ?>"><?= $zanras['pavadinimas'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="about">Filmo aprašymas</label>
        <input type="text" class="form-control" id="about" value="<?=$filmai['aprasymas']?>" placeholder="Filmo aprašymas" name="notes">
    </div>

    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>

<?php ;?>


