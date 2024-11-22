<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Home</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <div class="container">
        <h1 class="mt-4">Blog Posts</h1>
        <?php
            // Database connection
            $conn = new PDO("mysql:host=localhost;dbname=blog", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("SELECT * FROM posts ORDER BY created_at DESC");
            $stmt->execute();

            $posts = $stmt->fetchAll();
            foreach ($posts as $post) {
                echo "<div class='post'>";
                echo "<h2>" . $post['title'] . "</h2>";
                echo "<p>" . substr($post['content'], 0, 150) . "...</p>";
                echo "<a href='post.php?id=" . $post['id'] . "' class='btn btn-primary'>Read More</a>";
                echo "</div>";
            }
        ?>
    </div>
    
</body>
</html>
