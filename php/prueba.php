<?php
 $colaboraciones = array();
for($i=1; $i <= 6; $i++){
    $colaboraciones["responsabilidad$i"]="responsabilidad$i";
    $colaboraciones["colaboracion$i"]="colaboracion$i";
}


for($i=1; $i <= 6; $i++){
    echo $colaboraciones["responsabilidad$i"]."<br>";
    echo $colaboraciones["colaboracion$i"]."<br>";
        
}

/*foreach($colaboraciones as $key => $i){
    echo $key ."->". $i . "<br>";
}*/

echo "<br>".$colaboraciones['responsabilidad1']."<br>";
echo "<br>".$colaboraciones['colaboracion6']."<br>";

?>