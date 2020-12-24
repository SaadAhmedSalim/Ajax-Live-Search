<?php

function conectionStart(){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "hr";
  $connection = mysqli_connect($servername, $username, $password, $dbname);
  return $connection;
 }
function conectionEnd($value){
  mysqli_close($value);
 }
function fetch($value=''){
  $connection = conectionStart();
  $sql = "select * from employees where first_name like '%".$value."%' or last_name like '%".$value."%' or email like '%".$value."%'";
  $result = mysqli_query($connection, $sql);

  if($result) {
    echo "<table>";
    echo "<tr>";
    echo "<th>Id</th>";
    echo "<th>Name</th>";
    echo "<th>Email</th>";
    echo "</tr>";
    while ($row = mysqlI_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>".$row['Employee_Id']."</td>";
      echo "<td>".$row['First_Name']." ".$row['Last_Name']."</td>";
      echo "<td>".$row['Email']."</td>";
      echo "</tr>";
      }
      echo "</table>";
    } else {
      echo "Error :".$sql."<br>".mysqli_error($connection);
    }

    conectionEnd($connection);
  }
if (isset($_GET['search'])) {
  fetch($_GET['search']);
  }
?>
