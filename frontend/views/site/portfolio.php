<?php
$i = 0; 
foreach ($list AS $key => $val) {
	if ($val['visible'] != 1)
		continue;
	if ($i % 2 == 0) {
		$item_color = 'litepink';
		$quote_color = 'pink';
		$top_corner_color = 'lilac';
	} else {
		$item_color = 'lilac';
		$quote_color = 'lilac';
		$top_corner_color = 'litepink';
	}
	
	if ($i == 0)
		$top_corner_color = 'white';
	
	?>

	<div class="item <?php echo $item_color;?>">
		<div class="foto">
			<div class="lt_corner <?php echo $top_corner_color;?>"></div>
			<div class="rt_corner <?php echo $top_corner_color;?>"></div>
			<div class="b_corner <?php echo $item_color;?>"></div>
			<img src="<?php echo $url."/".$val['id'].".jpg";?>" width="1000px" height="590px">
		</div>
		<div class="bubble">
			<div class="text">
				<div class="left_quote <?php echo $quote_color;?>"></div>
				<div class="right_quote <?php echo $quote_color;?>"></div>
				<?php echo str_replace("\n", "<br>", $val['text']);?>
			</div>
		</div>
		<div class="author"><?php echo $val['name']?></div>
	</div>

<?php
	$i++; 
}?>