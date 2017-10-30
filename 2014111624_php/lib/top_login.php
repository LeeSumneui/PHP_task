	<div style="float:right">
<?
	if(!$userid)
	{
?>
	<a href="login_form.php"> 로그인</a>&nbsp;&nbsp;
	<a href="member_form.php"> 회원가입</a>
<?
	}
	else
	{
?>

	<b><?=$userid?>&nbsp;님 &nbsp; &nbsp;
	<a href="logout.php"> 로그아웃</a>&nbsp;&nbsp;
	<a href="member_modify_form.php"> 정보수정</a>
<?
	}
?>
	</div>