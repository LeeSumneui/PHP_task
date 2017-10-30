<?
	session_start();
?>
<!DOCTYPE HTMP PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> <metacharse = "euc-kr">
<style type = "text/css">
	a{text-decoration:none; color:white;}
	#menu_upper{background:#FFFFFF; height: 30px;}
	#menu_upper>ul>li{border:1px; list-style: none; float: left; line-height: 30px; vertical-align: middle; text-align: center;  padding-left: 20px; }
	#menu_lower{background:#EEEEEE; height: 30px;}
	#menu_lower>ul>li{border:1px; list-style: none; float: left; padding-left: 120px;  line-height: 30px; vertical-align: middle;  }
	#main{height:300px; background-color:#FFCCFF; margin-top=30px; }
	#join{width:700px; height:700px;}
	#constraint{color:#555555; font-size:4pt;}
	#margin_side{width:300px; float:left;}

</style>
<script>
function check_id()
{
	window.open("check_id.php?id="+document.join.id.value,"IDcheck","left=200,top=200,width=200,height=60, scrollbar=no, resizable=no);
}
function check_input()
{
	if(!document.join.form.id.value)
	{
		alter("아이디를 입력하세요");
		document.join.id.focus();
		return;
	}
	if(!document.join.form.pw.value)
	{
		alter("비밀번호를 입력하세요");
		document.join.pw.focus();
		return;
	}
	if(!document.join.form.pw_confirm.value)
	{
		alter("비밀번호를 확인해주세요");
		document.join.pw_confirm.focus();
		return;
	}
	if(!document.join.form.name.value)
	{
		alter("이름을 입력하세요");
		document.join.name.focus();
		return;
	}
	if(document.join.pw.value != !document.join.pw_confirm.value)
	{
		alter("비밀번호가 일치하지 않습니다. \n 다시 입력해주세요.");
		document.join.pw.focus();
		document.join.pw.select();
		return;
	}
	document.join.submit();
}
</script>
</head>
<body>

<div id="menu_upper">

	<ul>
		<li>LOGIN</a></li>
		<li>JOIN</li>
	</ul>
</div>
<div id = "main"></div>
<div id="menu_lower">
	<ul>
		<li>고양이 종류</li>
		<li>고양이 먹이</li>
		<li>고양이 용품</li>
		<li>고양이 키우는 팁</li>
		<li>회원 게시판</li>
	</ul>
</div>
<div id="margin_side">
</div>
<div id="join">
<form name="join" method="post" action="insert.php">
	<table align="center"width=600 height=450 border=0>
		<tr align="left"><td width=140  bgcolor=#EEEEEE>&nbsp;아이디 *</td><td id="constraint"   bgcolor=#EEEEEE>&nbsp;<input type="text" name="id" size=16>  (영문소문자/숫자, 4~16자) &nbsp;&nbsp; <input type="button" value="중복확인"></td></tr> 
		<tr align="left"><td width=140  bgcolor=#EEEEEE>&nbsp;비밀번호 *</td><td id="constraint">&nbsp;<input type="password" name="pw" size=16>  (영문대소문자/숫자, 8~16자) </td></tr> 
		<tr align="left"><td width=140  bgcolor=#EEEEEE>&nbsp;비밀번호 확인 *</td><td>&nbsp;<input type="text" name="id" size=16> </td></tr>
		<tr align="left"><td width=140  bgcolor=#EEEEEE>&nbsp;이름 *</td><td>&nbsp;<input type="text" name="name" size=16></td></tr> 
		<tr align="left"><td width=140  bgcolor=#EEEEEE>&nbsp;주소</td><td>&nbsp;<input type="text" name="address" size=35></td></tr> 
		<tr align="left"><td width=140  bgcolor=#EEEEEE>&nbsp;휴대전화</td><td>&nbsp;<select name="hp_a">
							<option value=SKT'>SKT</option>
							<option value='KT'>KT</option>
							<option value='LGU+'>LGU+</option> 
							  &nbsp;&nbsp;<input type="text" name="hp1"  size=5> - <input type="text" name="hp2"  size=5> - <input type="text" name="hp3"  size=5></td></tr>
		<tr align="left"><td width=140  bgcolor=#EEEEEE>&nbsp;이메일</td><td>&nbsp;<input type="text" name="email" size=16> @ <input type="text" name="email_domain" size=16></td></tr>
		<tr align="center"><td colspan=2>고양이를 키우시나요? *   <input type="radio" name="raise">YES&nbsp&nbsp<input type="radio" name="raise"> NO</td></tr>
		<tr><td align="right">
	</table>
	<table>
		<tr><td width=600 align="center"><input type="submit" value="회원가입"></td></tr>
	</table>
</form>
</div>

</body>
</html>