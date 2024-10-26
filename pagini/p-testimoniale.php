<?php
    if(isset($_POST['continut']) && Login())
    {
        $text = htmlspecialchars(trim(addslashes($_POST['continut'])));
        
        if (AdaugaTestimonial($text, $_SESSION['user']['cod']))
            AdaugaMesaj('Mesajul a fost adaugat!');
    }

    if(isset($_POST['actiune']) && Login() && $_SESSION['user']['admin'])
    {
        $cod = (int) $_POST['cod'];
        if ($_POST['actiune'] === "aproba")
        {
            AprobaTestimonial($cod);
            AdaugaMesaj('Mesajul a fost aprobat!');
        }
        elseif ($_POST['actiune'] === "sterge")
        {
            StergeTestimonial($cod);
            AdaugaMesaj('Mesajul a fost sters!');
        }
    }

    AfisareMesaje();
?>
<h1>
    Testimoniale
</h1>
<?php
    $testimoniale;

    if (Login())
    {
        $testimoniale = ListaTestimoniale($_SESSION['user']['cod'], $_SESSION['user']['admin']);
?>
<form method="post">
    <div class="mb-3">
        <label class="form-label" for="continut">Mesaj</label>
        <textarea name="continut" id="continut" class="form-control" rows="10"></textarea>
    </div>
    <div class="mb-3">
        <button class="btn btn-primary col-12" type="submit">Adăugare</button>
    </div>
</form>
<?php
    }
    else
    {
        $testimoniale = ListaTestimoniale();
    }
?>
<hr>

<?php
    foreach($testimoniale as $T)
    {
        if(!$T['aprobat'] && Login() === false)
            continue;
        ?>
        <div class="card mb-5">
            <div class="card-header <?= !$T['aprobat'] ? "bg-info":"" ?>">
                <h5 class="card-title">
                    <?=$T['nume_prenume']?>
                </h5>
            </div>
            <div class="card-body">
                <?=nl2br( $T['continut'])?>
            </div>
            <div class="card-footer">
                <?=$T['data']?>
                <?php
                if (Login() && $_SESSION['user']['admin'])
                {
                ?>
                <div class="actiuni-testimonial">
                    <?php
                    if (!$T['aprobat'])
                    {
                    ?>
                    <form method="POST">
                        <input type="hidden" name="actiune" value="aproba">
                        <input type="hidden" name="cod" value="<?=$T['cod']?>">
                        <button class="btn btn-sm btn-success" type="submit">Aproba</button>
                    </form>
                    <?php
                    }
                    ?>
                    <form method="POST">
                        <input type="hidden" name="actiune" value="sterge">
                        <input type="hidden" name="cod" value="<?=$T['cod']?>">
                        <button class="btn btn-sm btn-danger" type="submit">Sterge</button>
                    </form>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
        <?php
    }
?>