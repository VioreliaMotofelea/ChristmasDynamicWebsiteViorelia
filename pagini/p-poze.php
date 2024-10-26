<div class="alert alert-success d-flex align-items-center alert-dismissible fade show mb-3" role="alert">
    <svg class="bi flex-shrink-0 me-2" style="width: 15px; height: 15px" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
    <div> 
        Urări de Crăciun.
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<div class="mb-3"></div>
<?php
    if(Login()) // utilizatorul are voie sa incarce fisiere
    {
        ?>
            <form method="post" action="upload.php" enctype="multipart/form-data" class="border rounded p-3 mb-4">
                <label for="fisier">Incarca imagine</label>
                <input type="file" id="fisier" name="fisier">
                <button type="submit">Salvează</button>
            </form>        
        <?php
    }
    if(isset($_GET['poza']))
    {
        $poza = Poza($_GET['poza']);
        if ($poza !== false || $poza !== null)
        {
        ?>
            <div class="mb-4 text-center border p-2 rounded bg-body-tertiary">
                <img src="poze/<?=$poza['cod'].".".$poza['extensie']?>" class="img-fluid">
            </div>
        <?php
        }
    }
?>
<div class="row">
<?php
    $poze = ListaPoze();
    foreach($poze as $P)
    {
        ?>
        <div class="col-md-3">
            <a href="./?pagina=poze&poza=<?=$P['cod']?>">
                <img src="poze/<?=$P['cod'].".".$P['extensie']?>" class="img-fluid border p-2 rounded bg-body-tertiary">
            </a>
        </div>
        <?php
    }
?>
</div>