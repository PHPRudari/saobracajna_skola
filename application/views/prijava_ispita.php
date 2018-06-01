
<div class="form-group row pretraga">

       
    <div class="row col-md-12">
        
    <label for="search_data" class="col-2 col-form-label"> <br>Претрага: </label>
    <div class="col-10">  <br>
        <input class="form-control col-10" name="search_data" id="search_data" type="text" onkeyup="ajaxSearchUcenik();">
        <div id="suggestions">
            <div id="autoSuggestionsList"></div>
        </div>
    </div>
    </div>
</div>




<script>
function ajaxSearchUcenik()
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
                url: "<?php echo base_url(); ?>index.php/<?php echo $controller; ?>/trazi_ucenika//",
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