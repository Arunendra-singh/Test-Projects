<?php ?>
	<form method="post" action="connect.php">
		Name: <input type="text" name="name" value="<?php echo $name;?>">
	  	<span class="error">* <?php echo $nameErr;?></span> <br><br>
	  	
	  	E-mail: <input type="text" name="email" value="<?php echo $email;?>">
	  	<span class="error">* <?php echo $emailErr;?></span> <br><br>

	  	Website: <input type="text" name="website">
  		<span class="error"><?php echo $websiteErr;?></span><br><br>
	  
	  	Gender:
	  	<input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
	  	<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male <br><br>
	  
	  	<input type="submit" name="submit" value="Submit">  
	</form>
<?php ?>


<!-- mysql query for creating table on database -->

<!-- CREATE TABLE details (
     id MEDIUMINT NOT NULL AUTO_INCREMENT,
     name CHAR(30) NOT NULL,
     PRIMARY KEY (id)
); -->
