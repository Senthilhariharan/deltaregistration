<?php
session_start();


if(isset($_SESSION["sess_user"]))
{
	$success=0;
	$roll=$_SESSION["sess_user"];
	
	if(file_exists("c:/wamp/www/".$roll.".png"))
{
	echo "<center><img style='width:200px;height:200px;'  src=\"\\".$roll.".png\" /></center>";
}
	echo "
	<center>
 Hello ".$roll."


<form action='member.php' method='post'  enctype='multipart/form-data'>
upload Profile picture: <input type='file' name='image'> 
<input type='submit' value='upload'>
</form> 
</center>";


echo "<br/>";
echo "<center><a href=\"logout.php\" > <input type=\"button\" value='Logout'></a><center>";

if( isset($_FILES["image"]["name"]) && $_FILES["image"]["name"]!=null )
{
 

if( !exif_imagetype("c:/wamp/www/".$roll.".png") )
{ 

echo "<script>alert('invalid format');</script>";
$success=0; 
}
else if($_FILES["image"]["size"]>2000000 ) 
{ 

echo "<script>alert('file size exceed the limit of 2 MB');</script>";
$success=0; 
 }
else 
{
$success=1;
move_uploaded_file($_FILES["image"]["tmp_name"],"c:/wamp/www/".$roll.".png");

}
}

if($success==1)
{

	echo "<script>alert('upload successful');</script>";
}

}

else
{
	echo "<script>alert('unsuccessful');</script>";
}
?>
</html>
