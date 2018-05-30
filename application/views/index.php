<?php

 $name= $this->session->userdata('ime');
 $tip=$this->session->userdata('tip');
 echo "<b>Добро дошли на страну за ванредне ђаке Саобраћајно-техничке школе у Земуну! </b>"."<br><br><br>";
 echo "Улогован је корисник ".$name;
echo "<br>".$tip;