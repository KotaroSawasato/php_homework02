<?php
$db_user = "root";
$db_pass = "root";
$db_name = "php_practice";

//mysqlに接続 
$mysqli = new mysqli("localhost", $db_user, $db_pass, $db_name);
?>

<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>学生情報登録</title>
	<?php 
	$data01 = $_POST['school_name'];
	$data02 = $_POST['student_number'];
	$data03 = $_POST['student_name'];
	$data04 = $_POST['comment'];
	$data05 = $_POST['sex'];
	$data06 = $_POST['grade'];
	?>
</head>

<body>
	<!--入力フォーム-->
	<form method="post" action ="db_access.php">
		学校名：<input type='text' name='school_name'/><br />
		学籍番号：<input type="text" name="student_number"><br />
		名前：<input type='text' name='student_name'><br />
		自己紹介：<br><textarea cols="40" rows="6" name="comment"></textarea><br />
		性別：<input type="radio" name="sex" value="男" checked="checked">男
		<input type="radio" name="sex" value="女">女<br />
		学年：<SELECT name="grade">
		<OPTION value="B1">B1</OPTION>
		<OPTION value="B2">B2</OPTION>
		<OPTION value="B3">B3</OPTION>
		<OPTION value="B4">B4</OPTION>
		<OPTION value="M1">M1</OPTION>
		<OPTION value="M2">M2</OPTION>
		<input type="submit" />
	</form>
	<hr>
	<?php
//フォームからのデータをデータベースに挿入
	if(!empty($data01) && isset($data02) && !empty($data03) && !empty($data04) && !empty($data05) && !empty($data06)){
		$mysqli->query("INSERT INTO `student_info` (`school_name`,`student_number`,`student_name`,`comment`,`sex`,`grade`) 
			VALUES ('".$data01."','".$data02."','".$data03."','".$data04."','".$data05."','".$data06."')");
	}

//データベースに登録してある内容を表示
	$sql = "SELECT * FROM `student_info`;";
	foreach ($mysqli->query($sql) as $row){
		echo $row['id'].":";
		echo $row['school_name'].":";
		echo $row['student_number'].":";
		echo $row['student_name'].":";
		echo $row['comment'].":";
		echo $row['sex'].":";
		echo $row['grade']."<br />";
	}


	?>
</body>
</html>

