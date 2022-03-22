<?php

/**
 * Template Part for displaying all ACF Templates on any pages
 */

if (have_rows('section_templates')) : // if there are custom section templates on the page
    while (have_rows('section_templates')) : the_row();

		// standard wysiwyg template
		if (get_row_layout() == 'standard_wysiwyg') : 
			get_template_part('template-parts/acf', 'standard-wysiwyg'); 
		endif;

		// column box template
		if (get_row_layout() == 'column_box') : 
			get_template_part('template-parts/acf', 'column-box'); 
		endif;
        
		// client quotes slider template
		if (get_row_layout() == 'client_quote_slider') : 
			get_template_part('template-parts/acf', 'client-quote'); 
		endif;

		// left right highlight image template
		if (get_row_layout() == 'left_right_highlight_image') : 
			get_template_part('template-parts/acf', 'left-right-highlight'); 
		endif;

		// CTA Panel Template
		if (get_row_layout() == 'cta_panel') : 
			get_template_part('template-parts/acf', 'cta-panel'); 
		endif;

		// Team Tiles Template
		if (get_row_layout() == 'team_members') : 
			get_template_part('template-parts/acf', 'team-members'); 
		endif;

		// Blog Highlight Template
		if (get_row_layout() == 'blog_highlights') : 
			get_template_part('template-parts/acf', 'blog-highlights'); 
		endif;

		// Product Sample Tile Template
		if (get_row_layout() == 'product_sample_tiles') : 
			get_template_part('template-parts/acf', 'product-sample-tiles'); 
		endif;

		// Product Sample Tag Template
		if (get_row_layout() == 'product_selection_list') : 
			get_template_part('template-parts/acf', 'product-selection-list'); 
		endif;
?>


    <?php endwhile; ?>
<?php endif; ?>