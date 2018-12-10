<?php

$loger="";


if (($_REQUEST["in"]=="start")&&($_REQUEST["poster"]=="")&&($_REQUEST["mat"]=="")) {
session_start();
if (isset($_SESSION['data'])){
$loger=$_SESSION['data'];	}
elseif (isset($_COOKIE["user"])){
$_SESSION['data']=$_COOKIE["user"];
$loger=$_COOKIE["user"];}	}

elseif (($_REQUEST["in"]=="start")&&($_REQUEST["poster"]!="")&&($_REQUEST["mat"]!="")) {
session_start();
if (isset($_SESSION['data'])){
$loger=$_SESSION['data'];	}
elseif(isset($_COOKIE["user"])) {
$_SESSION['data']=$_COOKIE["user"];
$loger=$_COOKIE["user"]; 	}
	else {
$_SESSION['data']=$_REQUEST["mat"].$_REQUEST["poster"];
$expire=time()+60*60*24*30*6;
setcookie("user",$_REQUEST["mat"].$_REQUEST["poster"], $expire); }	}
	

elseif ($_REQUEST["in"]=="end"){
setcookie("user", "", time()-60*60*24*30*6);
session_start();
session_destroy();
$loger="end";	}


$_REQUEST["level"]=strtolower($_REQUEST["level"]);


?>



<?php


  if($_REQUEST["level"]=="100"){
  $table="forum100";	}
 elseif($_REQUEST["level"]=="200"){
  $table="forum200";	}
  elseif($_REQUEST["level"]=="300"){
  $table="forum300";	}
  elseif($_REQUEST["level"]=="400"){
  $table="forum400";	}
  elseif($_REQUEST["level"]=="500"){
  $table="forum500";	}
  else {
  $table="forum";	}
  












$receive="";



if ($_REQUEST["message"]!=""){


if ( (($_REQUEST["level"]==100)&&(substr($_REQUEST["mat"],2,1)!="/"))||(($_REQUEST["level"]==200)&&(substr($_REQUEST["mat"],0,7)=="13/30gm"))||(($_REQUEST["level"]==300)&&(substr($_REQUEST["mat"],0,7)=="12/30gm"))||(($_REQUEST["level"]==400)&&(substr($_REQUEST["mat"],0,7)=="11/30gm"))||(($_REQUEST["level"]==500)&&(substr($_REQUEST["mat"],0,7)=="10/30gm"))||($_REQUEST["level"]=="gen") ||($_REQUEST["poster"]=="Admin") )	{


$ddate=date("Y-m-d");

if ((idate("H"))<11){
$dtime= (idate("h"))+1;
$dmin=(idate("i"));
$dsec=(idate("s"));
if ($dtime==13){
$dtime=1;	}
if ($dtime<10){$dtime="0".$dtime;	}
if ($dmin<10){$dmin="0".$dmin;	}
if ($dsec<10){$dsec="0".$dsec;	}

$dtime=$dtime.":".$dmin.":".$dsec." am";
}

else {
$dtime= (idate("h"))+1;
$dmin=(idate("i"));
$dsec=(idate("s"));
if ($dtime==13){
$dtime=1;	}
if ($dtime<10){$dtime="0".$dtime;	}
if ($dmin<10){$dmin="0".$dmin;	}
if ($dsec<10){$dsec="0".$dsec;	}

$dtime=$dtime.":".$dmin.":".$dsec." pm";
}





mysql_connect("localhost","successtar","walestar");
mysql_select_db("walestar");

//mysql_connect("mysql.hostinger.co.uk","u547802989_forum","chemengine");
//mysql_select_db("u547802989_chat");

$_REQUEST["message"]=nl2br(stripslashes($_REQUEST["message"]));

$message=nl2br(mysql_real_escape_string($_REQUEST["message"]));
$poster=nl2br(mysql_real_escape_string($_REQUEST["poster"]));
$matric=nl2br(mysql_real_escape_string($_REQUEST["mat"]));
mysql_query("INSERT INTO $table (message,poster,ddate,dtime,matric) VALUES ('$message','$poster','$ddate','$dtime','$matric')");



$emi=mysql_query("SELECT*FROM $table ORDER BY id DESC");
$emina=mysql_fetch_array($emi);
$identity= $emina['id'];



$idd=$_REQUEST['id'] +1;
if ($identity==$idd){
	$receive=stripslashes("<div class='posting' >".$_REQUEST["message"]."<br/><hr><span class='spancolor'>From =&gt; ".$poster."&nbsp;&nbsp;&nbsp;".$dtime."&nbsp;&nbsp;&nbsp;".$ddate."</span></div>");	 } 
	 else {
	 $fetcher=mysql_query("SELECT*FROM $table ORDER BY id DESC");

$take=$identity-$_REQUEST['id'];
 
for ($i=0;$i<$take;$i++){
	$fetching=mysql_fetch_array($fetcher);
	
$receive=stripslashes("<div class='posting' >".$fetching["message"]."<br/><hr><span class='spancolor'>From =&gt; ".$fetching["poster"]."&nbsp;&nbsp;&nbsp;".$fetching["dtime"]."&nbsp;&nbsp;&nbsp;".$fetching["ddate"]."</span></div>".$receive);	}
	 
	 	 }
		 
/*
else{

}
*/




mysql_close();

		
echo '{"nsche":"'.$receive.'","iddd":"'.$identity.'","loger":"'.$loger.'","idlast":""}';

}

else {
echo '{"nsche":"NCRDOCEFOEATUOI","iddd":"'.$_REQUEST['id'].'","loger":"'.$loger.'","idlast":""}';

}

}

