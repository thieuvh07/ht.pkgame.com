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
	<div class="uk-container uk-container-center">
		<div class="uk-grid uk-grid-medium">
			<div class="uk-width-1-5 uk-visible-large">
				<?php $this->load->view('homepage/frontend/common/aside');?>
			</div>
			<div class="uk-width-large-4-5">
				<section class="homepage-product catalog-panel">
					<div class="panel-head">
						<div class="uk-flex uk-flex-middle uk-flex-space-between mb20">
							<h1 class="heading-1"><span><?php echo $detailCatalogue['title']; ?></span></h1>
							<section class="filter">
								<form class="uk-form form uk-form-horizontal" method="get" action="">
									<select id="form-h-s" name="data-filter" class="select-page">
	                                    <option value="0">Lọc sản phẩm</option>
										<option value="price_2|asc" <?php echo ($this->input->get('filter') == 'price_2|asc') ? 'selected': ''; ?>>Giá tăng dần</option>
										<option value="price_2|desc" <?php echo ($this->input->get('filter') == 'price_2|desc') ? 'selected': ''; ?>>Giá giảm dần</option>
										<option value="id|desc" <?php echo ($this->input->get('filter') == 'id|desc') ? 'selected': ''; ?>>Sản phẩm mới nhất</option>
										<option value="id|asc" <?php echo ($this->input->get('filter') == 'id|asc') ? 'selected': ''; ?>> Sản phẩm cũ nhất</option>
	                                </select>
									<script type="text/javascript">
										$(document).ready(function(){
											$('.select-page').on('change',function(){
												var filter = $(this).val();
												if(filter != 0){
													var url = '<?php echo $canonical ?>' + '?filter='+filter;
													window.location.href=url;
												}else{
													window.location.href='<?php echo $canonical; ?>';
												}

											});
										});
									</script>

								</form>
							</section>
						</div>
					</div><!-- .panel-head -->
					<?php if(isset($productList) && is_array($productList) && count($productList)){ ?>
					<div class="panel-body">
						<ul class="uk-list uk-clearfix uk-grid uk-grid-medium uk-grid-width-medium-1-2 uk-grid-width-large-1-3 list-product zoom">
							<?php foreach ($productList as $keyPost => $valPost) { ?>
								<?php
									$title = $valPost['title'];
									$href = rewrite_url($valPost['canonical'], TRUE, TRUE);
									$image = getthumb($valPost['image']);
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
										<div class="text-right"><button class="btn-buy" value="" name="">Mua hàng</button></div>
									</div>
									
								</div>
							</li>
							<?php } ?>
						</ul> <!-- .product -->
					</div> <!-- .panel-body -->
					<?php } ?>
					<?php echo (isset($PaginationList)) ? $PaginationList : ''; ?>
				</section> <!-- .homepage-product -->
			</div>
		</div>
	</div>
</div><!-- .page-body -->
