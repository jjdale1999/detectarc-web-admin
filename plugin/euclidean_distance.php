<?php

function eucDistance(array $c1, array $c2){
   return (
        (($c1[0]-$c2[0])**2)+(($c1[1]-$c2[1])**2)
    )** (1/2);
}

?>