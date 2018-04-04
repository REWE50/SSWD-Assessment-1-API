(function()
{         
	// the JSON file players.json is created and populated according to whichever API is called
	$.getJSON("json/players.json", function(data)
	{ 
		// variables to contain our various dynamic HTML snippets
		// variables must be initialised as empty strings as we are adding to them further on
		var richListHTML = "";
		var popupPageHTML = "";
			
		// looping through the array to get the player details, one player at a time
		$.each(data, function(index, result)
		{            
			// as we loop through the array, we are building up and adding our code one player at a time

			// looping through the array to build up our clickable list of player names
			// this list will go into the main page
			// the default 'carat-r' icon has been changed to the 'user' icon to represent the player profile popup pages
			richListHTML += '<li data-icon="user"><a href="#player' + index +'" data-rel="popup">' + result.name + '</a></li>';

			// variable to contain transition animation type
			var transition;
			
			// setting a value for the variable above to put into the 'data-transition' attribute below, depending on the player's index
			switch (index) 
			{
				case 0:
				case 3:
				case 6:
				case 9:
				case 12:
					transition = "flip";
					break;
				case 1:
				case 4:
				case 7:
				case 10:
				case 13:
					transition = "pop";
					break;
				case 2:
				case 5:
				case 8:
				case 11:
				case 14:
					transition = "slide";
					break;
				default: 
					transition = "fade";
			}	
			
			// building up our 'popup' pages, one at a time
			// these pages will be displayed to the user when they select a player from the clickable list on the main page
			popupPageHTML += '<div data-role="popup" data-position-to="window" data-transition="' + transition + '" data-overlay-theme="b" id="player' + index + '" class="blackBG"><a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a><table id="resultsTable" width="100%"><tbody><tr class="blackBG"><td><h1 class="alignCenter">' + result.name + '</h1></td></tr><tr><td><img src="' + result.headshot + '" class="headshots"></td></tr><tr class="blackText"><td><ul><li><b>Nationality</b>: ' + result.nationality + '</li><li><b>Date of Birth</b>: ' + result.dob + '</li><li><b>Debut</b>: ' + result.debut + ' </li><li><b>Position</b>: ' + result.position + '</li><li><b>2017 Appearances</b>: ' + result.appearances + '</li><li><b>2017 Goals</b>: ' + result.goals + '</li></ul></td></tr></tbody></table></div>';		
		});

		// once we have completely looped through our array, we have built up our code one player at a time, and can now inject it all at once into the DOM
		// we have anchors already placed in the index file, to position our code where we want it
		// we have purposely chained two listview() methods together, as there was a periodic problem with initialisation otherwise
		// this problem was periodic, and could not be reproduced on demand
		// resolution from here: https://stackoverflow.com/questions/10373618/jquerymobile-error-cannot-call-methods-on-listview-prior-to-initialization
		// resolution from here: http://www.gajotres.net/uncaught-error-cannot-call-methods-on-prior-to-initialization-attempted-to-call-method-refresh/
		//$("#listPlayers").append(simpleListHTML).listview().listview('refresh');

		$("#playerList").append(richListHTML).listview().listview('refresh');

		$("#popups").append(popupPageHTML).trigger('create');
	})
	
})();	