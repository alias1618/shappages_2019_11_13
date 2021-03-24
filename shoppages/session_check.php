<script type="text/javascript">
	function kickout(){
		alert("重複登入");
		window.location.href="logout_output.php";
		}
</script>
<?php
session_start();
require_once("connect_db.php");

if(!empty($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $sql_query_session = "SELECT * FROM login_data WHERE user_id = $user_id";
    $result_session = $conn->query($sql_query_session) or die('MySQL query error');
    $row_session = mysqli_fetch_array($result_session);
    $db_session_id = $row_session['session_id'];
    if ($db_session_id != session_id()){
        echo "<script>kickout();</script>";
    }
}

?>