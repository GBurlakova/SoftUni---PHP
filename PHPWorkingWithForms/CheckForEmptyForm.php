<?php
    function isEmptyForm($input_arr){
        foreach($input_arr as $k => $v){
            if($v == '' && $k != 'submitted'){
                return true;
            }
        }
    }
?>