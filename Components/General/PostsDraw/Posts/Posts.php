<?php

include_once 'configuration.php';

$connection = new mysqli($MySQL['server_name'], $MySQL['username'], $MySQL['password'], $MySQL['db_name']);

if ($connection->connect_error) {
    die("Data base: Connection failed:" . $connection->connect_error);
}
// echo "Connected successfully";

$sql['post'] = "SELECT * FROM `post`;";
$result['post'] = $connection->query($sql['post']);

?>


<div>
    <?php
    if ($result['post']->num_rows > 0) {
        while ($row = $result['post']->fetch_assoc()) {
            echo '<div>';
            echo "<h2><a href=post.php?id=" . $row['id'] . ">" . $row['name'] . "</a></h2>";
            echo "<p>" . $row['date_create'] . "</p>";

            $sql['imgs'] = "SELECT * FROM `imgs` WHERE id = " . $row['img_id'] . ";";
            $result['imgs'] = $connection->query($sql['imgs']);
            $row_img = $result['imgs']->fetch_assoc();
            $img = "src='Components/General/PostsDraw/Source/posts_img/" . $row_img['name'] . "'";
            echo "<img " . $img . ">";
            echo "<p>" . $row['description'] . "</p>";
            echo "<a href=post.php?id=" . $row['id'] . ">Читать дальше</a>";
            echo '</div>';
        }
    } ?>
</div>

<?php $connection->close(); ?>