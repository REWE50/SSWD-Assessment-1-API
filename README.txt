SSWD Assessment 1
Ray Egan
11/08/17

The project's DB is named sswdassessment1.

The project includes a file named players.sql in the root directory. This includes a CREATE DATABASE IF NOT EXISTS statement, and can be imported from command line or a program like MySQL Workbench.

If working from command line, simply change directory to your xampp installation location;
cd c:\xampp\mysql\bin
and then issue the command
mysql -u root < players.json
where the players.json file is located inside your c:\xampp\mysql\bin directory.

The project contains an empty 'json' folder. Once the API is run, it will generate the specified JSON and save it to a file called 'players.json' at this location. For illustrative purposes, this file can be deleted after each query, and a new unique JSON object will be returned (and re-create players.json) after a query is performed again. 

The search function is accessed via index.php.