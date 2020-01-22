<h2>Visi filmai</h2>
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
        <td><?=$filmas['genres_id'];?></td>
        </tr>
    <?php endforeach; ?>
    </tr>
</table>
<h2>Pridėti filmą</h2>
<table class="table table-bordered">
    <?php
    ?>
    <tr>
        <form method="POST">
            <div class="form-group">
                <label for="formGroupExampleInput2">Pavadinimas</label>
                <input type="text" class="form-control" name="name" placeholder="...">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Kategorija</label>
                    <select name="course" class="form-control">
                        <option value="0">--Pasirinkite--</option>
                        <option value="1" >Drama</option>
                        <option value="2" >Trileris</option>
                        <option value="3" >Kriminalinis</option>
                    </select>
                </select>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Aprašymas</label>
                <input type="text" class="form-control" name="title" placeholder="...">
            </div>
            <div class="form-group">
            </select>
                <label for="formGroupExampleInput2">Metai</label>
                <select name="year" class="form-control">
                    <option value="" selected disabled>--Pasirinkite--</option>
                    <?php
                    for($i=1900; $i<=2020; $i++)
                    {
                        echo "<option value=".$i.">".$i."</option>";
                    }
                    ?>
                </select>
            </div>
                <input type="submit" name="submitYears" value="Year" />
            <div class="form-group">
                <label for="formGroupExampleInput2">Prodiuseris</label>
                <input type="text" class="form-control" name="prod" placeholder="...">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">IMDB</label>
                <input type="number" class="form-control" name="kaina" placeholder="...">
            </div><input type="submit" value="Submit" class="btn btn-primary mb-2" name="submit">
        </form>
    </tr>
</table>

