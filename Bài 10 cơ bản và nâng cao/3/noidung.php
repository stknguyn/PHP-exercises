<?php 
if (isset($_SESSION['username']) && isset($_SESSION['password']))
echo $_SESSION['username'];
else
{
echo "<script language='javascript'>alert('Ban chua dang nhap - Vui long dang nhap 
lai');";
echo "location.href='dangnhap.php';</script>";
}
