# walkwithweb.org

Set-Up Requirements

Go to \config Create a file called database.php

Copy the following codes (Enter your credentials) Note: Do not push files with credentials to git. database.php is under .gitignore

![Screenshot (10)](https://user-images.githubusercontent.com/73214804/137754342-6f4a8a63-553c-4aec-a093-c26527c30f19.png)

=======
<?php
$server = '';
$username = '';
$password = '';
$database = '';

try{
	$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch(PDOException $e){
	die( "Connection failed: " . $e->getMessage());
}
?>

"# wwwsite" 
"# site" 
