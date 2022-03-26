<!DOCTYPE html>
<html>
  <head>
    <style>
      * {
  box-sizing: border-box;
  padding: 0;  
  margin: 0;  
  
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
h1{
    font-size:30px;
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
     
        .search-box{
  width: fit-content;
  height: fit-content;
  position: relative;
}
.input-search
{
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
.btn-search:focus ~ .input-search
{
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
  a,th,td,h1{
    width: auto;
    margin-top: 0;
    padding:0px;
    font-size:25px;
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

input[type=submit]:hover {
  background-color: #ee6c4d;
}

  </style>
  </head>
  <body>
      
<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "ngo";
$con = mysqli_connect($server,$username,$password,$db);
$s5 = $_POST["sid"];
$s6 = $_POST["cid"];
$pno;
$sql = "DELETE FROM student WHERE St_ID = '$s5'";

$sql1 = "DELETE FROM class_section WHERE Class_ID = '$s6'";
if (mysqli_query($con,$sql))
{
    //echo '<div class = "container">'."Record deleted successfully" . '</div>';
} else 
  {
    echo "Error deleting record: " . mysqli_error($con);
  }

  if (mysqli_query($con, $sql1)) {
    //echo '<div class = "container">'."Record deleted successfully" . '</div>';
  } else {
    echo "Error deleting record: " . mysqli_error($con);
  }
  
  mysqli_close($con);

?>
<h1 class = "container">
    RECORD DELETED SUCCESSFULLY!
    <br><br>
    <a class = "a1" href="Report1.php" target="_blank">See Results Here!</a>
</h1>

    </div>
  </body>
</html>



