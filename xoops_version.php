<?php
//		PHP + Flash������			  //

//		����:����,kIngAge           	  	  //

//	��ӭ����OPO2000.COM,phpiscool.yeah.net		  //

//	Copyright 2001 OPO Forum/LX - All Rights Reserved //

//	      ���У��������Ͷ��ɹ����뱣��������Ϣ	  //

//	         ����ο� ���� Flash������                //

//--------------------------------------------------------//
//This module is modified from a simple flash counter from Korea//
//Released by bbchen											//
//My website: www.bbchen.org. There is a demo.					//

$modversion['name'] = _MI_COUNT_NAME;

$modversion['version'] = 2.02;

$modversion['description'] = _MI_COUNT_DESC;

$modversion['credits'] = "Origin version by ����,kIngAge,OPO2000.COM,phpiscool.yeah.net.<br /> Modified as xoops module by bbchen,www.bbchen.org. <br />Many thanks to Jan Koetze (http://www.koetze.net) for his help solving a big problem";

$modversion['author'] = "bbchen";

$modversion['help'] = "";

$modversion['license'] = "GPL";

$modversion['official'] = 0;

$modversion['image'] = "images/count_slogo.png";

$modversion['dirname'] = "count";



// Admin things

$modversion['hasAdmin'] = 0;

$modversion['adminpath'] = "admin/index.php";



// Blocks

$modversion['blocks'][1]['file'] = "b_count.php";

$modversion['blocks'][1]['name'] = _MI_COUNT_BNAME1;

$modversion['blocks'][1]['description'] = "Show Flash Count Block";

$modversion['blocks'][1]['show_func'] = "b_count_show";

$modversion['blocks'][1]['edit_func'] = "b_count_edit";

$modversion['blocks'][1]['options'] = "1";



// Menu

$modversion['hasMain'] = 0;



?>