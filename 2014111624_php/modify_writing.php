<?
	session_start();
	
	include "./lib/dbconn.php";
	
	$sql="select * from board where num='$num'";
	$result = mysql_query($sql,$connect);
	
	$row=mysql_fetch_array($result);

	$item_num=$row[num];
	$item_id=$row[id];
	$item_click=$row[click];
	$date=$row[register_day];
	$item_date=substr($date,0,10);
	$item_subject=str_replace(" ","&nbsp;",$row[subject]);
	$item_content=str_replace(" ","&nbsp;",$row[content]);
	
	$new_click=$item_click+1;
	$sql = "update board set click='$new_click' where num='$item_num'";
	mysql_query($sql,$connect);
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
<form name="write_form" method="post" action="insert_content.php?mode=modify&num=<?=$num?>&page=<?=$page?>">
	<div style="height:50px; background-color:#FFFFFF;"></div>
	<br> <div style="height:50px; background-color:#FFFFFF; ">게시글 쓰기</div>
<br><div style="height:450px; width:100px; background-color:#FFFFFF; float:left;"></div>
<div style="height:450px; float:left; background-color:#FFFFFF;">
<div style="height:60px;  background-color:#DDDDDD; margin-left:100px;"> &nbsp;제목 : &nbsp;<input type="text" size=80 name="subject" value="<?=$item_subject?>">&nbsp;</div>
<div class="clear"></div>
<div style="height:350px; background-color:#EEEEEE; float:left; margin-left:100px;">&nbsp;내용 <div class="clear"></div><textarea rows="15" cols="95" name="content"><?=$item_content?></textarea>
<br><br><div style="float:right; "><input type="submit" name="modify" value="modify"></div>
</div><!--textarea-zone end-->
</div>
</form>
</div> <!-- end of content -->
</div> <!-- end of wrap -->
</body>
</html>