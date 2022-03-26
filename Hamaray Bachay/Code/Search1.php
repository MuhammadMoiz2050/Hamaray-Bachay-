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

$searchclass = $_POST["search"];

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
 c.Class_ID = '$searchclass' AND
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
c.Class_ID = '$searchclass' AND
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