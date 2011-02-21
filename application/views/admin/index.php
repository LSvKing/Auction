<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$pagetitle?></title>

<!-- CSS -->
<link href="<?=base_url() ;?>css/transdmin.css" rel="stylesheet" type="text/css" media="screen" />
<link href="<?=base_url() ;?>css/smoothness/jquery-ui-1.8.5.custom.css" rel="stylesheet" type="text/css" media="screen" />
<link href="<?=base_url() ;?>css/jquery.yitip.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>js/uploadify/uploadify.css" />

<!--[if IE 6]><link rel="stylesheet" type="text/css" media="screen" href="style/css/ie6.css" /><![endif]-->

<!--[if IE 9]><link rel="stylesheet" type="text/css" media="screen" href="style/css/ie7.css" /><![endif]-->

<!-- JavaScripts-->
<script type="text/javascript" src="<?=base_url() ;?>js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?=base_url() ;?>js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?=base_url() ;?>js/jNice.js"></script>
<script type="text/javascript" src="<?=base_url() ;?>js/jquery.yitip.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/uploadify/jquery.uploadify.v2.1.4.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/uploadify/swfobject.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/xheditor/xheditor-en.min.js"></script>
<script type="text/javascript" src="<?=base_url() ;?>js/all.js"></script>
<script type="text/javascript">
    $(function(){

        //面包屑 高亮
        $('#breadcrumb a').each(function(){
            if($(this).attr('text') == '<?=$current?>'){
                $(this).addClass('active');
            }
        })

        //Nav 高亮
        $('#mainNav li a').each(function(){
            if($(this).attr('text') == '<?=$parent?>'){
                $(this).addClass('active');
            }
        })

        //Sidebar 高亮
        $('.sideNav li a').each(function(){
            if($(this).attr('text') == '<?=$current?>'){
                $(this).addClass('active');
            }
        })

        $( "#create_time" ).datepicker();
        $( "#end_time" ).datepicker();
        
        
        $.datepicker.regional['zh-CN'] = {
		closeText: '关闭',
		prevText: '&#x3c;上月',
		nextText: '下月&#x3e;',
		currentText: '今天',
		monthNames: ['一月','二月','三月','四月','五月','六月',
		'七月','八月','九月','十月','十一月','十二月'],
		monthNamesShort: ['一','二','三','四','五','六',
		'七','八','九','十','十一','十二'],
		dayNames: ['星期日','星期一','星期二','星期三','星期四','星期五','星期六'],
		dayNamesShort: ['周日','周一','周二','周三','周四','周五','周六'],
		dayNamesMin: ['日','一','二','三','四','五','六'],
		weekHeader: '周',
		dateFormat: 'yy-mm-dd',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: true,
		yearSuffix: '年'};
	$.datepicker.setDefaults($.datepicker.regional['zh-CN']);

        $('[tip]').yitip();	
			
    })
</script>

</head>

<body>
	<div id="wrapper">
    	<!-- h1 tag stays for the logo, you can use the a tag for linking the index page -->
    	<h1><a href="<?=base_url() ;?>"><span>Transdmin Light</span></a></h1>
        
        <?php $this->load->view('admin/nav') ?>
        
        <div id="containerHolder">
            <div id="container">
            <?php $this->load->view('admin/sidebar') ?>
                
                
                <!-- h2 stays for breadcrumbs -->
                <div id="breadcrumb">
                <h2><?php //echo set_breadcrumb(); ?></h2>
                </div>
                
                <?php echo $content_for_layout?>
                
                <div class="clear"></div>
            </div>
            <!-- // #container -->
        </div>	
        <!-- // #containerHolder -->
        
        <?php $this->load->view('admin/footer') ?>
    </div>
    <!-- // #wrapper -->
</body>
</html>
