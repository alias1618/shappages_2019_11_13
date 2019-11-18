<script type="text/javascript">
	function kickout(){
		alert("重複登入");
		window.location.href="logout_output.php";
		}
</script>
<?php
session_start();
require_once("connect_db.php");

$user_id = $_SESSION['user_id'];

$sql_query = "SELECT * FROM login_data WHERE user_id = $user_id";
$result = $conn->query($sql_query) or die('MySQL query error');
$row = mysqli_fetech_array($result);
$db_session_id = $row['session_id'];
if ($db_session_id != session_id()){
    echo "<script>kickout();</script>";
}
?>