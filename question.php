<?php


/*

Logic for below code
	1
	12
	123
	1234
	12345


*/


function displayNumbers($arr){

        for ($i=0; $i < count($arr) ; $i++) { 
            $j=0;
            while($j<count($arr) && $j <= $i){
                echo $arr[$j];
                $j++;
            }
            echo "\n";           
        }

}

displayNumbers([1,2,3,4,5]);

?>