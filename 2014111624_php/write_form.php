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
<?

	include "./lib/dbconn.php";

	if($mode=="modify")
	{
		$sql="select * from board where num='$num'";
		$result = mysql_query($sql,$connect);
	
		$row=mysql_fetch_array($result);

		$item_num=$row[num];
		$item_id=$row[id];
		$item_click=$row[click];
		$item_subject=$row[subject];
		$item_content=$row[content];
	  	$item_catagory=$row[catagory];
	}
?>
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
<form name="write_form" method="post" action="insert_content.php">
	<div style="height:50px; background-color:#FFFFFF;"></div>

	<br><div style="height:50px; margin-right:150px;"><img src="./s_img/게시글쓰기.gif"></div>
<br><div style="height:450px; width:100px; background-color:#FFFFFF; float:left;"></div>
<div style="height:450px; float:left; background-color:#FFFFFF;">
<div style="height:30px;  background-color:#FFFFFF; margin-left:100px;">
<select name="catagory">
	<option value="information" <?if($item_catagory=="information") echo "selected";?>>[ 냥formaiton ]</option>
	<option value="food" <?if($item_catagory=="food") echo "selected";?>>[ 냥냥냠냠 ]</option>
	<option value="goods" <?if($item_catagory=="goods") echo "selected";?>>[ 냥이 용품 ]</option>
	<option value="tip" <?if($item_catagory=="tip") echo "selected";?>>[ 집사 팁 ]</option>
	<option value="chat" <?if($item_catagory=="chat") echo "selected";?>>[ 사담 ]</option>
</select>
&nbsp;&nbsp;<input type="text" size=80 name="subject" value="<?=$item_subject?>"></div>
<br>
<div class="clear"></div>
<div style="height:350px; background-color:#FFFFFF; float:left; margin-left:100px; text-align:'right';"> <div class="clear"></div><textarea rows="20" cols="95" name="content"><?=$item_content?></textarea>
<div class = "clear"></div>
<br><br>
<div style="float:left; height:30px; width:600px; margin-right:10px;"><input type="image" src="./s_img/글쓰기_save버튼.gif" style="float:right;"></form>&nbsp;&nbsp;</div>
<div style="float:left; height:30px; width:100px;">
<form name="write_form" method="post" action="list_board.php"><input type="image" src="./s_img/글쓰기_list버튼.gif"></form></div>
</div><!--textarea-zone end-->
</div>
</div> <!-- end of content -->
</div> <!-- end of wrap -->
</body>
</html>