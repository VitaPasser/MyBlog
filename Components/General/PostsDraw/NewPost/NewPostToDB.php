<?php

if (isset($_POST['post_upload'])) {
    include_once '../configuration.php';

    $filename = $_FILES["img"]["name"];
    $tempname = $_FILES["img"]["tmp_name"];
    $folder = "../Components/General/PostsDraw/Source/posts_img/" . $filename;

    $connection = new mysqli($MySQL['server_name'], $MySQL['username'], $MySQL['password'], $MySQL['db_name']);

    if ($connection->connect_error) {
        die("Data base: Connection failed:" . $connection->connect_error);
    }
    // echo "Connected successfully";

    $sql = "INSERT INTO imgs(name) VALUES ('$filename');";

    echo "<p>";
    if ($connection->query($sql) === true && move_uploaded_file($tempname, $folder)) {
        echo "New record img created successfully";
    } else {
        echo "Error: <br>" . $connection->error;
    }
    echo "</p>";

    $img_id = $connection->insert_id;

    $description = mb_strimwidth($_POST['text'], 0, 296, '...');

    $sql = "INSERT INTO post(name, img_id, description, text) VALUES ('" .
        $_POST['name'] . "', '" . $img_id . "', '" . $description . "', '" . $_POST['text'] . "');";

    echo "<p>";
    if ($connection->query($sql) === true) {
        echo "New record all post created successfully";
    } else {
        echo "Error: <br>" . $connection->error;
    }
    echo "</p>";

    $connection->close();

    echo "<p><a href='../index.php' >На головну</a></p>";
}
