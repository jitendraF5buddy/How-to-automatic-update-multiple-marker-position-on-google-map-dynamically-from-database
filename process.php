<?php 
$con=mysqli_connect('localhost','root','','MobileApp');




$result=mysqli_query($con,'SELECT * FROM new_user');
$array="";

while ($user=mysqli_fetch_assoc($result)) {
	
	$lat=explode('.', $user['lat']);
	$lat_part=$lat['1']+10;
	$lat_com=$lat['0'].'.'.$lat_part;
	$lng=explode('.', $user['lng']);
	$lng_part=$lng['1']+10;
	$lng_com=$lng['0'].'.'.$lng_part;
	mysqli_query($con,'UPDATE new_user SET `lat`="'.$lat_com.'",`lng`="'.$lng_com.'" WHERE `id`='.$user['id']);
	$array[$user['id']]['info']='<b>'.$user['name'].'</b>';
	$array[$user['id']]['lat']=$user['lat'];
	$array[$user['id']]['lng']=$user['lng'];
}
//print_r($array);
 echo json_encode($array);

?>
          