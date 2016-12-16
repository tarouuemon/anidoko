<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>test</title>

  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <style type="text/css">
  body { padding-top: 80px; }
  @media ( min-width: 768px ) {
    #banner {
      min-height: 300px;
      border-bottom: none;
    }
    .bs-docs-section {
      margin-top: 8em;
    }
    .bs-component {
      position: relative;
    }
    .bs-component .modal {
      position: relative;
      top: auto;
      right: auto;
      left: auto;
      bottom: auto;
      z-index: 1;
      display: block;
    }
    .bs-component .modal-dialog {
      width: 90%;
    }
    .bs-component .popover {
      position: relative;
      display: inline-block;
      width: 220px;
      margin: 20px;
    }
    .nav-tabs {
      margin-bottom: 15px;
    }
    .progress {
      margin-bottom: 10px;
    }
	
  }
  </style>

  <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body>

<header>
  <div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <a href="/" class="navbar-brand">Anime</a>
      </div>
    </div>
  </div>
</header>

<div class="container">

  <div class="bs-docs-section clearfix">
    <div class="row">
      <div class="col-lg-12">

        <div class="bs-component">
          <nav class="navbar navbar-default">
            <div class="container-fluid">

                <form class="navbar-form navbar-left" role="search" action="aniinfo.php" method="post">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="けんさくけんさくぅ～♪" name="program">
                  </div>
                  <button type="submit" class="btn btn-default" name="search">検索</button>
                </form>
				
              </div>
          </nav>
        </div>

        <div class="bs-component">
          <ul class="nav nav-tabs">
            <li class="active sel-tabs"><a href="#danime" data-toggle="tab">dアニメストア</a></li>
            <li class="sel-tabs"><a href="#bandai" data-toggle="tab">バンダイチャンネル</a></li>
            <li class="sel-tabs"><a href="#amazon" data-toggle="tab">Amazonプライム</a></li>
          </ul>
          <div id="myTabContent" class="tab-content">
			
			<!-- dani -->
            <div class="tab-pane fade active in" id="danime">

<?php

	if (@$_POST['program']) {
		$aniName = $_POST['program'];
		$search_url = "http://localhost/contentget.php?site=0&keyword=" . $aniName;
		$html = file_get_contents($search_url);
		echo $html;
	} else {
		echo '';
	}

?>
			
			</div>
			
			<!-- bandai -->
			<div class="tab-pane fade" id="bandai">

<?php

	if (@$_POST['program']) {
		$aniName = $_POST['program'];
		$search_url = "http://localhost/contentget.php?site=1&keyword=" . $aniName;
		$html = file_get_contents($search_url);
		echo $html;
	} else {
		echo '';
	}

?>			
			</div>
			
			<!-- ama -->
            <div class="tab-pane fade" id="amazon">

<?php

	if (@$_POST['program']) {
		$aniName = $_POST['program'];
		$search_url = "http://localhost/contentget.php?site=2&keyword=" . $aniName;
		$html = file_get_contents($search_url);
		echo $html;
	} else {
		echo '';
	}

?>
			
			</div>
			
           </div>
        </div>

      </div>
    </div>
  </div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.xdomainajax.js"></script>

<script type="text/javascript">
  $('.bs-component [data-toggle="popover"]').popover();
  $('.bs-component [data-toggle="tooltip"]').tooltip();
</script>


<script type="text/javascript">
$(function(){
	//初期設定
	//getPage("https://anime.dmkt-sp.jp/animestore/tp_pc");
 
	//ページを取得してくる
/*    function getPage(elm){
    	$.ajax({
            type: 'GET',
            url: elm,
            //dataType: 'html',
            success: function(data){
                $('#home').append(data.responseText);
            },
            error:function() {
                       alert('問題がありました。');
                   }
    	});
	}
	); */
	
	/*
	$.ajax({
		url: 'http://192.168.187.128/conttest.php?site=0',
		type: 'GET',
		success: function(data) {
			$('#danime').html(data.responseText);
			//$maincont = $('#danime', $('#listContainer'));
			//$('#danime').html($maincont.parent().html());
		}
	});
	*/
	
	
});
</script>

</body>
</html>