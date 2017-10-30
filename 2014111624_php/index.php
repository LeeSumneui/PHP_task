<?
	session_start();
	
	include "./lib/dbconn.php";
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
	<div style="background-color:#FFFFF; width:100%; height:50px;"><img src="./s_img/banner.gif"></div>
	<div style="background-color:#FFFFF; width:100%; height:150px;">
	<a href ="http://www.catpre.com/shop/main/index.php?ref=nav_logo"> <img src="./s_img/banner_1.gif"></a>
	&nbsp;&nbsp;&nbsp;
	<a href ="http://www.catskingdom.co.kr/shop/main/index.php?n_media=27758&n_query=%EA%B3%A0%EC%96%91%EC%9D%B4&n_rank=4&n_ad_group=grp-m001-01-000000225474122&n_ad=nad-a001-01-000000006030260&n_keyword_id=nkw-m001-01-000000225474122&n_keyword=%EA%B3%A0%EC%96%91%EC%9D%B4&n_campaign_type=1&NaPm=ct%3Diweu1qy0%7Cci%3D0A40003TVirmmfXD4KPv%7Ctr%3Dsa%7Chk%3Db96500511cd8ee9181e1d98d11e29348500a1f4e"> <img src="./s_img/banner_2.gif"></a>
	&nbsp;&nbsp;&nbsp;
	<a href ="http://www.minicats.co.kr/shop/main/index.php?n_media=27758&n_query=%EA%B3%A0%EC%96%91%EC%9D%B4&n_rank=3&n_ad_group=grp-a001-01-000000001050745&n_ad=nad-a001-01-000000003003769&n_keyword_id=nkw-a001-01-000000177892422&n_keyword=%EA%B3%A0%EC%96%91%EC%9D%B4&n_campaign_type=1"> <img src="./s_img/banner_3.gif"></a>
	<div style="background-color:#FFFFFF; width:150px; height:150px; float:left;"></div>
	<div class="clear"></div>

	<div style="background-color:#FFFFFF; width:100%; height:50px;"><img src="./s_img/index_board.gif"></div>
	<div style="background-color:#FFFFFF; width:100%; height:150px;">
	<div style="background-color:#FFFFFF; width:150px; height:150px; float:left;"></div>
	<div style="background-color:#FFFFFF; height:150px; float:left;">
	<div style="background-color:#FFFFFF; height:30px; float:left:"><img src="./s_img/index_subid.gif"></div>
	<br>
<?
	$sql = "select * from board order by num desc limit 4";
	$result = mysql_query($sql,$connect);
	
	while($row=mysql_fetch_array($result))
	{
		$subject = $row[subject];
		$item_id = $row[id];
?>

<div style = "height:30px; width:380px; background-color:#FFFFFF; float:left; margin-left:20px;"><a href="view_writing.php?num=<?=$item_num?>&page=<?=$page?>"><?=$subject?></a></div>
<div style = "height:30px; width:110px; background-color:#FFFFFF; float:left; margin-left:10px; text-align:center;"><?=$item_id?></div>
<div class="clear"></div>
<?
	
	}
?>
	</div>
	</div>
	<br>
	<br>
	<div style="background-color:#FFFFFF; width:100%; height:50px;"><img src="./s_img/index_gallery.gif"></div>
	<div style="background-color:#FFFFFF; width:100%; height:350px;">

	<div style="background-color:#FFFFFF; width:150px; height:150px; float:left;"></div>
<?
	$sql="select * from gallery order by num desc limit 3";
	$result = mysql_query($sql,$connect);
	
	while($row=mysql_fetch_array($result))
	{

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
		echo "</div>";
		}
	?>

</div> <!-- end of content -->
</div> <!-- end of wrap -->
</body>
</html>