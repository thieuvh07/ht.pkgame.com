<aside class="aside">
	<?php 
		$highlight = layout_control(array(
			'layoutid' => 7,
			'children' => array(
				'flag' => FALSE,
				'post' => FALSE,
				// 'limit' => 6,
			),
			'post' => array(
				'flag' => FALSE,
				'limit' => 8
			)
		), FALSE);

		// print_r($highlight); exit;
	?>
	<?php if(isset($highlight['post']) && is_array($highlight['post']) && count($highlight['post'])){ ?>
	<div class="suggest-list">
		<header class="box-head"><?php echo $highlight['title']; ?></header>
		<section class="box-body">
			<ul class="uk-list list-prd-1">
				<?php foreach($highlight['post'] as $keyH => $valH){ ?>
				<?php 								
					$title = $valH['title'];
					$href = rewrite_url($valH['canonical'], true, false);
					$image = $valH['image'];
					$price = $valH['price'];
					$saleoff = $valH['price_sale'];
					$percent = percent($price, $saleoff);
				?>
				<li>
					<div class="prd-1">
						<div class="thumb">
							<a href="<?php echo $href; ?>" title="<?php echo $title; ?>" class="image img-cover"><img src="<?php echo $image; ?>" data-original="<?php echo $image; ?>" class="lazy" width="100%" alt="<?php echo $title; ?>"></a>
							<a href="" title="" class="dew"></a>
							<div class="overlay readmore">
								<a href="<?php echo $href; ?>" title="<?php echo $title; ?>" class="">Chi tiết sản phẩm<i class="fa fa-search"></i></a>
							</div>
						</div>
						<div class="info">
							<h4 class="title mgb15"><?php echo $title; ?></h4>
							<div class="wrap-price mgb15">
								<span class="new-price"><?php echo ($saleoff > 0) ? number_format($saleoff,0,',','') : number_format($price,0,',',''); ?>đ</span>
								<?php if($saleoff > 0){ ?>
								<span class="old-price"><?php echo number_format($price,0,',',''); ?>đ</span>
								<?php } ?>
							</div>
							<div class="readmore">
								<a href="" title="" data-id="<?php echo $valH['id']; ?>" data-quantity="1" data-price="<?php echo ($saleoff > 0) ? $saleoff : $price; ?>" data-name="<?php echo $valH['title']; ?>" data-condition="true" class="ajax-addtocart">Thêm giỏ hàng</a>
							</div>
						</div>
					</div>
				</li>
				<?php } ?>
			</ul>
		</section>
	</div>
	<?php } ?>
</aside><!-- .aside -->