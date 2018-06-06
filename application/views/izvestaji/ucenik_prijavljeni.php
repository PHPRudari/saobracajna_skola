<?php


$ispiti=$_SESSION['prijava_ucenik'];

//var_dump($ispiti);

foreach ($ispiti as $red) {
    echo $red['naziv_predmet']." ".$red['ime']." ".$red['prezime'];
    foreach ($_SESSION['rok'] as $rok) {
           if ($rok['idtip_roka']==$red['rok_idtip_roka']) {
                     
            echo " ".$rok['naziv'];
                      
            echo '<br>';
           }
}
}


?>

