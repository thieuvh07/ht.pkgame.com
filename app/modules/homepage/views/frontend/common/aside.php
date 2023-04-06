<!-- ASIDE PRODUCT -->
<aside class="aside uk-visible-large">
	<?php
		$aside =  $this->Autoload_Model->_get_where(array('select' => 'id, title, slug, canonical, image, parentid, icon, level','table' => 'product_catalogue','where' => array('publish' => 0),'order_by' => 'order desc, id desc'),TRUE);
		$aside = recursive($aside);

		if(isset($aside[0]['children']) && is_array($aside[0]['children']) && count($aside[0]['children'])){
			$aside = $aside[0]['children'];
		}
	?>
	
	<div class="aside-panel aside-category">
		<header class="panel-head">
			<h3 class="aside-heading"><span>Chọn ốp theo thể loại</span></h3>
		</header>
		<section class="panel-body">
			<?php if(isset($aside) && is_array($aside) && count($aside)){ ?>
			<ul class="uk-list uk-clearfix list-as-category">
				<?php foreach($aside as $key => $val){ ?>
				<?php
					$titleC = $val['title'];
					$hrefC = rewrite_url($val['canonical'], true , true);
				?>
				<li>
					<div class="as-category">
						<h4 class="title js_catalogue" data-catalogueid="<?php echo $val['id'] ?>" data-image="<?php echo $val['image'] ?>"><a  title="<?php echo $titleC; ?>"><?php echo $titleC; ?></a></h4>
						<?php if(isset($val['children']) && is_array($val['children']) && count($val['children'])){ ?>
						<ul class="uk-list uk-clearfix list-subcategory">
							<?php foreach($val['children'] as $keySub => $valSub){ ?>
							<?php
								$titleS = $valSub['title'];
							?>
							<li>
								<div class="title" data-catalogueid="<?php echo $valSub['id'] ?>" data-image="<?php echo $valSub['image'] ?>"><a title="<?php echo $titleS; ?>"><?php echo $titleS; ?></a></div>
							</li>
							<?php } ?>
						</ul>
						<?php } ?>	
					</div>
				</li>
				<?php }?>
			</ul>
			<?php }?>
		</section><!-- .panel-body -->
	</div><!-- .aside-panel -->

	<div class="aside-panel section order-panel">
		<header class="panel-head">
			<h3 class="aside-heading"><span>Đơn hàng mới</span></h3>
		</header>
		<section class="panel-body">
			<ul class="uk-list list-order">
				<?php 
					$list_article = $this->Autoload_Model->_get_where(array(
						'select' => 'article.title, article.description, article.image',
						'table' => 'article',
						'join' => array(
							array('article_catalogue', 'article_catalogue.id = article.catalogueid', 'left')
						),
						'where' => array('article_catalogue.slug' => 'don-hang-moi','article.publish' => 0,),
					),true);
				 ?>
				<?php if(isset($list_article) && is_array($list_article) && count($list_article)){ ?>
						<?php foreach($list_article as $key => $article){ ?>
						<li>
							<div class="uk-flex uk-flex-middle order">
								<div class="image img-cover"><img src="<?php echo $article['image']; ?>" alt="<?php echo $article['image']; ?>"></div>
								<div class="info">
									<div class="title"><?php echo $article['title']; ?></div>
									<div class="des"><?php echo $article['description']; ?></div>
								</div>
							</div>
						</li>
				<?php }} ?>
			</ul>
		</section>

	</div>
</aside><!-- .aside -->
