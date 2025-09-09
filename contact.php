<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de recettes - Page d'accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include_once('header.php'); ?>
    <form action="submit_contact.php" method="post" enctype="multipart/form-data">
        <h1 class="contact">Contactez nous</h1>
        <section id="connexion">
            <div>
                <div>
                    <label for="email">Email</label><br>
                    <input class="email" type="email" name="email" placeholder="Email" required>
                </div>
                <div>
                    <label for="message">Votre message</label><br>
                    <textarea name="message" placeholder="Exprimez vous" required></textarea>
                </div>
            </div>

            <div class="mb-3">
                <label for="screenshot" class="form-label">Votre capture d'écran</label>
                <input type="file" class="form-control" id="screenshot" name="screenshot" required />
            </div>

            <br>
            <button type="submit">Envoyer</button>
        </section>
    </form>
    <!-- inclusion du bas de page du site -->
    <?php include_once('footer.php'); ?>
</body>

</html>