<div id="homepage" class="page-body">
	<section class="banner-panel">
		<div class="uk-container uk-container-center">
			<?php 
				$banner = slide(array('keyword' => 'main-banner'));
			 ?>
			<?php if(isset($banner) && is_array($banner) && count($banner)){ ?>
				<?php 
					$banner = $banner[0];
				?>
				<div class="image img-cover"><img src="<?php echo $banner['src']; ?>" alt="<?php echo $banner['src']; ?>"></div>
			<?php } ?>
		</div>
	</section>

	<div class="uk-container uk-container-center">
		<div class="uk-grid uk-grid-medium">
			<div class="uk-width-small-1-5">
				<?php $this->load->view('homepage/frontend/common/aside'); ?>
			</div>
			<div class="uk-width-small-4-5 js_content">
				<h1 class="heading-1 h2109_cat_heading"><span><?php echo isset($detailCatalogue['title']) ? $detailCatalogue['title'] : 'Sản phẩm'; ?></span></h1>
				<?php if(isset($productList) && is_array($productList) && count($productList)){ ?>
					<div class="panel-body">
						<ul class="uk-list uk-clearfix uk-grid uk-grid-medium uk-grid-width-medium-1-2 uk-grid-width-large-1-4 list-product zoom">
							<?php foreach ($productList as $keyPost => $valPost) { ?>
								<?php
									$title = $valPost['title'];
									$href = rewrite_url($valPost['canonical'], TRUE, TRUE);
									$image = $valPost['image'];
									$description = cutnchar(strip_tags($valPost['description']), 250);
									$getPrice = getPriceFrontend(array('productDetail' => $valPost));
									$code = $valPost['code'];
								?>

							<li>
								<div class="product">
									<div class="thumb"><a class="image img-scaledown" href="<?php echo $href; ?>" title="<?php echo $title; ?>"><img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" /></a></div>
									<div class="info">
										<h2 class="title"><a href="<?php echo $href; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a></h2>
										<div class="price"><?php echo isset($getPrice['price_final']) ? $getPrice['price_final']: 'Liên hệ' ?></div>
										<div class="text-right">
											<?php 
												$price_sale = $valPost['price_sale'];
												$price = $valPost['price'];
											?>
											<a class="btn btn-buy btn-add-to-cart ajax-addtocart" data-id="<?php echo $valPost['id'] ?>" data-productid="<?php echo $valPost['id'] ?>" data-quantity="1" data-price="<?php echo ($price_sale > 0) ? $price_sale : $price; ?>" data-name="<?php echo $title;?>" data-condition="true" href="" title="Mua hàng">Mua hàng</a>
										</div>
									</div>
									
								</div>
							</li>
							<?php } ?>
						</ul> <!-- .product -->
					</div> <!-- .panel-body -->
				<?php } ?>

				<?php $canonicalCat = isset($detailCatalogue['canonical']) ? rewrite_url($detailCatalogue['canonical'], true, false) : 'san-pham.html'; ?>
				<div class="readmore"><a href="<?php echo $canonicalCat; ?>" title="Xem tất cả" class="btn-readmore">Xem tất cả</a></div>
				
			</div>
		</div>
	</div>
	
	
	
</div><!-- .page-body -->
