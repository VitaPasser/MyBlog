<?php

include_once 'Components/Layout.php';
include_once 'configuration.php';

$id = $_GET['id'];

$connection = new mysqli($MySQL['server_name'], $MySQL['username'], $MySQL['password'], $MySQL['db_name']);

if ($connection->connect_error) {
    die("Data base: Connection failed:" . $connection->connect_error);
}
// echo "Connected successfully";

$sql['post'] = "SELECT name FROM `post` WHERE id = $id;";
$result['post'] = $connection->query($sql['post']);

if ($result['post']->num_rows > 0) {
    $row = $result['post']->fetch_assoc();
    $title_name = $row['name'];
}
$connection->close();

layout('Components/General/PostsDraw/Posts/Post.php', $title_name);
