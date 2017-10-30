<?
	session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link rel="stylesheet" type="text/css" href="css/common2.css">
<style>

#background{
height : 100%;
weight: 100%;
background-image:url("./s_img/main_board.gif");  
}

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
<div class="clear"></div> 
<div style="background-color:#FFFFFF; width:100%; height:50px;"></div>
<div style="background-color:#FFFFFF; width:15%; height:500px; float:left;"></div>
<div style="background-color:#FFFFFF; widht:85%; height:800px; float:left;"><img src="./s_img/information_goods.gif"></div>
<div class="clear"></div>
<div style="width:100%; height:50px; background-color:#FFFFFF;"></div>		
</div> <!-- end of content -->
</div> <!-- end of wrap -->
</body>
</html>