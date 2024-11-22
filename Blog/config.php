<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "blog";

    try{
        $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql1 = "CREATE TABLE users(
        id int auto_increment primary key, 
        username varchar(255) not null, 
        email varchar(255) not null, 
        password varchar(255) not null,
        createc_at timestamp default current_timestamp
        )";

        $sql2 = "CREATE TABLE posts(
        id int auto_increment primary key, 
        title varchar(255) not null,
        content text not null,
        author_id int,
        created_at timestamp default current_timestamp,
        foreign key (author_id) references users(id)
        )";

        $sql3 = "CREATE TABLE comments(
        id int auto_increment primary key,
        post_id int,
        user_id int,
        comment text not null,
        created_at timestamp default current_timestamp,
        foreign key (post_id) references posts(id),
        foreign key (user_id) references users(id)
        )";

        $conn->exec($sql1);
        $conn->exec($sql2);
        $conn->exec($sql3);

        echo "Tables Created Successfully";
    }catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
?>