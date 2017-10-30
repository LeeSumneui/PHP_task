<?
	session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="euc-kf">
<link href="../css/common2.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/member.css" rel="stylesheet" type="text/css" media="all">
<script>
	function check_id()
	{
		window.open("check_id.php?id="+document.member_form.id.value,"IDcheck","left=200,top=200,width=200,height=60,scrollbars=no,resizable=yes");
	}
	
	function check_input()
{
	if(!document.member_form.id.value)
	{
		alert("아이디를 입력하세요");
		document.member_form.id.focus();
		return;
	}
	if(!document.member_form.pw.value)
	{
		alert("비밀번호를 입력하세요");
		document.member_form.pw.focus();
		return;
	}
	if(!document.member_form.pw_confirm.value)
	{
		alert("비밀번호를 확인해주세요");
		document.member_form.pw_confirm.focus();
		return;
	}
	if(!document.member_form.name.value)
	{
		alert("이름을 입력하세요");
		document.member_form.name.focus();
		return;
	}
	if(!document.member_form.gender)
	{
		alert("성별을 선택하세요");
		document.member_form.gender.focus();
		return;
	}
	if(!document.member_form.ph1.value || !document.member_form.ph2.value || !document.member_form.ph3.value)
	{
		alert("연락처를 입력하세요");
		document.member_form.ph1.focus();
		return;
	}
	if(document.member_form.pw.value != document.member_form.pw_confirm.value)
	{
		alert("비밀번호가 일치하지 않습니다. \n 다시 입력해주세요.");
		document.member_form.pw.focus();
		document.member_form.pw.select();
		return;
	}
	document.member_form.submit();

}
	function reset_form()
	{
		document.member_form.id.value="";
		document.member_form.pw.value="";
		document.member_form.pw_confirm.value="";
		document.member_form.gender.value[0]="";
		document.member_form.gender.value[1]="";
		document.member_form.name.value="";
		document.member_form.address.value="";
		document.member_form.ph_agency.value="SKT";
		document.member_form.ph1.value="";
		document.member_form.ph2.value="";
		document.member_form.ph3.value="";
		document.member_form.email.value="";
		document.member_form.email_domain.value="";
		
		document.member_form.id.focus();
	
		return;
	}
</script>

</head>
<body>
<div id="wrap">
<div id="header">
	<? include "./lib/top_login.php";?>
<div>
	<a href="index.php"><img src="./s_img/main.gif" border="0"></a>
</div>
<div>
	<? include "./lib/menubar.php"; ?>
</div>

<div id="content">
<div id="col1">

</div>

<div id="col2">
	<form name="member_form" method="post" action="insert.php">
	<div id="title">
		<img src ="./s_img/회원가입.gif">
	</div>

	<div id="form_join">
	<div id="join1">
		<ul>
		<li> 아이디 * </li>
		<li> 비밀번호 * </li>
		<li> 비밀번호 확인 * </li>
		<li> 이름 * </li>
		<li> 성별 * </li>
		<li> 주소 </li>
		<li> 연락처 *</li>
		<li> email </li>
		</ul>
	</div>
	<div id="join2">
		<ul>
		<li><div id="id1"><input type="text" name="id" size=16 maxlength=16></div>
		     <div id="id2"><a href="#;" ><img src="../img/check_id.gif" onclick="check_id()"></a></div><div id="id3">(영문소문자/숫자, 4~16자)</div></li>
		<li><input type="password" name="pw" size=16 maxlength=16></li>
		<li><input type="password" name="pw_confirm" size=16 maxlength=16></li>
		<li><input type="text" name="name" size=10></li>
		<li><input type="radio" name="gender" value="M"> 남<input type="radio" name="gender" value="W">여</li>
		<li><input type="text" name="address" size=32></li>
		<li><select name="agency">
			<option value="SKT">SKT</option>
			<option value="KT">KT</option>
			<option value="LGU+">LGU+</option>
		     </select>&nbsp;&nbsp;
		     <input type="text" name="ph1" size=4 maxlength=3>- 
		     <input type="text" name="ph2" size=4 maxlength=4>-
		     <input type="text" name="ph3" size=4 maxlength=4></li>
		<li><input type="text" name="email" size=10> @ <input type="text" name="email_domain" size=10>
		<ul>
	</div>
	<div class="clear"></div>
	<div style="height:17px"></div>
	<div id="must"> * 는 필수 입력항목 입니다. </div>
</div>
<div id="button"><a href="#;"><img src="../img/button_save.gif" onclick="check_input()"></a>&nbsp;&nbsp;
		<a href="#;"><img src="../img/button_reset.gif" onclick="reset_form()"></a></div>
</form>
</div>
</div>
</div>

</body>
</html>