<?php

include 'conn.php';
if (isset($_POST['submit'])) {
    // $id = $_POST['id'];
    $userid = $_POST['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];

    $filecount = count($_FILES['files']['name']);
    $new_name = array();

    for ($i = 0; $i < $filecount; $i++) {
        $filename = $_FILES['files']['name'][$i];

        $new_name[] = $filename;
        $path = "images/" . $filename;
        move_uploaded_file($_FILES['files']['tmp_name'][$i], $path);
    }


    // echo "hello";
    // echo "<pre>";
    // var_dump($_FILES);
    // die();

    $hobbies = $_POST['hobbies'];
    $hobbies_str = implode(', ', $hobbies);

    $gender = $_POST['gender'];
}









$sql1 = "INSERT INTO user (name) VALUES( '$name')";
$result1 = mysqli_query($conn, $sql1);
$userid = $conn->insert_id;
$sql2 = "INSERT INTO userdetails (user_id,email , number , hobbies , gender) VALUES('$userid' , '$email','$number','$hobbies_str','$gender')";
$result2 = mysqli_query($conn, $sql2);


$allImages = implode(", ", $new_name);

$sql3 = "INSERT INTO userface (user_id, images) VALUES ('{$userid}','{$allImages}' )";
$result3 = mysqli_query($conn, $sql3);

header('location: index.php');
