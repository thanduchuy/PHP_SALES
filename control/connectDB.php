<?php
$conn = mysqli_connect('localhost', 'huy', 'huy123', 'sales');

if (!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
}
