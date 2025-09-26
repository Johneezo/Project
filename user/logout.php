

<p>Logout is successful</P>

<div style="
    display:flex;
    justify-content:center;   /* centers horizontally */
    align-items:center;       /* centers vertically */
    height:100vh;             /* full browser height */
">
 <a href="../index.html" class="nav-link" style="font-size:24px; font-weight:bold; text-decoration:none;">
    <span class="pcoded-micon"><i class="feather icon-align-justify"></i></span>
    <span class="pcoded-mtext">Click to go main page</span>
  </a>
</div>

<!-- 

<?php
session_start();
include("include/config.php");
$_SESSION['login']=="";
date_default_timezone_set('Asia/Kolkata');
$ldate=date( 'd-m-Y h:i:s A', time () );
mysqli_query($con,"UPDATE userlog  SET logout = '$ldate' WHERE username = '".$_SESSION['login']."' ORDER BY id DESC LIMIT 1");
session_unset();


?>

<script language="javascript">
document.location="index.php";
</script>

-->