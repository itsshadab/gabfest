<?php 
	if(isset($_POST['submit'])){ 
		if(preg_match("/^[  a-zA-Z]+/", $_POST['name'])){ 
			$name=$_POST['search_name']; 
			//connect  to the database 
			$db=mysql_connect  ("localhost", "root", "", "connecton") or die ('I cannot connect to the database  because: ' . mysql_error()); 
			//-select  the database to use 
			$mydb=mysql_select_db("connecton"); 
			//-query  the database table 
			$sql="SELECT  uid, fname, lname FROM members WHERE fname LIKE  $name  OR lname LIKE $name"; 
			//-run  the query against the mysql query function 
			$result=mysql_query($sql);
			//-create  while loop and loop through result set 
			while($row=mysql_fetch_array($result)){
				$ID=$row['uid']; 
				$FirstName  =$row['fname']; 
				$LastName=$row['lname']; 
				//-display the result of the array 
				echo "<ul>\n"; 
				echo "<li><a  href=\"search.php?id=$ID\">"   .$FirstName . " " . $LastName .  "</a></li>\n"; 
				echo "</ul>"; 
			} 
		} 
		else{ 
		echo  "<p>Please enter a search query</p>"; 
		} 
	} 
?> 