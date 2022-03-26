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
      <form action = "http://localhost/Search.php" method="POST">
        <div class="search-box">
        <button class="btn-search">
          <i class="fas fa-search">

          </i></button>
          
        <input type="text" class="input-search" name = "search" placeholder="Search By Student ID...">
        <input type="submit" value="Search">
        <a href = "http://localhost/addpage.html">ADD</a>
        <a href = "http://localhost/editpage.html">EDIT</a>
        <a href = "http://localhost/deletepage.html">DELETE</a>
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
s.St_ID = c.St_ID";
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
          echo "<tr>"; 
          echo "<td>" . $myrow['St_ID'] . "</td>";
          echo "<td>" . $myrow['first_name'] . "</td>";
          echo "<td>" . $myrow['last_name'] . "</td>";
          echo "<td>" . $myrow['St_gender'] . "</td>";
          echo "<td>" . $myrow['date_of_birth'] . "</td>";
          echo "<td>" . $myrow['Class_ID'] . "</td>";
          echo "</tr>"; 
        }
    }
    echo"</table>";
}

// if ($con -> connect_errno) {
// 	//echo "Failed to connect to MySQL: " . $con -> connect_error;
// 	//exit();
//   }
// if($con)
// {
// 	//echo "Connection Succesful";
// }
// $s1 = $_POST["sf"];
// $s2 = $_POST["sl"];
// $s3 = $_POST["sg"];
// $s4 = $_POST["sdob"];
// $course = $_POST["sub"];
// $cnic = $_POST["mcnic"];
// $cnic1 = $_POST["gcnic"];
//echo $course;
//$sql = "SELECT Mother_CNIC,P_no FROM person";
// if($output = mysqli_query($con, $sql))
// {
//     if(mysqli_num_rows($output) > 0)
// 	{
//         while($myrow = mysqli_fetch_array($output))
//         {
//                 if($myrow['Mother_CNIC'] == $cnic)
//                 {
//                     $s5 = $myrow['P_no'];
//                     $sql1 = "INSERT INTO student (first_name,last_name,St_gender,date_of_birth,P_no) VALUES ('$s1','$s2','$s3','$s4','$s5')";
//                     if (mysqli_query($con, $sql1)) 
//                     {
//                         $last_id = mysqli_insert_id($con);
//                         if($course == "English")
//                         {
//                             $sql = "INSERT INTO course (Course_ID,Course_name,St_ID) VALUES ('C01','English','$last_id')";
//                         }
//                         else if($course == "Urdu")
//                         {
//                             $sql = "INSERT INTO course (Course_ID,Course_name,St_ID) VALUES ('C02','Urdu','$last_id')";   
//                         }
//                         else if($course == "Visual Arts")
//                         {
//                             $sql = "INSERT INTO course (Course_ID,Course_name,St_ID) VALUES ('C07','Visual Arts','$last_id')"
//                         }
//                         else if($course == "Computer")
//                         {
//                             $sql = "INSERT INTO course (Course_ID,Course_name,St_ID) VALUES ('C01','English','$last_id')"   
//                         }
//                         else if($course == "Arts")
//                         {
//                             $sql = "INSERT INTO course (Course_ID,Course_name,St_ID) VALUES ('C01','English','$last_id')"
//                         }
//                         else if($course == "Science")
//                         {
//                             $sql = "INSERT INTO course (Course_ID,Course_name,St_ID) VALUES ('C01','English','$last_id')"
//                         }
//                         else if($course == "History")
//                         {
//                             $sql = "INSERT INTO course (Course_ID,Course_name,St_ID) VALUES ('C01','English','$last_id')"
//                         }
//                         $sql3 = "INSERT INTO course"
//                         echo "New record created successfully. Last inserted ID is: " . $last_id;   
//                     }
//                 }
//                 else if($myrow['Guardian_CNIC'] == $cnic1)
//                 {
//                     $s5 = $myrow['P_no'];
//                     $sql2 = "INSERT INTO student (first_name,last_name,St_gender,date_of_birth,P_no) VALUES ('$s1','$s2','$s3','$s4','$s5')";
//                     if (mysqli_query($con, $sql2)) 
//                     {
//                         $last_id = mysqli_insert_id($con);
//                         echo "New record created successfully. Last inserted ID is: " . $last_id;   
//                     }
//                 }
//         }
//         mysqli_free_result($output);
// 	} else
// 	{
//         echo "No records matching your query were found.";
//     }
// }

// $sql = "INSERT INTO student (first_name,last_name,St_gender,date_of_birth) VALUES ('$s1','$s2','$s3','$s4')"; 
// if (mysqli_query($con, $sql)) 
// {
//     $last_id = mysqli_insert_id($con);
//     echo "New record created successfully. Last inserted ID is: " . $last_id;   
// }
?>
    </div>
  </body>
</html>



