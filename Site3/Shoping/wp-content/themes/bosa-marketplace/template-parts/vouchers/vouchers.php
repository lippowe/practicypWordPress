<?php
$blogvoucheroneID = get_theme_mod( 'blog_voucher_one','');
$blogvouchertwoID = get_theme_mod( 'blog_voucher_two','');       
$blogvoucherthreeID = get_theme_mod( 'blog_voucher_three','');
$blogvoucherfourID = get_theme_mod( 'blog_voucher_four','');

$vouchers_array = array();
$has_vouchers = false;
if( !empty( $blogvoucheroneID ) ){
	$blog_voucher_one  = wp_get_attachment_image_src( $blogvoucheroneID,'bosa-420-300');
 	if ( is_array(  $blog_voucher_one ) ){
 		$has_vouchers = true;
   	 	$blog_vouchers_one = $blog_voucher_one[0];
   	 	$vouchers_array['image_one'] = array(
			'ID' => $blog_vouchers_one,
		);	
  	}
}
if( !empty( $blogvouchertwoID ) ){
	$blog_voucher_two = wp_get_attachment_image_src( $blogvouchertwoID,'bosa-420-300');
	if ( is_array(  $blog_voucher_two ) ){
		$has_vouchers = true;	
        $blog_vouchers_two = $blog_voucher_two[0];
        $vouchers_array['image_two'] = array(
			'ID' => $blog_vouchers_two,
		);	
  	}
}
if( !empty( $blogvoucherthreeID ) ){	
	$blog_voucher_three = wp_get_attachment_image_src( $blogvoucherthreeID,'bosa-420-300');
	if ( is_array(  $blog_voucher_three ) ){
		$has_vouchers = true;
      	$blog_vouchers_three = $blog_voucher_three[0];
      	$vouchers_array['image_three'] = array(
			'ID' => $blog_vouchers_three,
		);	
  	}
}
if( !empty( $blogvoucherfourID ) ){	
	$blog_voucher_four = wp_get_attachment_image_src( $blogvoucherfourID,'bosa-420-300');
	if ( is_array(  $blog_voucher_four ) ){
		$has_vouchers = true;
      	$blog_vouchers_four = $blog_voucher_four[0];
      	$vouchers_array['image_four'] = array(
			'ID' => $blog_vouchers_four,
		);	
  	}
}

if( !get_theme_mod( 'disable_vouchers_section', true ) && $has_vouchers ){ ?>
	<section class="section-voucher-area">
		<div class="content-wrap">
			<div class="row">
				<?php foreach( $vouchers_array as $each_vouchers ){ ?>
					<div class="col-md-3">
						<article class="voucher-content-wrap">
							<figure class= "featured-image">
								<img src="<?php echo esc_url( $each_vouchers['ID'] ); ?>">
							</figure>
						</article>
					</div>
				<?php } ?>
			</div>	
		</div>
	</section>
<?php } ?>

