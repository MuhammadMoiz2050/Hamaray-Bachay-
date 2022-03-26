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
$s1 = $_POST["sf"];
$s2 = $_POST["sl"];
$s3 = $_POST["sg"];
$s4 = $_POST["sdob"];
$course = $_POST["sub"];
$cnic = $_POST["mcnic"];
$cnic1 = $_POST["gcnic"];
echo $course;
$sql = "SELECT Mother_CNIC,P_no FROM person";
if($output = mysqli_query($con, $sql))
{
    if(mysqli_num_rows($output) > 0)
	{
        while($myrow = mysqli_fetch_array($output))
        {
                if($myrow['Mother_CNIC'] == $cnic)
                {
                    $s5 = $myrow['P_no'];
                    $sql1 = "INSERT INTO student (first_name,last_name,St_gender,date_of_birth,P_no) VALUES ('$s1','$s2','$s3','$s4','$s5')";
                    if (mysqli_query($con, $sql1)) 
                    {
                        $last_id = mysqli_insert_id($con);
                        if($course == "English")
                        {
                            $sql = "INSERT INTO course (Course_ID,Course_name,St_ID) VALUES ('CS01','Class of English','$last_id')";
                        }
                        else if($course == "Urdu")
                        {
                            $sql = "INSERT INTO course (Course_ID,Course_name,St_ID) VALUES ('CS02','Class of Urdu','$last_id')";   
                        }
                        else if($course == "Visual Arts")
                        {
                            $sql = "INSERT INTO course (Course_ID,Course_name,St_ID) VALUES ('CS07','Class of Visual Arts','$last_id')"
                        }
                        else if($course == "Computer")
                        {
                            $sql = "INSERT INTO course (Course_ID,Course_name,St_ID) VALUES ('CS04','Class of Computer','$last_id')"   
                        }
                        else if($course == "Arts")
                        {
                            $sql = "INSERT INTO course (Course_ID,Course_name,St_ID) VALUES ('CS06','Class of Arts','$last_id')"
                        }
                        else if($course == "Science")
                        {
                            $sql = "INSERT INTO course (Course_ID,Course_name,St_ID) VALUES ('CS04','Class of Science','$last_id')"
                        }
                        else if($course == "History")
                        {
                            $sql = "INSERT INTO course (Course_ID,Course_name,St_ID) VALUES ('CS05','Class of History','$last_id')"
                        }
                        $sql3 = "INSERT INTO course"
                        echo "New record created successfully. Last inserted ID is: " . $last_id;   
                    }
                }
                else if($myrow['Guardian_CNIC'] == $cnic1)
                {
                    $s5 = $myrow['P_no'];
                    $sql2 = "INSERT INTO student (first_name,last_name,St_gender,date_of_birth,P_no) VALUES ('$s1','$s2','$s3','$s4','$s5')";
                    if (mysqli_query($con, $sql2)) 
                    {
                        $last_id = mysqli_insert_id($con);
                        echo "New record created successfully. Last inserted ID is: " . $last_id;   
                    }
                }
        }
        mysqli_free_result($output);
	} else
	{
        echo "No records matching your query were found.";
    }
}

$sql = "INSERT INTO student (first_name,last_name,St_gender,date_of_birth) VALUES ('$s1','$s2','$s3','$s4')"; 
if (mysqli_query($con, $sql)) 
{
    $last_id = mysqli_insert_id($con);
    echo "New record created successfully. Last inserted ID is: " . $last_id;   
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
