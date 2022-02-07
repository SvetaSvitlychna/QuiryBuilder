<?php

$db = include 'start.php';

$posts = $db->getAll('posts');

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">My Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">MainPage</a>
                </li>

            </ul>

        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <a href="#" class="btn btn-success">Add Post</a>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Actions</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <?php foreach ($posts as $post):?>
                    <th scope="row"><?php echo $post['id']?></th>
                    <td><a href="/show.php?id=<?php echo $post['id']?>"><?php echo $post['title']?></a</td>
                    <td><a href="/edit.php?id=<?php echo $post['id']?>" class="btn btn-warning">Edit</a>
                        <a href="/delete.php?id=<?php echo $post['id']?>" class="btn btn-danger" onclick="return confirm('Are your sure?')">Delete</a></td>

                </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div></div></div>
</body>
</html>


