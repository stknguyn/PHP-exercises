<?php
$config = mysqli_connect('localhost','root','','rating');
//Nếu có lỗi xảy ra thì dừng đoạn mã và in ra thông báo lỗi.
if(mysqli_connect_errno()!==0)
{
  die("Error: Could not connect to the database. An error ".mysqli_connect_error()." 
ocurred.");
}
mysqli_set_charset($config,'utf8');
