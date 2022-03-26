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
      <form action = "http://localhost/Search1.php" method="POST">
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

$drop = "DROP TABLE MaleStudents";
$drop1 = "DROP TABLE FemaleStudents";
if($output = mysqli_query($con, $drop))
    {
       // echo "Male Students Deleted Successfully";
    }
    if($output = mysqli_query($con, $drop1))
    {
        //echo "Female Students Deleted Successfully";
    }
$sql1 = "
    CREATE TABLE MaleStudents(
    `St_ID` INTEGER NOT NULL PRIMARY KEY,
    `male_gender` varchar(100) NOT NULL,
    FOREIGN KEY (`St_ID`) REFERENCES `student`)";

    if($output = mysqli_query($con, $sql1))
    {
        //echo "Male Students Created Successfully";
    }
$sql2 = "
CREATE TABLE FemaleStudents(
`St_ID` INTEGER NOT NULL PRIMARY KEY,
`female_gender` varchar(100) NOT NULL,
FOREIGN KEY (`St_ID`) REFERENCES `student`)";

if($output = mysqli_query($con, $sql2))
    {
        //echo "Female Students Created Successfully";
    }


$sql3 = "INSERT INTO MaleStudents(St_ID,male_gender) SELECT
 s.St_ID,
 s.St_gender

 FROM
 student s,
 class_section c,
 person p

 WHERE
 p.P_no = s.P_no AND s.St_ID = c.St_ID AND s.St_gender IN(
 SELECT
     s.St_gender
 FROM
     student s
 WHERE
     s.St_gender = 'Male'
 )

GROUP BY
 c.Class_ID";

$sql4 = "INSERT INTO FemaleStudents(St_ID,female_gender) SELECT
s.St_ID,
s.St_gender

FROM
student s,
class_section c,
person p

WHERE
p.P_no = s.P_no AND s.St_ID = c.St_ID AND s.St_gender IN(
SELECT
    s.St_gender
FROM
    student s
WHERE
    s.St_gender = 'Female'
)

GROUP BY
c.Class_ID";

if($output = mysqli_query($con, $sql3))
{
    //echo "TABLE CREATED SUCCESSFULLY"."<br>";
}
else 
{
   echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

if($output = mysqli_query($con, $sql4))
{
   // echo "TABLE CREATED SUCCESSFULLY"."<br>";
    
}
else 
{
   echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

$sql5 = "SELECT COUNT(m.male_gender) AS Ma, COUNT(f.female_gender) AS Fa FROM MaleStudents m ,FemaleStudents f";
if($output = mysqli_query($con, $sql5))
{
if(mysqli_num_rows($output) > 0)
	{
    echo "<table border='2'>
    <tr>
    <th>Student's Male Count</th>
    <th>Student Female Count</th>
    </tr>";
        while($myrow = mysqli_fetch_array($output))
        {
          echo "<tr>";
          echo "<td>" . $myrow['Ma'] . "</td>";
          echo "<td>" . $myrow['Fa'] . "</td>";
          echo "</tr>"; 
        }
    }
    echo"</table>";
}
?>
    </div>
  </body>
</html>



