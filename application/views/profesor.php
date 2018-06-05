
<?php echo form_open($controller . '/trazi'); ?>

<div class="form-group row pretraga">
    <h3>Унос и претрага професора</h3>
    <div class="row col-md-12">
        <label for="search_data" class=" pretraga1  col-2 col-form-label"> Претрага: </label>
        <div class="col-10">  
            <br><input class="form-control col-10" name="search_data" id="search_data" type="text" onkeyup="ajaxSearchProf();">
            <div id="suggestions">
                <div id="autoSuggestionsList"></div>
            </div>
        </div>
    </div>
    <div>
        <?php
        $poruka = $this->session->userdata('poruka');
        $poruka1 = $this->session->userdata('poruka1');
        echo '<h6 style="color:red">'.$poruka."</h6>";
        echo '<h6 style="color:red">'.$poruka1."</h6>";
        ?>
    </div>
</div>
</form>
 <!-- <input type="submit" value="Тражи"> -->


<div class="row">

    <div class="col-md-6 ">



        <?php echo form_open($controller . '/unesi_profesora'); ?>


<!--<a href="<?//php echo site_url($controller."/unesi_profesora/".$idprofesor); ?>"
                               onclick="return confirm('Da li ste sigurni da zelite da izmenite profesora?' );">Izmeni</a><br>-->



        <div class="form-group row form-inline">
            <label class="col-form-label col-4 " for="ime">Име:</label>
            <input type="text" class="form-control " name="ime" placeholder="Унеси име" value="<?php echo set_value("ime"); ?>"><?php echo form_error("ime", '<span style="color:red">', '</span>'); ?><br>
        </div>


        <div class="form-group row form-inline">
            <label class="col-4 col-form-label" for="prezime"> Презиме:</label>
            <input type="text" class="form-control" name="prezime" placeholder="Унеси презиме" value="<?php echo set_value("prezime"); ?>"><?php echo form_error("prezime", '<span style="color:red">', '</span>'); ?><br>
        </div>   


        <div class="form-group row form-inline">
            <label class="col-4 col-form-label" for="adresa"> Адреса:</label>
            <input type="text" class="form-control" name="adresa"  placeholder="Унеси адресу" value="<?php echo set_value("adresa"); ?>"><?php echo form_error("adresa", '<span style="color:red">', '</span>'); ?><br>
        </div>   


        <div class="form-group row form-inline">
            <label class="col-4 col-form-label" for="broj_telefon"> Број телефона:</label>
            <input type="text" class="form-control" name="broj_telefon"  placeholder="Унеси телефон" value="<?php echo set_value("broj_telefon"); ?>"><?php echo form_error("broj_telefon", '<span style="color:red">', '</span>'); ?><br>
        </div>   


        <div class="form-group row form-inline">
            <label class="col-4 col-form-label" for="e-mail">Е-пошта:</label>
            <input type="text" class="form-control" name="e-mail"  placeholder="Унеси е-маил" value="<?php echo set_value("e-mail"); ?>"><?php echo form_error("e-mail", '<span style="color:red">', '</span>'); ?><br>
        </div>   



        <div class="form-group row form-inline">

            <label class="col-4 col-form-label" for="status">Статус:</label>
            <select name="status"class="form-control">
                <option selected hidden ><?php
                    if (!isset($_POST['status'])) {
                        echo 'Статус';
                    } else
                        echo set_value("status");
                    ?></option>
                <option value="Асистент">Асистент</option>
                <option value="Доцент">Доцент</option>
                <option value="Ванредни професор">Ванредни професор</option>
                <option value="Редовни професор">Редовни професор</option>     
            </select><br>
        </div>
        <br>
        <div class="form-group row form-inline">
            &nbsp&nbsp&nbsp
            <input type="radio" name="angazovan" value="1" checked>Редован &nbsp&nbsp  
            <input type="radio" name="angazovan" value="2" >Ангажован <br>
        </div>
    </div>

    <div class="col-md-6 ">

        <br>
        <a class="dugme3 btn btn-primary btn-lg btn-block" href="<?php echo site_url($controller . "/ubij_sesiju/"); ?>">Освежи страну</a><br>
        <input class="dugme2 btn btn-primary btn-lg btn-block" type="submit" name="dodaj" value="Сачувај"><br>   

    </div>
</div>


<div class="row">

    <div class="col-md-6 ">
        

        <h6>Изабери предмете:</h6><br>
        <div class="predmeti" style="overflow-y: scroll; height: 200px; width: 95%;">
            <?php
            foreach ($predmet as $row) {
                echo '<input type="checkbox" value="' . $row['idpredmet'] . '" name="predmet[]">' . $row['naziv_predmet'] . "<br>";
            }
            ?>
        </div>
    </div>


 

        <!-- <a href="<//?php echo site_url("admin/index")?>">Врати се назад</a>-->

        <div class="col-md-6 ">    
            <h6>Предмети на којима је ангажован професор:</h6><br>
        <div class="predmeti" style="overflow-y: scroll; height: 200px; width: 95%;">


       
    
        <?php
        if ($predmeti > 0) {

            foreach ($predmeti as $row) {
                echo $row['idpredmet'] . "&nbsp&nbsp";
                echo $row['naziv_predmet'] . "&nbsp&nbsp";
                ?>
                <a href="<?php echo site_url($controller . "/obrisi_predmet/" . $row['idpredmet']); ?>"
                   onclick="return confirm('Да ли сте сигурни да желите да обришете предмет?');">Obriši</a><br>
                   <?php
               }
           }
           ?>


        </form>
    </div>
</div>
</div>



<script type="text/javascript" >



    function ajaxSearchProf()
    {
        var input_data = $('#search_data').val();
        if (input_data.length === 0)
        {
            $('#suggestions').hide();
        } else
        {
            var post_data = {
                'search_data': input_data,
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
            };
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/<?php echo $controller ?>/trazi_profesora/",
                data: post_data,
                success: function (data) {
                    //return success
                    if (data.length > 0) {
                        $('#suggestions').show();
                        $('#autoSuggestionsList').addClass('auto_list');
                        $('#autoSuggestionsList').html(data);
                    }
                }
            });
        }
    }
</script>