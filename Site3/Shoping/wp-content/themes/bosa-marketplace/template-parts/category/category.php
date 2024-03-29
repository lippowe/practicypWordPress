<?php
$categoryoneID = get_theme_mod( 'category_image_one', '' );
$categoryone = get_theme_mod( 'category_one', '' );

$categorytwoID = get_theme_mod( 'category_image_two', '' );
$categorytwo = get_theme_mod( 'category_two', '' );

$categorythreeID = get_theme_mod( 'category_image_three', '' );
$categorythree = get_theme_mod( 'category_three', '' );

$categoryfourID = get_theme_mod( 'category_image_four', '' );
$categoryfour = get_theme_mod( 'category_four', '' );


$category_array = array();
$has_category = false;

if( !empty( $categoryoneID ) || !empty( $categoryone ) ){
	$category_one = wp_get_attachment_image_src( $categoryoneID ,'bosa-420-300');
 	if ( is_array( $category_one ) ){
 		$has_category = true;
   	 	$categories_one = $category_one[0];
   	 	$category_array['image_one'] ['ID'] = $categories_one;	 	
  	}
  	if ( !empty( $categoryone ) ){
 		$has_category = true;
   	 	$category_array['image_one']['category'] = $categoryone;	
  	}
}
if( !empty( $categorytwoID ) || !empty( $categorytwo ) ){
	$category_two = wp_get_attachment_image_src( $categorytwoID ,'bosa-420-300');
 	if ( is_array( $category_two ) ){
 		$has_category = true;
   	 	$categories_two = $category_two[0];
   	 	$category_array['image_two'] ['ID'] = $categories_two;	 	
  	}
  	if ( !empty( $categorytwo ) ){
 		$has_category = true;
   	 	$category_array['image_two']['category'] = $categorytwo;	
  	}
}
if( !empty( $categorythreeID ) || !empty( $categorythree ) ){
	$category_three = wp_get_attachment_image_src( $categorythreeID ,'bosa-420-300');
 	if ( is_array( $category_three ) ){
 		$has_category = true;
   	 	$categories_three = $category_three[0];
   	 	$category_array['image_three'] ['ID'] = $categories_three;	 	
  	}
  	if ( !empty( $categorythree ) ){
 		$has_category = true;
   	 	$category_array['image_three']['category'] = $categorythree;	
  	}
}
if( !empty( $categoryfourID ) || !empty( $categoryfour ) ){
	$category_four = wp_get_attachment_image_src( $categoryfourID ,'bosa-420-300');
 	if ( is_array( $category_four ) ){
 		$has_category = true;
   	 	$categories_four = $category_four[0];
   	 	$category_array['image_four'] ['ID'] = $categories_four;	 	
  	}
  	if ( !empty($categoryfour) ){
 		$has_category = true;
   	 	$category_array['image_four']['category'] = $categoryfour;	
  	}
}

$product_cat = bosa_marketplace_get_product_categories();

if( !get_theme_mod( 'disable_category_section', true ) && ( $has_category || get_theme_mod( 'category_title' ) ) ){ ?>
	<section class="section-category-area">
		<?php if( $has_category || get_theme_mod( 'category_title' ) ){ ?>
			<?php if( get_theme_mod( 'category_title' ) ){ ?>
				<div class="section-title-wrap">
					<h2 class="section-title">	
						<?php echo esc_html( get_theme_mod( 'category_title' ) ); ?>
					</h2>
				</div>
			<?php } ?>
			<div class="content-wrap">
				<div class="row">
					<?php foreach( $category_array as $each_category ){ ?>
						<div class="col-sm-3">
							<article class="category-content-wrap">
								<?php 
								if ( isset( $each_category['ID'] ) && !empty( $each_category['ID'] ) ){
									$cat_url = '';
									if( isset( $each_category['category'] ) && !empty( $each_category['category'] ) ) {
										$cat_url = $each_category['category'];
									}
								?>
									<figure class= "featured-image">
										<a href="<?php echo esc_url( get_category_link( $cat_url ) ); ?>">
											<img src="<?php echo esc_url( $each_category['ID'] ); ?>">
										</a>	
									</figure>
								<?php } ?>
								<?php if ( isset( $each_category['category'] ) && !empty( $each_category['category'] ) ){ ?>
									<h5 class="entry-title text-center">
										<a href="<?php echo esc_url( get_category_link( $each_category ['category'] ) ); ?>">
											<?php echo esc_html($product_cat[$each_category['category'] ] ); ?>
										</a>	
									</h5>
								<?php } ?>
							</article>	
						</div>
					<?php } ?>
				</div>
			</div>
		<?php } ?>
	</section>
<?php } ?>

