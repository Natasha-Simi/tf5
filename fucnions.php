<?php
    session_start();
    $conn = new mysqli('localhost', 'root', '', 'Wanachama') or die ('cannot connect to db');

    //SET DATA
    function setData($sql){
        if(mysqli_query($conn, $sql)){
            echo "Data Insert";
        }
        else{
            echo "Insertation Error".mysqli_error($sql);
        }
    }

    function getData($sql){
        $conn = connection();
        $result=mysqli_query($conn, $sql);

        return $result;
    }

        // return user array from their id
    function getUserById($id){
        global $db;
        $query = "SELECT * FROM user WHERE id=" . $id;
        $result = mysqli_query($db, $query);

        $user = mysqli_fetch_assoc($result);
        return $user;
    }

    // escape string
    function e($val){
        global $db;
        return mysqli_real_escape_string($db, trim($val));
    }

    function display_error() {
        global $errors;

        if (count($errors) > 0){
            echo '<div class="error">';
                foreach ($errors as $error){
                    echo $error .'<br>';
                }
            echo '</div>';
        }
    }
?>