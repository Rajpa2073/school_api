<!-- This is Database Connection -->
<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "school_management";
//This is Secrect key for system
$api_key = "sadl_sfkljflkj#%&*@";
$connect = new mysqli($host, $user, $pass, $dbname);

if(!$connect){
    echo "Conenction is Failed";
}
?>