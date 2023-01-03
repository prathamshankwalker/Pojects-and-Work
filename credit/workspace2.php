
<?php 



//connecting to database
include 'C:\xampp\htdocs\credit\partials\_dbconnet.php';

 

if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `notes` WHERE `sno` = $sno";
  $result = mysqli_query($conn, $sql);
  // echo "record has been sucessfully inserted";
  // echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  // <strong>Success!</strong> You're note has been saved successfully.
  // <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  // </div>";
}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Credit</title>
</head>
<body>
      <link rel="stylesheet" href="//cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
      <?php include 'C:\xampp\htdocs\credit\partials\navbar.php';?>
      
      <div class="container my-4">
      
      
      
      
      <table class="table" id="myTable">
    <thead>
    <tr>
<th scope="col">Sr No.</th>
<th scope="col">Name</th>
<th scope="col">Bill No.</th>
<th scope="col">Date of Entry</th>
<th scope="col">Bill Amount</th>
<th scope="col">Bill Amount received</th>
<th scope="col">Bill Amount Pending</th>
</tr>
  </thead>
  <tbody>
    
    
    <?php 

$sql="SELECT*FROM `crediters`";
$result= mysqli_query($conn,$sql);

//find no of records returned

$num=mysqli_num_rows($result);
// echo "The number of records found in DataBase is $num <br>";

//display rows returned by sql 

$row=mysqli_fetch_assoc($result);

if($num>=0){
  
  while($row=mysqli_fetch_assoc($result)){
    
    $id=$row['creditor_id'];
  $name=$row['name'];
  $bill=$row['billno'];
  $date=$row['date'];
  $billamt=$row['amt'];
  $billamtrec=$row['amtrec'];
  $billamtpen=$billamt-$billamtrec;
    
    echo "<tr>
    <th scope='row'>".$id."</th>
    <td>".$name."</td>
    <td>".$bill."</td>
    <td>".$date."</td>
    <td>".$billamt."</td>
    <td>".$billamtrec."</td>
    <td>".$billamtpen."</td>
    <td>  <button class='delete btn btn-sm btn-primary' id=d".$id.">Delete</button>  </td>
    </tr>";
  }}

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
<script src=//cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js></script>


<script> 
    $(document).ready( function () {
    $('#myTable').DataTable();
} );</script>

<script>
  deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this note!")) {
          console.log("yes");
          window.location = `/cwh/crud/crud.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
</script>
  
  </body>
  </html>