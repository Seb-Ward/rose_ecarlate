
    

<nav class="header_nav">
                    <label for="btn" class="icon"><!--Here we have our burger-->
                        <svg viewbox="0 0 100 80" width="40" height="40">
                            <rect width="100" height="15"></rect>
                            <rect y="35" width="100" height="15"></rect>
                            <rect y="70" width="100" height="15"></rect>
                        </svg>
                    </label>
                    <input type="checkbox" id="btn">
                    <ul class="nav_menu"><!--Here I have my nav_menu-->
                        <?php if($page!="accueil"){?>

                        <li class="nav_item">
                            <a href="accueil.php">accueil</a>
                        </li>
                        <?php } ?> 
                        <?php if($page!="boutique"){?>
                        <li class="nav_item">
                            <a href="boutique.php">Boutique</a>
                        </li>
                        <?php } ?> 
                        <?php if($page!="equipe"){?>
                        <li class="nav_item">
                            <a href="equipe.php"> L'équipe</a>
                        </li>
                        <?php } ?> 
                        <?php if($page!="contact"){?>
                        <li class="nav_item">
                            <a href="contact.php">Nous contacter</a>
                        </li>
                        <?php } ?> 
                        <?php
                        if($connected==true){
                            if($user->getAdmin()==1){

                        
                    ?> 
                    <?php if($page!="dashboard"){?>
                   <li class="nav_item">
                        <a href="../vue/dashboard.php">Tableau de board</a>
                        </li>
                        <?php } ?> 
                        <?php }
                        ?>
                    <li class="nav_item">
                       <a href="../controleur/deconnexion.php">Se déconnecter</a>
                        </li>
                        <?php
                        }else{

                        ?>
                         <?php if($page!="form_inscription_client"){?>
                        <li class="nav_item">
                            <a href="form_inscription_client.php">S'inscrire</a>
                        </li>
                        <?php } ?>
                        <?php if($page!="connexion_admin"){?>
                        <li class="nav_item">
                            <a href="connexion_admin.php">Se connecter</a> 
                        </li>
                        <?php } ?>
                        <?php
                        }
                        ?>
                    </ul>
                </nav> 
