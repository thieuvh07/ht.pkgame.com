<div id="js_prd_info" data-info="<?php echo $data_info ?>"
	data-price="<?php echo $productDetail['price'] ?>"
	data-price_sale="<?php echo $productDetail['price_sale'] ?>"
	data-price_contact="<?php echo $productDetail['price_contact'] ?>"
	 data-id="<?php echo $productDetail['id'] ?>"  data-name= "<?php echo $productDetail['title'] ?>" ></div>
<div id="quantity" data-quantity="1"></div>
<?php
	$prd_title = $productDetail['title'];
	$prd_code = $productDetail['code'];
	$prd_info = $productDetail['info'];
	$list_image = json_decode(base64_decode($productDetail['image_json']), true);
	$prd_href = rewrite_url($productDetail['canonical']);
    $prd_description = $productDetail['description'];
    // $prd_extend_des = json_decode($productDetail['extend_description'], true);

    $prd_description_litter = $productDetail['description'];
    $commnet = comment(array('id' => $productDetail['id'], 'module' => 'product'));
    $prd_rate = '';
	if(isset($commnet) && is_array($commnet) && count($commnet)){
		$prd_rate = round($commnet['statisticalRating']['averagePoint']);
	}

	// print_r($prd_description);die;
?>
<div id="prdcatalog" class="page-body">
	<?php
		$banner = slide(array('keyword' => 'banner-parent'));
	 ?>

	<section class="banner">
	<?php if(isset($banner) && is_array($banner) && count($banner)){ ?>
		<?php 
			$banner = $banner[0];
		 ?>
		<div class="image img-cover"><img src="<?php echo $banner['src']; ?>" alt="<?php echo $banner['src']; ?>"></div>
		<div class="uk-container uk-container-center">
			<div class="breadcrumb">
				<div class="title"><?php echo $breadcrumb[0]['title']; ?></div>
				<ul class="uk-breadcrumb">
					<li><a href="" title=""><?php //echo '<i class="fa fa-home"></i>'; ?> Trang chủ</a></li>
					<?php foreach($breadcrumb as $key => $val){ ?>
					<?php
						$title = $val['title'];
						$href = rewrite_url($val['canonical'], true, true);
					?>
					<li class="<?php if($key == count($breadcrumb) - 1) echo 'uk-active'; ?>"><a href="<?php echo $href; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a></li>
					<?php } ?>
				</ul>
			</div>
		</div><!-- .breadcrumb -->
	<?php } ?>
	</section>
	<?php
		$list_image = json_decode(base64_decode($productDetail['image_json']), TRUE);
		// print_r($gallery);die;
	?>
	<div class="uk-container uk-container-center">
		<section class="prd-detail"><!-- CHI TIẾT SẢN PHẨM -->
			<header class="panel-head">
				<div class="uk-grid uk-grid-medium">
					<div class="uk-width-medium-1-2">
						<div class="prd-gallerys">
							<div id="slider" class="flexslider">
								<ul class="slides">
									<?php if(isset($list_image) && is_array($list_image) && count($list_image)){ ?>
									<?php foreach($list_image as $key => $val) { ?>
									<li>
										<div class="thumb">
											<a class="image img-cover" href="<?php echo $val; ?>" title="Ảnh chi tiết sản phẩm" data-uk-lightbox="{group:'prdGallerys'}"><img src="<?php echo $val; ?>" alt="<?php echo $val; ?>" /></a>
										</div>
									</li>
									<?php }} ?>
								</ul>
							</div>
							<div id="carousel" class="flexslider">
								<ul class="slides">
									<?php if(isset($list_image) && is_array($list_image) && count($list_image)){ ?>
									<?php foreach($list_image as $key => $val) { ?>
									<li>
										<div class="thumb">
											<span class="image img-scaledown"><img src="<?php echo $val;?>" alt="<?php echo $val;?>" /></span>
										</div>
									</li>
									<?php }} ?>
								</ul>
							</div>
							<!-- Không có slide ảnh
							<div class="cover"><a class="image img-cover" href="" title=""></a></div>
							-->
						</div> <!-- end of product-gallery -->
					</div>
					<div class="uk-width-medium-1-2">
						<div class="prd-infor">
							<h1 class="prd-title"><?php echo $productDetail['title']; ?></h1>
							<div class="subtitle">
								Top 100 sản phẩm bán chạy nhất trong tháng này
							</div>
							<ul class="uk-list uk-clearfix prd-icon">
								<li>
									<i class="fa fa-gg"></i>
									<span><b>Danh mục : </b><?php echo $detailCatalogue['title']; ?></span>
								</li>
								<li>
									<i class="fa fa-tags"></i>
									<span><b>Mã sản phẩm : </b><?php echo $productDetail['code'] ?></span>
								</li>
								<li>
									<i class="fa fa fa-codepen"></i>
									<span><b>Tình trạng : </b>Còn hàng</span>
								</li>
							</ul>
							
							<div class="detail-info">
								<div class="uk-grid uk-grid-collapse">
									<div class="uk-width-large-3-5">
										<div class="left">
											<p>
												<span class="label">Giá Bán</span>
												<span class="main-price"><?php echo ($productDetail['price_sale'] > 0) ? number_format($productDetail['price_sale']) : number_format($productDetail['price']); ?>đ</span>
											</p>
											<?php if($productDetail['price_sale'] > 0){ ?>
											<p>
												<span class="label">Giá thị trường</span>
												<span class="value"><s><?php echo number_format($productDetail['price']); ?>đ</s></span>
											</p>
											<p>
												<span class="label">Tiết kiệm</span>
												<span class="percent"><?php echo percent($productDetail['price'], $productDetail['price_sale']); ?>%</span>
											</p>
											<?php } ?>
											<?php 
												if($productDetail['description'] != ''){ ?>
													<div class="prd-description">
														<?php echo $productDetail['description']; ?>
													</div>
												<?php } ?>
											<?php 
												/*
													<div class="technology">
													<div class="choose mb20">Lựa chọn thông số: </div>
													<?php if(isset($attribute) && is_array($attribute) && count($attribute)){ ?>
													<?php foreach($attribute as $key => $val){ ?>
													<?php if($key > 1) break; ?>
													<div class="uk-flex uk-flex-middle block-attr">
														<div class="label"><?php echo $val['title']; ?></div>
														<div class="attribute">
															<?php if(isset($val['attr']) && is_array($val['attr']) && count($val['attr'])){ ?>
															<div class="attr-value">
																<div class="uk-flex uk-flex-middle">
																	<?php foreach($val['attr'] as $keyAttr => $valAttr){ ?>
																	<?php if($val['keyword'] == 'mau-sac'){ ?>
																	<a href="" title="" data-color="<?php echo $valAttr['images']; ?>" data-id="<?php echo $valAttr['id']; ?>" class="color-picked at" style="display:inline-block;width:60px;height:20px;background:#<?php echo $valAttr['images'] ?>"></a>
																	<?php }else{ ?>
																		<a href="" title="" data-size="<?php echo $valAttr['title']; ?>" data-id="<?php echo $valAttr['id']; ?>" class="capacity-picked at"><?php echo $valAttr['title']; ?></a>
																	<?php } ?>
																	<?php } ?>
																</div>
															</div>
															<?php } ?>
														</div>
													</div>
													<?php }} ?>
												</div>
												*/

											 ?>
											<ul class="uk-list btn-groups uk-clearfix">
												<li class="">
													<?php 
														$price_sale = $productDetail['price_sale'];
														$price = $productDetail['price'];
													?>
													<a class="btn btn-buy js_buy" data-id="" data-productid="<?php echo $productDetail['id'] ?>" data-quantity="1" data-price="<?php echo ($price_sale > 0) ? $price_sale : $price; ?>" href="" title="Cho vào giỏ hàng">Đặt hàng</a>
												</li>
												<li class="">
													<a class="btn btn-buy buynow btn-add-to-cart ajax-addtocart" data-id="" data-module="redirect" data-productid="<?php echo $productDetail['id'] ?>" data-quantity="1" data-price="<?php echo ($price_sale > 0) ? $price_sale : $price; ?>" href="" title="Mua ngay">Mua Ngay</a>
												</li>
											</ul>
											<script type="text/javascript">
												$(document).ready(function(){
													$(document).on('click','.color-picked',function(){
														var _this = $(this);
														var hex = _this.attr('data-color');
														$('.ajax-addtocart').attr('data-color', hex);
														var attrid = _this.attr('data-id');
														$('.ajax-addtocart').attr('data-id','sku_'+<?php echo $productDetail['id'] ?>+ '_'+attrid);
														$('.color-picked').removeClass('active');
														_this.addClass('active');
														return false;
													});
													
												});
											</script>
										</div>
									</div>
									<div class="uk-width-large-2-5 uk-visible-large">
										<?php 
											$commit = $this->Autoload_Model->_get_where(array(
												'select' => 'id, title, slug, canonical, image',
												'table' => 'article_catalogue',
												'where' => array('publish' => 0,'canonical' => 'cam-ket'),
												'limit' => 5,
												'order_by' => 'order desc, id desc')
											,TRUE);
											if(isset($commit) && is_array($commit) && count($commit)){
												foreach($commit as $key => $val){
													$commit[$key]['post'] = $this->Autoload_Model->_condition(array(
														'module' => 'article',
														'select' => '`object`.`id`, `object`.`title`, `object`.`slug`, `object`.`canonical`, `object`.`image`, `object`.`description`, `object`.`created`',
														'where' => '`object`.`publish` = 0',
														'limit' => 4,
														'order_by' => '`object`.`order` desc, `object`.`id` desc',
														'catalogueid' => $val['id']
													));
												}
											}
										?>
										<?php if(isset($commit) && is_array($commit) && count($commit)){ ?>
										<?php foreach($commit as $key => $val){ ?>
										<div class="right">
											<?php if(isset($val['post']) && is_array($val['post']) && count($val['post'])){ ?>
											<ul class="uk-list list-detail-support">
												<?php foreach($val['post'] as $keyPost => $valPost){ ?>
												<li>
													<article class="article">
														<div class="uk-flex uk-flex-middle">
															<div class="icon">
																<img src="<?php echo $valPost['image']; ?>" alt="Đổi trả">
															</div>
															<div class="detail">
																<h5><?php echo $valPost['title']; ?></h5>
																<span>
																	<?php echo $valPost['description']; ?>
																</span>
															</div>
														</div>
													</article>
												</li>
												<?php } ?>
											</ul>
											<?php } ?>
											<div class="share-box uk-flex uk-flex-middle"> 
												<div class="facebook">
													<div class="fb-like" data-href="<?php echo $canonical; ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
												</div>
												<div class="plus">
													<div class="g-plusone" data-size="medium" data-href="<?php echo $canonical; ?>"></div>
												</div>
											</div><!-- end .share-box -->
										</div>
										<?php }} ?>
									</div>
									
								</div>
							</div>
						</div><!-- .prd-infor -->
					</div>
				</div><!-- .uk-grid -->
			</header><!-- .panel-head -->

			<section class="panel-body">
				<div class="uk-grid uk-grid-small">
					<div class="uk-width-large-3-4">
						<div class="prd-content uk-visible-large">
							<?php
								// print_r($extend_description);die;
							 ?>
							<?php if(isset($extend_description['title']) && is_array($extend_description['title']) && count($extend_description['title'])){ ?>
							<ul class="uk-list uk-clearfix nav-tabs" data-uk-switcher="{connect:'#tabContent'}">
									<?php foreach ($extend_description['title'] as $keyT => $valT) {?>
										<li class="<?php echo ($keyT == count($extend_description['title']) - 1)? 'uk-active' : '';?>"><?php echo $valT; ?></li>
									<?php } ?>
							</ul>
							<?php } ?>
							<?php if(isset($extend_description['description']) && is_array($extend_description['description']) && count($extend_description['description'])){ ?>
								<ul id="tabContent" class="uk-switcher tab-content">
									<?php foreach ($extend_description['description'] as $keyD => $valD) {?>
										<li>
											<article class="article detail-content">
												<?php echo $valD; ?>
											</article><!-- .article -->
										</li>
									<?php } ?>
						   		</ul>
							<?php } ?>
						</div><!-- .prd-content -->
						<div class="prd-content-mobile uk-hidden-large">
							<?php if(isset($prdExtendDesc) && is_array($prdExtendDesc) && count($prdExtendDesc)){ ?>
							<ul class="uk-list uk-accordion" data-uk-accordion="{showfirst: true}">
								<?php foreach($prdExtendDesc as $keyEx => $valEx){?>
									<li>
										<a class="uk-accordion-title accordion-label"><?php echo $valEx['title']; ?></a>
										<div class="uk-accordion-content accordion-content">
											<article class="article detail-content">
												<?php echo $valEx['desc']; ?>
											</article><!-- .article -->
										</div>
									</li>
								<?php } ?>
							</ul>
							<?php } ?>
						</div><!-- .mobile-prd-content -->
					</div>
					<div class="uk-width-large-1-4">
						<?php $this->load->view('homepage/frontend/common/aside-2'); ?>
					</div>
				</div>
				
			</section><!-- .panel-body-->
		</section><!-- .prd-detail -->

	</div>


	<?php if(isset($relaList) && is_array($relaList)  && count($relaList)){ ?>
	<section class="catalog-panel homepage-product rela-panel mb-common">
		<div class="uk-container uk-container-center">
			<header class="panel-head">
				<h2 class="heading-1"><span>Sản phẩm liên quan</span></h2>
			</header>
			<section class="panel-body">
				<ul class="uk-list uk-clearfix uk-grid uk-grid-small uk-grid-width-1-2 uk-grid-width-medium-1-4 uk-grid-width-large-1-4 list-product">
					<?php foreach ($relaList as $keyPost => $valPost) { ?>
						<?php
							$title = $valPost['title'];
							$href = rewrite_url($valPost['canonical'], true, false);
							$image = $valPost['image'];
							$price = $valPost['price'];
							$saleoff = $valPost['price_sale'];
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
								<a href="" title="" data-id="<?php echo $valPost['id']; ?>" data-quantity="1" data-price="<?php echo ($saleoff > 0) ? $saleoff : $price; ?>" class="js_buy">Thêm giỏ hàng</a>
							</div>
						</div>
					</div>
					</li>
					<?php } ?>
			</section>
		</div>
	</section>
	<?php } ?>
	<!-- homepage-product -->
	<div class="uk-container uk-container-center">
		<?php $this->load->view('homepage/frontend/core/comment', array('module' => $module,'moduleid' => $productDetail['id'])); ?>
	</div>

