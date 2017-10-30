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
<?
	include "./lib/dbconn.php";

		$scale = 10;
	
		if($mode=="search")
		{
			if(!$search)
			{
				echo "<script> window.alert('검색할 단어를 입력해 주세요!'); history.go(-1);<script>";
				exit;
			}
		if($search_type == subject)
			$sql = "select * from board where subject like '%$search%' order by num desc";
		if($search_type == content)
			$sql = "select * from board where content like '%$search%' order by num desc";
		if($search_type == catagory)
		{
			if($search==냥information)
			{	
				$search_string="information";
			}
			if($search==냥이냠냠)
			{	
				$search_string="food";
			}	
			if($search==냥이용품)
			{	
				$search_string="goods";
			}	
			if($search==집사팁)
			{	
				$search_string="tip";
			}	
			if($search==사담)
			{	
				$search_string="chat";
			}	
			$sql = "select * from board where catagory like '%$search_string%' order by num desc";
		}
		if($search_type == id)
			$sql = "select * from board where id like '%$search%' order by num desc";
		}
		else
		{
			$sql = "select * from board order by num desc";
		}
		$result = mysql_query($sql,$connect);
		$total_record = mysql_num_rows($result);
	
		if($total_record % $scale==0)
			$total_page=floor($total_record/$scale);
		else
			$total_page=floor($total_record/$scale)+1;
		
		if(!$page)
			$page=1;

		$start=($page-1) * $scale;

		$number=$total_record - $start;		
	
?>
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
	<br> <div style="height:50px; background-color:#FFFFFF; "></div>
<br><div style="height:450px; width:100px; background-color:#FFFFFF; float:left;"></div>
<div style="height:450px; width:800px; float:left; background-color:#FFFFFF;">

<form name="board_form" method="post" action="list_board.php?mode=search">
<div style="height:60px; width:300px; background-color:#FFFFFF; float:right;"> 글 찾기 : &nbsp
<select name="search_type"><option value="subject">제목</option>
<option value="content">내용</option>
<option value="catagory">말머리</option>
<option value="id">작성자</option>
</select>

<input type="text" size=10 name="search">&nbsp<input type="image" src="./s_img/게시판list_search버튼.gif" style="margin-top:10px;">

</form>
</div>
<div class="clear"></div>
<div style = "height:30px; width:60px; background-color:#FFFFFF; float:left; margin-left:0px;"><img src="./s_img/board_글번호.gif"></div>
<div style = "height:30px; width:100px; background-color:#3e5c9a; float:left; margin-left:20px;"><img src="./s_img/board_말머리.gif"></div>
<div style = "height:30px; width:400px; background-color:#FFFFFF; float:left; margin-left:0px;"><img src="./s_img/board_제목.gif"></div>
<div style = "height:30px; width:110px; background-color:#FFFFFF; float:left; margin-left:0px;"><img src="./s_img/board_작성자.gif"></div>
<div style = "height:30px; width:100px; background-color:#FFFFFF; float:left; margin-left:0px;"><img src="./s_img/board_작성일.gif"></div>
<div class="clear"></div>
<div style="height:5px;"></div>
<?
	for($i=$start; $i<$start+$scale && $i<$total_record; $i++)
	{
		mysql_data_seek($result, $i);
		$row = mysql_fetch_array($result);

		$item_num=$row[num];
		$item_id=$row[id];
		$item_click=$row[click];
		$date=$row[register_day];
		$item_date=substr($date,0,10);
		$item_subject=str_replace(" ","&nbsp;",$row[subject]);
		if($row[catagory]=="information")
			$item_catagory="냥information";
		if($row[catagory]=='chat')
			$item_catagory="사담";
		if($row[catagory]=='food')
			$item_catagory="냥이냠냠";
		if($row[catagory]=='goods')
			$item_catagory="냥이용품";
		if($row[catagory]=='tip')
			$item_catagory="집사팁";
?>
<div style = "height:30px; width:60px; background-color:#FFFFFF; float:left; margin-left:0px; text-align:center;"><?=$number?></div>
<div style = "height:30px; width:100px; background-color:#FFFFFF; float:left; margin-left:10px; text-align:center;"><?=$item_catagory?></div>
<div style = "height:30px; width:380px; background-color:#FFFFFF; float:left; margin-left:20px;"><a href="view_writing.php?num=<?=$item_num?>&page=<?=$page?>"><?=$item_subject?></a></div>
<div style = "height:30px; width:110px; background-color:#FFFFFF; float:left; margin-left:10px; text-align:center;"><?=$item_id?></div>
<div style = "height:30px; width:100px; background-color:#FFFFFF; float:left; margin-left:10px; text-align:center;"><?=$item_date?></div>
<div class="clear"></div>
<?
	$number--;
	}
?>
<div style="height:15px; margin-left:300px; background-color:#FFFFFF; float:left;  text-align:center; ">◀ 이전&nbsp;&nbsp;&nbsp;&nbsp; 
<?
	for($i=1; $i<=$total_page; $i++)
	{
		if($page==$i)
		{
			echo "<b> $i </b>";
		}
		else
		{
			echo "<a href='list_board.php?page=$i'> $i </a>";
		}
	}
?>
&nbsp; &nbsp; &nbsp; &nbsp; 다음 ▶</div>
<form method="post" action="write_form.php">
<?
	if($userid)
	{
		echo "<div style='float:right; margin-right:50px;'><input type='image' src='./s_img/board_write버튼.gif'></div>";	
	}
?>
<div style="float:left; ">
</form>
</div>
</div><!-- textarea zone end -->
</div>
</form>
</div> <!-- end of content -->
</div> <!-- end of wrap -->
</body>
</html>