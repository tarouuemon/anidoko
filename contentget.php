<?php
ini_set( 'display_errors', 1 );

$keyword = $_GET['keyword'];

require_once("phpQuery-onefile.php");

// dアニメアストア
// ------------------------
if ($_GET['site'] == 0){

	$src_url = "https://anime.dmkt-sp.jp/animestore/sch_pc?searchKey=" . urlencode($keyword) . "&length=20";
	$html = file_get_contents($src_url);
	
	$doc = phpQuery::newDocument($html);
	
	//var_dump($doc);
	
	echo '<div class="alert alert-info" role="alert">';
	
	echo $doc[".pageHeaderIn"]->text();
	
	echo '　：　';
	
	echo $doc[".headerText"]->text();

	echo '</div>';
	
	echo '<br>';
	
	echo '<a href="' . $src_url . '" target="_blank">検索結果確認</a>';
	
	echo '<br>';


// バンダイチャンネル
// ------------------------
} else if ($_GET['site'] == 1){

	//POSTデータ
	$data = array(
		"search_txt" => $keyword
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
	
	echo '<div class="alert alert-info" role="alert">';
	
	echo $doc["#container h2:eq(0)"]->text();
	
	echo '</div>';
	
	echo '<ul>';
	
	foreach ($doc[".search-ttl-freemv-list:eq(0)"]->find("dl") as $entry){
	  
		echo '<li>';
		
		$titleName = pq($entry)->find("dt")->find("a")->text();
		$titleLink = pq($entry)->find("dt")->find("a")->attr("href");
		$tmp = '<a href="http://www.b-ch.com' . $titleLink . '" target="_blank">' . $titleName . '</a>';
		
		if( (pq($entry)->find("dt")->find("img") ) == ""){
			//
		}else{
			$tmp = '<span class="label label-primary">見放題</span> ' . $tmp;
		}
	 
		echo $tmp;
		
		echo '</li>';

	}
	
	echo '</ul>';
	
	echo '<br>';
	
	echo '<div class="alert alert-info" role="alert">';
	
	echo $doc["#container h2:eq(1)"]->text();
	
	echo '</div>';

	echo '<br>';

	echo '<ul>';
	
	foreach ($doc[".search-ttl-freemv-list:eq(1)"]->find("dl") as $entry){
	  
		echo '<li>';
		
		$titleName = pq($entry)->find("dt")->find("a")->text();
		$titleLink = pq($entry)->find("dt")->find("a")->attr("href");
		$tmp = '<a href="http://www.b-ch.com' . $titleLink . '" target="_blank">' . $titleName . '</a>';
		
		if( (pq($entry)->find("dt")->find("img") ) == ""){
			//
		}else{
			$tmp = '<span class="label label-primary">見放題</span> ' . $tmp;
		}
	 
		echo $tmp;
		
		echo '</li>';

	}
	
	echo '</ul>';

	echo '<br>';

	echo '<br>';
	
	echo '<a href="http://www.b-ch.com/" target="_blank">バンダイチャンネルのページへ</a>';

	echo '<br>';


// Amazonプライムビデオ
// ------------------------
} else if ($_GET['site'] == 2){

	$src_url = "https://www.amazon.co.jp/s/ref=nb_sb_noss_2?__mk_ja_JP=%E3%82%AB%E3%82%BF%E3%82%AB%E3%83%8A&url=search-alias%3Dprime-instant-video&field-keywords=" . urlencode($keyword);
	$html = file_get_contents($src_url);
	
	$doc = phpQuery::newDocument($html);
	
	//var_dump($doc);
	
	echo '<div class="alert alert-info" role="alert">';
	
	echo $doc["#s-result-count"]->text();
	
	echo '</div>';

	echo '<br>';

	echo '<ul>';
	
	foreach ($doc["#atfResults"]->find(".s-access-title") as $entry){
	  
		echo '<li>';
	  
		$titleName = pq($entry)->text();
	  
		echo $titleName;
		  
		echo '</li>';

	}

	echo '</ul>';
	echo '<br>';
	echo '<a href="' . $src_url . '" target="_blank">検索結果確認</a>';
	echo '<br>';

// hulu
// ------------------------
} else if ($_GET['site'] ==3){


	$src_url = "http://www.hulu.jp/search?q=" . urlencode($keyword);

	/*
	$html = file_get_contents($src_url);
	
	$doc = phpQuery::newDocument($html);
	var_dump($doc);
	
	echo '<br>';
	
	//$tmp = $doc[".promo-show-info a:eq(0)"];
	$i = 0;
	

	
 	foreach ($tmp as $lcount){
		if(preg_match('/アニメ/',$lcount))｛
			$i = $i + 1;
		}
	}
	echo $i; */
	
	echo '<br>';
	
	echo '※表示不可。。。※';
	
	echo '<br>';
	
	echo '<a href="' . $src_url . '" target="_blank">検索結果確認</a>';
	
	echo '<br>';

// u-next
// ------------------------
} else if ($_GET['site'] ==4){

	$src_url = "http://video.unext.jp/freeword?full=1&type=&order=recommend&filter=&query=" . urlencode($keyword);
	$html = file_get_contents($src_url);
	
	$doc = phpQuery::newDocument($html);
	
	echo '<div class="alert alert-info" role="alert">';
	
	echo $doc[".lay-main__inner"]->find(".onelinetext:eq(0)")->text();
	
	echo '</div>';
	
	echo '<br>';
	
	
	//var_dump($doc);
	
	echo '<br>';
	
	echo '<br>';
	
	echo '<a href="' . $src_url . '" target="_blank">検索結果確認</a>';
	
	echo '<br>';


// それ以外(例外)
// ------------------------
} else {
	//none
}


?>