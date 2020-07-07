<?php include"php/BDD.php" ?>
<?php
function getIP() //Get IP
{
    if ( isset($_SERVER['HTTP_X_FORWARDED_FOR']) )
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else
        $ip = $_SERVER['REMOTE_ADDR'];
                 
    return $ip;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
	<title>YourPhotoDropper</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" lang="fr" content="Hebergeur d'image, H&eacute;bergeur d'images gratuit, image, images,  h&eacute;bergement d'image, h&eacute;bergement photos, hebergeur image, hebergement image, h&eacute;berger gratuit, photos, h&eacute;bergement photo, gratuit, galerie, YourPhotoDropper, yourphotodropper, Votre compte-gouttes de photos, compte-gouttes" />

    <link href="img/YouPhotoDropper_iconx16.ico" rel="shortcut icon" type="image/x-icon"/>
	<link rel="stylesheet" media="screen" type="text/css" href="css/style.css" />
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="cover.css" rel="stylesheet">
</head>
<body>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="include/script/centerContent.js"> </script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  
    <div id="ads">
       <script type="text/javascript" src="//ad.pandad.eu/get-script/531c37ebdba6508e02cbf238/120x600"></script>
    </div>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div id="header" class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand"><img src="img/YouPhotoDropper.png" alt="YourPhotoDropper" style="width: 300px;"></h3>
              <ul class="nav masthead-nav">
                <li class="active"><a href="#">Accueil</a></li>
                <li><a href="http://aubega.com/">Aubega</a></li>
              </ul>
            </div>
          </div>

          <div class="inner cover">
            <form method="POST" action="index.php" enctype="multipart/form-data">
                <input class="btn btn-primary" type="file" name="avatar" style="display: inline;"> <br/><br/>
                <input class="btn btn-primary" type="submit" name="envoyer" value="Envoyer le fichier">
            </form>
           <?php include"php/upload.php";?>
          </div>

          <div class="mastfoot">
            <div class="inner">
              <p>Copyright © 2013 Aubega™</p>
                <p><a href="javascript:open_popup('page/condition.html')">Confidentialité et conditions d'utilisation</a> | <a href="javascript:open_popup('page/FAQ.html')">F.A.Q</a></p>
            </div>

              <SCRIPT language="javascript">
                function open_popup(page) {
                    window.open(page,"Confidentialité et conditions d'utilisation | F.A.Q","menubar=no, status=no, scrollbars=no, menubar=no, width=500, height=600");
                }
            </SCRIPT>
          </div>

        </div>

      </div>

    </div>

</body>
</html>