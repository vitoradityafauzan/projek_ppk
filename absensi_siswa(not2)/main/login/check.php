<?Php
if(!isset($_SESSION['username'])){
echo "<center><font face='Verdana' size='2' color=red>Sorry, Please <a href=index.php>login</a> and use this page </font></center>";
exit;
}
?>