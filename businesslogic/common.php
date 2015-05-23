<?php
/**
 * Created by PhpStorm.
 * User: gaoyang
 * Date: 15/5/21
 * Time: 下午9:42
 */

namespace bl;

function p($array){
    foreach($array as $v){
        print_r($v);
        echo '<br>';
    }
}