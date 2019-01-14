<?php
function dichotomie($tab, $valeur, $deb, $fin)
{
   if($deb <= $fin){

        $milieu = (int)($deb+$fin)/2; //on cherche le milieu du tableau
        if($tab[$milieu] == $valeur){
          //return $milieu;
          echo('le nombre '.$valeur.' se trouve a l\'indice <b>'.(int)$milieu.' </b>  du tableau <br/>');
         }

    else if($tab[$milieu] < $valeur){ //si le nombre chercher est inferieur au  mileu du tableu
       return dichotomie($tab, $valeur, $milieu+1, $fin);
     }
    else if($tab[$milieu] > $valeur){ return dichotomie($tab, $valeur, $deb, $milieu-1);
    }
  }
   else{//on se retrouve sur l'indice de la valeur
     echo 'le nombre <b>'.$tab[$deb].'</b> se trouve a l\'indice <b>'.(int)$deb.' </b>  du tableau <br/>';

   }
}

$tableau = array(0,1,2,3,4,5,6,7,8,9);
echo dichotomie($tableau,9,0,9);
 ?>
