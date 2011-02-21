<html>
<head>
<title><?=$pagetitle?></title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<link rel="stylesheet" href="<?=base_url() ?>style/css/main.css" type="text/css" />
</head>
<body>
<div id="pagewidth" >
  <div id="header" ></div>
  <div id="wrapper" class="clearfix" >
    <div id="twocols" class="clearfix">
      <?php echo $content_for_layout?>
    </div>
  </div>
  <div id="footer" > Footer </div>
</div>
</body>
</html>