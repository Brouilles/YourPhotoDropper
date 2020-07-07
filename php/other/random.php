<?php
/******************************************************************************/
/*                                                                            */
/*                       __        ____                                       */
/*                 ___  / /  ___  / __/__  __ _____________ ___               */
/*                / _ \/ _ \/ _ \_\ \/ _ \/ // / __/ __/ -_|_-<               */
/*               / .__/_//_/ .__/___/\___/\_,_/_/  \__/\__/___/               */
/*              /_/       /_/                                                 */
/*                                                                            */
/*                                                                            */
/******************************************************************************/
/*                                                                            */
/* Titre          : Générer une chaine de caractère unique et aléatoire       */
/*                                                                            */
/* URL            : http://www.phpsources.org/scripts87-PHP.htm               */
/* Auteur         : PHP Sources                                               */
/* Date édition   : 04 Nov 2004                                               */
/*                                                                            */
/******************************************************************************/
/* Modifier par Aubega / Brouilles                                             */
/******************************************************************************/

//Générer une chaine de caractère unique et aléatoire

function random($car) {
$string = "";
$chaine = "abcd123456lmnpqrstte";
srand((double)microtime()*1000000);
for($i=0; $i<$car; $i++) {
$string .= $chaine[rand()%strlen($chaine)];
}
return $string;
}

// APPEL
// Génère une chaine de longueur 20
$chaine = random(20);
return $chaine;
?>