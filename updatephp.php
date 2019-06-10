<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" href="css\style.css" />
</head>
<body>
<div class="maindiv">
<div class="divA">
<div class="title">
<h2>Update Profile</h2>
</div>
<!--<div class="divB">-->
<div class="divD">
<?php
$connection = mysql_connect("localhost", "root", "");
$db = mysql_select_db("register", $connection);
if (isset($_GET['submit'])) {
$id = $_GET['did'];
$first_name = $_GET['dfirst_name'];
$email = $_GET['demail'];
$phone = $_GET['dphone'];
$dob = $_GET['ddob'];
$age = $_GET['dage'];
$query = mysql_query("update users set
first_name='$first_name', email='$email', phone='$phone',
dob='$dob',age='$age' where id='$id'", $connection);
}
$query = mysql_query("select * from users", $connection);
while ($row = mysql_fetch_array($query)) {
echo "<b><a href='updatephp.php?update={$row['id']}'>{$row['first_name']}</a></b>";
echo "<br />";
}
?>
</div><?php
if (isset($_GET['update'])) {
$update = $_GET['update'];
$query1 = mysql_query("select * from users where id=$update", $connection);
while ($row1 = mysql_fetch_array($query1)) {
echo "<form class='form' method='get'>";
echo"<input class='input' type='hidden' name='did' value='{$row1['id']}' />";
echo "<br />";
echo "<label>" . "First_name:" . "</label>" . "<br />";
echo"<input class='input' type='text' name='dfirst_name' value='{$row1['first_name']}' />";
echo "<br />";
echo "<label>" . "Email:" . "</label>" . "<br />";
echo"<input class='input' type='text' name='demail' value='{$row1['email']}' />";
echo "<br />";
echo "<label>" . "phone:" . "</label>" . "<br />";
echo"<input class='input' type='text' name='dphone' value='{$row1['phone']}' />";
echo "<br />";
echo "<label>" . "dob:" . "</label>" . "<br />";
echo"<input class='input' type='text' name='ddob' value='{$row1['dob']}' />";
echo "<br />";
echo "<label>" . "age:" . "</label>" . "<br />";
echo"<input class='input' type='text' name='dage' value='{$row1['age']}' />";
echo "<br />";

//echo "<label>" . "Age:" . "</label>" . "<br />";
//echo "<textarea rows='15' name='age'>{$row1['age']}";
//echo "</textarea>";
//echo "<br />";
echo "<input class='submit' type='submit' name='submit' value='update' />";
echo "</form>";
}
}
if (isset($_GET['submit'])) {
echo '<div class="form" id="form3"><br><br><br><br><br><br>
<Span>Data Updated Successfuly......!!</span></div>';
}
    
?>
<a href="userAccount.php?logoutSubmit=1" class="logout">Logout</a>
<div class="clear"></div>
<!--</div>-->
<div class="clear"></div>
</div>
</div>

<?php
mysql_close($connection);
?>

</body>
</html>