</div><!-- .page-body -->

<!-- This is the modal -->
<div id="order-form" class="uk-modal">
	<form action="" method="" class="form uk-form" id="form-baogia">
		<div class="uk-modal-dialog" style="padding: 0;">
			<a class="uk-modal-close uk-close"></a>
			<div class="uk-modal-header">
				<h2 class="md-heading"><span>Liên hệ báo giá</span></h2>
				<div class="md-desc">( Hãy để lại thông tin cho chúng tôi. Chúng tôi sẽ liên lạc ngay với bạn )</div>
			</div>
			<div class="modal-content loading">
				<div class="uk-flex uk-flex-middle uk-flex-space-between mb20">
					<label class="md-label">Sản phẩm</label>
					<div class="form-row title"><?php echo $productDetail['title']; ?></div>
					<input type="hidden" name="order_prd_name" value="<?php echo $productDetail['title']; ?>" class="form-control order_prd_name" placeholder="" autocomplete="off">
				</div>
				<div class="bg-loader"></div>
				<div class="error hidden">
					<div class="alert alert-danger"></div>
				</div><!-- /.error -->

				<div class="uk-flex uk-flex-middle uk-flex-space-between mb10">
					<label class="md-label">Họ tên</label>
					<div class="form-row">
						<?php echo form_input('order_fullname', htmlspecialchars_decode(html_entity_decode(set_value('order_fullname'))), 'placeholder="Nhập họ tên" class="input-text order order-fullname" autocomplete="off"');?>
					</div>
				</div>
				<div class="uk-flex uk-flex-middle uk-flex-space-between mb10">
					<label class="md-label">Số điện thoại</label>
					<div class="form-row">
						<?php echo form_input('order_phone', htmlspecialchars_decode(html_entity_decode(set_value('order_phone'))), 'placeholder="Nhập số điện thoại" class="input-text order order-phone" autocomplete="off"');?>
					</div>
				</div>
				<div class="uk-flex uk-flex-middle uk-flex-space-between mb10">
					<label class="md-label">Email</label>
					<div class="form-row">
						<?php echo form_input('order_mail', htmlspecialchars_decode(html_entity_decode(set_value('order_mail'))), 'placeholder="Nhập địa chỉ email" class="input-text order order-email" autocomplete="off"');?>
					</div>
				</div>
				<div class="uk-flex uk-flex-middle uk-flex-space-between mb10">
					<label class="md-label">Nhu cầu cụ thể</label>
					<div class="form-row">
						<?php echo form_input('order_message', htmlspecialchars_decode(html_entity_decode(set_value('order_message'))), 'placeholder="Ví dụ: Gửi báo giá, catalog ..." class="input-text order order-message" autocomplete="off"');?>
					</div>
				</div>
				<div class="uk-text-center">
					<button type="submit" value="submit" class="btn order order-1">Gửi thông tin</button>
				</div>

			</div>
		</div>
	</form>
</div>

<script>
	$(window).load(function() {
		var wd_width = $(window).width();
		if(wd_width > 768){
			// $(".zoom_image").elevateZoom({
			// 	'responsive':true,
			// 	'zoomWindowWidth': 300,
			// 	'zoomWindowHeight': 300,
			// 	'borderSize': 2,
			// 	'borderColour': '#ccc',
			// 	'lensColour': 'transparent',
			// 	'lensSize': 10,
			// 	'scrollZoom': true,

			// });
			// $(".zoom_image").ezPlus();
		}

	});
</script>
<script type="text/javascript">
	$(window).load(function() {
	  $('#carousel').flexslider({
		animation: "slide",
		controlNav: false,
		directionNav: false,
		animationLoop: false,
		slideshow: false,
		itemWidth: 100,
		itemMargin: 5,
		prevText: '',
		nextText: '',
		asNavFor: '#slider'
	  });
	  $('#slider').flexslider({
		animation: "slide",
		directionNav: true,
		controlNav: false,
		animationLoop: false,
		slideshow: false,
		prevText: '',
		nextText: '',
		sync: "#carousel"
	  });
	});
</script>
