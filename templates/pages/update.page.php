<?php

$dsn= "mysql:host=$host; dbname=$db";
$conn = new PDO($dsn, $username, $password, $options);
if (isset($_POST['submit'])){
    try {
        if ($conn){
            $sql = "UPDATE filmai SET pavadinimas = :pavadinimas, metai = :metai, rezisierius = :rezisierius, imdb = :imdb, zanrai_id = :zanrai_id, aprasymas = :aprasymas WHERE zanrai_id = :zanrai_id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':pavadinimas', $_POST['movie_title'], PDO::PARAM_STR);
            $stmt->bindParam(':metai', $_POST['movie_date'], PDO::PARAM_STR);
            $stmt->bindParam(':rezisierius', $_POST['director'], PDO::PARAM_STR);
            $stmt->bindParam(':imdb', $_POST['movie_rating'], PDO::PARAM_STR);
            $stmt->bindParam(':zanrai_id', $_POST['genres_id'], PDO::PARAM_STR);
            $stmt->bindParam(':aprasymas', $_POST['about'], PDO::PARAM_STR);
            $stmt->execute();
        }
    } catch (PDOException $e) {

        echo $e->getMessage();
    }
}
?>
    <h2>Filmo redagavimas</h2>
    <form method="post">
        <div class="form-group">
            <label for="Movie_name">Pavadinimas</label>
            <input type="text" class="form-control" id="pavadinimas" value="" name="movie_title">
        </div>
        <div class="form-group">
            <label for="director">Režisierius</label>
            <input type="text" class="form-control" id="Director" placeholder="Režisierius" name="director">
        </div>
        <div class="form-group">
            <label for="movie_rating">Metai</label>
            <select class="form-control form-control-sm" name="movie_date">
                <?php
                for ($i=1900; $i<2020; $i++):?>
                    <option><?=$i?></option>
                <?php endfor;?>
            </select>
            <div class="form-group">
                <label for="Movie_date">IMDB</label>
                <select class="form-control form-control-sm" name="movie_rating">
                    <?php
                    for ($i=10; $i<=100; $i++):?>
                        <option><?=$i/10?></option>
                    <?php endfor;?>
                </select>
            </div>
            <!--        <input type="number" class="form-control" id="movie_rating" placeholder="IMDB Score" name="imdb_score" maxlength=3>-->
        </div>
        <div class="form-group">
            <?php
            $dsn= "mysql:host=$host; dbname=$db";
            try{
                $conn = new PDO($dsn, $username, $password, $options);
                if($conn){
                    $stmt = $conn->query("SELECT * FROM zanrai");
                    $zanrai = $stmt->fetchAll();
                }
            }catch (PDOException $e){
                echo $e->getMessage();
            }?>
            <label for="about">Pasirinkite žanrą</label>
            <select class="form-control form-control-sm" name="genres_id">
                <?php
                foreach ($zanrai as $zanras):?>
                    <option value="<?=$zanras['id']?>"><?=$zanras['pavadinimas']?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="about">Filmo aprašymas</label>
            <input type="text" class="form-control" id="about" placeholder="Filmo aprašymas" name="about">
        </div>
        <br>
        <button type="submit" class="btn btn-primary mb-2" name="submit">Pridėti</button>
    </form>


<?php

$validation_errors=[];
if (isset($_POST['submit'])) {
    if (!preg_match('/\w{1,45}$/',
        trim(htmlspecialchars($_POST['movie_title'])))) {
        $validation_errors[] = "Vedant filmo pavadinimą, negalima vesti specialiuju simboliu.";
    }if (!preg_match('/\w{1,45}$/',
        trim(htmlspecialchars($_POST['director'])))) {
        $validation_errors[] = "Įveskite tik režisieriaus vardą ir pavardę";
    }
}
?>



<?php if($validation_errors) :?>
    <div class="errors">
        <ul>
            <?php foreach($validation_errors as $error) :?>
                <li><?= $error; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

<?php endif; ?>