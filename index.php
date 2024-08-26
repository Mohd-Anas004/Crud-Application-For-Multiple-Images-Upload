<?php include 'header.php';
include 'conn.php';
?>
<div class="add">
    <a href="create.php" class="btn btn-primary btn:hover">Insert</a>
</div>

<table class="table table-hover">
    <thead>
        <tr>

            <th scope="col">USERID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Number</th>
            <th scope="col">Hobbies</th>
            <th scope="col">Gender</th>
            <th scope="col">Images</th>
        </tr>
    </thead>
    <tbody>

        <?php $sql = "SELECT user.id, user.name, userdetails.user_id, userdetails.email, userdetails.number, userdetails.hobbies, userdetails.gender,  userface.user_id, userface.images
FROM user 
INNER JOIN userdetails ON user.id = userdetails.user_id
INNER JOIN userface ON user.id = userface.user_id ORDER BY id DESC ";



        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) { ?>


            <tr>

                <td><?php echo $row['user_id']; ?> </td>
                <td><?php echo $row['name']; ?> </td>
                <td><?php echo $row['email']; ?> </td>
                <td><?php echo $row['number']; ?> </td>
                <td><?php echo $row['hobbies']; ?> </td>
                <td><?php echo $row['gender']; ?> </td>
                <td><?php
                    $images = explode(",", $row['images']);
                    // echo "<pre>";
                    // var_dump($images);
                    // die();

                    foreach ($images as $image) {
                        // print_r($image);
                        // die();
                        echo '<img src="images/' . $image . '" height="120px" width="90px" alt="Image">';
                    }
                    ?>
                </td>
                <td>
                    <button><a href="edit.php?id=<?= $row['user_id']; ?>" class="btn btn-danger btn:hover">Edit</a></button>
                </td>

                <td>
                    <button><a href="delete.php?id=<?= $row['user_id']; ?>" class="btn btn-danger btn:hover">Delete</a></button>
                </td>

            </tr>


        <?php  } ?>










    </tbody>
</table>