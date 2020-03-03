<?php
	// define variables and set to empty values

	// $nameErr = $emailErr = $genderErr = $websiteErr = "";
	// $name = $email = $gender = $comment = $website = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["name"])) {
			$nameErr = "Name is required";
		} else {
			// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
				$nameErr = "Only letters and white space allowed"; 
			}
		}

		if (empty($_POST["email"])) {
			$emailErr = "Email is required";
		} else {
			// check if e-mail address is well-formed
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Invalid email format"; 
			}
		}

		if (empty($_POST["website"])) {
			$website = "";
		} else {
			// check if URL address syntax is valid (this regular expression also allows dashes in the URL)
			if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
				$websiteErr = "Invalid URL"; 
			}
		}

		if (empty($_POST["gender"])) {
			$genderErr = "Gender is required";
		} else {
			$gender = test_input($_POST["gender"]);
		}	
	}

	function test_input() {

		// Now inserting data into database on form //

		$name = filter_input(INPUT_POST, 'name');
		$email = filter_input(INPUT_POST, 'email');
		$web = filter_input(INPUT_POST, 'website');

		$host = "localhost";
		$dbusername = "_aradmin";
		$dbpassword = "UzovBNw1";
		$dbname = "_testpg";

		// Create connection
		$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

		if (!empty($name && $email)){

			$sql = "INSERT INTO details (name, email, web) VALUES ('$name', '$email', '$web')";

			if ( $conn->query($sql) ){ echo "New record is inserted sucessfully"; }
			else{
				echo "Error: ". $sql ."	". $conn->error;
			}
			$conn->close();
		}
		else{
			function do_alert($msg){
				echo '<script type="text/javascript">alert("' . $msg . '"); </script>';
			}
			do_alert("Fields should not be empty !");
			die();
		}; 	
	}

?>
