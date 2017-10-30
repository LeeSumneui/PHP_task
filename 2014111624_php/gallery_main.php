<?
	session_start();
	$table = "gallery";
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

	$scale=6;

	$sql = "select * from gallery order by num desc";

	$result = mysql_query($sql,$connect);
	$total_record = mysql_num_rows($result);

	$row = mysql_fetch_array($result);
	
	$subject = $row[subject];

	if($total_record % $scale==0)
		$total_page=floor($total_record/$scale);
	else
		$total_page=floor($total_record/$scale) + 1;

	if(!$page)
		$page=1;

	$start = ($page-1) * $scale;
	

	$number = $total_record - $start;
	


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
<div style="height:20px; width:100%; background-color:#FFFFFF;"></div>
<div class="clear"></div>
<div style="height:500px; width:100px; background-color:#FFFFFF; float:left"></div>

<div style="height:70px; width:800px; background-color:#FFFFFF; float:left;"><img src="./s_img/gallery_main_bar.gif"></div>
<div style="heigth:20px; float:left; background-color:#F0EE9F;"></div>
<br><br>
<div style="height:700px; width:800px; background-color:#FFFFFF; float:left;">

	<?
		for($i=$start; $i<$start+$scale && $i<$total_record; $i++)
		{
			mysql_data_seek($result,$i);
			$row = mysql_fetch_array($result);

			$item_num = $row[num];
			$item_id = $row[id];
			$item_click = $row[click];
			$item_subject = str_replace(" ", "&nbsp;", $row[subject]);
			$image_name=$row[file_name];
			$image_copied=$row[file_copied];
	

			if($image_copied)
			{
				$imageinfo = GetImageSize("./data/".$image_copied);
				$image_width = $imageinfo[0];
				$image_height = $imageinfo[1];
				$image_type = $imageinfo[2];
			
				if($image_width>200 && $image_height>250)
				{
					$image_width = 200;
					$image_height = 250;
				}
				else
				{
					$image_width = 200;
					$image_height = 250;
				}
			}
			else
			{
				$image_width = "";
				$image_height = "";
				$image_size = "";
			}

	?>

	<div style="height:320px; width:200px; float:left; background-color:#FFFFFF; padding:10px; margin-left:15px; margin-bottom:15px;">
	<div style="height:15px; width:200px; background-color:#FFFFFF; text-align:center;"><?=$number?></div><br>
	<div style="height:250px; width:200px; background-color:#FFFFFF;">
	<?
			if($image_copied)
			{
				$image_name = $image_copied;
				$img_name = "./data/".$image_name;
				$img_width = $image_width;
	?>	
	<a href = "image_view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>">
	<img src = '<?=$img_name?>' width = '<?=$image_width?>' height = '<?=$image_height?>'></a>
	<?
			}
	?>
	</div>
	<br>
	<div style="height:15px; width:200px; background-color:#FFFFFF;">
		<a href="image_view.php?table=gallery&num=<?=$item_num?>&page=<?=$page?>"><?=$item_subject?></a></div>
	</div>
	<?
		$number--;
		}
	?>
</div>
</div>
<div style="height:40px; width:300px; background-color:#FFFFFF; float:left;"></div>
<div style="height:40px; width:400px; background-color:#FFFFFF; float:left;  text-align:center; align:middle;">
	◀ 이전 &nbsp;&nbsp;&nbsp;&nbsp;
	<?
		for($i=1; $i<=$total_page; $i++)
		{
			if($page==$i)
				echo "<b> $i </b>";
			else
				echo "<a href='gallery_main.php?table=$table&page=$i'> $i </a>";
		}
	?>
	&nbsp;&nbsp;&nbsp;&nbsp; 다음 ▶ 
</div>
<div style="height:40px; width:200px; background-color:#FFFFFF; float:left;">
<?
	if($userid)
	{ ?>
	<a href = "image_load_form.php?table=<?=$table?>&page=<?=$page?>"><img src="./s_img/board_write버튼.gif" style="float:right; padding-right:15px;"></a>
<?
	}
?>
</div><!--버튼-->
</div> <!-- end of content -->
</div> <!-- end of wrap -->
</body>
</html>