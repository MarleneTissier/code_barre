<?php
    include('CodeBarreCrea.class.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Générateur de code EAN 8</title>
    <meta name="description" content="Générez des Code barres en 1 clic avec MyCodeBarre ! Téléchargez votre code barre en PNG. ">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="container">

<header>
    <div><img src="img/logo-code-barre-generator.svg" class="img-resp logo" alt="Logo code barre"></div>
<h1>Générateur de code barre</h1>
</header>

<section>
    <form action="index.php" method="post">
        <div class="form-group">
            <label for="ean8">Entrer votre code EAN 8</label>
            <input type="number" required="required" name="ean" class="form-control" id="ean" >
        </div>
        <button type="submit" class="btn violet btn-primary">Générer le code barre</button>
    </form>

    <?php
    if (!empty($_POST['ean'])) {
        $codeBarre = new CodeCrea($_POST['ean']);
        echo $codeBarre->codeBarre();
    } else {

    }
    ?>

</section>


    <footer>
        <div>
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" class="don_paypal" target="_top">
                <input type="hidden" name="cmd" value="_s-xclick" />
                <input type="hidden" name="hosted_button_id" value="GL6YCX8M6E3YL" />
                <input type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Bouton Faites un don avec PayPal" />
                <img alt="" border="0" src="https://www.paypal.com/fr_FR/i/scr/pixel.gif" width="1" height="1" />
            </form>
        </div>
        <p class="copyright">® Marlène - Romain - Ryane
            <br>
            <img class="rtdc" src="https://cleanacar.fr/img/logo-createur-rtdc-network.png">
        </p>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </footer>
</div><!-- Container -->
</body>
</html>