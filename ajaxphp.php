<?php



if($_REQUEST["level"]=="100"){
  $table="forum100";
  $level="100";
  $condition='if ((prompter.length>10)&&(prompter.charAt(2)!="/")&&(parseInt(prompter).toString().length==8)||(prompter=="12/30admin")){';
  $store='http://nscheunilorin.blogspot.com/2014/06/che19.html';
  $room100=' style=" color:#00FF00" ';
  $prom1="Enter your registeration number follow by your Name or Nickname \\n e.g 12/34ab567Gani";
  $prom2="Invalid Registeration Number";
  //$notice='<strong><marquee onMouseOver="this.stop();" onMouseOut="this.start();" style="color:#FF0000" scrolldelay="200"> Important Notice to all Chemical Engineering student => All student should converge at the lab today </marquee> </strong>';
	}
  
  elseif($_REQUEST["level"]=="200"){
  $table="forum200";
  $level="200";
  $condition='if ((prompter.length>10)&&(prompter.substring(0,7).toLowerCase()=="13/30gm")||(prompter=="12/30admin")){';
  $store='http://nscheunilorin.blogspot.com/2014/06/che18.html';
  $room200=' style=" color:#00FF00" ';
  $prom1="Enter your matric number follow by your Name or Nickname \\n e.g 12/34ab567Gani";
  $prom2="Invalid Matric Number";
 // $notice='<strong><marquee onMouseOver="this.stop();" onMouseOut="this.start();" style="color:#FF0000" scrolldelay="200"> Important Notice to all Chemical Engineering student => All student should converge at the lab today </marquee> </strong>';
	}
  
  elseif($_REQUEST["level"]=="300"){
  $table="forum300";
  $level="300";
  $condition='if ((prompter.length>10)&&(prompter.substring(0,7).toLowerCase()=="12/30gm")||(prompter=="12/30admin")){';
  $store='http://nscheunilorin.blogspot.com/2014/06/che17.html';
  $room300=' style=" color:#00FF00" ';
   $prom1="Enter your matric number follow by your Name or Nickname \\n e.g 12/34ab567Gani";
  $prom2="Invalid Matric Number";
 // $notice='<strong><marquee onMouseOver="this.stop();" onMouseOut="this.start();" style="color:#FF0000" scrolldelay="200"> Important Notice to all Chemical Engineering student => All student should converge at the lab today </marquee> </strong>';
	}
  
  elseif($_REQUEST["level"]=="400"){
  $table="forum400";
  $level="400";
  $condition='if ((prompter.length>10)&&(prompter.substring(0,7).toLowerCase()=="11/30gm")||(prompter=="12/30admin")){';	
  $store='http://nscheunilorin.blogspot.com/2014/06/che16.html';
  $room400=' style=" color:#00FF00" ';
   $prom1="Enter your matric number follow by your Name or Nickname \\n e.g 12/34ab567Gani";
  $prom2="Invalid Matric Number";
  //$notice='<strong><marquee onMouseOver="this.stop();" onMouseOut="this.start();" style="color:#FF0000" scrolldelay="200"> Important Notice to all Chemical Engineering student => All student should converge at the lab today </marquee> </strong>';
	}
  
  elseif($_REQUEST["level"]=="500"){
  $table="forum500";
  $level="500";
  $condition='if ((prompter.length>10)&&(prompter.substring(0,7).toLowerCase()=="10/30gm")||(prompter=="12/30admin")){';
  $store='http://nscheunilorin.blogspot.com/2014/06/che14.html';
  $room500=' style=" color:#00FF00" ';
  $prom1="Enter your matric number follow by your Name or Nickname \\n e.g 12/34ab567Gani";
  $prom2="Invalid Matric Number";
  //$notice='<strong><marquee onMouseOver="this.stop();" onMouseOut="this.start();" style="color:#FF0000" scrolldelay="200"> Important Notice to all Chemical Engineering student => All student should converge at the lab today </marquee> </strong>';
	}
  
  else {
  $table="forum";
  $level="gen";
  $condition='if (((prompter.length>10)&&((prompter.substring(2,7).toLowerCase()=="/30gm")||(prompter.charAt(2)!="/")&&(parseInt(prompter).toString().length==8)))||(prompter=="12/30admin")){';
  $store='http://nscheunilorin.blogspot.com';
  $roomgen=' style=" color:#00FF00" ';
  $prom1="Enter your matric / registeration number follow by your Name or Nickname \\n e.g 12/34ab567Gani or 12345678abGani";
  $prom2="Invalid Matric / Registeration Number";
  //$notice='<strong><marquee onMouseOver="this.stop();" onMouseOut="this.start();" style="color:#FF0000" scrolldelay="200"> Important Notice to all Chemical Engineering student => All student should converge at the lab today </marquee> </strong>';
  		}




