<?php
$con= mysqli_connect("localhost","root","");//keep password inside "" if you are using password for mysql

if(isset($_POST['upload']))
{
$file =$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="UPLOAD/";
 
 /* new file size in KB */
 $new_size = $file_size/1024;  
 /* new file size in KB */
 
 /* make file name in lower case */
 $new_file_name = strtolower($file);
 /* make file name in lower case */
 
 $final_file=str_replace(' ','-',$new_file_name);

 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
$db=mysqli_select_db($con,"distance_learning");	
$qur="insert into upload(files) values('".$final_file."')";
$res=mysqli_query($con,$qur);
	if($res)
	{
	echo "File uploaded";
	}  
 	mysqli_close($con);
	}
}
?>