<!DOCTYPE html>
<html>
  <head>
    <style>
      * {
  box-sizing: border-box;
  padding: 0;  
  margin: 0;  
  
}
        .container
        {
            border-radius: 5px;
            background-color: #223946;
            padding: 20px;
            color:#ee6c4d;
            display:table;
        }
        a{
          font-size:20px;
          color: #ee6c4d;
          padding:40px;
        }
        td{
          font-size:20px;
          padding:20px;
         
        }
        th{
          font-size:30px;
          padding:20px;
        }
        h1{
            float:center;
            font-size:40px;
        }
        @media screen and (max-width: 600px) {
  a,th,td{
    width: 20%;
    margin-top: 0;
    padding:0px;
    font-size:10px;
  }
}
</style>
  </head>
  <body>
      <div class = "container">
          <h1>Searched Student is : </h1>
          <br>

<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "ngo";
$con = mysqli_connect($server,$username,$password,$db);

$searchid = $_POST["search"];

$sql = "SELECT
s.St_ID,
s.first_name,
s.last_name,
s.St_gender,
s.date_of_birth,
c.Class_ID
FROM
student s,
person p,
class_section c
WHERE
p.P_no = s.P_no
AND
s.St_ID = c.St_ID
GROUP BY
c.Class_ID";
if($output = mysqli_query($con, $sql))
{
    if(mysqli_num_rows($output) > 0)
	{
    echo "<table border='2'>
    <tr>
    <th>Student's ID</th>
    <th>Student First Name</th>
    <th>Student Last Name</th>
    <th>Student's Gender</th>
    <th>Student's Date Of Birth</th>
    <th>Class ID</th>
    </tr>";
        while($myrow = mysqli_fetch_array($output))
        {
            if($myrow['St_ID'] == $searchid)
            {
                echo "<tr>";
                echo "<td>" . $myrow['St_ID'] . "</td>";
                echo "<td>" . $myrow['first_name'] . "</td>";
                echo "<td>" . $myrow['last_name'] . "</td>";
                echo "<td>" . $myrow['St_gender'] . "</td>";
                echo "<td>" . $myrow['date_of_birth'] . "</td>";
                echo "<td>" . $myrow['Class_ID'] . "</td>";
                echo '<td><a href = "http://localhost/AddPage.php">' . "Add" . "</td>";
                echo '<td><a href = "http://localhost/EditPage.php">' . "Edit" . "</td>";
                echo '<td><a href = "http://localhost/DeletePage.php">' . "Delete" . "</td>";
                echo "</tr>"; 
            }
        }
    }
    echo"</table>";
}
?>
</div>
</body>
</html>