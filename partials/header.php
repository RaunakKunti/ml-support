<?php
session_start();
echo '
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/Forum">Ml-Support</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/Forum">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">about</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Top Categories
                        </a>
                        <ul class="dropdown-menu">';

                            $sql = "SELECT category_name, category_id FROM `categories` LIMIT 3";
                            $result = mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_assoc($result)){
                                echo '<li><a class="dropdown-item" href="threads.php?catid='. $row['category_id'] .'">'. $row['category_name'] .'</a></li>';
                            }
                        echo '</ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>';
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
                    echo '<form class="d-flex" role="search" method="get" action="search.php">
                        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-success" type="submit">Search</button>
                    </form>
                    <span class="text-light px-3">welcome '.$_SESSION['useremail'].'</span>
                    <a href="partials/_logout.php" class="btn btn-outline-success mx-2">Logout</a>';
                }
                else{
                    echo '<form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-success" type="submit">Search</button>
                    </form>
                    <button class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                    <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>';
                }
            echo '</div>
        </div>
    </nav>';
    include 'partials/_loginModal.php';
    include 'partials/_signupModal.php';
    if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
        echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
        <strong>Congratulations!!</strong> You signed-up successfully
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    else{
        // display the danger alert alert which is: header("Location:/Forum/index.php?signupsuccess=false&error=".$showError);
        echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
        <strong>Error</strong> Username is already exists
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
?>