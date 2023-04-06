<div id="prdtag" class="page-body" >
	<div class="uk-container uk-container-center">
		<div class="uk-grid uk-grid-medium">
			<div class="uk-width-large-1-5">
				<?php $this->load->view('homepage/frontend/common/aside'); ?>
			</div>
			<div class="uk-width-large-4-5">
				<section class="tagdetail">
					<div class="main-breadcrumb">
						<ul class="uk-breadcrumb">
							<li><a href="." title="Trang chủ">Trang Chủ</a></li>
							<li><a href="<?php echo base_url('tim-kiem'); ?>" title="Tìm kiếm">Tìm kiếm</a></li>
						</ul>
					</div>
					<div class="tag-wrapper">
						<div class="tag-description">
							<h1 class="tag-title">Từ khóa: <?php echo $this->input->get('keyword'); ?></h1>
						</div>
						<?php if(isset($objectList) && is_array($objectList) && count($objectList)){ ?>
						<div id="ajax-content">
							<ul class="uk-list uk-clearfix uk-grid uk-grid-medium uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-5 prd-list">
								<?php foreach($objectList as $key => $val){ ?>
									<?php 															
									$title = $val['title'];
									$image = $val['image'];
									$href = rewrite_url($val['canonical'], TRUE, TRUE);
									$code = $val['code'];		
									?>
									<li>
										<div class="prd">
											<div class="thumb"><a class="image img-cover" href="<?php echo $href; ?>" title="<?php echo $title; ?>"><img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" /></a></div>
											<div class="info">
												<h2 class="title"><a href="<?php echo $href; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a></h2>
												<div class="subtitle">Mã SP: <?php echo $code; ?></div>

												<div class="reamore"><a href="" title="" class="btn-readmore">Liên hệ</a></div>
											</div>
										</div>
									</li>
								<?php } ?>
							</ul>
						</div>
						<?php } ?>
						<?php echo (isset($PaginationList)) ? $PaginationList : ''; ?>
					</div>
				</section>
			</div>
		</div>
	</div>
	
</div><!-- #prdtag -->