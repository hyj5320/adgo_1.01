<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// ���޼����� ���â����
function alert($msg='', $url='') {
	$CI =& get_instance();

	if (!$msg) $msg = '�ùٸ� ������� �̿��� �ֽʽÿ�.';

	echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=".$CI->config->item('charset')."\">";
	echo "<script type='text/javascript'>alert('".$msg."');";
    if ($url)
        echo "location.replace('".$url."');";
	else
		echo "history.go(-1);";
	echo "</script>";
	exit;
}

function alert2($msg='', $url='') {
	$CI =& get_instance();

	if (!$msg) $msg = '�ùٸ� ������� �̿��� �ֽʽÿ�.';

	echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=".$CI->config->item('charset')."\">";
	echo "<script type='text/javascript'>alert('".$msg."');";
    if ($url)
        echo "location.replace('".$url."');";
	else
		echo "history.go(-2);";
	echo "</script>";
	exit;
}

// ���޼��� ����� â�� ����
function alert_close($msg) {
	$CI =& get_instance();

	echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=".$CI->config->item('charset')."\">";
	echo "<script type='text/javascript'> alert('".$msg."'); window.close(); </script>";
	exit;
}

// ���޼����� ���
function alert_only($msg) {
	$CI =& get_instance();

	echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=".$CI->config->item('charset')."\">";
	echo "<script type='text/javascript'> alert('".$msg."'); </script>";
	exit;
}

function get_skin_dir($skin, $len='')
{
    global $g4;

    $result_array = array();

    $dirname = "skin/$board_skin/";
    $handle = opendir($dirname);
    while ($file = readdir($handle)) 
    {
        if($file == "."||$file == "..") continue;

        if (is_dir($dirname.$file)) $result_array[] = $file;
    }
    closedir($handle);
    sort($result_array);

    return $result_array;
}

function get_layouts_dir($layouts, $len='')
{
    global $g4;

    $result_array = array();

    $dirname = "layouts/$site_layout/";
    $handle = opendir($dirname);
    while ($file = readdir($handle)) 
    {
        if($file == "."||$file == "..") continue;

        if (is_dir($dirname.$file)) $result_array[] = $file;
    }
    closedir($handle);
    sort($result_array);

    return $result_array;
}

//���� �о� ����(�̹���)
function get_images_dir($layouts, $len='')
{
	$result_array = array();

    $dirname = "./layouts/default/images/top";
    $handle = opendir($dirname);
    while ($file = readdir($handle)) 
    {
        if($file == "."||$file == "..") continue;
         $result_array[] = $file;
    }
	closedir($handle);
    sort($result_array);

    return $result_array;
}

function get_member_level_select($name, $start_id=0, $end_id=10, $selected='', $event='')
{
    global $g4;

    $str = "<select name='$name' $event>";
    for ($i=$start_id; $i<=$end_id; $i++)
    {
        $str .= "<option value='$i'";
        if ($i == $selected) 
            $str .= " selected";
        $str .= ">$i</option>";
    }
    $str .= "</select>";
    return $str;
}

//���ڷε� ����Ʈ �ڽ����� ����
function get_date_select($name, $start_id=0, $end_id=10, $selected='', $event='')
{
    global $g4;

    $str = "<select class='span4' name='$name' $event>";
    for ($i=$start_id; $i<=$end_id; $i++)
    {
        $str .= "<option value='$i'";
        if ($i == $selected) 
            $str .= " selected";
        $str .= ">$i</option>";
    }
    $str .= "</select>";
    return $str;
}

//http://localhost/board_tank/admin/popup/write_form/id/popup ����Ⱓ���� ���
function get_date2_select($name, $start_id=0, $end_id=10, $selected='', $event='')
{
    global $g4;

    $str = "<select class='span2' name='$name' $event>";
    for ($i=$start_id; $i<=$end_id; $i++)
    {
        $str .= "<option value='$i'";
        if ($i == $selected) 
            $str .= " selected";
        $str .= ">$i</option>";
    }
    $str .= "</select>";
    return $str;
}
?>