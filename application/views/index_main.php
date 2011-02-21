<div>
<?php
foreach ($auction as $key => $value)
{?>	
		<h3><a href="/auction/<?=$value->id.'/'.$value->short_url?>"><?=$value->name?></a><h3></br>
		Reg. Price: <del><?=$value->retail_price?></del></br>
		<img src="<?=$value->thumb?>"></br>
		<?=$value->auction_price?></br>
		<?=$value->bid_increment?></br>
		<a href="<?=$value->id ?>">Bid</a>
		<hr>
<?php	
}
?>
</div>