<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Search Athlone Town Players</title>
	
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
	<link rel="stylesheet" href="css/themes/mwa1.css" />
  	<link rel="stylesheet" href="css/themes/jquery.mobile.icons.min.css" />
	<link rel="stylesheet" href="css/myCSS.css" />
  
    <!-- SSWD Assessment 1 -->
    <!-- Ray Egan -->
    <!-- 11/08/17 -->
	
	<!-- the front end design is an edit of my MWA Assessment 1 -->
	
	<!-- including both class files so we can instantiate objects of them below -->
	<?php 
	
	include ('classes/players.class.php');
	include ('classes/records.class.php');
	
	$r1 = new Records();
	$p1 = new Players($r1);
	
	?>
	
</head>

<body>
	<?php

	// running our query on the db with the user input
	// searchByPosition() method takes one argument, 'goalkeeper', 'defender', 'midfielder' or 'striker'
	if(isset($_GET["position"]))
	{
		$position = $_GET["position"];
		$p1->searchByPosition($position);
		$p1->closeConnection();
	}
	
	// running our query on the db with the user input
	// searchByAppearances() method takes one argument, an int, representing the minimum number of appearances a player has made
	if(isset($_GET["appearances"]))
	{
		$appearances = $_GET["appearances"];
		$p1->searchByAppearances($appearances);
		$p1->closeConnection();
	}

	?>
	
	<!-- start list page -->
	<div data-role="page" id="list" class="ui-responsive-panel"> 
				
	 	<!-- start main header -->
        <div data-role="header" class="ui-bar-a">
			<p class="alignCenter">Athlone Town Squad Details - 
				<?php
				// outputs the user's input, position or appearances
				if(isset($_GET["position"]))
				{
					echo "Position: " . ucfirst($p1->getPosition());
				}

				if(isset($_GET["appearances"]))
				{
					echo "Min. Appearances: " . $p1->getAppearances();
				}
				
				?>
			</p>
        </div><!-- end main header -->
        
        <!-- start main content -->
        <div data-role="content">	
			<div>
				<ul id="playerList">
					<!-- dynamically created list goes here -->
					<!-- comes from 'richListHTML' in js/myJS.js -->					
				</ul>						
			</div>
        </div><!-- end main content -->
        
        <!-- start 1st footer -->
        <div data-role="footer">
            <p class="alignCenter">
				<?php 
				
				// setPositionRecords() is called from the searchByPosition() method and returns however many records are returned by our API call
				// result is stored in private $numRecords variable which is returned by calling getNumRecords() through Records $r1 object
				echo "No. of Records Retrieved: " . $r1->getNumRecords(); 
				
				?>
			</p>
        </div><!-- end 1st footer -->
		
		<!-- start 2nd footer -->
        <div data-role="footer">
            <h3>JSON Code</h3>
			<p class="alignCenter">
				<!-- outputs the pure JSON direct to screen -->
				<?php echo json_encode($p1->printJSON()) ?>
			</p>
        </div><!-- end 2nd footer -->
				
		<!-- start popup pages -->
		<div id="popups" class="ui-responsive">
			<!-- dynamically created popup pages go here -->
			<!-- comes from 'popupHTML' in js/myJS.js -->
		</div><!-- end popup pages -->
				
	</div><!-- end list page -->
	
	<!-- best practice in loading jqm just inside the closing body tag -->
	<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	<script src="js/myJS.js"></script>
</body>
</html>