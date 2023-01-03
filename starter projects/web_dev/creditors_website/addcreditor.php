<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "credit";

$conn = mysqli_connect($servername, $username, $password, $database);


if ($_SERVER['REQUEST_METHOD'] == 'POST'){

  $name=$_POST['name'];
  $bill=$_POST['billno'];
  $date=$_POST['date'];
  $amt=$_POST['amt'];
  $amtrec=$_POST['amtrec'];
  
$sql="INSERT INTO `crediters` ( `name`, `billno`, `date`, `amt`, `amtrec`) VALUES ('$name', '$bill', '$date', '$amt', '$amtrec');";
$result=mysqli_query($conn,$sql);

    ?>

<!doctype html>
<html lang="en">

<head>
    <title>Add Debtor</title>
</head>

<body>
    <?php include'C:\xampp\htdocs\credit\partials\navbar.php';?>
    <?php
    if($result){
 echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
 <strong>Success!</strong> You're Entry has been saved successfully.
 <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
 </div>";
}
else{echo " We could not insert the data";}
}
?>
    <div class="container">
        <h2 class="text-center my-3">Add Debtor</h2>
        <form action="\credit\addcreditor.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">

                <div class="mb-3">
                    <label for="bill no." class="form-label">Bill No.</label>
                    <input type="text" class="form-control" id="billno" name="billno">
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date" name="date">
                </div>
                <div class="mb-3">
                    <label for="amt" class="form-label">Amount</label>
                    <input type="text" class="form-control" id="amt" name="amt">
                </div>
                <div class="mb-3">
                    <label for="amtrec" class="form-label">Amount Received</label>
                    <input type="text" class="form-control" id="amtrec" name="amtrec">
                </div>

                <button type="submit" class="btn btn-outline-primary">Submit</button>
                <div class="container text-center">
                    <a href="/credit/workspace.php" type="submit" class="btn btn-danger btn-lg ">Go to List</a>
                </div>
        </form>

    </div>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
</body>

</html>