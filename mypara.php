<?php
    $mypara = array("a"=>"allivate","b"=>"biss");
    array_push($mypara,"cap");
    $mypara["c"] = "copy";
    print_r($mypara);
    echo "<br>";

    array_shift($mypara);
    print_r($mypara);

