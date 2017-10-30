<?
	session_start();
?>
<?	
	if(!$userid)
	{
		echo "<script> window.alert('로그인 후 이용해주세요'); history.go(-1); </script>";
		exit;
	}
	if(!$subject)
	{
		echo ("<script> window.alert('제목을 입력하세요');
			history.go(-1); location.reload(true); </script>");
		exit;
	}
	if(!$content)
	{
		echo "<script> window.alert('내용을 입력하세요'); 
			history.go(-1); location.reload(true); </script>";
		exit;
	}
	
	$register_day=date("Y-m-h(H:i)");
	include "./lib/dbconn.php";

		$upfile_name = $_FILES["upfile"]["name"];
		$upfile_tmp_name = $_FILES["upfile"]["tmp_name"];
		$upfile_type = $_FILES["upfile"]["type"];
		$upfile_size = $_FILES["upfile"]["size"];
		$upfile_error = $_FILES["upfile"]["error"];

		$files=$_FILES["upfile"];
		$count=count($files["name"]);
		
		$file=explode(".",$upfile_name);
		$file_name=$file[0];
		$file_ext=$file[1];

		$upload_dir = './data/';

	if(!$upfile_error)
	{
		$new_file_name = date("Y_m_d_H_i_s");
		$new_file_name = $new_file_name."_".$i;
		$copied_file_name = $new_file_name.".".$file_ext;
		$uploaded_file = $upload_dir.$copied_file_name;
	
		if(!move_uploaded_file($upfile_tmp_name, $uploaded_file))
		{
			echo "<script>alert('파일을 디렉토리에 복사하는데 실패했습니다.'); history.go(-1) </script>";
			exit;
		}
	}


	if($mode=="modify")
	{
		$position = $_POST['del_file'];
		$index = $position;
		$del_ok[$index]="y";
	
	
		$sql = "select  * from $table where num=$num";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);

		$sql="select * from $gallery where num=$num";
		$result=mysql_query($sql);
		$row = mysql_fetch_array($result);

		$field_org_name="file_name";
		$field_real_name="file_copied";

		$org_name_value=$upfile_name;
		$org_real_value=$copied_file_name;
		

		if($del_ok=='y')
		{
			$delete_name = $row[file_copied];
			$delete_path="./data/".$delete_name;
			unlink($delete_path);

			$sql="update gallery set file_name='$upfile_value', file_copied='$copied_file_name' where num='$num'";
			mysql_query($sql,$connect);
		}
		else
		{
			if(!$upfile_error)
			{
				$sql = "update gallery set file_name='$upfile_name', file_copied='$copide_file_name where num='$num''";
				mysql_query($sql,$connect);
			}
		}

	}	
	else
	{
		$content=htmlspecialchars($content);
		$sql="insert into gallery(id, subject, context, register_day, click, file_name, file_copied) values
			('$userid','$subject','$context','$register_day','$click','$file_name','$file_copied')";
		mysql_query($sql);
	}
	
	mysql_close();
	
	echo "<script> location.href = 'gallery_main.php?page=$page';</script>";
	echo "subject : ".$subject;
	echo "<br>content : ".$content;
	echo "<br>file : ".$new_file_name;
?>