<?php 
$formula_page_header_disabled = get_theme_mod('formula_page_header_disabled', true);
if($formula_page_header_disabled == true): ?>
<section class="page-title-module">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="page-header-wrapper content-center">
				<?php 
                    if(is_home() || is_front_page()) {
                        echo '<div class="page-header-title text-center"><h1 class="text-white">'; echo single_post_title(); echo '</h1></div>';
                    } else{
                        formula_theme_page_header_title();
                    }

                    formula_page_header_breadcrumbs();						
				?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Theme Page Header Area -->		
<?php endif; ?>