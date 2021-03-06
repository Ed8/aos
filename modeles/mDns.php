<?php
    session_start();
    if(!isset($_SESSION['idUtilisateur'])){
        header('Location: index.php');
    }
    require('connexionBdd.php');

    if(isset($_POST['ajoutDomaine'])){
    	$domaine = htmlspecialchars($_POST['domaineNs']);
    	$tld = htmlspecialchars($_POST['selectionTld']);
    	$nomDomaine = $domaine.$tld;
        $adresseIp = "195.154.82.81";
        //Vérifie si les champs ont été compléter.
        if(!empty($_POST['domaineNs'])){
            //Vérification si le domaine existe déjà
            $req = $bdd->prepare("SELECT * FROM domaines WHERE domaine = ? AND idUtilisateur = ?");
            $req->execute(array($nomDomaine, $_SESSION['idUtilisateur']));
            $resultat = $req->fetch();
            if($resultat['domaine']){
            	$messErreurDomaine = "Votre domaine existe déjà !";     	
            //Ajout du Domaine
            }else{
            	$reqInsert = $bdd->prepare("INSERT INTO domaines(domaine,idUtilisateur) VALUES(?,?)");
            	$reqInsert->execute(array($nomDomaine, $_SESSION['idUtilisateur']));
            	$output = shell_exec('sudo bash /var/www/aos/script/addfilezone.sh '.$nomDomaine.' '.$adresseIp);
                $messConfirmDomaine = "Votre domaine à bien été ajouté !";
            }
        } else {
            $messErreurDomaine = "Veuillez remplir tous les champs !";
        }    
    }
    // Supprimer domaine externe
    if(isset($_POST['supprimerExterne'])){
        $domaine=htmlspecialchars($_POST['valeurDns']);
        $user="onsenfou";
        $type="domaine";
        $adresseIp="onsenfou";

        $reqSelectDomaine = $bdd->prepare("SELECT * FROM domaines WHERE domaine = ? AND idUtilisateur = ?");
        $reqSelectDomaine->execute(array($domaine, $_SESSION['idUtilisateur']));
        $resultatSelectDomaine = $reqSelectDomaine->fetch();

        $reqSelectEnreg = $bdd->prepare("SELECT * FROM enregistrements WHERE idDomaine = ?");
        $reqSelectEnreg->execute(array($resultatSelectDomaine['idDomaine']));
        $resultatSelectEnreg = $reqSelectEnreg->fetch();

        if($resultatSelectEnreg){
            $messErreurDomaine = "Supprimez vos enregistrements avant de supprimer votre domaine !";
        } else {
            $reqSupprDomaine = $bdd->prepare("DELETE FROM domaines WHERE domaine = ? AND idUtilisateur = ?");
            $reqSupprDomaine->execute(array($domaine, $_SESSION['idUtilisateur']));
            $output = shell_exec('sudo bash /var/www/aos/script/delzone.sh '.$user.' '.$domaine.' '.$type.' '.$adresseIp);
            $messConfirmDomaine = "Votre domaine à bien été supprimé !";
        }
    }

    //Ajouter un enregistrement
    if(isset($_POST['ajoutEnregistrement'])){
        $nomEnregistrement = htmlspecialchars($_POST['nomEnregistrement']);
        $type = htmlspecialchars($_POST['type']);
        $adresseIp = htmlspecialchars($_POST['ipEnregistrement']);
        $domaine = htmlspecialchars($_POST['domaine']);
        $adresseIpItinet = "88.177.168.133";
        $fqdn = $nomEnregistrement.".".$domaine;
        $mx = $nomEnregistrement.".".$domaine;
        $userScript = "0";
        
        if(!empty($type) AND !empty($domaine)){
            $req = $bdd->prepare("SELECT * FROM domaines WHERE domaine = ? AND idUtilisateur = ?");
            $req->execute(array($domaine, $_SESSION['idUtilisateur']));
            $resultatIdDomaine = $req->fetch();
            
            //Insertion de l'enregistrement et ajout de l'ip automatiquement si elle n'a pas été remplis
            if($adresseIp == ""){
                $req = $bdd->prepare("SELECT * FROM domaines INNER JOIN enregistrements ON domaines.idDomaine = enregistrements.idDomaine WHERE domaines.idDomaine = ? AND typeEnreg = ? AND nomEnreg = ?");
                $req->execute(array($resultatIdDomaine['idDomaine'], $type, $fqdn));
                $resultatEnregistrement = $req->fetch();
                
                if($resultatEnregistrement['nomEnreg'] == $nomEnregistrement.'.'.$domaine){
                    $messErreurEnregistrement = "Vous possédez déjà cette enregistrement !";
                } else {
                    if($type == "mx"){
                        if($nomEnregistrement == ""){
                            $messErreurEnregistrement = "Veuillez completez le champ : Nom de l'enregistrement !";
                        } else {
                            $reqVerificationMx = $bdd->prepare("SELECT * FROM domaines INNER JOIN enregistrements ON domaines.idDomaine = enregistrements.idDomaine WHERE domaines.idUtilisateur = ? AND domaines.domaine = ? AND adresseIp = ? AND typeEnreg = ?");
                            $reqVerificationMx->execute(array($_SESSION['idUtilisateur'], $domaine, "88.177.168.133", "mx"));
                            $resultatReqVerificationMx = $reqVerificationMx->fetch();
                            if(!$resultatReqVerificationMx){
                                $reqInsertEnregistrement = $bdd->prepare("INSERT INTO enregistrements(nomEnreg,typeEnreg,adresseIp,idDomaine) VALUES(?,?,?,?)");
                                $reqInsertEnregistrement->execute(array($mx, $type, "88.177.168.133", $resultatIdDomaine['idDomaine']));
                                $resultatInsert = $reqInsertEnregistrement->fetch();
                                $output = shell_exec('sudo bash /var/www/aos/script/addenregzone.sh '.$nomEnregistrement.' '.$domaine.' '.$type.' '.$adresseIpItinet);
                                $messConfirmEnregistrement = "Votre enregistrement à bien été ajouté !";
                            } else {
                                $messErreurEnregistrement = "Vous n'avez le droit qu'à un seul mx avec l'adresse ip de chez nous !";
                            }
                        }   
                    }else{
                        if($nomEnregistrement == ""){
                            $req = $bdd->prepare("SELECT * FROM domaines INNER JOIN enregistrements ON domaines.idDomaine = enregistrements.idDomaine WHERE domaines.idDomaine = ? AND typeEnreg = ? AND nomEnreg = ?");
                            $req->execute(array($resultatIdDomaine['idDomaine'], $type, $domaine));
                            $resultatEnregistrement = $req->fetch();
                            
                            if($resultatEnregistrement['nomEnreg'] == $domaine){
                                $messErreurEnregistrement = "Vous possédez déjà cette enregistrement !";
                            } else {
                                $reqInsertEnregistrement = $bdd->prepare("INSERT INTO enregistrements(nomEnreg,typeEnreg,adresseIp,idDomaine) VALUES(?,?,?,?)");
                                $reqInsertEnregistrement->execute(array($domaine, $type, "88.177.168.133", $resultatIdDomaine['idDomaine']));
                                $resultatInsert = $reqInsertEnregistrement->fetch();
                                $output = shell_exec('sudo bash /var/www/aos/script/addenregzone.sh '.$userScript.' '.$domaine.' '.$type.' '.$adresseIpItinet);
                                $messConfirmEnregistrement = "Votre enregistrement à bien été ajouté !";
                            }
                        } else {
                            $reqInsertEnregistrement = $bdd->prepare("INSERT INTO enregistrements(nomEnreg,typeEnreg,adresseIp,idDomaine) VALUES(?,?,?,?)");
                            $reqInsertEnregistrement->execute(array($fqdn, $type, "88.177.168.133", $resultatIdDomaine['idDomaine']));
                            $resultatInsert = $reqInsertEnregistrement->fetch();
                            $output = shell_exec('sudo bash /var/www/aos/script/addenregzone.sh '.$nomEnregistrement.' '.$domaine.' '.$type.' '.$adresseIpItinet);
                            $messConfirmEnregistrement = "Votre enregistrement à bien été ajouté !";
                        }
                    }
                }
            //Insertion de l'enregistrement avec une ip entrée par l'utilisateur
            }else{
                $req = $bdd->prepare("SELECT * FROM domaines INNER JOIN enregistrements ON domaines.idDomaine = enregistrements.idDomaine WHERE domaines.idDomaine = ? AND nomEnreg = ?");
                $req->execute(array($resultatIdDomaine['idDomaine'], $fqdn));
                $resultatEnregistrement = $req->fetch();
                if($resultatEnregistrement['nomEnreg'] == $nomEnregistrement.'.'.$domaine){
                    $messErreurEnregistrement = "Vous possédez déjà cette enregistrement !";
                } else {
                    $explodeAdresseIp = explode('.', $adresseIp);
                    $premierChamps = $explodeAdresseIp[0];
                    $deuxiemeChamps = $explodeAdresseIp[1];
                    $troisiemeChamps = $explodeAdresseIp[2];
                    $quatriemeChamps = $explodeAdresseIp[3];

                    if(filter_var($adresseIp, FILTER_VALIDATE_IP)){
                        if($adresseIp == "0.0.0.0" || $adresseIp == "255.255.255.255" || $adresseIp == "127.0.0.0" || $adresseIp == "127.0.0.1" || $premierChamps == "10" || $premierChamps == "192" && $deuxiemeChamps == "168" || $premierChamps == "172" && $deuxiemeChamps >= "16" && $deuxiemeChamps <= "31"){
                            $messErreurEnregistrement = "Veuillez rentrer une adresse ip publique !";
                        } else {
                            if($type == "mx"){
                                if($nomEnregistrement == ""){
                                    $messErreurEnregistrement = "Veuillez completez le champ : Nom de l'enregistrement !";
                                } else {
                                    $reqInsertEnregistrement = $bdd->prepare("INSERT INTO enregistrements(nomEnreg,typeEnreg,adresseIp,idDomaine) VALUES(?,?,?,?)");
                                    $reqInsertEnregistrement->execute(array($mx, $type, $adresseIp, $resultatIdDomaine['idDomaine']));
                                    $resultatInsert = $reqInsertEnregistrement->fetch();
                                    $output = shell_exec('sudo bash /var/www/aos/script/addenregzone.sh '.$nomEnregistrement.' '.$domaine.' '.$type.' '.$adresseIp);
                                    $messConfirmEnregistrement = "Votre enregistrement à bien été ajouté !";
                                }
                            } else {
                                if($nomEnregistrement == ""){
                                    $req = $bdd->prepare("SELECT * FROM domaines INNER JOIN enregistrements ON domaines.idDomaine = enregistrements.idDomaine WHERE domaines.idDomaine = ? AND typeEnreg = ? AND nomEnreg = ?");
                                    $req->execute(array($resultatIdDomaine['idDomaine'], $type, $domaine));
                                    $resultatEnregistrement = $req->fetch();
                                    
                                    if($resultatEnregistrement['nomEnreg'] == $domaine){
                                        $messErreurEnregistrement = "Vous possédez déjà cette enregistrement !";
                                    } else {
                                        $reqInsertEnregistrement = $bdd->prepare("INSERT INTO enregistrements(nomEnreg,typeEnreg,adresseIp,idDomaine) VALUES(?,?,?,?)");
                                        $reqInsertEnregistrement->execute(array($domaine, $type, $adresseIp, $resultatIdDomaine['idDomaine']));
                                        $resultatInsert = $reqInsertEnregistrement->fetch();
                                        $output = shell_exec('sudo bash /var/www/aos/script/addenregzone.sh '.$userScript.' '.$domaine.' '.$type.' '.$adresseIp);
                                        $messConfirmEnregistrement = "Votre enregistrement à bien été ajouté !";
                                    }
                                }else{
                                    $reqInsertEnregistrement = $bdd->prepare("INSERT INTO enregistrements(nomEnreg,typeEnreg,adresseIp,idDomaine) VALUES(?,?,?,?)");
                                    $reqInsertEnregistrement->execute(array($fqdn, $type, $adresseIp, $resultatIdDomaine['idDomaine']));
                                    $resultatInsert = $reqInsertEnregistrement->fetch();
                                    $output = shell_exec('sudo bash /var/www/aos/script/addenregzone.sh '.$nomEnregistrement.' '.$domaine.' '.$type.' '.$adresseIp);
                                    $messConfirmEnregistrement = "Votre enregistrement à bien été ajouté !";
                                }
                            }
                        }
                    } else {
                        $messErreurEnregistrement = "Votre enregistrement doit être au format : xxx.xxx.xxx.xxx";
                    }
                }
            }
        } else {
            $messErreurEnregistrement = "Veuillez remplir tous les champs !";
        }
    }

    // Supprimer domaine externe
    if(isset($_POST['supprimerEnregistrement'])){
        $nomEnregistrement=htmlspecialchars($_POST['valeurEnregistrement']);

        $reqSelectEnregScript = $bdd->prepare("SELECT * FROM utilisateurs INNER JOIN domaines ON utilisateurs.idUtilisateur = domaines.idUtilisateur INNER JOIN enregistrements ON domaines.idDomaine = enregistrements.idDomaine WHERE utilisateurs.idUtilisateur = ? AND nomEnreg = ?");
        $reqSelectEnregScript->execute(array($_SESSION['idUtilisateur'], $nomEnregistrement));
        $resultatSelectEnregScript = $reqSelectEnregScript->fetch();
        $domaine = $resultatSelectEnregScript['domaine'];
        $resultatExplodeNomEnregistrement = explode('.'.$domaine, $nomEnregistrement);
        $nomEnregistrementExplode = $resultatExplodeNomEnregistrement[0];
        if($resultatSelectEnregScript['typeEnreg'] == "mx"){
            $output = shell_exec('sudo bash /var/www/aos/script/delzone.sh '.$nomEnregistrementExplode.' '.$resultatSelectEnregScript['domaine'].' '.$resultatSelectEnregScript['typeEnreg'].' '.$resultatSelectEnregScript['adresseIp']);
            $reqSupprEnreg = $bdd->prepare("DELETE FROM enregistrements WHERE nomEnreg = ? AND typeEnreg = ?");
            $reqSupprEnreg->execute(array($nomEnregistrement, "mx"));
            $messConfirmEnregistrement = "Votre enregistrement à bien été supprimé !";
        } else {
            $output = shell_exec('sudo bash /var/www/aos/script/delzone.sh '.$nomEnregistrementExplode.' '.$resultatSelectEnregScript['domaine'].' '.$resultatSelectEnregScript['typeEnreg'].' '.$resultatSelectEnregScript['adresseIp']);
            $reqSupprEnreg = $bdd->prepare("DELETE FROM enregistrements WHERE nomEnreg = ? AND typeEnreg = ?");
            $reqSupprEnreg->execute(array($nomEnregistrement, "fqdn"));
            $messConfirmEnregistrement = "Votre enregistrement à bien été supprimé !";
        }
    }
    
    /*$reqAosFqdn = $bdd->prepare("SELECT * FROM utilisateurs WHERE idUtilisateur = ?");
    $reqAosFqdn->execute(array($_SESSION['idUtilisateur']));
    $resultatReqAosFqdn = $reqAosFqdn->fetch();
    //Création de son fqdn pour aos
    if(isset($_POST['activerAos'])){
        $fqdn = htmlspecialchars($_POST['fqdnAos']);
        $fqdnComplet = $fqdn.".aos.itinet.fr";
        $fqdnCompletDev = "dev.".$fqdn.".aos.itinet.fr";
        $fqdnDev = "dev.".$fqdn;
        $domaine = "aos.itinet.fr";
        $type = "fqdn";
        
        $reqAosFqdn = $bdd->prepare("SELECT * FROM utilisateurs WHERE fqdn = ?");
        $reqAosFqdn->execute(array($fqdnComplet));
        $resultatReqAosFqdn = $reqAosFqdn->fetch();
        
        if(!$resultatReqAosFqdn['fqdn'] == $fqdnComplet){
            $reqAosInsert = $bdd->prepare("UPDATE utilisateurs SET fqdn = '$fqdnComplet' WHERE idUtilisateur = ?");
            $reqAosInsert->execute(array($_SESSION['idUtilisateur']));
            $output = shell_exec('sudo bash /var/www/aos/script/addenregzone.sh '.$fqdn.' '.$domaine.' '.$type);

            $reqAosInsert = $bdd->prepare("UPDATE utilisateurs SET fqdnDev = '$fqdnCompletDev' WHERE idUtilisateur = ?");
            $reqAosInsert->execute(array($_SESSION['idUtilisateur']));
            $output = shell_exec('sudo bash /var/www/aos/script/addenregzone.sh '.$fqdnDev.' '.$domaine.' '.$type);

            $reqAosInsertActif = $bdd->prepare("UPDATE utilisateurs SET actiffqdn = 1 WHERE idUtilisateur = ?");
            $reqAosInsertActif->execute(array($_SESSION['idUtilisateur']));

            $reqAosFqdn = $bdd->prepare("SELECT * FROM utilisateurs WHERE idUtilisateur = ?");
            $reqAosFqdn->execute(array($_SESSION['idUtilisateur']));
            $resultatReqAosFqdn = $reqAosFqdn->fetch();
            
            $messConfirmEnregistrement = "Votre fqdn à bien été ajouter !";
        } else {
            $messErreurEnregistrement = "Ce fqdn existe déjà !";
        }
    }
    //Suppression de son fqdn pour aos
    if(isset($_POST['supprimerAos'])){
        $reqAosSelectUtil = $bdd->prepare("SELECT * FROM utilisateurs WHERE idUtilisateur = ?");
        $reqAosSelectUtil->execute(array($_SESSION['idUtilisateur']));
        $resultatAosSelectUtil = $reqAosSelectUtil->fetch();
        
        $fqdn = $resultatAosSelectUtil['fqdn'];
        $fqdnDev = $resultatAosSelectUtil['fqdnDev'];
        $type = "fqdn";
        $domaine = "aos.itinet.fr";
        $resultatExplodefqdn = explode('.'.$domaine, $fqdn);
        $resultatExplodeFqdnDev = explode('.'.$domaine, $fqdnDev);
        $fqdnFinal = $resultatExplodefqdn[0];
        $fqdnDevFinal = $resultatExplodeFqdnDev[0];

        $reqAosInsert = $bdd->prepare("UPDATE utilisateurs SET fqdn = NULL WHERE idUtilisateur = ?");
        $reqAosInsert->execute(array($_SESSION['idUtilisateur']));
        $output = shell_exec('sudo bash /var/www/aos/script/delzone.sh '.$fqdnFinal.' '.$domaine.' '.$type);

        $reqAosInsert = $bdd->prepare("UPDATE utilisateurs SET fqdnDev = NULL WHERE idUtilisateur = ?");
        $reqAosInsert->execute(array($_SESSION['idUtilisateur']));
        $output = shell_exec('sudo bash /var/www/aos/script/delzone.sh '.$fqdnDevFinal.' '.$domaine.' '.$type);

        $reqAosInsertActif = $bdd->prepare("UPDATE utilisateurs SET actiffqdn = 0 WHERE idUtilisateur = ?");
        $reqAosInsertActif->execute(array($_SESSION['idUtilisateur']));
        $messConfirmEnregistrement = "Votre fqdn à bien été supprimer !";

        $reqAosFqdn = $bdd->prepare("SELECT * FROM utilisateurs WHERE idUtilisateur = ?");
        $reqAosFqdn->execute(array($_SESSION['idUtilisateur']));
        $resultatReqAosFqdn = $reqAosFqdn->fetch();
    } */
    // Récupération des domaines de l'utilisateur
    $recupDomaine = $bdd->prepare('SELECT * FROM utilisateurs INNER JOIN domaines ON utilisateurs.idUtilisateur = domaines.idUtilisateur WHERE utilisateurs.idUtilisateur = ?');
    $recupDomaine->execute(array($_SESSION['idUtilisateur']));
    while($resultatRecupDomaine = $recupDomaine->fetch()){
        $tabDomaine[] = $resultatRecupDomaine['domaine'];
    }
    $resultatRecupeDomaineAff = $recupDomaine->fetch();
    // Récupération des enregistrements de l'utilisateur
    $recupEnregistrement = $bdd->prepare('SELECT * FROM utilisateurs INNER JOIN domaines ON utilisateurs.idUtilisateur = domaines.idUtilisateur INNER JOIN enregistrements ON domaines.idDomaine = enregistrements.idDomaine WHERE utilisateurs.idUtilisateur = ?');
    $recupEnregistrement->execute(array($_SESSION['idUtilisateur']));
    while($resultatRecupEnregistrement = $recupEnregistrement->fetch()){
        $tabEnregistrement[] = $resultatRecupEnregistrement['nomEnreg'];
        $tabDomaineEnreg[] = $resultatRecupEnregistrement['domaine'];
        $tabType[] = $resultatRecupEnregistrement['typeEnreg'];
        $tabAdresseIp[] = $resultatRecupEnregistrement['adresseIp'];
    }
    
    //Affichage Domaine
    $nbDomaineEnreg = count($tabDomaineEnreg);
    for($domaineEnreg=0; $domaineEnreg<$nbDomaineEnreg; $domaineEnreg++){
        echo $tabDomaineEnreg[$domaineEnreg].'/';
        $explosionDomaineEnreg = explode('/', $tabDomaineEnreg);
    }

    //Affichage Type
    $nbType = count($tabType);
    for($type=0; $type<$nbType; $type++){
        echo $tabType[$type].'/';
        $explosionType = explode('/', $tabType);
    }
    //Affichage Adresse Ip
    $nbAdresseIp = count($tabAdresseIp);
    for($z=0; $z<$nbAdresseIp; $z++){
        echo $tabAdresseIp[$z].'/';
        $explosionAdresseIp = explode('.', $tabAdresseIp);
    }

    $recupEnregistrementAos = $bdd->prepare('SELECT * FROM utilisateurs WHERE idUtilisateur = ?');
    $recupEnregistrementAos->execute(array($_SESSION['idUtilisateur']));
    $resultatSelectEnreg = $recupEnregistrementAos->fetch();

    
?>