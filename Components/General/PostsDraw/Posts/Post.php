<?php

$id = $_GET['id'];

include_once 'configuration.php';

$connection = new mysqli($MySQL['server_name'], $MySQL['username'], $MySQL['password'], $MySQL['db_name']);

if ($connection->connect_error) {
    die("Data base: Connection failed:" . $connection->connect_error);
}
// echo "Connected successfully";

$sql['post'] = "SELECT * FROM `post` WHERE id = $id;";
$result['post'] = $connection->query($sql['post']);

?>


<div>
    <?php
    if ($result['post']->num_rows > 0) {
        $row = $result['post']->fetch_assoc();
        echo '<div>';
        echo "<h2>" . $row['name'] . "</h2>";

        $sql['imgs'] = "SELECT * FROM `imgs` WHERE id = " . $row['img_id'] . ";";
        $result['imgs'] = $connection->query($sql['imgs']);
        $row_img = $result['imgs']->fetch_assoc();
        $img = "src='Components/General/PostsDraw/Source/posts_img/" . $row_img['name'] . "'";

        echo "<img " . $img . ">";
        echo "<p>" . $row['text'] . "</p>";
        echo "<p>" . $row['date_create'] . "</p>";
        echo '</div>';
    } ?>
</div>

<?php $connection->close(); ?>