<?php
$array = array_count_values(explode(' ',strtolower(str_replace([',','.','?','!',';'], '',$argv[1]))));
arsort($array);
print_r($array)

?>