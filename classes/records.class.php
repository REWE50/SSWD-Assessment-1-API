<?php

/*
SSWD Assessment 1
Ray Egan
11/08/17
*/

class Records
{
	// variable to hold number of records returned for eacy query
	private $numRecords;
	
	// class constructor
	public function Records()
	{
		
	}
		
	// function to set the value for the variable $numRecords when the searchByPosition() function is called
	// uses count() in mysql to return the number of rows returned
	public function setNumPositionRecords($connection, $tableName, $playerPosition)
	{
		$sql = "SELECT 
					COUNT(*) AS 'NumRows'
				FROM
					" . $tableName . "
				WHERE
					position = '" . $playerPosition . "'";
		
		$result = mysqli_query($connection, $sql) 
			or die("ERROR: " . mysqli_error($connection));
				
		$numRows = $result->fetch_array();
		$this->numRecords = $numRows['NumRows'];
	}
	
	// function to set the value for the variable $numRecords when the searchByAppearances() function is called
	// use count() in mysql to return the number of rows returned
	public function setNumAppearanceRecords($connection, $tableName, $playerAppearances)
	{
		$sql = "SELECT 
					COUNT(*) AS 'NumRows'
				FROM
					" . $tableName . "
				WHERE
					starts+subs >= " . $playerAppearances;
		
		$result = mysqli_query($connection, $sql) 
			or die("ERROR: " . mysqli_error($connection));
				
		$numRows = $result->fetch_array();
		$this->numRecords = $numRows['NumRows'];
	}
	
	// function to return the current value of $numRecords
	public function getNumRecords()
	{
		return $this->numRecords;
	}
}

?>