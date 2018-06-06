
<style>body { font-family: DejaVu Sans }</style>
<?php

//var_dump($_SESSION);



echo '<h4> Predmet  Učenik</h4><br><br>';
$i=1;

foreach ($_SESSION['prijavljeni'] as $row) {
    
    echo $i.".".$row['naziv_predmet'].' '.$row['ime'].' '.$row['prezime'].'<br>';
    $i++;
            
}
    

?>