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
$a1 = $_POST["gname"];

$a2 = $_POST["cid"];

$a3 = $_POST["sub"];
$s1 = $_POST["sname"];
$s2 = $_POST["sid"];

$status = "new";
    $sql = "INSERT INTO person (Guardian_Relation) VALUES ('$a1');
            INSERT INTO class_section(Class_ID) VALUES ('$a2');
            INSERT INTO student(St_ID,first_name) VALUES ('$s2','$s1')";

    if (mysqli_query($con, $sql)) 
    {
      
       //echo "New record created successfully";
    } 
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
