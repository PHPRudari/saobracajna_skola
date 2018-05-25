<?php

 $name= $this->session->userdata('ime');
 $tip=$this->session->userdata('tip');
 echo "Улогован је корисник ".$name;
echo "<br>".$tip;