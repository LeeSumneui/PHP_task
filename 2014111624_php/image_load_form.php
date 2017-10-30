<?
	session_start();

	include "./lib/dbconn.php";

	
?>

	<form name="write_form" method="post" action="insert_image2.php?table=<?=$table?>" enctype="multipart/form-data">

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
	<div style="height:50px; background-color:#FFFFFF;"></div>

	<br><div style="height:50px; margin-right:150px;"><img src="./s_img/게시글쓰기.gif"></div>
<br><div style="height:450px; width:100px; background-color:#FFFFFF; float:left;"></div>
<div style="height:450px; float:left; background-color:#FFFFFF;">
<div style="height:30px;  background-color:#FFFFFF; margin-left:100px;">

subject : 
&nbsp;&nbsp;<input type="text" size=80 name="subject" value="<?=$item_subject?>"></div>
<br>
<div class="clear"></div>

<div style="height:50px; background-color:#FFFFFF; margin-top:10px; margin-left;60ppx;"> &nbsp;&nbsp;&nbsp;이미지 업로드 : 
<input type="file" name="upfile[]"> &nbsp;&nbsp; 
<br>
</div>
<div style="float:left; height:50px; width:600px; margin-right:10px;"><input type="image" src="./s_img/글쓰기_save버튼.gif" style="float:right;"></form>&nbsp;&nbsp;</div>
<div style="float:left; height:50px; width:100px;">
<form name="write_form" method="post" action="list_board.php"><input type="image" src="./s_img/글쓰기_list버튼.gif"></form></div>
</div><!--textarea-zone end-->
</div>
</div> <!-- end of content -->
</div> <!-- end of wrap -->
</body>
</html>