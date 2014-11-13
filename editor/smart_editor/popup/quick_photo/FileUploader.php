<?php
//기본 리다이렉트
echo $_REQUEST["htImageInfo"];

$url = $_REQUEST["callback"] .'?callback_func='. $_REQUEST["callback_func"];
$bSuccessUpload = is_uploaded_file($_FILES['Filedata']['tmp_name']);
if (bSuccessUpload) { //성공 시 파일 사이즈와 URL 전송

	$tmp_name = $_FILES['Filedata']['tmp_name'];
	$name = time()."_".$_FILES['Filedata']['name'];
	//$new_path = "../upload/".urlencode($_FILES['Filedata']['name']);

	//이미지가 저장될 상대 주소
	$new_path = "../../../../file/editor/".urlencode($name);
	@move_uploaded_file($tmp_name, $new_path);
	$url .= "&bNewLine=true";
	$url .= "&sFileName=".urlencode(urlencode($name));
	//$url .= "&size=". $_FILES['Filedata']['size'];

	//필드에 기록될 이미지 링크
	$url .= "&sFileURL=http://localhost/file/editor/".urlencode(urlencode($name));
	//$url .= "&sFileURL=http://localhost/board_tank/editor/smart_editor/popup/upload/".urlencode(urlencode($name));
} else { //실패시 errstr=error 전송
	$url .= '&errstr=error';
}
header('Location: '. $url);
?>