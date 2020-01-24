<?php
$dns= "mysql:host=$host;dbname=$db";
try{
    $conn = new PDO($dns, $username, $password, $options);
    if($conn){
        $stmt = $conn->query("SELECT * FROM zanrai");
        $filmuZanrai = $stmt->fetchAll();

        if (isset($_GET['id'])){
            $zid = $_GET['id'];
            $stmt = $conn->query("SELECT filmai.pavadinimas, filmai.aprasymas, 
                              filmai.metai, filmai.rezisierius, zanrai.pavadinimas AS zanroPavadinimas
                              FROM filmai 
                              INNER JOIN zanrai ON filmai.zanrai_id=zanrai.id
                              WHERE $zid=zanrai.id");
            $pagalzanra = $stmt->fetchAll();
        }

    }
} catch (PDOException $e) {
    echo $e->getMessage();
} ?>


    <h1>Filmai pagal zanra</h1>

<?php
foreach ($filmuZanrai as $zanras): ?>

    <ul class="list-group">
        <a href="?page=zanrai&id=<?=$zanras['id']; ?>"><?=$zanras['pavadinimas']; ?></a>
    </ul>
<?php endforeach; ?>
<?php if (isset($_GET['id'])): ?>
    <table class="table table-bordered">
        <thead>
        <tr>
            <td>Filmo zanras</td>
            <td>Filmo pavadinimas</td>
            <td>Filmo aprasymas</td>
            <td>Filmo rezisierius</td>
            <td>Filmo sukurimo metai</td>
        </tr>
        </thead>
        <tr>
            <?php
            foreach ($pagalzanra as $pglzanra): ?>

        <tr>
            <td><?=$pglzanra['zanroPavadinimas']; ?></td>
            <td><?=$pglzanra['pavadinimas']; ?></td>
            <td><?=$pglzanra['aprasymas']; ?></td>
            <td><?=$pglzanra['rezisierius']; ?></td>
            <td><?=$pglzanra['metai']; ?></td>


        </tr>
        <?php endforeach; ?>
        </tr>
    </table>
<?php endif;?>