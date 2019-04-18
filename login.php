<?php 
  $host = "localhost";
  $username = "root";
  $password = "";
  $database = "Employee";
  $message = " ";
  $conn = new mysqli($host,$username,$password);
  if ($conn -> connect_error){
	  die("connection failed".$conn->connect_error);
	 }
  echo "Connected Successfully";
  if (isset ($_POST["Login"]))
  { if(!mysqli_select_db($conn,$database))
	  {
		  echo "Database Problem";
		  
	  }
   	 
	 $nam = $_POST['Ename'];
	 $pp = $_POST['exp'];
	 $qq = $_POST['salary'];
	 $sql = "insert INTO EmployeeDetails (Ename,exp,salary) values ('$nam','$pp','$qq')";
	 if(!mysqli_query($conn,$sql))
	 { echo "Not Inserted";
	 }
	 else
	 { echo " inserted";
	 }
  }
  $sql = "select empid,Ename,exp,salary from EmployeeDetails";
  $result = $conn->query($sql);
  if($result->num_rows>0){
	    echo"<br>";
	    echo "Employee Details";
		
		echo "<table>" .  "<tr>" . "<th>" . "Empid" . "</th>" . "<th>" . "Name" . "</th>" . "<th>" . "Experiance" . "</th>" . "<th>" . "Salary" . "</th>" . "</tr>";
       
       
	  while ($row = $result->fetch_assoc()){
		  
		  echo "<tr>" .  "<td>" . $row["empid"] . "</td>" . "<td>" . $row["Ename"] . "</td>" . "<td>" . $row["exp"] . "</td>" . "<td>" . $row["salary"] . "</td>" . "</tr>";
		
	  }
	 
	  echo"</table>";
  }
      
	  else{
		  echo "0 results";
	  }
	  
  
?>


  