
<style>body { font-family: DejaVu Sans }</style>
<?php

//var_dump($_SESSION['prijavljeni']);

echo '<h4>Датум полагања  Predmet  Učenik</h4><br><br>';
foreach ($_SESSION['prijavljeni'] as $row) {
    
    echo 'Datum:'.$row['datum_prijave'].' '.$row['predmet_idpredmet'].' '.$row['ucenik_jedinstveni_broj_ucenik'].'<br>';
            
}
    

?>