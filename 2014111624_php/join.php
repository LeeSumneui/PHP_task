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
		alter("���̵� �Է��ϼ���");
		document.join.id.focus();
		return;
	}
	if(!document.join.form.pw.value)
	{
		alter("��й�ȣ�� �Է��ϼ���");
		document.join.pw.focus();
		return;
	}
	if(!document.join.form.pw_confirm.value)
	{
		alter("��й�ȣ�� Ȯ�����ּ���");
		document.join.pw_confirm.focus();
		return;
	}
	if(!document.join.form.name.value)
	{
		alter("�̸��� �Է��ϼ���");
		document.join.name.focus();
		return;
	}
	if(document.join.pw.value != !document.join.pw_confirm.value)
	{
		alter("��й�ȣ�� ��ġ���� �ʽ��ϴ�. \n �ٽ� �Է����ּ���.");
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
		<li>����� ����</li>
		<li>����� ����</li>
		<li>����� ��ǰ</li>
		<li>����� Ű��� ��</li>
		<li>ȸ�� �Խ���</li>
	</ul>
</div>
<div id="margin_side">
</div>
<div id="join">
<form name="join" method="post" action="insert.php">
	<table align="center"width=600 height=450 border=0>
		<tr align="left"><td width=140  bgcolor=#EEEEEE>&nbsp;���̵� *</td><td id="constraint"   bgcolor=#EEEEEE>&nbsp;<input type="text" name="id" size=16>  (�����ҹ���/����, 4~16��) &nbsp;&nbsp; <input type="button" value="�ߺ�Ȯ��"></td></tr> 
		<tr align="left"><td width=140  bgcolor=#EEEEEE>&nbsp;��й�ȣ *</td><td id="constraint">&nbsp;<input type="password" name="pw" size=16>  (������ҹ���/����, 8~16��) </td></tr> 
		<tr align="left"><td width=140  bgcolor=#EEEEEE>&nbsp;��й�ȣ Ȯ�� *</td><td>&nbsp;<input type="text" name="id" size=16> </td></tr>
		<tr align="left"><td width=140  bgcolor=#EEEEEE>&nbsp;�̸� *</td><td>&nbsp;<input type="text" name="name" size=16></td></tr> 
		<tr align="left"><td width=140  bgcolor=#EEEEEE>&nbsp;�ּ�</td><td>&nbsp;<input type="text" name="address" size=35></td></tr> 
		<tr align="left"><td width=140  bgcolor=#EEEEEE>&nbsp;�޴���ȭ</td><td>&nbsp;<select name="hp_a">
							<option value=SKT'>SKT</option>
							<option value='KT'>KT</option>
							<option value='LGU+'>LGU+</option> 
							  &nbsp;&nbsp;<input type="text" name="hp1"  size=5> - <input type="text" name="hp2"  size=5> - <input type="text" name="hp3"  size=5></td></tr>
		<tr align="left"><td width=140  bgcolor=#EEEEEE>&nbsp;�̸���</td><td>&nbsp;<input type="text" name="email" size=16> @ <input type="text" name="email_domain" size=16></td></tr>
		<tr align="center"><td colspan=2>����̸� Ű��ó���? *   <input type="radio" name="raise">YES&nbsp&nbsp<input type="radio" name="raise"> NO</td></tr>
		<tr><td align="right">
	</table>
	<table>
		<tr><td width=600 align="center"><input type="submit" value="ȸ������"></td></tr>
	</table>
</form>
</div>

</body>
</html>