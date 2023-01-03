<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "credit";

// Create a connection

$conn = mysqli_connect($servername, $username, $password, $database);


?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>iCredit</title>
</head>

<body>
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
    <?php include'C:\xampp\htdocs\credit\partials\navbar.php';?>


    <div class="container my-4">
        <h2 class="text-center my4">Grand Total</h2>

        <div class="container">
            <form action="\credit\grand.php" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Enter Name of Debtor</label>
                    <input type="text" class="form-control" id="name" name="name" method="post"
                        aria-describedby="emailHelp">

                    <button type="submit" class="btn btn-primary my-2">Submit</button>
            </form>



        </div>

        <table class="table my-3" id="myTable">
            <thead>
                <tr>

                    <th scope="col">Sr No.</th>
                    <th scope="col">Name</th>

                    <th scope="col">Grand Total</th>
                </tr>
            </thead>
            <tbody>

                <?php
$name;
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  
  $name=$_POST['name'];
  $sql="SELECT * FROM `crediters` WHERE `name` LIKE '$name' ORDER BY `creditor_id` ASC";
  $result= mysqli_query($conn,$sql);
  $num=mysqli_num_rows($result);
  $row=mysqli_fetch_assoc($result);
  $name=$row['name'];
 
  $grand=0;
  if($num==1){
    $grand=$row['amt']-$row['amtrec'];
  }
do{
 $amtadd=$row['amt']-$row['amtrec'];
  $grand=$grand+$amtadd;
  
}while($row=mysqli_fetch_assoc($result));


$sno=1;
echo "<tr>
<th scope='row'>".$sno."</th>
<td>" .$name."</td>
<td> ".$grand." </td>
</tr>";
}




  ?>

                <?php 

// $sql="SELECT*FROM `crediters`";
// $result= mysqli_query($conn,$sql);

// //find no of records returned

// $num=mysqli_num_rows($result);
// // echo "The number of records found in DataBase is $num <br>";

// //display rows returned by sql 

// $row=mysqli_fetch_assoc($result);

// $sno=0; 
// if($num>=0){
  
  // while($row=mysqli_fetch_assoc($result)){
  //   $grand=0;
  //   $sno=$sno+1;
  //   echo "<tr>
  //   <th scope='row'>".$sno."</th>
  //   <td>".$row['name']."</td>
  //   <td> ".$grand." </td>
  //   </tr>";
    
   
//   }}
?>

            </tbody>
        </table>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
-->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();

    });
    </script>
    <div class="container text-center">
        <a href="/credit/workspace.php" type="submit" class="btn btn-danger  btn-lg">Go to List</a>
    </div>
    </script>
</body>

</html>