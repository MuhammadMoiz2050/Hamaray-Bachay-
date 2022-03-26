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
            width:1500px;
            height:800px;
        }
        td{
          font-size:20px;
          padding:20px;
         
        }
        th{
          font-size:30px;
          padding:20px;
        }
     
        .search-box{
  width: fit-content;
  height: fit-content;
  position: relative;
}
.input-search{
  height: 50px;
  width: 50px;
  border-style: none;
  padding: 10px;
  font-size: 18px;
  letter-spacing: 2px;
  outline: none;
  border-radius: 25px;
  transition: all .5s ease-in-out;
  background-color: #22a6b3;
  padding-right: 40px;
  color:#fff;
}
.input-search::placeholder{
  color:rgba(255,255,255,.5);
  font-size: 18px;
  letter-spacing: 2px;
  font-weight: 100;
}

.btn-search{
  width: 50px;
  height: 50px;
  border-style: none;
  font-size: 20px;
  font-weight: bold;
  outline: none;
  cursor: pointer;
  border-radius: 50%;
  position: absolute;
  right: 0px;
  color:#ffffff ;
  background-color:transparent;
  pointer-events: painted;  
}
.btn-search:focus ~ .input-search{
  width: 300px;
  border-radius: 0px;
  background-color: transparent;
  border-bottom:1px solid rgba(255,255,255,.5);
  transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
}
.input-search:focus
{
  width: 300px;
  border-radius: 0px;
  background-color: transparent;
  border-bottom:1px solid rgba(255,255,255,.5);
  transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
}
.row::after
{
  content: "";
  clear: both;
  display: inline;
}
@media screen and (max-width: 600px) {
  a,th,td{
    width: 20%;
    margin-top: 0;
    padding:0px;
    font-size:10px;
  }
}
input[type=submit] {
  background-color: #ee6c4d;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float:center;
}
a{
  background-color: #ee6c4d;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float:center;
}

input[type=submit]:hover {
  background-color: #ee6c4d;
}

  </style>
  </head>
  <body>
      <div class = "container">
      <form action = "http://localhost/Search3.php" method="POST">
        <div class="search-box">
        <button class="btn-search">
          <i class="fas fa-search">

          </i></button>
          
        <input type="text" class="input-search" name = "search" placeholder="Search By Student ID...">
        <input type="submit" value="Search">
        </form>

        </div>
        <br>
        <br>
      
        <?php
$server = "localhost";
$username = "root";
$password = "";
$db = "ngo";
$con = mysqli_connect($server,$username,$password,$db);

$sql = "SELECT
p.Father_Name,
p.Mother_Name,
p.Guardian_Name,
p.Father_CNIC,
p.Mother_CNIC,
p.Guardian_CNIC,
s.St_ID,
s.first_name,
s.last_name,
s.St_gender
FROM
student s,
person p
WHERE 
s.P_no = P.P_no";
if($output = mysqli_query($con, $sql))
{
    if(mysqli_num_rows($output) > 0)
	{
    echo "<table border='2'>
    <tr>
    <th>Student's ID</th>
    <th>Student's First Name</th>
    <th>Student's Last Name</th>
    <th>Student's Gender</th>

    <th>Student's Father_name</th>
    <th>Student's Mother Name</th>
    <th>Student's Guardian Name</th>
    <th>Student's Father_CNIC</th>
    <th>Student's Mother_CNIC</th>
    <th>Student's Guardian_CNIC</th>
    </tr>";
        while($myrow = mysqli_fetch_array($output))
        {
          echo "<tr>";
          echo "<td>" . $myrow['St_ID'] . "</td>";
          echo "<td>" . $myrow['first_name'] . "</td>";
          echo "<td>" . $myrow['last_name'] . "</td>";
          echo "<td>" . $myrow['St_gender'] . "</td>";
          echo "<td>" . $myrow['Father_Name'] . "</td>";
          echo "<td>" . $myrow['Mother_Name'] . "</td>";
          echo "<td>" . $myrow['Guardian_Name'] . "</td>";
          echo "<td>" . $myrow['Father_CNIC'] . "</td>";
          echo "<td>" . $myrow['Mother_CNIC'] . "</td>";
          echo "<td>" . $myrow['Guardian_CNIC'] . "</td>";
          echo "</tr>"; 
        }
    }
    echo"</table>";
}
?>
    </div>
  </body>
</html>



