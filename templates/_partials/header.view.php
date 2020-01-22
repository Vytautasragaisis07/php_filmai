
<!-- Sidebar -->
<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading"><?= $siteName; ?> </div>
    <div class="list-group list-group-flush">
        <?php foreach ($navigation as $sritis => $pavadinimas): ?>
            <?php if ($sritis == 'leftside') :?>
                <?php foreach ($pavadinimas as $title => $href ) :?>
                    <a href="?page=<?= $title ; ?>" class="list-group-item list-group-item-action bg-light"> <?= $href; ?></a>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>
<!-- /#sidebar-wrapper -->