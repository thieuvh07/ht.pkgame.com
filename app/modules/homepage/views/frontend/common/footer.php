<footer class="pc-footer">
	<div class="uk-container uk-container-center">
		<div class="ft-content">
			<div class="uk-grid">
				<div class="uk-width-large-1-5">
					<div class="logo_ft">
						<a itemprop="url" href="." title=""><img src="<?php echo $this->general['homepage_logo_ft'] ?>" alt="Logo" itemprop="logo"></a>
					</div>
				</div>
				<div class="uk-width-large-1-5">
					<section class="ft-panel order-1">
						<header class="panel-head"><h4 class="heading-1 line-1"><span><?php echo $this->general['homepage_company']; ?></span></h4></header>
						<section class="panel-body">
							<ul class="uk-list uk-clearfix ft-list list-contact">
								<li class="address"><span><b>Địa chỉ</b>:</span><span><?php echo $this->general['contact_address']; ?></span></li>
								<li class="phone"><a href="tel:<?php echo $this->general['contact_phone']; ?>" title=""><span><b>Điện thoại</b>:</span><span><?php echo $this->general['contact_phone']; ?></span></a></li>
								<li class="hotline"><a href="tel:<?php echo $this->general['contact_hotline']; ?>" title=""><span><b>Hotline</b>:</span><span><?php echo $this->general['contact_hotline']; ?></span></a></li>
								<li class="email"><a href="mailto:<?php echo $this->general['contact_email']; ?>" target="_blank" title=""><span><b>Email</b>:</span><span><?php echo $this->general['contact_email']; ?></span></a></li>
								<li class="website"><a href="" title=""><span><b>Website</b>:</span><span><?php echo $this->general['contact_website']; ?></span></a></li>
								<li class="extend"><?php echo $this->general['contact_extend']; ?></li>
							</ul>
						</section>
					</section> <!-- .panel -->
				</div>
				<div class="uk-width-large-2-5">
					<div class="uk-grid uk-grid-medium uk-grid-width-large-1-2">
						<?php $footer_nav = navigation(array('keyword' => 'footer', 'output' => 'array')); ?>
						<?php if(isset($footer_nav) && is_array($footer_nav) && count($footer_nav)){ ?>
							<?php foreach($footer_nav as $key => $val){ ?>
							<section class="ft-panel order-2">
								<header class="panel-head"><h4 class="heading-1"><span><?php echo $val['title']; ?></span></h4></header>
								<section class="panel-body">
									<?php if(isset($val['children']) && is_array($val['children']) && count($val['children'])){ ?>
									<ul class="uk-list uk-clearfix ft-list site-link">
										<?php foreach($val['children'] as $keyItem => $valItem){ ?>
											<li><a href="<?php echo $valItem['link'] ?>" title="<?php echo $valItem['title'] ?>"><?php echo $valItem['title'] ?></a></li>
										<?php } ?>
									</ul>
									<?php } ?>
								</section>
							</section> <!-- .panel -->
							<?php } ?>
						<?php } ?>
					</div>
				</div>
				<div class="uk-width-large-1-5">
					<section class="ft-panel order-1">
						<header class="panel-head"><h4 class="heading-1 line-1"><span>Kết nối</span></h4></header>
						<section class="panel-body">
							<div class="iframe-video">
								<?php echo $this->general['contact_map'] ?>
							</div>
						</section>
					</section> <!-- .panel -->
				</div>
			</div>
		</div> <!-- .ft-content -->

		<!-- <div class="copyright">© Copyright 2019 by <b>Xpand</b> - All Rights Reserved.</div> -->

	</div>
</footer>

<!--form cảm ơn-->
<div id="md-thanks" class="uk-modal">
	<div class="uk-modal-dialog" style="padding: 0; background: #003466;">
		<a class="uk-modal-close uk-close"></a>
		<div class="modal-content">
			<p>Cám ơn bạn để lại thông tin liên hệ. </p>
			<p>Chúng tôi sẽ liên lạc với bạn sớm nhất có thể.</p>
			<p>Cảm ơn bạn !</p>
		</div>
	</div>
</div>