 <?php
 if (isset($_POST['submit'])) {
    if (isset($_POST['fname']) && isset($_POST['sname']) &&
        isset($_POST['date']) && isset($_POST['stime']) &&
        isset($_POST['etime'])) {
 $fname= $_POST['fname'];
 $sname= $_POST['sname'];
 $date= $_POST['date'];
 $stime= $_POST['stime'];
 $etime= $_POST['etime'];
 
 if(!empty($fname) || !empty($sname) || !empty($date) || !empty($stime) || !empty($etime))
 {
	$conn= new mysqli("localhost" , "root" , "" , "interviewbit");
	if(mysqli_connect_error())
	{
		die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
	}
	else{
		$select = "select date from user where date=? Limit !";
		$insert = "Insert Into user (Participant 1 Name, Participant 1 Name, Date,
		Start time, End time) values(?,?,?,?,?)";
		
		$stmt=$conn->prepare($select);
		$stmt->bind_param("s", &date);
		$stmt->execute();
		$stmt->bind_result($date);
		$stmt->store_result();
		$rnum = $stmt->num_rows;
		
		if($rnum==0)
		{
			$stmt->close();
			
			$stmt = $conn->prepare($insert);
			$stmt->bind_param("sssss" , $fname , $sname , $date, $stime , $etime);
		
			if ($stmt->execute()) {
			echo "New interview Scheduled sucessfully";
		}
		else {
                    echo $stmt->error;
                }
		}
		else{
			echo "Interview already scheduled at this time";
		}
		 $stmt->close();
		 $conn->close(); 
		
			
	}		
 }
 else
 {
	 echo "All required";
	 die();
 }
		}
 }
	 
 ?>