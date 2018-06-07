<?php



foreach ($_SESSION['priznati'] as $row ) {
    echo $row['predmet_idpredmet']." ".$row['ucenik_iducenik']."<br>";
    echo "Dodaj brisanje";
}
