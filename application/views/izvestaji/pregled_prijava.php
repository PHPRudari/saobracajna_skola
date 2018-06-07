
<a  href="<?php echo site_url($controller . "/stampa/stampa_prijava") ?>">Штампај пријављене испите</a>
    <?php

//var_dump($_SESSION['rok']);
//var_dump($_SESSION['prijavljeni']);


?>
<br>
    <h3>Преглед пријава</h3>
<?php
echo '<h4> Predmet  Učenik</h4><br><br>';



echo "<table class='table table-striped table-hover'>";
echo "<tr>";
echo "<th>Učenik:</th>";
echo "<th>Prezime </th>";
echo "<th>Ime </th>";
echo "<th>Naziv predmeta</th>";
echo "<th>Godina</th>";
echo "</tr>";
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

