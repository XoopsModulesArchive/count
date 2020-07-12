<?php//created by bbchen, www.bbchen.org
function b_count_show($options){
	global $xoopsConfig;
	$block = array();
	$block['content']="<script language=\"JavaScript\" src='".XOOPS_URL."/modules/count/index.php?id=count&s=".$options[0]."'></script>";
	return $block;
}
function b_count_edit($options){
	$form = ""._MB_COUNT_INITNUM."£º&nbsp;<input type='text' name='options[]' value='".$options[0]."' />&nbsp;";
	return $form;
}
?>