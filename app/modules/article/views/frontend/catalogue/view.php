<section id="art-catalogue">
	<div class="uk-container uk-container-center">
		<div class="uk-grid uk-grid-medium">
			<div class="uk-width-large-1-4 uk-visible-large">
				<?php $this->load->view('homepage/frontend/common/aside'); ?>
			</div>
			<div class="uk-width-large-3-4">
				<div class="art-catalogue">
					<h1 class="heading-1 mb20"><span><?php echo $detailCatalogue['title']; ?></span></h1>
					<?php if(isset($articleList) && is_array($articleList) && count($articleList)){ ?>
					<ul class="uk-list uk-clearfix uk-grid uk-grid-medium uk-grid-width-medium-1-3 uk-grid-width-large-1-3 list-article">
					<?php foreach($articleList as $key => $val){ ?>
					<?php
						$title = $val['title'];
						$image = $val['image'];
						$href = rewrite_url($val['canonical'], TRUE, TRUE);
						$description = cutnchar(strip_tags($val['description']),100);
					?>
						<li>
							<div class="article">
								<div class="thumb"><a class="image img-cover img-zoomin img-shine" href="<?php echo $href; ?>" title="<?php echo $title; ?>"><img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" /></a></div>
								<div class="info">
									<h2 class="title"><a href="<?php echo $href; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a></h2>
									<div class="description"><?php echo $description; ?></div>

									<div class="readmore"><a href="<?php echo $href; ?>" title="" class="btn-readmore">Xem thêm >></a></div>
								</div>
							</div>
						</li>
						<?php } ?>
					</ul><!-- .uk-grid -->
					<?php } ?>
					<?php echo (isset($PaginationList)) ? $PaginationList : ''; ?>
				</div>
			</div>
		</div>
	</div>
</section>
