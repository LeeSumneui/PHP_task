	<div style="float:right">
<?
	if(!$userid)
	{
?>
	<a href="login_form.php"> �α���</a>&nbsp;&nbsp;
	<a href="member_form.php"> ȸ������</a>
<?
	}
	else
	{
?>

	<b><?=$userid?>&nbsp;�� &nbsp; &nbsp;
	<a href="logout.php"> �α׾ƿ�</a>&nbsp;&nbsp;
	<a href="member_modify_form.php"> ��������</a>
<?
	}
?>
	</div>