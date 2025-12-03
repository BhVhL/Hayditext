<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style/navbar.css">
    <title>Document</title>
</head>
<body>
    <header>
        <?php include 'component/navbar.php' ?>
    </header>
    <main>
        <!--Gestion des projets-->
        <section>
            <div>
                <ul>
                    <li><strong>Mes projets</strong></li>

                    <li>
                        <details>
                            <summary>
                                <?= $resume ?>
                            </summary>
                            <ul>
                                <?php foreach ($data["titles"] as $project): ?> 
                                <li><?= $project["title"] ?></li>
                                <?php endforeach ?>
                            </ul>
                        </details>
                    </li>
                </ul>
            </div>

            <div class="addButton">
                <a href="#">Ajouter un projet</a>
            </div>
            <div class="dropButton">
                <a href="#">Supprimer un projet</a>
            </div>
        </section>

        <!-- Asside pour un projet ouvert avec accès aux folders et files-->
         <asside>

         </asside>

        <!-- Section pour la partie de gestion des polices etc-->
         <section>

         </section>

        <!-- Section pour la partie de gestion des onglets zone de texte-->
         <section>

         </section>
    </main>
</body>
</html>