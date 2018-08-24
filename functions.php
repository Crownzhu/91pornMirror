<?php
//error_reporting(0);
#引入模块
require 'lib/phpQuery.php';
require 'lib/QueryList.php';
include "lib/Snoopy.class.php";

use QL\QueryList;

function getList($domain="http://www.91porn.com",$page = 1){

    $jinghua = $_COOKIE["jinghua"];

	$url = $domain."/video.php?". ($jinghua == 2 ? "" : "category=rf") ."&page=".$page;

    //echo $url;

	$html = getHtml($url);

	//echo $html;
	
	$html = preg_replace('/<span class="title">(.*)/', '', $html);	

	$rules = array(
    //采集id为one这个元素里面的纯文本内容
    'pic' => array('.imagechannelhd>a>img,.imagechannel>a>img','src'),
    'title' => array('.imagechannelhd>a>img,.imagechannel>a>img','title'),
    'link' => array('.imagechannelhd>a,.imagechannel>a','href'),
	);
	$data = QueryList::Query($html,$rules)->data;
	//print_r($data);
	return $data;
}

function randIp(){
    return rand(50,250).".".rand(50,250).".".rand(50,250).".".rand(50,250);
}


//根据地址，获取视频地址
function getVideo($url){

	$html = getHtml($url);

	$rules = array(
    //采集id为one这个元素里面的纯文本内容
    'video' => array('source','src'),
    'title' => array('#viewvideo-title','text')
	);
	$data = QueryList::Query($html,$rules)->data;
	//print_r($data);
	return $data[0];
}


function getHtml($url){

    $ip = randIp();
    $snoopy = new Snoopy;

    $snoopy->rawheaders["Accept-language"] = "zh-cn"; //cache 的http头信息
    $snoopy->rawheaders["Content-Type"] = "text/html; charset=utf-8"; //cache 的http头信息
    $snoopy->rawheaders["CLIENT-IP"] = $ip; //伪装ip
    $snoopy->rawheaders["HTTP_X_FORWARDED_FOR"] = $ip; //伪装ip
    
    $snoopy->fetch($url);
    return $snoopy->results;
}
