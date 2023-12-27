<?php

include('upload.php');

if (isset($_POST['uploadFile'])) {

    $file_name = $_FILES['file']['name'];
    $tempname = $_FILES['file']['tmp_name'];
    $folder = "image/" . $file_name;

    $query = mysqli_query($conn, "INSERT INTO users (image) VALUES ('$file_name')");

    if (move_uploaded_file($tempname, $folder)) {
        echo "<h2>File successfully uploaded</h2>";
    } else {
        echo "<h2>File not uploaded</h2>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload file</title>
</head>

<body>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="file">
        <br>
        <br>
        <input name="uploadFile" type="submit" value="Send">
    </form>

    <div class="" style="width: 100%;">
        <?php
        $res = mysqli_query($conn, "SELECT * FROM users");
        while ($row = mysqli_fetch_assoc($res)) {
        ?>
            <img style="width: 19% ;height: 25%;
            " src="image/<?php echo $row['image'] ?>" alt="">

        <?php } ?>
    </div>
</body>

</html>