<header class="pc-header uk-visible-large ishome">
	<section class="topbar">
		<div class="uk-container uk-container-center">
			<div class="uk-grid">
				<div class="uk-width-small-1-2">
					<div class="box1"><i class="fa fa-map-marker mr5" aria-hidden="true"></i> <?php echo $this->general['contact_address']; ?></div>
				</div>
				<div class="uk-width-small-1-2">
					<div class="box2"><i class="fa fa-phone mr5" aria-hidden="true"></i><a href="tel:<?php echo $this->general['contact_hotline']; ?>" title="Hotline"><?php echo $this->general['contact_hotline']; ?></a></div>
				</div>
			</div>
		</div>
	</section>

	<section class="upper">
		<div class="uk-container uk-container-center">
			<div class="uk-flex uk-flex-middle uk-flex-space-between">
				<?php echo logo(); ?>
				
	 			<?php echo $this->load->view('homepage/frontend/core/navigation'); ?>
				
			</div>
		</div>
	</section> <!-- .upper -->

	<section class="lower">
		<div class="uk-container uk-container-center">
			<div class="hd-welcome">
				<?php echo $this->general['homepage_slogan']; ?>
			</div>
			<div class="hd-search">
				<form method="get" class="form uk-form uk-grid uk-grid-collapse">
					<div class="wrap-select">
						<?php 
							$aside =  $this->Autoload_Model->_get_where(array('select' => 'id, title, slug, canonical, image, parentid, icon, level','table' => 'product_catalogue','where' => array('publish' => 0),'order_by' => 'order desc, id desc'),TRUE);
							$aside = recursive($aside);
							if(isset($aside[0]['children']) && is_array($aside[0]['children']) && count($aside[0]['children'])){
								$aside = $aside[0]['children'];
							}
						 ?>
			
						<div class="custom-select">
							<select name="catalogueid" class="select">
								<option value="0">Tất cả</option>
								<?php if(isset($aside) && is_array($aside) && count($aside)){ ?>
									<?php foreach($aside as $key => $val){ ?>
									<?php
										$id = $val['id'];
										$titleC = $val['title'];
									?>
									<option value="<?php echo $id ?>"><?php echo $titleC ?></option>
								<?php }} ?>
							</select>
							<div class="select-selected">
								Tất cả
							</div>
							<div class="uk-overflow-container select-items select-hide">
								<div class="select-1"><span class="title-select">Tất cả</span>
								</div>
								<?php if(isset($aside) && is_array($aside) && count($aside)){ ?>
									<?php foreach($aside as $key => $val){ ?>
									<?php
										$titleC = $val['title'];
									?>
									<div class="select-1"><span class="title-select"><?php echo $titleC ?></span>
									</div>
								<?php }} ?>
							</div>
						</div>
					</div>
					<div class="form-row uk-grid uk-grid-collapse">
						<input type="text" name="keyword" value="" placeholder="" class="input-text">
						<div class="btn-submit js_search" ><i class="fa fa-search" aria-hidden="true"></i></div>
					</div>
				</form>
			</div>
		</div>
	</section> <!-- .lower -->
</header>
<script>
	$(document).ready(function(){
		$(document).on('click' , '.select-selected' , function(e){
			e.preventDefault();
			let _this = $(this);
			_this.siblings('.select-items').toggleClass('select-hide');
		});
		$(document).on('click' , '.select-1' , function(e){
			e.preventDefault();
			let _this = $(this);
			let s = _this.parents().find('.select');
			let h = _this.parents().find('.select-selected');
			s.find('option').each(function(index, el) {
				let option = $(this);
				if(el.text == _this.find('.title-select').text()){
					let w = parseInt(_this.find('.title-select').width());
					$('.select-selected').width(w + 10);
					let ww = $('.select-selected').outerWidth();
					$('.hd-search .form .form-row .input-text').css({
						'padding-left' : ww + 10 ,
					});
					el.setAttribute('selected','selected');
					h.text(_this.find('.title-select').text());

					$('.select-1').removeClass('same-as-selected');
					_this.addClass('same-as-selected');
				}


			});
			$('.select-items').toggleClass('select-hide');
		});
	});

</script>

<header class="mobile-header uk-hidden-large">
	<section class="upper">
		<a class="moblie-menu-btn skin-1" href="#offcanvas" class="offcanvas" data-uk-offcanvas="{target:'#offcanvas'}">
			<span>Menu</span>
		</a>
		<div class="logo"><a href="" title="Logo"><img src="<?php echo $this->general['homepage_logo']; ?>" alt="Logo" /></a></div>
	</section><!-- .upper -->
	<section class="lower">
		<div class="mobile-search">
			<form action="<?php echo site_url('tim-kiem'); ?>" method="" class="uk-form form">
				<input type="text" name="keyword" class="uk-width-1-1 input-text" placeholder="Bạn muốn tìm gì hôm nay?" />
				<button type="submit" name="" value="" class="btn-submit">Tìm kiếm</button>
			</form>
		</div>
	</section>
</header><!-- .mobile-header -->



