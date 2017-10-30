<?
	session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link rel="stylesheet" type="text/css" href="css/common2.css">
<style>

</style>
</head>

<body>
<div id="wrap">	
<div id="header">
	<? include "./lib/top_login.php";?>
</div> 
 <!-- end of header -->	
<div >	
	<a href="index.php"><img src="./s_img/main.gif" border="0"></a>
</div>
<div id="menu">	
	<? include "./lib/menubar.php"; ?>	
</div>  <!-- end of menu -->  
<div id="content">

<div style="height:60px; background-color:#FFFFFF;"></div>
<div class="clear"></div>
<div style="height:500px; width:120px; float:left; background-color:#FFFFFF;"></div>
<div style="height:60px; background-color:#FFFFFF;">고양이에 대한 기본적인 정보를 알려주는 메뉴입니다.</div>
<form method="post" action="information_spacies.php">
<div style="height:250px; width:250px; background-color:#FFFFFF; float:left;"><input type="image" src="./s_img/button_고양이종류.gif"></div></form>
<form method="post" action="information_food.php">
<div style="height:250px; width:250px; background-color:#FFFFFF; float:left;"><input type="image" src="./s_img/button_고양이먹이.gif"></div></form>
<form method="post" action="information_goods.php">
<div style="height:250px; width:250px; background-color:#FFFFFF; float:left;"><input type="image" src="./s_img/button_고양이용품.gif"></div></form>
<!--<div style="height:250px; width:750px; background-color:#D7FA15; float:left;">양육팁</div>		-->
</div> <!-- end of content -->
</div> <!-- end of wrap -->
</body>
</html>