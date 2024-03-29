<?php
/**
 * Trekking Blocks: Block Patterns
 *
 * @since Trekking Blocks 1.0
 */

/**
 * Registers block patterns and categories.
 *
 * @since Trekking Blocks 1.0
 *
 * @return void
 */
function trekking_blocks_register_block_patterns() {
	$block_pattern_categories = array(
		'trekking-blocks'    => array( 'label' => __( 'Trekking Blocks', 'trekking-blocks' ) ),
	);

	$block_pattern_categories = apply_filters( 'trekking_blocks_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}
}
add_action( 'init', 'trekking_blocks_register_block_patterns', 9 );
