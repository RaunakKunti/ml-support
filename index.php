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
    
    <!-- slider starts here -->
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/header5.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/header2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/header3.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- slider ends here -->

    <!-- categorie starts here -->
    <div class="container my-3 py-4">
        <h2 class="text-center my-3">Browse Catagories</h2>
        <div class="row">
            <!-- fatch all the categories  -->
            <?php 
                $sql ="SELECT * FROM `categories`";
                $result = mysqli_query($conn,$sql);
                while($row=mysqli_fetch_assoc($result)){
                    $id = $row["category_id"];
                    $cat = $row["category_name"];
                    echo ' <div class="col-md-4 my-2">
                    <div class="card" style="width: 18rem;">
                        <img src="https://source.unsplash.com/500x400/?'.$cat.',coding" class="card-img-top" alt="img">
                        <div class="card-body">
                            <h5 class="card-title"><a href="threads.php?catid='.$id.'">'.$row["category_name"].'</a></h5>
                            <p class="card-text">'.substr($row["category_description"],0,50).'...</p>
                            <a href="threads.php?catid='.$id.'" class="btn btn-success">View Threads</a>
                        </div>
                    </div>
                </div>';
                }
            ?>
        </div>
    </div>
    <!-- category ends here -->

    <!-- footer  -->
    <?php include "partials/footer.php";?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>