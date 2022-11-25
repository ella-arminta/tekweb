<?php
include 'connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo $_POST['nama'];
    echo $_POST['hai'];
}
?>