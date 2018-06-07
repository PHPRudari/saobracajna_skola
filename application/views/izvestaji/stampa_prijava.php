<style>body { 
        font-size: 12px;
        font-family: DejaVu Sans }
    .tabela {
       padding-right:  40px;
    }
</style>



<div class="row">
    <div class="col-md-8">
        <h4> Списак пријављених испита за <?php
            if (isset($_SESSION['rokk'])) {
                foreach ($_SESSION['rok'] as $rok) {
                    if ($rok['idtip_roka'] == $_SESSION['rokk']) {

                        echo $rok['naziv'];
                    }
                }
            } else {
                echo "";
            }
            ?>  рок <?php
                 if (!isset($_SESSION['dattum'])) 
                    echo " ";
                 else {                 
            
            if (($_SESSION['dattum']) == "Година") {
                echo " ";
            } else {
                
                echo $_SESSION['dattum'];
            }
                 }
            ?>. године </h4>
    </div>
    
</div>    
<?php
//var_dump($_SESSION['rok']);
//var_dump($_SESSION['pregled_prijava']);
?>

<?php
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
        echo "<td class='tabela'>" . $row['jedinstveni_broj_ucenik'] . "</td>";
        echo "<td class='tabela'>" . $row['prezime'] . "</td>";
        echo "<td class='tabela'>" . $row['ime'] . "</td>";
        echo "<td class='tabela'>" . $row['naziv_predmet'] . "</td>";
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