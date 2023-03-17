<?php

$x=12;

for( $b=0 ; $b<$x/2 ; $b++){
    for($a=0 ; $a < 6 ; $a++)
       print_r(" ");
    for($c=0 ; $c< (2*$b+1) ; $c++)
      echo "*";
    echo '<br>';
  }