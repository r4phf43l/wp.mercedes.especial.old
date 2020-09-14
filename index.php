<?php get_header(); ?>
<?php
if ( have_posts() ) :
    while (have_posts() ) :
        the_post();
        if(is_singular('post')){
            get_template_part('content', 'post');            
        }
        elseif(is_page()){
            get_template_part('content', 'childs');            
        }
        elseif(is_attachment()){
            get_template_part( 'content', 'attachment' );            
        }
        else {
            get_template_part('content');
        }
    endwhile;
endif; ?>
<?php get_footer(); ?>