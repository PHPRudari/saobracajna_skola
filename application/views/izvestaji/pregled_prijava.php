

<div class="row">
    <div class="col-md-6">
        <h4> Сприсак пријављених испита за <?php
            foreach ($_SESSION['rok'] as $rok) {
                if ($rok['idtip_roka'] == $_POST['rok_prijave']) {

                    echo $rok['naziv'];
                }
            }
            ?>  рок </h4>
    </div>
    <div class="col-md-6"> 
        <a class="dugme2" href="<?php echo site_url($controller . "/stampa/stampa_prijava") ?>">Штампај пријављене испите</a><br>
    </div>
</div>    
<?php
//var_dump($_SESSION['rok']);
//var_dump($_SESSION['pregled_prijava']);



echo "<table class='table table-striped table-hover'>";
echo "<tr>";
echo "<th>Učenik:</th>";
echo "<th>Prezime </th>";
echo "<th>Ime </th>";
echo "<th>Naziv predmeta</th>";
echo "<th>Godina</th>";
echo "</tr>";
$i = 1;

if ($_SESSION['pregled_prijava'] == NULL) {
    echo '<td>Nema prijavljenih ispita u ovom roku</td>';
} else
    foreach ($_SESSION['pregled_prijava'] as $row) {

        echo "<tr>";
        echo "<td>" . $row['jedinstveni_broj_ucenik'] . "</td>";
        echo "<td>" . $row['prezime'] . "</td>";
        echo "<td>" . $row['ime'] . "</td>";
        echo "<td>" . $row['naziv_predmet'] . "</td>";
        echo "<td>" . $row['godina_obrazovanja_idgodina_obrazovanja'] . "</td>";













        /*   foreach ($_SESSION['rok'] as $rok) {
          if ($rok['idtip_roka']==$row['rok_idtip_roka']) {

          // echo " ".$rok['naziv'];

          echo '<br>';
          $i++;
          }
          } */
    }
?>

