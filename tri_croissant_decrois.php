<?php

$t = array( 4,10,52,2,3,6,12,1);    // le tableau est une variable globale
$nbre_chercher=7;
//echo count($t);

affichage_croissant();
affichage_decroissant();

//****************FONCTION PARTIONNANT SELON L'ODRE CROISSANT*********//
function partition_croissante($debut, $fin) {
    global $t;
    $valeur_pivot = $t[$debut];
    $d = $debut + 1;
    $f = $fin;
    while ($d < $f) {
        while ($d < $f && $t[$f] >= $valeur_pivot) $f--;
        while ($d < $f && $t[$d] <= $valeur_pivot) $d++;
        $temp = $t[$d];
        $t[$d] = $t[$f];
        $t[$f] = $temp;
    }
    if ($t[$d] > $valeur_pivot) $d--;
    $t[$debut] = $t[$d];
    $t[$d] = $valeur_pivot;
    return $d;
}

//****************FONCTION PARTIONNANT SELON L'ODRE CROISSANT*********//
function partition_decroisante($debut, $fin) {
    global $t;
    $valeur_pivot = $t[$debut];
    $d = $debut + 1;
    $f = $fin;
    while ($d < $f) {
        while ($d < $f && $t[$f] <= $valeur_pivot) $f--;
        while ($d < $f && $t[$d] >= $valeur_pivot) $d++;
        $temp = $t[$d];
        $t[$d] = $t[$f];
        $t[$f] = $temp;
    }
    if ($t[$d] < $valeur_pivot) $d--;
    $t[$debut] = $t[$d];
    $t[$d] = $valeur_pivot;
    return $d;
}


//****************FONCTION EFFECTUANT LE TRI CROISSANT********************//
function executer_tri_rapide_croisant($debut, $fin) {
  global $t;

    if ($debut < $fin) {
        $indice_pivot = partition_croissante($debut, $fin);
        executer_tri_rapide_croisant($debut, $indice_pivot - 1);
        executer_tri_rapide_croisant($indice_pivot + 1, $fin);
    }
  }

//****************FONCTION EFFECTUANT LE TRI DECROISSANT********************//
    function executer_tri_rapide_decroisant ($debut, $fin) {
      global $t;
        if ($debut < $fin) {
            $indice_pivot = partition_decroisante($debut, $fin);
            executer_tri_rapide_decroisant($debut, $indice_pivot - 1);
            executer_tri_rapide_decroisant($indice_pivot + 1, $fin);
        }

}


//*****************AFFICHAGE PAR ODRE CROISSANT**************//
function affichage_croissant(){
  global $t;
  executer_tri_rapide_croisant(0,count($t)-1);
  echo 'LE TRABLEAU TRIE PAR ORDRE CROISSANT <br>';
  echo"<pre>";
  print_r($t);
  echo"</pre>";
}

//*****************AFFICHAGE PAR ODRE DECROISSANT**************//
function affichage_decroissant(){
  global $t;
  executer_tri_rapide_decroisant(0,count($t)-1);
  echo 'LE TRABLEAU TRIE PAR ORDRE DECROISSANT <br>';
  echo"<pre>";
  print_r($t);
  echo"</pre>";
}


?>
