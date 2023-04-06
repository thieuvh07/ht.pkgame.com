<!DOCTYPE html>
<html lang="vi-VN" prefix="og: http://ogp.me/ns#">
<head>
	<base href="<?php echo base_url();?>" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="robots" content="index,follow" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="author" content="<?php echo (isset($this->general['homepage_company'])) ? $this->general['homepage_company'] : ''; ?>" />
	<meta name="copyright" content="<?php echo (isset($this->general['homepage_company'])) ? $this->general['homepage_company'] : ''; ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
	<meta http-equiv="refresh" content="1800" />
	<!--for Google -->
	<title><?php echo isset($meta_title)?htmlspecialchars($meta_title):'';?></title>
	<meta name="description" charset="UTF-8" content="<?php echo isset($meta_description)?htmlspecialchars($meta_description):'';?>" />
	<?php echo isset($canonical)?'<link rel="canonical" href="'.$canonical.'" />':'';?>
	<meta property="og:locale" content="vi_VN" />
	<!-- for Facebook -->
	<meta property="og:title" content="<?php echo (isset($meta_title) && !empty($meta_title))?htmlspecialchars($meta_title):'';?>" />
	<meta property="og:type" content="<?php echo (isset($og_type) && $og_type != '') ? $og_type : 'article'; ?>" />
	<meta property="og:image" content="<?php echo (isset($meta_image) && !empty($meta_image)) ? $meta_image : base_url($this->general['homepage_logo']); ?>" />
	<?php echo isset($canonical)?'<meta property="og:url" content="'.$canonical.'" />':'';?>
	<meta property="og:description" content="<?php echo (isset($meta_description) && !empty($meta_description))?htmlspecialchars($meta_description):'';?>" />
	<meta property="og:site_name" content="<?php echo (isset($this->general['homepage_company'])) ? $this->general['homepage_company'] : ''; ?>" />
	<meta property="fb:admins" content=""/>
	<meta property="fb:app_id" content="" />
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:title" content="<?php echo isset($meta_title)?htmlspecialchars($meta_title):'';?>" />
	<meta name="twitter:description" content="<?php echo (isset($meta_description) && !empty($meta_description))?htmlspecialchars($meta_description):'';?>" />
	<meta name="twitter:image" content="<?php echo (isset($meta_image) && !empty($meta_image))?$meta_image:base_url($this->general['homepage_logo']);?>" />
	<link rel="icon" href="<?php echo $this->general['homepage_favicon']; ?>"  type="image/png" sizes="30x30">
    <link href="template/acore/css/core.css" rel="stylesheet">
	<?php $this->load->view('homepage/frontend/common/head'); ?>

	<script type="text/javascript">
		var BASE_URL = '<?php echo base_url(); ?>';
	</script>
	<script type='application/ld+json'>{
	"@context":"https://schema.org",
	"@type":"WebSite",
	"@id":"#website",
	"url":"<?php echo BASE_URL; ?>",
	"name":"<?php echo $this->general['homepage_company']; ?>",
	"alternateName":"HT WEB VIỆT NAM",
	"potentialAction":{"@type":"SearchAction",
	"target":"<?php echo BASE_URL; ?>?s={search_term_string}",
	"query-input":"required name=search_term_string"}}</script>

	<script type='application/ld+json'>{"@context":"https://schema.org",
	"@type":"Organization",
	"url":"<?php echo BASE_URL; ?>",
	"sameAs":[],
	"@id":"#organization",
	"name":"HT WEB VIỆT NAM",
	"logo":"<?php echo $this->general['homepage_logo']; ?>"}
	</script>

	<script type="application/ld+json">{
		"@context": "https://schema.org",
	  	"@type": "Professionalservice",
		"@id":"<?php echo BASE_URL; ?>",
		"url": "<?php echo BASE_URL; ?>",
		"logo": "<?php echo $this->general['homepage_logo']; ?>",
	    "image":"<?php echo $this->general['homepage_logo']; ?>",
	    "priceRange":"100$-30000$",
		"hasMap": "https://www.google.com/maps/place/C%C3%B4ng+ty+CP+XD+v%C3%A0+C%C3%B4ng+ngh%E1%BB%87+HT+Vi%E1%BB%87t+Nam/@20.9322392,105.8203129,13z/data=!4m8!1m2!2m1!1zQ8O0bmcgdHkgY-G7lSBwaOG6p24geMOieSBk4buxbmcgdsOgIGPDtG5nIG5naOG7hyBIVCBWaeG7h3QgTmFt!3m4!1s0x3135ac4c28beeda1:0x9178ddc7eca43f6!8m2!3d20.971483!4d105.8435375",
		"email": "<?php echo $this->general['contact_email']; ?>",
	    "founder": "Nguyễn Công Tuấn",
	     	"address": {
	    	"@type": "PostalAddress",
	    	"addressLocality": "Hà Nội",
	          "addressCountry": "VIỆT NAM",
	    	"addressRegion": "Hà Nội",
	    	"postalCode":"100000",
	    	"streetAddress": "Số 108B Ngõ 1277 Đường Giải Phóng - Phường Thịnh Liệt - Quận Hoàng Mai - Hà Nội"
	  	},
	  	"description": "<?php echo $this->general['seo_meta_description']; ?>",
		"name": "<?php echo $this->general['homepage_company']; ?>",
	  	"telephone": "<?php echo $this->general['contact_hotline']; ?>",
	 	"openingHours": [ "Mo-Sun 07:00-21:00" ],
	  	"geo": {
	    	"@type": "GeoCoordinates",
			"latitude": "20.971631",
			"longitude": "105.843570"
	 		},
	 "sameAs" : [ "<?php echo $this->general['social_facebook']; ?>"]
		}
	    </script>
		<script type="application/ld+json">{
	  "@context": "https://schema.org",
	  "@type": "Person",
	  "name": "Nguyễn Công Tuấn",
	  "jobTitle": "Ceo",
	  "image" : "<?php echo $this->general['homepage_logo']; ?>",
	   "worksFor" : "<?php echo $this->general['homepage_company']; ?>",
	  "url": "<?php echo site_url('gioi-thieu'); ?>",
	"sameAs":["https://www.facebook.com/than.hoa.733076" ],
	"AlumniOf" : [ "THPT Quang Trung", "Đại Học Thăng Long",
	"VFU university" ],
	"address": {
	  "@type": "PostalAddress",
	    "addressLocality": "Ha Noi",
	    "addressRegion": "vietnam"
		 }}
	</script>
	<script type="application/ld+json">
	      {
	      "@context": "https://schema.org",
	      "@type": "WebSite",
	      "url": "<?php echo BASE_URL; ?>",
	      "potentialAction": {
	"@type": "SearchAction",
	      "target": "<?php echo BASE_URL; ?>/?keyword={search_term_string}",
	      "query-input": "required name=search_term_string"
	      }
	   }
    </script>
</head>
<body>
	<div class="lds-css ng-scope hidden"><div style="width:100%;height:100%" class="lds-eclipse"><div></div></div></div>
	<?php echo $this->general['analytic_google_analytic']; ?>
	<?php echo $this->general['facebook_facebook_pixel']; ?>
	<?php
		$this->load->view('homepage/frontend/common/header');
	?>
	<section id="body">
		<?php $this->load->view(isset($template) ? $template : ''); ?>
	</section><!-- #body -->
	<?php $this->load->view('homepage/frontend/common/footer'); ?>
	<?php $this->load->view('homepage/frontend/core/offcanvas'); ?>
	<?php $this->load->view('homepage/frontend/core/notification'); ?>
	<script src="template/frontend/resources/plugin.js" type="text/javascript"></script>
	<script src="template/frontend/resources/extend.js" type="text/javascript"></script>
	<script src="template/acore/js/core.js"  type="text/javascript"></script>

	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v5.0"></script>
</body>
</html>
