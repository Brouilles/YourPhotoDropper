<?php include("other/random.php");
 require("php/other/imgClass.php");
 ?>
<?php

                        $dossier = 'images/';
                        $fichier = basename($_FILES['avatar']['name']);

                        $taille_maxi = 7340032;
                        $taille = filesize($_FILES['avatar']['tmp_name']);

                        $extensions = array('.png', '.gif', '.jpg', '.bmp', '.PNG', '.GIF', '.JPG', ".BMP");
                        $extension = strrchr($_FILES['avatar']['name'], '.'); 

                        //Début des vérifications de sécurité...
                        if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
                        {
                             $erreur = ' <br/>Formats autorisés: png, gif, jpg, bmp | Taille max: 7 Mo';
                        }
                        if($taille>$taille_maxi)
                        {
                             $erreur = 'Le fichier est trop gros...';
                        }
                        if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
                        {
                        ?>
                            <div id="progressBarBox" class="progress progress-striped active" style="margin-bottom: 0px; margin-top: 10px;">
                              <div id="progressBar" class="progress-bar"  role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 1%">
                              </div>
                            </div>
                        <?php
                             //On formate le nom du fichier ici...
                             $fichier = strtr($fichier, 
                                  'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
                                  'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                             $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

                            ?>
                                <script>
                                    $("#progressBar").css("width", "25%").sleep(1000);
                                </script>
                            <?php

                             $id = 0;
                             $reply = $bdd->query('SELECT * FROM yourphotodropper');
                             while($data = $reply->fetch())
                                {
                                    $id = $data['id'] + 1;
                                }
                              $reply->closeCursor();

                              $fichier = ''.$id.''.$fichier.'';

                               ?>
                                <script>
                                    $("#progressBar").css("width", "40%");
                                </script>
                            <?php
                                
                             if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
                             {
                                  ?>
                                    <script>
                                        $("#progressBar").css("width", "100%");
                                    </script>
                                <?php
                                
                                  echo '<br/>Upload effectué avec succès ! <br/>';

                                  $hote = $_SERVER['HTTP_HOST'];

                                  //Miniature
                                  $imgName = substr($fichier,0,-4);
                                  Img::creerMin($dossier . $fichier, "images/miniature/", $fichier, 107, 65);
                                  echo '<img src="http://www.yourphotodropper.aubega.com/images/miniature/'.$imgName.'.jpg"> <br/>';

                                  echo '<a href="http://www.yourphotodropper.aubega.com/images/'.$fichier.'">';
                                  echo $fichier;
                                  echo '</a> <br/>';
                                  
                                    echo '<label for="">Lien direct:</label>';
                                    echo '<input class="form-control" type="text"  size="30" maxlength="10" readonly="" value="http://www.yourphotodropper.aubega.com/images/'.$fichier.'" /> <br/>';                                   

                                    echo '<label for="">Miniature:</label>';
                                    echo '<input class="form-control" type="text"  size="30" maxlength="10" readonly="" value="http://www.yourphotodropper.aubega.com/images/miniature/'.$imgName.'.jpg" /> <br/>';

                                    echo '<label for="">Miniature avec lien BBCode:</label>';
                                    echo '<input class="form-control" type="text"  size="30" maxlength="10" readonly="" value="[url=http://www.yourphotodropper.aubega.com/images/'.$fichier.'][img]http://www.yourphotodropper.aubega.com/images/miniature/'.$imgName.'.jpg[/img][/url]" /><br/>';

                                    echo '<label for="">Intégration en BBCode</label>';
                                    echo '<input class="form-control" type="text" size="30" maxlength="10" readonly="" value="[img]http://www.yourphotodropper.aubega.com/images/'.$fichier.'[/img]" />';

                                    $url = "http://www.yourphotodropper.aubega.com/images/".$fichier;
                                    $date = new Datetime('now', new DateTimeZone('Europe/Paris'));
                                    $ip = getIP();

                                       $req = $bdd->prepare('INSERT INTO yourphotodropper(url, urlMini, Ip, created) VALUES(:url, :urlMini , :Ip, :created)');
                                         $req->execute(array(
	                                        'url' => $url,
                                            'urlMini' => 'http://www.yourphotodropper.aubega.com/images/miniature/'.$imgName.'.jpg"', 
                                            'Ip' => $ip,
                                            'created' => $date->format('Y-m-d H:i:s'),
	                                    ));
                                       $req->closeCursor();
                             }
                             else //Sinon (la fonction renvoie FALSE).
                             {
                                  echo 'Echec de l\'upload !';
                             }
                        }
                        else
                        {
                             echo $erreur;
                        }
                    ?>  