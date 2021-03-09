<?php
    
    function connect(){
    $conn = new mysqli('localhost', 'root', '', 'centum') or die ('cannot connect to db');
    return $conn;
    }
?>