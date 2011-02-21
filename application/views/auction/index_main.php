<div>
<?php
foreach ($auction as $key => $value)
{?>	
		<h3><a href="/auctions/<?=$value->id.'/'.$value->short_url?>"><?=$value->name?></a><h3></br>
		Reg. Price: <del><?=$value->retail_price?></del></br>
		<img src="<?=$value->thumb?>"></br>
		<div id="time<?=$value->id ;?>"></div>
		<script>$("#time<?=$value->id ;?>").countdown({Edate:'<?=date('Y-m-d H:i:s',$value->end_time)?>'});</script>
		<?=$value->auction_price?></br>
		<?=$value->bid_increment?></br>
		<a href="/auction/do_auction/<?=$value->id ?>">Bid</a>
		<hr>
<?php	
}
?>
</div>