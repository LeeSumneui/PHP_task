<?
	session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link rel="stylesheet" type="text/css" href="css/common2.css">

<script>
	function modify()
	{
		if(!document.member_form.pw.value)
		{
			alert("��й�ȣ�� �Է����ּ���");
			return;
		}
		if(!document.member_form.pw_confirm.value)
		{
			alert("��й�ȣ�� Ȯ�����ּ���");
			return;
		}
		if(document.member_form.pw.value != document.member_form.pw_confirm.value)
		{
			alert("��й�ȣ�� ��ġ���� �ʽ��ϴ�");
			return;
		}
		if(!document.member_form.name.value)
		{
			alert("�̸��� �Է����ּ���");
			return;
		}
		if(!document.member_form.gender.value)
		{
			alert("������ �Է����ּ���");
			return;
		}
		if(!document.member_form.ph1.value || !document.member_form.ph2.value || !document.member_form.ph3.value)
		{
			alert("����ó�� �Է����ּ���");
			return;
		}

		document.member_form.submit();

	}
	
</script>
</head>
<?
	include "./lib/dbconn.php";
	
	$sql = "select * from member where id='$userid'";
	$result = mysql_query($sql,$connect);
	$row=mysql_fetch_array($result);

	$hp=explode("-",$row[ph]);
	$ph1 = $hp[0];
	$ph2 = $hp[1];
	$ph3 = $hp[2];

	$email = explode("@",$row[email],2);
	$email_id = $email[0];
	$email_domain = $email[1];

	mysql_close();
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
<div style="height:50px; width:1000px; background-color:#FFFFFF;">
</div>
<div style="height:50px; width:1000px; background-color:#FFFFFF;">
</div>
<div style="height:350px; width:200px; background-color:#FFFFFF; float:left;">
</div>
<div style="float:left; margin-left:50px;"> ��������<br><br>

<form name="member_form" method="post" action="member_modify.php">
	���̵� * : <?=$row[id]?> <br>
	��й�ȣ * : <input type="password" name="pw" size=16><br>
	��й�ȣ Ȯ�� * : <input type="password" name="pw_confirm" size=16><br>
	�̸� * : <input type="text" name="name" size=16 value="<?=$row[name]?>"><br>
	���� * : <?=$row[gender]?><br>
	�ּ� : <input type="text" name="address"  size=16 value="<?=$row[address]?>"> <br>
	����ó * :<select name="agency">
			<option value="SKT"<? if($row[ph_agency]=="SKT") echo"selected";?>>SKT</option>
			<option value="KT"<? if($row[ph_agency]=="KT") echo"selected";?>>KT</option>
			<option value="LGU+"<? if($row[ph_agency]=="LGU+") echo"selected";?>>LGU+</option>
		     </select>  <input type="text" name="ph1" size=4 maxlength=3 value="<?=$ph1?>">- 
		     <input type="text" name="ph2" size=4 maxlength=4 value="<?=$ph2?>">-
		     <input type="text" name="ph3" size=4 maxlength=4 value="<?=$ph3?>"><br>
	�̸��� : <input type="text" name="email" size=10 value="<?=$email_id?>"> @ <input type="text" name="email_domain" size=10 value="<?=$email_domain?>"> 
	<br> * �׸��� �ʼ��Է��׸� �Դϴ�. <br><br>
	<input type="submit" value="�����ϱ�" onclick="modify()">
&nbsp;&nbsp; 
	<input type="button" value="���" onclick="reset()">
</form>
</div>
</div> <!-- end of content -->
</div> <!-- end of wrap -->
</body>
</html>