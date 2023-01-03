
<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "credit";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);


// Create a connection

if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  $delete = true;
$sql="DELETE FROM `crediters` WHERE `crediters`.`creditor_id` =$sno";
  $result = mysqli_query($conn, $sql);}
// if ($_SERVER['REQUEST_METHOD'] == 'POST'){
//   $conn = mysqli_connect($servername, $username, $password, $database);
//   $sql="DELETE FROM `crediters` WHERE `crediters`.`creditor_id` = ";
//   $result= mysqli_query($conn,$sql);}
// if ($_SERVER['REQUEST_METHOD'] == 'POST'){
//   // echo $_POST['desc'];
//   $title=$_POST['title'];
//   $description=$_POST['desc'];
// $sql="INSERT INTO `notes` (`title`, `description`,`tstamp`) VALUES ('$title', '$description','current_timestamp()')";
// $result=mysqli_query($conn,$sql);
// if($result){
// }
// else{echo " We could not insert the data";}
// }


// if(isset($_GET['delete'])){
//   $sno = $_GET['delete'];
//   $delete = true;
//  $sql="DELETE FROM `crediters` WHERE `crediters`.`creditor_id` = $sno";
//   $result = mysqli_query($conn, $sql);
// }


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>iCredit</title>
  </head>
  <body>
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
    <?php include'C:\xampp\htdocs\credit\partials\navbar.php';?>
    
    
    <div class="container my-4">
  <h2  class="text-center my4">Credit List</h2>
  
  
  <table class="table" id="myTable">
    <thead>
      <tr>
        <th scope="col">Sr No.</th>
        <th scope="col">Name</th>
      <th scope="col">Bill No.</th>
      <th scope="col">Bill Date</th>
      <th scope="col">Amount</th>
      <th scope="col">Amount Received</th>
      <th scope="col">Amount Pending</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <!-- <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr> -->
    
    <?php 

$sql="SELECT*FROM `crediters`";
$result= mysqli_query($conn,$sql);

//find no of records returned

$num=mysqli_num_rows($result);
// echo "The number of records found in DataBase is $num <br>";

//display rows returned by sql 

$row=mysqli_fetch_assoc($result);

$sno=0; 
if($num>=0){
  
 do{
   
    

    $billamtpen=$row['amt']-$row['amtrec'];
    $sno=$sno+1;
    echo "<tr>
    <th scope='row'>".$sno."</th>
    <td>".$row['name']."</td>
    <td> ".$row['billno']."</td>
    <td> ".$row['date']."</td>
    <td> ".$row['amt']."</td>
    <td> ".$row['amtrec']." </td>
    <td> ".$billamtpen." </td>
    <td><button class='delete btn btn-sm btn-primary' id=d".$row['creditor_id'].">Delete</button> </td>
    </tr>";
    
   
  } while($row=mysqli_fetch_assoc($result));}
?>
<?php
  // if($delete){
  //   echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  //   <strong>Success!</strong> Your note has been deleted successfully
  //   <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  //     <span aria-hidden='true'>×</span>
  //   </button>
  // </div>";
  // }
  ?>
</tbody>
</table>
</div>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
-->
<!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();

    });
  </script>

<script>
  edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        tr = e.target.parentNode.parentNode;
        title = tr.getElementsByTagName("td")[0].innerText;
        description = tr.getElementsByTagName("td")[1].innerText;
        console.log(title, description);
        titleEdit.value = title;
        descriptionEdit.value = description;
        snoEdit.value = e.target.id;
        console.log(e.target.id)
        $('#editModal').modal('toggle');
      })
    })
  deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this Entry!")) {
          console.log("yes");
          window.location = `/credit/workspace.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
</script>
<div class="container text-center">
<a href="\credit\addcreditor.php"class="btn btn-outline-danger btn-lg  my-5" >Add New Debtor</a>
<a href="\credit\grand.php"class="btn btn-outline-danger btn-lg  my-5 mx-2" >View Grand totals</a>
</div>

  </body>
  </html>