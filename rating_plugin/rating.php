<?php

/*
 *  Simple Rating System using CSS, JQuery, AJAX, PHP, MySQL
 *  Downloaded from Devzone.co.in
 */
// here I am taking IP as UniqueID but you can have user_id from Database or SESSION

$servername = "localhost"; // Server details
$username = "root";
$password = "";
$dbname = "panday";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Unable to connect Server: " . $conn->connect_error);
}
/*
* Getting MAC Address using PHP
* Md. Nazmul Basher
*/

/*ob_start();
system(‘ipconfig /all’); 
$mycom=ob_get_contents(); 
ob_clean();
$findme = “Physical”;
$pmac = strpos($mycom, $findme); 
$mac=substr($mycom,($pmac+36),17);
echo $mac; */

$user_ip=$_SERVER['REMOTE_ADDR'];
if (isset($_POST['rate']) && !empty($_POST['rate'])) {

    $rate = $conn->real_escape_string($_POST['rate']);
    $tourid=$conn->real_escape_string($_POST['tid']);
    $sightid=$conn->real_escape_string($_POST['sid']);
// check if user has already rated
    $sql = "SELECT `rating_id` FROM `tbl_rating` WHERE `user_id`='" . $tourid . "' and `builder_id`='" . $sightid . "'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($result->num_rows > 0) {
        echo '1';
    } else {

        $sql = "INSERT INTO `tbl_rating` ( `rating_id`, `builder_id`, `user_id`,`rate`,`date_rated`,`time_rated`,`rate_status`) VALUES (null,'".$sightid."', '" . $tourid . "','" . $rate . "',curdate(),curtime(),1); ";
        if (mysqli_query($conn, $sql)) {
            echo "0";
        }
    }
}
$conn->close();
?>