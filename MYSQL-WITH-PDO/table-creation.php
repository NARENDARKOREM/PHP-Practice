<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "spaces";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE students (
        id int(6) unsigned auto_increment primary key,
        name varchar(255) not null,
        email varchar(255) not null,
        password varchar(255) not null,
        phone bigint not null,
        location varchar(255) not null,
        created_at timestamp default current_timestamp on update current_timestamp
    )";
    $conn->exec($sql);
    echo "Table Created Successfully";

} catch (Exception $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
