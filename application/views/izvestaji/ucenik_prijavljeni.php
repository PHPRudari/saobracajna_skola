<?php


$ispiti=$_SESSION['prijava_ucenik'];

foreach ($ispiti as $red) {
    echo $red['naziv_predmet']." ".$red['ime']." ".$red['prezime']."<br>";
}


?>