elseif (($_REQUEST['message']=="")&&($_REQUEST['idend']!="")){

mysql_connect("localhost","successtar","walestar");
mysql_select_db("walestar");

//mysql_connect("mysql.hostinger.co.uk","u547802989_forum","chemengine");
//mysql_select_db("u547802989_chat");

$emi=mysql_query("SELECT*FROM $table ORDER BY id ");
$emina=mysql_fetch_array($emi);

if ($emina['id'] < $_REQUEST['idend']){

$v=$_REQUEST['idend'];
$emi=mysql_query("SELECT*FROM $table WHERE id < $v ORDER BY id DESC");
$emina=mysql_fetch_array($emi);
$remain = $emina['id']- 12;

if ($remain >= 0){

$w=$_REQUEST['idend'];
$fetcher=mysql_query("SELECT*FROM $table WHERE id < $w ORDER BY id DESC ");

for ($i=0;$i<12;$i++){
	$fetching=mysql_fetch_array($fetcher);
	
$receive="<div class='posting' >".$fetching["message"]."<br/><hr><span class='spancolor'>From =&gt; ".$fetching["poster"]."&nbsp;&nbsp;&nbsp;".$fetching["dtime"]."&nbsp;&nbsp;&nbsp;".$fetching["ddate"]."</span></div>".$receive;	}

$idlast=$fetching["id"];
}
else {
$y=$_REQUEST['idend'];
$fetch=mysql_query("SELECT*FROM $table WHERE id < $y ORDER BY id DESC");

while($fetched=mysql_fetch_array($fetch))  {
$receive=stripslashes("<div class='posting' >".$fetched["message"]."<br/><hr><span class='spancolor'>From =&gt; ".$fetched["poster"]."&nbsp;&nbsp;&nbsp;".$fetched["dtime"]."&nbsp;&nbsp;&nbsp;".$fetched["ddate"]."</span></div>".$receive);	}
$idlast=1;


}




}

mysql_close();
echo '{"nsche":"'.$receive.'","iddd":"'.$_REQUEST['id'].'","loger":"'.$loger.'","idlast":"'.$idlast.'"}';

}



else {

mysql_connect("localhost","successtar","walestar");
mysql_select_db("walestar");

//mysql_connect("mysql.hostinger.co.uk","u547802989_forum","chemengine");
//mysql_select_db("u547802989_chat");

$emi=mysql_query("SELECT*FROM $table ORDER BY id DESC");
$emina=mysql_fetch_array($emi);
$identity= $emina['id'];

if ($identity>$_REQUEST['id']){

	$take=$identity-$_REQUEST['id'];

	 $fetcher=mysql_query("SELECT*FROM $table ORDER BY id DESC");

for ($i=0;$i<$take;$i++){
	$fetching=mysql_fetch_array($fetcher);
	
$receive="<div class='posting' >".$fetching["message"]."<br/><hr><span class='spancolor'>From =&gt; ".$fetching["poster"]."&nbsp;&nbsp;&nbsp;".$fetching["dtime"]."&nbsp;&nbsp;&nbsp;".$fetching["ddate"]."</span></div>".$receive;	}
	 
echo '{"nsche":"'.$receive.'","iddd":"'.$identity.'","loger":"'.$loger.'","idlast":""}';
}

else {
echo '{"nsche":"","iddd":"'.$_REQUEST['id'].'","loger":"'.$loger.'","idlast":""}';
}

mysql_close();

}







if ($_REQUEST["device"]=="noajax"){
echo "<script type='text/javascript' ><!--\n window.location='ajax.html';\n--></script>";	}
?>

