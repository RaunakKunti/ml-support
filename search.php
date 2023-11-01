<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MLsupport</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <!-- database connection  -->
    <?php include "partials/_dbconnect.php";?>
    <!-- navbar -->
    <?php include "partials/header.php";?>

    <div class="container my-3">
    <h1 class="py-4">Search results for <em>"<?php echo $_GET['search'] ?>"</em></h1>
    <?php
    $noResult = true;
    $query = $_GET["search"];
    $sql = "SELECT * FROM `threads` WHERE MATCH (thread_title,thread_desc) against ('$query')"; 
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
        $threadid = $row['thread_id'];
        $url = "thread.php?threadid=".$threadid;
        $noResult = false;

        echo '<div class="result">
        <h3><a href="'.$url.'" class="text-dark">'.$title.'</a></h3>
        <p>'.$desc.'</p>
        </div>';
    }
    if($noResult){
        echo '<div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <p class="display-4">No Results Found</p>
                </div>
             </div> ';
    }
    ?>
    <!-- for searching we have to add fulltext
         ALTER TABLE threads ADD FULLTEXT(`thread_title`,`thread_desc`); -->
    </div>

    <!-- footer  -->
    <?php include "partials/footer.php";?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>