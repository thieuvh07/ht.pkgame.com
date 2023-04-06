<?php $main_nav = navigation(array('keyword' => 'main', 'output' => 'array')); ?>
<?php if(isset($main_nav) && is_array($main_nav) && count($main_nav)){ ?>
	<nav class="main-nav uk-flex uk-flex-middle">
		<ul class="uk-navbar-nav uk-clearfix main-menu">
			<?php foreach($main_nav as $key => $val){ ?>
			<li><a href="<?php echo $val['link']; ?>" title="<?php echo $val['title']; ?>"><?php echo $val['title']; ?></a>
				<?php if(isset($val['children']) && is_array($val['children']) && count($val['children'])){ ?>
				<div class="dropdown-menu">
					<ul class="uk-list children">
						<?php foreach($val['children'] as $keyItem => $valItem){ ?>
						<li><a href="<?php echo $valItem['link'] ?>" title="<?php echo $valItem['title'] ?>"><?php echo $valItem['title'] ?></a></li>
						<?php } ?>
					</ul>
				</div>
				<?php } ?>
			</li>
			<?php } ?>
		</ul>
		<div class="hd-cart">
			<a href="thanh-toan.html" title="" class="title"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
			<div class="cart-qty js_total_prd js_total_item_cart"><?php echo $this->cart->total_items(); ?></div>
		</div>
	</nav>
<?php } ?>