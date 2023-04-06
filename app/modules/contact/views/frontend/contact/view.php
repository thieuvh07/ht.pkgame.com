<div id="artcatalogue" class="page-body media-catalogue">
	<div class="uk-container uk-container-center">
		<div class="breadcrumb">
			<ul class="uk-breadcrumb">
				<li><a href="" title=""><?php //echo '<i class="fa fa-home"></i>'; ?> Trang chủ</a></li>
				<li class="uk-active"><a href="lien-he.html" title="">Liên hệ</a></li>
			</ul>
		</div>
	</div><!-- .breadcrumb -->
	<section class="main-content">
		<div class="uk-container uk-container-center">
			<section class="uk-panel contact section-contact">
				<section class="panel-body">
					<div class="uk-grid uk-grid-medium">
						<div class="uk-width-large-1-3 uk-width-xlarge-3-4">
							<div class="contact-infomation">
								<div class="note">Cám ơn quý khách đã ghé thăm website chúng tôi.</div>
								<h2 class="company"><?php echo $this->general['homepage_company']; ?></h2>
								<div class="contact-map">
									<?php echo $this->general['contact_map']; ?>
								</div>
							</div><!-- .contact-infomation -->
						</div>
						<div class="uk-width-large-1-3 uk-width-xlarge-1-4">
							<div class="contact-form">
								<div class="label">Mời bạn điền vào mẫu thư và gửi đi, XPAND sẽ trả lời bạn trong thời gian sớm nhất.</div>
								<form action="" method="post" class="uk-form form">
								<?php $error = validation_errors(); echo !empty($error)?'<div class="callout callout-danger" style="padding:10px;background:rgb(195, 94, 94);color:#fff;margin-bottom:10px;">'.$error.'</div>':'';?>
									<div class="uk-grid lib-grid-20 uk-grid-width-small-1-2 uk-grid-width-large-1-1">
										<div class="form-row">
											<input type="text" name="fullname" class="uk-width-1-1 input-text" placeholder="Họ &amp; tên *" />
										</div>
										<div class="form-row">
											<input type="text" name="email" class="uk-width-1-1 input-text" placeholder="Email *" />
										</div>
										<div class="form-row">
											<input type="text" name="phone" class="uk-width-1-1 input-text" placeholder="Phone *" />
										</div>
										<div class="form-row">
											<input type="text" name="title" class="uk-width-1-1 input-text" placeholder="Tiêu đề thư *" />
										</div>
									</div><!-- .uk-grid -->
									<div class="form-row">
										<textarea name="message" class="uk-width-1-1 form-textarea" placeholder="Nội dung *"></textarea>
									</div>
									<div class="form-row uk-text-right">
										<input type="submit" name="create" class="btn-submit" value="Gửi đi" />
									</div>
								</form><!-- .form -->
							</div><!-- .contact-form -->
						</div>
					</div><!-- .uk-grid -->
				</section><!-- .panel-body -->
			</section><!-- .contact -->
		</div><!-- .uk-container -->
	</section><!-- .main-content -->
</div>

