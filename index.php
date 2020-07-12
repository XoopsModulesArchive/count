<?
// $Id: index.php,v 1.1 2003/10/14 06:49:07 mikhail Exp $
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //
//--------------------------------------------------------//
//		PHP + Flash记数器			  //

//		作者:旅行,kIngAge           	  	  //

//	欢迎访问OPO2000.COM,phpiscool.yeah.net		  //

//	Copyright 2001 OPO Forum/LX - All Rights Reserved //

//	      拜托，请尊重劳动成果，请保留上述信息	  //

//	         程序参考 韩国 Flash记数器                //

//--------------------------------------------------------//
//This module is modified from a simple flash counter from Korea//
//Released by bbchen											//
//My website: www.bbchen.org. There is a demo.					//

include("../../mainfile.php");
include("../../header.php");
include("header.php");
//Thank Jan Koetze for his solving the problem encountered by some people.
if (isset($HTTP_GET_VARS)) {
foreach ($HTTP_GET_VARS as $k => $v) {
$$k = $v;
}
}
//Added 9/6/2003
if (!isset($id)) exit;
if (!ereg("^[0-9]{1,8}$",$s)) $s=0;
$file             = "./$id.txt"; // 记数文件名称
$startno          = "$s";        // 起始数值
$t_now   = time();
$t_array = getdate($t_now);
$day     = $t_array['mday'];
$mon     = $t_array['mon'];
$year    = $t_array['year'];
$id_count=$id.'count';
$id_yet=$id.'yet';
if (file_exists("$file")) {
	$count_info=file("$file");
	$c_info = explode(",", $count_info[0]);
	$total_c=$c_info[0];
	$yesterday_c=$c_info[1];
	$today_c=$c_info[2];
	$lastday=$c_info[3];
} else {
	$total_c="$startno";
	$yesterday_c="0";
	$today_c="0";
	$lastday="0";
}
if ( isset($HTTP_COOKIE_VARS["$id_count"]) ) $your_c=$HTTP_COOKIE_VARS["$id_count"];
if ( !isset($HTTP_COOKIE_VARS["$id_yet"]) || $HTTP_COOKIE_VARS["$id_yet"] != $day) {
	$your_c=1;
	$t_array2 = getdate($t_now-24*3600);
	$day2=$t_array2['mday'];
	$mon2=$t_array2['mon'];
	$year2=$t_array2['year'];
	$today = "$year-$mon-$day";
	$yesterday = "$year2-$mon2-$day2";
	if ($today != $lastday) {
    		if ($yesterday != $lastday) $yesterday_c = "0";
      			else $yesterday_c = $today_c;
		$today_c = 0;
		$lastday = $today;
	}
	$total_c++;
	$today_c++;
	$total_c     = sprintf("%d", $total_c);
	$today_c     = sprintf("%d", $today_c);
	$yesterday_c = sprintf("%d", $yesterday_c);
	setcookie("$id_yet","$day",$t_now+43200);
	$fp=fopen("$file","w");
	fputs($fp, "$total_c,$yesterday_c,$today_c,$lastday");
	fclose($fp);
}
if ( empty( $your_c ) ) $your_c = 1;
setcookie("$id_count",$your_c+1,$t_now+43200);
$your_c = sprintf("%d", $your_c);
//hacked by bbchen

//$total_c+=$your_c;

//$today_c+=$your_c;

//hacked by bbchen

echo "document.write('<embed src=".XOOPS_URL."/modules/count/count.swf?cgi=cgi=".XOOPS_URL."/modules/count/index.php&total=$total_c&yes=$yesterday_c&today=$today_c&you=$your_c&load=end& type=application/x-shockwave-flash width=150 height=75 bgcolor=#f1f2f5></embed>');";

exit;

include("../../footer.php");
?>