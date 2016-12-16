<!DOCTYPE html>
<html>
<head>
<?php
ini_set( 'display_errors', 1 );
?>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>あにどこ</title>

  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <style type="text/css">
  body { padding-top: 80px; }
  @media ( min-width: 768px ) {
    #banner {
      min-height: 300px;
      border-bottom: none;
    }
    .bs-docs-section {
      margin-top: 1em;
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
        <a href="" class="navbar-brand">あにどこ</a>
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

                <form class="navbar-form navbar-left" role="search" action="" method="post">
                  <div class="form-group">
				  
<?php
	if (@$_POST['program']) {
		$aniName = $_POST['program'];
	} else {
		$aniName = 'けんさくけんさくぅ～♪';
	}

?>
				  
                    <input type="text" class="form-control col-xs-4" placeholder="<?php echo $aniName; ?>" name="program">
                  </div>
                  <button type="submit" class="btn btn-default" name="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                </form>
				
              </div>
          </nav>
        </div>

        <div class="bs-component">
			  <ul class="nav nav-tabs">
				<li class="active sel-tabs"><a href="#danime" data-toggle="tab">dアニメストア</a></li>
				<li class="sel-tabs"><a href="#bandai" data-toggle="tab">バンダイチャンネル</a></li>
				<li class="sel-tabs"><a href="#amazon" data-toggle="tab">Amazonプライム</a></li>
				<li class="sel-tabs"><a href="#hulu" data-toggle="tab">hulu</a></li>
				<li class="sel-tabs"><a href="#unext" data-toggle="tab">U-NEXT</a></li>
			  </ul>
			
			<div id="myTabContent" class="tab-content">
				
				<!-- dani -->
				<div class="tab-pane fade active in" id="danime">

	<?php
		
		$myurl = "http://" . $_SERVER['HTTP_HOST']. "/". basename(dirname($_SERVER['SCRIPT_NAME']));

		if (@$_POST['program']) {
			//$aniName = $_POST['program'];
			$aniName = urlencode($_POST['program']);
			$search_url = $myurl . "/contentget.php?site=0&keyword=" . $aniName;
			$html = file_get_contents($search_url);
			echo $html;
		} else {
			echo '<br />';
			echo '<a href="https://anime.dmkt-sp.jp/" target="_blank">dアニメストア</a>';
		}

	?>
				
				</div>
				
				<!-- bandai -->
				<div class="tab-pane fade" id="bandai">

	<?php

		if (@$_POST['program']) {
			//$aniName = $_POST['program'];
			$aniName = urlencode($_POST['program']);
			$search_url = $myurl . "/contentget.php?site=1&keyword=" . $aniName;
			$html = file_get_contents($search_url);
			echo $html;
		} else {
			echo '<br />';
			echo '<a href="http://www.b-ch.com/" target="_blank">バンダイチャンネル</a>';
		}

	?>			
				</div>
				
				<!-- ama -->
				<div class="tab-pane fade" id="amazon">

	<?php

		if (@$_POST['program']) {
			//$aniName = $_POST['program'];
			$aniName = urlencode($_POST['program']);
			$search_url = $myurl . "/contentget.php?site=2&keyword=" . $aniName;
			$html = file_get_contents($search_url);
			echo $html;
		} else {
			echo '<br />';
			echo '<a href="https://www.amazon.co.jp/Prime-Video/b?ie=UTF8&node=3535604051" target="_blank">Amazonプライム</a>';
		}

	?>
				
				</div>
				
				<!-- hulu -->
				<div class="tab-pane fade" id="hulu">

	<?php

		if (@$_POST['program']) {
			//$aniName = $_POST['program'];
			$aniName = urlencode($_POST['program']);
			$search_url = $myurl . "/contentget.php?site=3&keyword=" . $aniName;
			$html = file_get_contents($search_url);
			echo $html;
		} else {
			echo '<br />';
			echo '<a href="http://www.hulu.jp/" target="_blank">hulu</a>';
		}

	?>
				
				</div>
				
				<!-- u-next -->
				<div class="tab-pane fade" id="unext">

	<?php

		if (@$_POST['program']) {
			//$aniName = $_POST['program'];
			$aniName = urlencode($_POST['program']);
			$search_url = $myurl . "/contentget.php?site=4&keyword=" . $aniName;
			$html = file_get_contents($search_url);
			//$html = "準備中";
			echo $html;
		} else {
			echo '<br />';
			echo '<a href="http://video.unext.jp/" target="_blank">U-NEXT</a>';
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
	// nothing
});
</script>

</body>
</html>