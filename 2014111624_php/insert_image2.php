<?
	session_start();
?>
<?	

	if(!$subject)
	{
		echo ("<script> window.alert('������ �Է��ϼ���');
			history.go(-1); </script>");
		exit;
	}
	if(!$_FILES["upfile"]["name"][0])
	{
		echo ("<script> window.alert('�̹����� ����ϼ���');
			history.go(-1); </script>");
		exit;
	}
	
	$register_day=date("Y-m-h(H:i)");

		$upfile_name = $_FILES["upfile"]["name"][0];
		$upfile_tmp_name = $_FILES["upfile"]["tmp_name"][0];
		$upfile_type = $_FILES["upfile"]["type"][0];
		$upfile_size = $_FILES["upfile"]["size"][0];
		$upfile_error = $_FILES["upfile"]["error"][0];

		$file=explode(".",$upfile_name);
		$file_name=$file[0];
		$file_ext=$file[1];

		$upload_dir = './data/';
	echo "subject : ".$subject;
	echo "<br>content : ".$content;
	echo "<br>file : ".$upfile_name;

	if(!$upfile_error)
	{

		$new_file_name = date("Y_m_d_H_i_s");
		
		$copied_file_name = $new_file_name.".".$file_ext;
		$uploaded_file = $upload_dir.$copied_file_name;
	
		if(!$upfile_size>500000)
		{
			echo "<script>alert('���ε� ���� ũ�Ⱑ ������ �뷮�� �ʰ��մϴ�!'); histroy.go(-1)</script>";
			exit;
		}
		if(($upfile_type!="image.gif")&&($upfile_type!="image/jpeg")&&($upfile_type!="image.pjpeg")&&($upfile_type!="image/png"))
		{
			echo "<script>alert('�̹������� ����!'); histroy.go(-1)</script>";
			exit;
		}
		if(!move_uploaded_file($upfile_tmp_name, $uploaded_file))
		{
			echo "<script>alert('������ ���丮�� �����ϴµ� �����߽��ϴ�.');</script>";
			exit;
		}
		echo "<br>copied : ".$copied_file_name;
	}

	include "./lib/dbconn.php";

		$sql="insert into gallery(id, subject,  register_day, click, file_name, file_copied) values
			('$userid','$subject','$register_day','$click','$file_name','$copied_file_name')";
		mysql_query($sql);
	
	mysql_close();
	echo "<script> location.href='gallery_main.php?page=$page';</script>";

?>