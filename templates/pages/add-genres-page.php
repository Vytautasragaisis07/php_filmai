<?php foreach($genres as $genre):?>
<li><a> <?= $genre="list-group-item"><a href="?page=zanrai%id=<?=genre['id'];?>";?><?=$genre['pavadinimas'];?></a></li>
<? endforeach; ?>