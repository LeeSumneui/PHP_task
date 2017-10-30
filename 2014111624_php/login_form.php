<?
	session_start();
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

#login_banner{
	width:40px;
	height:1000px
	background-color:#000000;
}
</style>
<script>
	function login_input()
	{
		if(!document.member_form.id.value)
		{
			window.alert('아이디를 입력하세요.');
		}
		else if(!document.member_form.pw.value)
		{
			window.alert('비밀번호를 입력하세요.');
		}
		else
		{
			document.member_form.submit();
		}
	}
</script>
</head>

<body>
<div id="wrap">	
<div id="header">
	<? include "./lib/top_login.php";?>
</div>  <!-- end of header -->	
<div >	
	<a href="index.php"><img src="./s_img/main.gif" border="0"></a>
</div>
<div id="menu">	
	<? include "./lib/menubar.php"; ?>	
</div>  <!-- end of menu -->  
<div id = "content">
<div style="height:50px; width:1000px; background-color:#FFFFFF;">
</div>
<div style="height:50px; width:1000px; background-color:#FFFFFF;">
</div>
<div style="height:350px; width:200px; background-color:#FFFFFF; float:left;">
</div>
<form name="member_form" method="post" action="login.php">
<div style="margin-top:105px; margin-left:100px; width:100px; background-color:#FFFFFF; float:left;">
아이디    : <br>
<br>
비밀번호 : <br>
</div>
<div style="margin-top:100px; width:200px; background-color:#FFFFFF; float:left;">
<input type="text" name="id" size=20><br><br>
<input type="password" name="pw" size=21><br>
</div>
<div style="margin-top:100px; margin-left:10px; float:left;">
	<a href="#;"><img src="./s_img/login버튼.gif" onclick = "login_input()"></a>

</div>
</div>
</form>
</div> <!-- end of content -->
</div> <!-- end of wrap -->

</body>
</html>