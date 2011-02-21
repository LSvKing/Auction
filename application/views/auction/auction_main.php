<?php
$pic = unserialize($auction->pic);
//var_dump($auction);
?>
  <h3><?=$auction->name?></h3>
  <div id="gallery">
	<div id="gallery_output">
		<?php foreach ($pic as $key => $value)
		{
			echo "<img id='img$key' src=$value />";
		}
		?> 
	</div>
	<div class="clear"></div> 	
	<div id="gallery_nav">
		<?php foreach ($pic as $key => $value)
		{
			echo "<a rel='img$key' href='javascript:;'><img src='$value' style='width:70px;height:65px' /></a>";
		}
		?> 
	</div>
	<div class="clear"></div>
</div>

<div id="main">
	<b></b>auction_price:<?=$auction->auction_price;?></br></b>
	<b><div id='noDays'></div></b>
	
</div>
<div class="clear"></div>
<h3>Product Description</h3>
<hr>
<?=$auction->description ;?>

<script language="javascript">
		$(document).ready(function() {
			$("#gallery_output img").not(":first").hide();
			$("#gallery a").click(function() {
				if ( $("#" + this.rel).is(":hidden") ) {
					$("#gallery_output img").slideUp();
					$("#" + this.rel).slideDown();
				}
			});
			$('#noDays').countdown({Edate:'<?=date('Y-m-d H:i:s',$auction->end_time)?>'});
		});
</script>
