<?php
$ispiti = $_SESSION['prijava_ucenik'];
//var_dump($ispiti);
?>

<style>body { font-family: DejaVu Sans }</style>

<div class="row">
    <div class="col-md-6">
    <a class="dugme1 btn btn-primary btn-lg btn-block" href="<?php echo site_url($controller . "/stampa/ucenik_stampa") ?>">Штампај пријављене испите</a>
    </div>
    <div class="col-md-6">
     <a class="dugme3 btn btn-primary btn-lg btn-block col-sm-6" href="<?php echo site_url($controller . "/prijava_ispita") ?>">Врати се на пријаву испита</a><br>
    </div>
</div>

<div class="row">

<?php
echo "<table class='table table-striped table-hover'>";
echo "<tr>";
echo "<th>Naziv predmeta</th>";
echo "<th>Godina </th>";
echo "<th>Prijavljeno za rok</th>";
echo "<th></th>";
echo "</tr>";


foreach ($ispiti as $red) {
    echo "<tr>";
    echo "<td>" . $red['naziv_predmet'] . "</td>";
    echo "<td>" . $red['rok_idtip_roka'] . "</td>";
    foreach ($_SESSION['rok'] as $rok) {
        if ($rok['idtip_roka'] == $red['rok_idtip_roka']) {

            echo "<td>" . $rok['naziv'] . "</td>";
        }
    }
    ?> 
    <td><a href="<?php echo site_url($controller . "/obrisi_prijavljeni_ispit/".$red['predmet_idpredmet'] ); ?>"
           onclick="return confirm('Да ли сте сигурни да желите да обришете испит?');">Obriši</a></td>
        <?php
        echo '</tr>';
        
    }


    echo "</table>"
    ?>

</div>
