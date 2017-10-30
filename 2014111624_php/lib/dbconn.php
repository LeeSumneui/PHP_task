<?
    $connect=mysql_connect( "localhost", "sumin", "5213") or  
        die( "SQL server에 연결할 수 없습니다."); 

    mysql_select_db("sumin_db",$connect);
?>
