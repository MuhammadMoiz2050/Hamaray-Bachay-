<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "ngo";
$con = mysqli_connect($server,$username,$password,$db);

if ($con -> connect_errno) {
	//echo "Failed to connect to MySQL: " . $con -> connect_error;
	//exit();
  }
if($con)
{
	//echo "Connection Succesful";
}
//echo $_POST["fname"];
$a1 = $_POST["fname"];
$a2 = $_POST["mname"];
$a3 = $_POST["fcnic"];
$a4 = $_POST["mcnic"];
$a5 = $_POST["PA"];
$a6 = $_POST["FP"];
$a7 = $_POST["MP"];
$a8 = $_POST["FE"];
$a9 = $_POST["ME"];
$a10 = $_POST["pchild"];
$a11 = $_POST["jb"];
$a12 = $_POST["gname"];
$a13 = $_POST["gcnic"];
$a14 = $_POST["ga"];
$a15 = $_POST["gp"];
$a16 = $_POST["ge"];
$a17 = $_POST["gr"];

$s1 = $_POST["sf"];
$s2 = $_POST["sl"];
$s3 = $_POST["sg"];
$s4 = $_POST["sdob"];
$status = "new";
$x = array($a10,$a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$a11,$a12,$a13,$a14,$a15,$a16,$a17);
$course = $_POST["sub"];
echo $course;
    $sql = "INSERT INTO person (Number_of_Children,Father_Name,Mother_Name,Father_CNIC,Mother_CNIC,Parent_address,Father_PhoneNo,Mother_PhoneNo,Father_Email,Mother_Email,Parent_jobtype,Guardian_Name,Guardian_CNIC,Guardian_address,Guardian_PhoneNo,Guardian_Email,Guardian_Relation) VALUES ('$a10','$a1','$a2','$a3','$a4','$a5','$a6','$a7','$a8','$a9','$a11','$a12','$a13','$a14','$a15','$a16','$a17')"; 
    if (mysqli_query($con, $sql)) 
    {
      $last_id = mysqli_insert_id($con);
       //echo "New record created successfully";
    } 
    
    else 
    {
      // echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
    
    $sql = "INSERT INTO student (first_name,last_name,St_gender,date_of_birth) VALUES ('$s1','$s2','$s3','$s4')"; 
    if (mysqli_query($con, $sql)) 
    {
      //echo "New record created successfully. Last inserted ID is: " . $last_id;   
    }

    //mysqli_close($con);
    // if($result = mysqli_query($con, $sql))
    // {
	//     if(mysqli_num_rows($result) > 0)
	//     {       
    //         while($row = mysqli_fetch_array($result))
    //         {
    //            // echo "<table border = 1>";
    //             //echo "<tr>";
    //             echo "<td>" . $row[$value] . "</td>";
    //         }      
    //         // Free result set
    //         mysqli_free_result($result);
    //     }
    // }
    // //echo "</tr>";
    // echo "</table>";

    
//mysqli_close($con);
  ?>
  <!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="refresh" content="7; url='http://localhost/Mainpage.html'" />
    <style>
        .container
        {
            border-radius: 5px;
            background-color: #223946;
            padding: 20px;
            color:#ee6c4d;

        }
        .a1:link, .a1:visited {
  background-color: #ee6c4d;
  color: white;
  border: 2px solid #ee6c4d;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.a1:hover, .a1:active {
  background-color: #223946;
  color: white;
}
        </style>
  </head>
  <body>
      <div class = "container">

        <h1>Record Has Been Successfully Saved</h2>
        <a class = "a1" href="http://localhost/Mainpage.html" target = "_blank">Back To Main Page</a>
    </div>
  </body>
</html>
