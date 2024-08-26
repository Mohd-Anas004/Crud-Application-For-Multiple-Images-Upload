<?php include 'header.php';
include 'conn.php';

$id = $_GET['id'];


$sql = "SELECT * FROM user WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$row1 = mysqli_fetch_assoc($result);

$sql2 = "SELECT * FROM userdetails WHERE user_id = '$id'";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);

$sql3 = "SELECT * FROM userface WHERE user_id = '$id'";
$result3 = mysqli_query($conn, $sql3);
$row3 = mysqli_fetch_assoc($result3);


?>

<body>

    <div class="container form-container">
        <h1 class="form-title">Enter Your Details</h1>
        <form action="update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="mb-3">
                <label for="name">Name:</label>
                <input class="form-control" type="text" id="name" name="name" value="<?php echo $row1['name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row2['email']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="phone">Phone Number:</label>
                <input type="tel" class="form-control" id="phone" name="number" value="<?php echo $row2['number']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="files">Upload Files:</label>
                <div class="field" align="left">
                    <input type="file" class="file_input" accept="image/*" id="files" name="files[]" onchange='Test.UpdatePreview(this)' multiple>
                    <img src="<?php echo $row3['images'];  ?>" height="150px" width="90px" alt="">
                </div>
            </div>
            <div class="mb-3">
                <label for="checkboxes">Select your hobbies:</label><br>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="reading" name="hobbies[]" value="reading" <?php if (strpos($row2['hobbies'], 'reading') !== false) echo 'checked' ?>>
                    <label class="form-check-label" for="hobby1">Reading</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="traveling" name="hobbies[]" value="traveling" <?php if (strpos($row2['hobbies'], 'traveling') !== false) echo 'checked' ?>>
                    <label class="form-check-label" for="hobby2">Traveling</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="sports" name="hobbies[]" value="sports" <?php if (strpos($row2['hobbies'], 'sports') !== false) echo 'checked'  ?>>
                    <label class="form-check-label" for="hobby3">Sports</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="gender">Gender:</label><br>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="male" name="gender" value="male" <?php if (strpos($row2['gender'], 'male') !== false) echo 'checked' ?>>
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="female" name="gender" value="female" <?php if (strpos($row2['gender'], 'female') !== false) echo 'checked'  ?>>
                    <label class="form-check-label" for="female">Female</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="other" name="gender" value="other" <?php if (strpos($row2['gender'], 'other') !== false) echo 'checked'  ?>>
                    <label class="form-check-label" for="other">Other</label>
                </div>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- <script>
        $(document).ready(function() {
            if (window.File && window.FileList && window.FileReader) {
                $("#files").on("change", function(e) {
                    var files = e.target.files,
                        filesLength = files.length;
                    for (var i = 0; i < filesLength; i++) {
                        var f = files[i]
                        var fileReader = new FileReader();
                        fileReader.onload = (function(e) {
                            var file = e.target;
                            $("<span class=\"pip\">" +
                                "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                                "<br/><span class=\"remove\">Remove image</span>" +
                                "</span>").insertAfter("#files");
                            $(".remove").click(function() {
                                $(this).parent(".pip").remove();
                            });


                        });
                        fileReader.readAsDataURL(f);
                    }
                });
            } else {
                alert("Your browser doesn't support to File API")
            }
        });
    </script> -->
</body>

</html>