<?php

/*
SSWD Assessment 1
Ray Egan
11/08/17
*/
    
class Players
{
	// all variables are private to avoid direct access of them
	// db connection variables
	private $myConnection;
	private $host = "localhost";
	private $username = "root";
	private $password = "";
	private $database = "sswdassessment1";
	
	// db table and query variables
	private $tableName = "players";
	private $playerPosition;
	private $playerAppearances;
	private $result;
	private $sql;
	
	// Records class object
	private $r1;
	
	private $playerArray;
	
	// class constructor that makes a connection to the DB and takes in a Records class object as an argument
	public function Players($r1)
	{
		$this->makeConnection();
		$this->r1 = $r1;
	}
			
	// function to open the DB connection
	public function makeConnection()
	{
    	$this->myConnection = mysqli_connect($this->host, $this->username, $this->password, $this->database) 
			or die("Error " . mysqli_error($this->myConnection));
	}
	
	// function to close the DB connection
	public function closeConnection()
	{
    	mysqli_close($this->myConnection);
	}
	
	// endpoint #1
	// function that takes one argument, a player's position, and queries the DB to return all players that play that position
	public function searchByPosition($playerPosition)
	{
		$this->playerPosition = $playerPosition;
		
		// performs a query on the DB, and returns desired columns
		// the first and last name are concatonated and returned in the form LAST NAME, First Name
		// the date of birth is returnd in the form dd/mm/yy
		// the starts and subs columns are added together and returned as one column called 'apperances'
		$this->sql = "SELECT
						CONCAT_WS(', ', UPPER(lastName), firstName) AS 'name',
						position,
						nationality,
						DATE_FORMAT(dob, '%d/%m/%y') AS 'dob',
						debut,
						starts+subs  AS 'appearances',
						goals,
						headshot
					FROM
						" . $this->tableName . "
					WHERE
						position = '" . $this->playerPosition . "'
					ORDER BY
						name";
		
		// executes the query on the db
		$this->result = mysqli_query($this->myConnection, $this->sql) 
			or die("ERROR: " . mysqli_error($this->myConnection));

		// calls function create the resultant json
		$this->createJSON();
		
		// uses an object of the Records class to record how many records are returned for each query
		$this->r1->setNumPositionRecords($this->myConnection, $this->tableName, $this->playerPosition);
	}
	
	// function to return the chosen position
	public function getPosition()
	{
		return $this->playerPosition;
	}
	
	// endpoint #2
	// function that takes one argument, a number of appearances, and queries the DB to return all players that have made at least
	// that number of appearances. the list is ordered by appearances from most to fewest, and further ordered by name a-z
	public function searchByAppearances($playerAppearances)
	{
		$this->playerAppearances = $playerAppearances;
		
		// performs a query on the DB, and returns desired columns
		// the first and last name are concatonated and returned in the form LAST NAME, First Name
		// the date of birth is returnd in the form dd/mm/yy
		// the starts and subs columns are added together and returned as one column called 'apperances'
		$this->sql = "SELECT
						CONCAT_WS(', ', UPPER(lastName), firstName) AS 'name',
						position,
						nationality,
						DATE_FORMAT(dob, '%d/%m/%y') AS 'dob',
						debut,
						starts+subs  AS 'appearances',
						goals,
						headshot
					FROM
						" . $this->tableName . "
					WHERE
						starts+subs >= " . $this->playerAppearances . "
					ORDER BY
						starts+subs DESC, name ASC";
		
		// executes the query on the db
		$this->result = mysqli_query($this->myConnection, $this->sql) 
			or die("ERROR: " . mysqli_error($this->myConnection));
		
		// calls function to create the resultant json
		$this->createJSON();
		
		// uses an object of the Records class to record how many records are returned for each query
		$this->r1->setNumAppearanceRecords($this->myConnection, $this->tableName, $this->playerAppearances);
	}
	
	// function to return the chosen number of appearances
	public function getAppearances()
	{
		return $this->playerAppearances;
	}
	
	// function to generate our json 
	// it is called from within our two search functions
	public function createJSON()
	{
		//create an array for storage
		$this->playerArray = array();
		
		while($row = mysqli_fetch_assoc($this->result))
		{
			$this->playerArray[] = $row;
		}

		// creates a file to store our dynamically created json
		$fp = fopen('json/players.json', 'w');
		fwrite($fp, json_encode($this->playerArray));
		fclose($fp);
	}
	
	// function to all us print the json code direct to screen
	public function printJSON()
	{
		return $this->playerArray;
	}
}

?>