mysql_connect("localhost","successtar","walestar")or die("<br/>Unable to process your request");
mysql_select_db("walestar");

//mysql_connect("mysql.hostinger.co.uk","u547802989_forum","chemengine")or die("<br/>Unable to process your request");
//mysql_select_db("u547802989_chat");

$emi=mysql_query("SELECT*FROM $table ORDER BY id DESC");
$emina=mysql_fetch_array($emi);
$identity= $emina['id'];

if ($identity>=12){
$fetch=mysql_query("SELECT*FROM $table ORDER BY id DESC");
for ($i=0;$i<12;$i++){
$fetched=mysql_fetch_array($fetch);
$insert=stripslashes("<div class='posting' >".$fetched["message"]."<br/><hr><span class='spancolor'>From =&gt; ".$fetched["poster"]."&nbsp;&nbsp;&nbsp;".$fetched["dtime"]."&nbsp;&nbsp;&nbsp;".$fetched["ddate"]."</span></div>".$insert);
}
$idend=$fetched["id"];
}

else {
$fetch=mysql_query("SELECT*FROM $table ORDER BY id DESC");

while($fetched=mysql_fetch_array($fetch))  {
$insert=stripslashes("<div class='posting' >".$fetched["message"]."<br/><hr><span class='spancolor'>From =&gt; ".$fetched["poster"]."&nbsp;&nbsp;&nbsp;".$fetched["dtime"]."&nbsp;&nbsp;&nbsp;".$fetched["ddate"]."</span></div>".$insert);
}
$idend=1;
}
mysql_close();

?>


<!DOCTYPE html>

<html>
<head>
<title>NSChE CHAT ROOM</title>
<link rel="shortcut icon" type="image/x-icon" href="http://4.bp.blogspot.com/-nPecV-Dt3_k/VH1qv_atmqI/AAAAAAAAAak/VYVgAWJnH7Q/s1600/favicon.ico" />


<style type="text/css">
div.posting{
background-color:#00FFFF; margin:5px; border:1px solid #F00; border-radius:15px;
}
span.spancolor{ color:#C09;
}
 a.try{text-decoration:none; display:inline; background-color:#000024; color:#C09; padding:2px; padding-left:25px; padding-right:25px; margin:15px;border-radius:0px; 
}
 a:hover.try{background-color:#FF0;color:#000024 }
div#container{width:100%;background-image:url(nsche_background.jpg); height:100%; margin:5px; border:5px solid orange; border-radius:15px
}
div#heading{ background-image:url(nsche_background.jpg); width:100%; margin-top:5px; 
}
div#heading_container{  color:#FFFFFF; 
}
body{ margin:0px; padding:0px;

}

#my_thing tr th a{text-decoration:none; display:block; background-color:#000024; color:#C09;/* padding:5px; border-radius:0px; border:1px solid #F00*/
}
#my_thing tr th a:hover{background-color:#FF0;color:#000024 }

a.previous{text-decoration:none; display:block; background-color:#00FFFF; color:#C09; margin:5px; border:1px solid #F00; border-radius:15px; border-radius:15px; background-color:#000024/* padding:5px; border-radius:0px; border:1px solid #F00*/
}
 a:hover.previous{background-color:#FF0;color:#000024 }
span#inserter{ border:1px solid #FF0; padding:5px;border-radius:10px; padding-top:2px; padding-bottom:2px; background-color:#FF0
}

</style>




</head>

<body style="background: #000024 url(nsche_background.jpg) no-repeat fixed top center"><center>

<table width="60%">
<tr>
<td>

<center>


<div id="container" >

<div id="heading">
<div id="heading_container">

<table width="100%">
<tr>
<th width="20%">

<img src="nsche_logo.jpg" height="100px">
</th>
<td width="60%">
<h1  align="center" style=" padding:-10px;  margin-bottom:-15px"><font size="+3" >NSChE CHAT ROOM</font></h1>
<h2 align="center" style="margin-top:10px; margin-bottom:1px"> <font size="+1">DEPARTMENT OF CHEMICAL ENGINEERING<br/>FACULTY OF ENGINEERING AND TECHNOLOGY<br/>UNIVERSITY OF ILORIN</font></h2>
</td>
<th width="20%">

<img src="nsche_unilorin.gif" height="100px">
</th>
</tr>
</table>
</div>

<table width="100%"  bgcolor="#000024"  style="border:5px solid orange" id="my_thing">
<tr>
<th>
<?php
echo  '<a href="'.$store.'">STORE</a></th>     <th ><a  style="background-color:#000024; color:#C09;">ROOMS =&gt;</a></th>   	    <th ><a href="ajaxphp.php?level=100"'.$room100.'>100L</a></th>   <th ><a href="ajaxphp.php?level=200"'.$room200.'>200L</a></th>   <th ><a href="ajaxphp.php?level=300"'.$room300.'>300L</a></th>   <th ><a href="ajaxphp.php?level=400"'.$room400.'>400L</a></th>   <th><a href="ajaxphp.php?level=500"'.$room500.'>500L</a></th>   <th><a href="ajaxphp.php"'.$roomgen.'>ALL CHEM ENGR</a>';
?>	
	</th>		 
  </tr>
