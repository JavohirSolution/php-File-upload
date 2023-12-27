<?php

$conn = mysqli_connect('localhost', 'root', '', 'php');

if ($conn == false) {
    die("Could not connect to server" . mysqli_connect_error());
}
