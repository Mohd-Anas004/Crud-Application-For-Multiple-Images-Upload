<?php

include 'conn.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];

    $filecount = count($_FILES['files']['name']);
    $new_name = array();


    $hobbies = $_POST['hobbies'];
    $hobbies_str = implode(',', $hobbies);

    $gender = $_POST['gender'];

    $sql = "SELECT * FROM userface WHERE user_id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    var_dump($row);
    die();

    if ($filecount == "") {
        $filecount = $row['images'];
    } else {


        for ($i = 0; $i < $filecount; $i++) {
            $filename = $_FILES['files']['name'][$i];


            $new_name[] = $filename;
            $path = "images/" . $filename;
            move_uploaded_file($_FILES['files']['tmp_name'][$i], $path);
        }
        $allimages = implode(",", $new_name);
    }




    $sql1 = "UPDATE user SET name = '$name' WHERE id = '$id' ";
    $result = mysqli_query($conn, $sql1);

    $sql2 = "UPDATE userdetails SET email = '$email', number = '$number', hobbies = '$hobbies_str', gender = '$gender' WHERE user_id = '$id' ";
    $result2 = mysqli_query($conn, $sql2);


    // echo "<pre>";
    // var_dump($new_name);
    // die();

    $sql3 = "UPDATE userface SET images = '$allimages' WHERE user_id = '$id' ";
    $result3 = mysqli_query($conn, $sql3);
}
header('location: index.php');
mysqli_close($conn);
