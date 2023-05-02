<?php

	$connection = new mysqli("localhost","root","","web160_final");

	if($connection->connect_error){

		echo "Error with database connection";

	}

?>