<header>
    <nav>
        <ul>
            <li><img src="../../public/asset/Logo_hayditext.svg" alt="Logo qui représente un stylo et son jet d'encre"></li>
            <!-- Condition si connecter-->
             <?php if (isset($_SESSION["connected"]) && $_SESSION["connected"] == true) : ?>
                <!-- Condition si Admin-->
                <?php if (isset($_SESSION["grant"]) && $_SESSION["grant"] === "ROLE_ADMIN") : ?>
                    <li><a href="#">Apporter des changements</a></li>
                <?php endif ?>
                <li><a href="#">Déconnexion</a></li>
                <li><a href="#">Voir mon profil</a></li>
                <?php else : ?>
                    <li><a href="#">S'inscrire</a></li>
                    <li><a href="#">Se connecter</a></li>
                <?php endif ?>
        </ul>
    </nav>
</header>