</table>





</div>


<div id="data" style=" background-color:#FFFFFF; border:1px solid #F00; border-radius:15px" >


<div style="width:70%">



<?php

echo $notice;
?>
<div id="prev">

<strong><a href="#" class="previous" onClick="wale(5); return false">=&gt; Load Previous Conversation !!!! &lt;=</a></strong>

</div>

<div class="posting"><strong><span class="spancolor">Pls Pls Pls : No insult, No mocking, No preaching, No criticism, No religious conversation, No expensive jokes in this Forum. Respect yourself enough to remain MUTE than posting rubbish here.</span></strong>
</div>


<div id="java">
<?php
echo $insert;
?>


</div>
<div id="updatenote"></div>

<div id="post" class="posting" style=''>
</div>
<div id="unable">
</div>
<div class='posting' id="impost">
</div>

<div id="">
<div id="texting">
  <textarea name="textarea" rows="5" placeholder=" => Type your conversation here..............." id="chat" style="width:100%;"></textarea></div>
  <table width="100%"><tr id="logins"><td  align="left">
<input type="button" onClick="posted(1)" value="Send" id="postme" /></td>

</tr></table></div></div>
</div></div></center>



</td>
</tr>
</table>

<footer><div style="color:#FFFFFF"><strong>&copy; Nigerian Society of Chemical Engineering, Unilorin Chapter.<br/>Developed by <a href="https://www.facebook.com/successtar1" target="_blank" style="color:#C09; text-decoration:none">successtar</a> (<a href="tel:+2347061855688" style="color:#FFFFFF; text-decoration:none">07061855688</a>).</strong></div></footer>
</center>






<script type="text/javascript" >


var holder="";
var counter=0;


function noajax(){

var mess=document.getElementById("chat").value;
if (mess!=""){
mess=mess.replace(/(\r|\n|\r\n)/g,"<br/>");
mess=mess.replace(/"/g,"'");
mess=mess.replace(/&/g,"and");

var params = "device=noajax&message="+mess+"&poster="+pos+"&id="+idd+"&level="+level;
var url = "ajax.php?"+params;
window.location=url;
}

}



function focusing(){
document.getElementById("chat").focus();
}
function ender(){
var con=confirm("Do you want to logout ? ");
if (con==true)  {
   wale(4); }	}

//focusing();

<?php

echo "idd='".$identity."';";
echo "idend='".$idend."';";
echo "level='".$level."';";
echo "prompter1='".$prom1."';";
echo "prompter2='".$prom2."';";
?>

started=idd;
prevsender="";
pos="";
posmat="";
sending=2;
login="";
gone="";
logi='<td  align="right"> <input type="button" value="logout" onClick="ender()"/>  </td>';
normalog='<td align="left"> <input type="button" onClick="posted(1)" value="Send" id="postme" /></td>';
logcheck=1;

connect="Unable to connect <a href='#' onClick='posted(0);return false' class='try' >Try again</a>";
connecting="No internet access, please check your connection.";
imposter="You are not allow to make any post here, this room is meant for "+level+"L students.<br/>Thanks for your understanding.";
enab='<textarea name="textarea" rows="5"  placeholder=" => Type your conversation here..............." id="chat" style="width:100%;"></textarea>';



function notify(){
holder=holder+getting.nsche;
	z=idd-started;
	counter=counter+z;
	if (document.getElementById("updatenote").innerHTML==""){
	document.getElementById("updatenote").innerHTML='<div id="prev"> <strong><a href="#" class="previous" onClick="insert();return false">=&gt; <span id="inserter">'+counter+'</span> New unread Conversation !!!! &lt;=</a></strong> </div>';	}
	else {
document.getElementById("inserter").innerHTML=counter;	}	
started=idd;
}

function insert(){
document.getElementById("updatenote").innerHTML="";
document.getElementById("java").innerHTML=document.getElementById("java").innerHTML+holder;
 holder="";
counter=0;	}






function posted(k){
if (k==1){
if ((document.getElementById("chat").value!="")&&(document.getElementById("chat").value!=" => Type your conversation here...............")&&(document.getElementById("chat").value.substring(0,3)!=" =>")&&(sending==2)){

pass();
	}
}
else {
sending=3;
document.getElementById("unable").innerHTML="";	
pass();

}


}
function pass(){

if ((pos=="")||(pos==null)){
prompter=prompt(prompter1);
<?php
echo $condition;

?>
posmat=prompter.substring(0,10);
pos=prompter.substring(10);
if (pos.toLowerCase()=="admin"){
pos="Idiot";
}
if (prompter.length==10){
pos="Admin";		}

sending=1;
wale(0);	



}

else if (prompter.length==10){
sending=2;
document.getElementById("post").innerHTML=prompter1;	}

else {
sending=2;

if (prompter.substring(2,7).toLowerCase()=="/30gm" || parseInt(prompter).toString().length==8){
document.getElementById("post").innerHTML=imposter;	}
else{
document.getElementById("post").innerHTML=prompter2;}	}
}
else if ((pos!="")||(pos!=null)){
sending=1;
wale(0);
}
}



