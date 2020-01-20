<?php

function limitWord($string, $limit){
    $words = explode(" ",$string);
    if ($limit < count($words)){
        $output = implode(" ",array_splice($words,0,$limit)) . ' ...';
        return $output;
    }else{
        return $string;
    }
}

?>
