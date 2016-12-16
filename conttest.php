<?php
ini_set( 'display_errors', 1 );

$keyword = urlencode("ガールズ");


$decode = urldecode($_GET['site']);

require_once("phpQuery-onefile.php");

if ($_GET['site'] == 0){

	$src_url = "https://anime.dmkt-sp.jp/animestore/sch_pc?searchKey=" . $keyword . "&length=20";
	$html = file_get_contents($src_url);
	
	$doc = phpQuery::newDocument($html);
	
	var_dump($doc);
	
	echo $doc[".pageHeaderIn"]->text();
	
	echo '<br>';
	
	echo $doc[".headerText"]->text();

	echo '<br>';
	
	echo '<a href="' . $src_url . '">検索結果確認</a>';
	
	
} else if ($_GET['site'] == 1){

	//POSTデータ
	$data = array(
		"search_txt" => "ガールズ"
	);
	$data = http_build_query($data, "", "&");

	//header
	$header = array(
		"Content-Type: application/x-www-form-urlencoded",
		"Content-Length: ".strlen($data)
	);

	$context = array(
		"http" => array(
			"method"  => "POST",
			"header"  => implode("\r\n", $header),
			"content" => $data
		)
	);

	$src_url = "http://www.b-ch.com/ttl/search_wrd.php";
	$html = file_get_contents($src_url, false, stream_context_create($context));
	
	$doc = phpQuery::newDocument($html);
	
	//var_dump($doc);
	
	echo '<br>';
	
	echo $doc["#container h2:eq(0)"]->text();

	echo '<br>';
	
	echo '<ul>';
	
	foreach ($doc[".search-ttl-freemv-list:eq(0)"]->find("dl") as $entry){
	  
		echo '<li>';
	  
		$titleName = pq($entry)->find("dt")->find("a")->text();
	  
		echo $titleName;
		  
		echo '</li>';

	}
	
	echo '</ul>';

	echo $doc["#container h2:eq(1)"]->text();

	echo '<br>';

	echo '<ul>';
	
	foreach ($doc[".search-ttl-freemv-list:eq(0)"]->find("dl") as $entry){
	  
		echo '<li>';
	  
		$titleName = pq($entry)->find("dt")->find("a")->text();
	  
		echo $titleName;
		  
		echo '</li>';

	}
	
	echo '</ul>';

	echo '<br>';

	echo '<a href="' . $src_url . '">検索結果確認</a>';
	
} else if ($_GET['site'] == 2){

	$src_url = "https://www.amazon.co.jp/s/ref=nb_sb_noss_2?__mk_ja_JP=%E3%82%AB%E3%82%BF%E3%82%AB%E3%83%8A&url=search-alias%3Dprime-instant-video&field-keywords=" . $keyword;
	$html = file_get_contents($src_url);
	
	$doc = phpQuery::newDocument($html);
	
	//var_dump($doc);

	echo '<br>';
	
	echo $doc["#s-result-count"]->text();

	echo '<br>';

	echo '<ul>';
	
	foreach ($doc["#atfResults"]->find(".s-access-title") as $entry){
	  
		echo '<li>';
	  
		$titleName = pq($entry)->text();
	  
		echo $titleName;
		  
		echo '</li>';

	}

	echo '</ul>';
	echo '<a href="' . $src_url . '">検索結果確認</a>';
	
} else {
	//none
}


?>