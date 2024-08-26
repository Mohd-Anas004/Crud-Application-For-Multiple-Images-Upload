<?php include 'header.php';  ?>

<body>

    <div class="container form-container">
        <h1 class="form-title">Enter Your Details</h1>
        <form action="insert.php" method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="name">Name:</label>
                <input class="form-control" type="text" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="phone">Phone Number:</label>
                <input type="tel" class="form-control" id="phone" name="number" required>
            </div>
            <div class="mb-3">
                <label for="files">Upload Files:</label>
                <input type="file" class="form-control" accept="image/*" name="files[]" onchange="loadFile(event)" multiple>
                <img height="100px" width="80px" id="files" alt="img">
            </div>
            <div class="mb-3">
                <label for="checkboxes">Select your hobbies:</label><br>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="hobby1" name="hobbies[]" value="reading">
                    <label class="form-check-label" for="hobby1">Reading</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="hobby2" name="hobbies[]" value="traveling">
                    <label class="form-check-label" for="hobby2">Traveling</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="hobby3" name="hobbies[]" value="sports">
                    <label class="form-check-label" for="hobby3">Sports</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="gender">Gender:</label><br>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="male" name="gender" value="male">
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="female" name="gender" value="female">
                    <label class="form-check-label" for="female">Female</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="other" name="gender" value="other">
                    <label class="form-check-label" for="other">Other</label>
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('files');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
</body>

</html>