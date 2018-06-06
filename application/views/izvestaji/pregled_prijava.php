<style>body { font-family: DejaVu Sans }</style>
<?php

//var_dump($_SESSION['rok']);
//var_dump($_SESSION['prijavljeni']);



echo '<h4> Predmet  Učenik</h4><br><br>';
$i=1;

if ($_SESSION['pregled_prijava'] == NULL) {
    echo 'Nema prijavljenih ispita u ovom roku';
}

else


foreach ($_SESSION['pregled_prijava'] as $row) {
    
    echo $i.".".$row['naziv_predmet'].' '.$row['ime'].' '.$row['prezime'];
   
       foreach ($_SESSION['rok'] as $rok) {
           if ($rok['idtip_roka']==$row['rok_idtip_roka']) {
                     
           // echo " ".$rok['naziv'];
                      
            echo '<br>';
    $i++;
       }    
}
    
}


?>

