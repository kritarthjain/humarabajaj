<?php

	# Connect to the local database
	function connectLocalDb() {
		$db = mysqli_connect('127.0.0.1','root','password','bolguru');
	    // Check connection
	    if (mysqli_connect_errno()) {
	       echo "Failed to connect to MySQL: " . mysqli_connect_error() . '<br/>';
	    }
	    return $db;
	}

	# Connect to the AWS database
	function connectAWSDb() {
		$awsdb = 'hamarabajaj.cpyd36vutggc.us-west-2.rds.amazonaws.com:3306';
		$username = 'bolguru';
		$password = 'SaswatPanda';
		$dbname = 'bolguru';
		$db = mysqli_connect($awsdb,$username,$password,$dbname);
	    // Check connection
	    if (mysqli_connect_errno()) {
	       echo "Failed to connect to MySQL: " . mysqli_connect_error() . '<br/>';
	    }
	    return $db;
	}

	$db = connectAWSDb();
?>