function readyAJAX() {
try {
return new XMLHttpRequest();
} catch(e) {
try {
return new ActiveXObject("Msxml2.XMLHTTP");
} catch(e) {
try {
return new ActiveXObject("Microsoft.XMLHTTP");
} catch(e) {
return noajax();
}
}
}
}




function wale(j){

if (j==2){
mess="";
}
else if (j==3){
mess="";
login="start";
}
else if (j==4){
mess="";
login="end";
}
else if (j==5){
document.getElementById("prev").innerHTML="";
mess="";
prevsender=idend;
}




var getter= readyAJAX();


	/* Using a GET method */
/*	
var url = "ajax.php?id=gfsgfdgsfdgsgfsg";
getter.open("GET",url,true);
getter.send();

*/
	/* Using a POST method */

var url = "ajax.php";

if ((sending==1)&&((pos!="")||(pos!=null))){
document.getElementById("post").innerHTML=document.getElementById("chat").value;
var mess=document.getElementById("chat").value;
document.getElementById("chat").value="";		}

else if ((sending==3)&&((pos!="")||(pos!=null))){
var mess=document.getElementById("post").innerHTML;

}


mess=mess.replace(/(\r|\n|\r\n)/g,"<br/>");
mess=mess.replace(/"/g,"&quot;");
//mess=mess.replace(/&/g,"and");
mess=escape(mess);


 var params = "message="+mess+"&poster="+pos+"&id="+idd+"&mat="+posmat+"&in="+login+"&idend="+prevsender+"&level="+level; 
 getter.open("POST",url,true); 
 getter.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
 getter.send(params);




getter.onreadystatechange = function() {
if (getter.readyState == 4) {
if (getter.status == 200) {
getting=eval('('+getter.responseText+')');

document.getElementById("unable").innerHTML="";
document.getElementById("post").innerHTML="";
idd=getting.iddd;

if (getting.nsche=="NCRDOCEFOEATUOI"){
document.getElementById("impost").innerHTML=imposter;
document.getElementById("chat").disabled="disabled";	}

else if (getting.idlast!=""){
if (getting.idlast==1){
document.getElementById("prev").innerHTML="";	}
else {
document.getElementById("prev").innerHTML=previous;	 }
document.getElementById("java").innerHTML=getting.nsche+document.getElementById("java").innerHTML;
idend=getting.idlast;
prevsender="";	}

else {
if (gone!=getting.iddd){
if ((mess=="")&&(getting.nsche!="")){
notify();}
else {
insert();
started=idd;
document.getElementById("java").innerHTML=document.getElementById("java").innerHTML+getting.nsche; }	} 

if (logcheck==2){
focusing();	} 	}

	
if ((getting.loger!="")&&(getting.loger!="end")){
if (getting.loger.length==10){
pos="Admin";		}
else {
posmat=getting.loger.substring(0,10);
pos=getting.loger.substring(10);	}

if (logcheck==1){
document.getElementById("logins").innerHTML=document.getElementById("logins").innerHTML+logi;
logcheck=2;	}
login="";	}

else if (getting.loger=="end"){
document.getElementById("texting").innerHTML=enab;
document.getElementById("impost").innerHTML="";
posmat="";
pos="";
document.getElementById("logins").innerHTML=normalog;
logcheck=1;
login="start";		}

if ((getting.loger!="")||(getting.loger=="end")){
  focusing(); 	}
  sending=2;
  gone=getting.iddd;
  clearTimeout(achiever);
  achiever=setTimeout('wale(2)',5000);
//alert(requestObj.responseText);
}
 else {
 if ((sending==1)||(sending==3)){
document.getElementById("unable").innerHTML=connect;
achiever=setTimeout('wale(2)',5000);	}

else {
document.getElementById("unable").innerHTML=connecting;
clearTimeout(achiever);
achiever=setTimeout('wale(2)',2000);					}

}
}
}

}



achiever=setTimeout('wale(3)',500);
var previous=document.getElementById("prev").innerHTML;
if (idend==1){
document.getElementById("prev").innerHTML="";	}
</script>




</body>
</html>