<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MLsupport</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
        <style>
            body{
                background-image: linear-gradient(rgb(117, 250, 117), rgb(243, 243, 117));
                min-height: 110vh;
            }
        </style>
</head>

<body>
    <?php include "partials/_dbconnect.php";?>
    <?php include "partials/header.php";?>
    <?php include "partials/footer.php";?>
    <?php
        $submit = false;
        $method = $_SERVER['REQUEST_METHOD'];
        if($method=='POST'){
            $email=$_POST['Email'];
            $query=$_POST['select'];
            $field=$_POST['field'];
            $content=$_POST['textarea'];
            $sql = "INSERT INTO `contact` (`email`, `query type`, `field`, `content`, `time`) VALUES ('$email', '$query', '$field', '$content', current_timestamp())";
            $result = mysqli_query($conn,$sql);
            $submit=true;
        }
        if($submit){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your comment has been added!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
      </div>';
        }
        // else{
        //     echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        //     <strong>Error!</strong> Your comment has not been added!
        //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //         <span aria-hidden="true">&times;</span>
        //     </button>
        //     </div>';
        // }
        
    ?>
    <div class="container my-5">
        <h2>Contact Us</h2>
        <form action="/Forum/Contact.php" method="post">
            <div class="mb-3 my-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="Email" name="Email" aria-describedby="emailHelp"
                    placeholder="name@example.com">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>



            <label for="selectoption" class="form-label">Select Your Query</label>
            <select class="form-select" aria-label="Default select example" id="select" name="select">
                <option selected>Open this select menu</option>
                <option value="technology">technology</option>
                <option value="support">Support</option>
            </select>

            <label for="selectoption1" class="form-label mt-4">Select Your Area</label>
            <select class="form-select" aria-label="Default select example" id="field" name="field">
                <option selected>Select Your Area</option>
                <option value="Member">I am a Member</option>
                <option value="Professor">I am a Professor</option>
                <option value="Coder">I am a Coder</option>
                <option value="Other">Other</option>
            </select>
            <div class="mb-3 my-3">
                <label for="exampleFormControlTextarea1" class="form-label">Elaborate Your Concern</label>
                <textarea class="form-control" id="textarea" name="textarea" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
            <hr>

            <div class="container my-4">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM `contact`";
                    $result = mysqli_query($conn,$sql);
                    $sno = 0;
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $sno = $sno+1;
                        echo "<tr>
                        <th scope='row'>".$sno."</th>
                        <td>".$row['content']."</td>
                    </tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script>
         $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>