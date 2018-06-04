<?php
if (isset($error))
    echo $error;

if (!isset($_SESSION['ucenik']['iducenik'])) {
    $this->session->set_flashdata('info', 'Нисте одабрали ученика!');  
    redirect(site_url("/$this->controller/ucenik"));
}
?>


<div class="row">
    <div class="col-md-12">
        
        <br><h4>Izabran je učenik: <?php echo $_SESSION['ucenik']['ime']." ".$_SESSION['ucenik']['prezime']."&nbsp;&nbsp;&nbsp;&nbsp; Broj učenika ".$_SESSION['ucenik']['jedinstveni_broj_ucenik']?></h4>
      
    </div>
</div><br>
<div class="row">
    Izaberite rok:
    <select name="rok">
        <?php
                    foreach ($_SESSION['rok'] as $row) {
                        echo '<option value="' . $row['idtip_roka'] . '">';
                        echo $row['naziv'];
                        echo '</option>';
                    }
                    ?> 
        
    </select>
</div>