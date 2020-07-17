<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

get_header(); ?>



<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$loop = new WP_Query( array(
    'post_type' => 'productos',
    'posts_per_page' => 8,
    'paged' => $paged,
    //$tax => $category,
    'post_status' =>'publish',  
    'tax_query' => array(
	         'relation' => 'AND',

             array(
		          'taxonomy' => 'seccion',
		          'field'    => 'slug',
		          'terms'    => 'bisuteria',
	         ),

        )
    ) );
   
if ($loop->have_posts()){?>


	<div id="productos">

<?php
 while ( $loop->have_posts() ) : $loop->the_post(); ?>

 		<article class="productos-grid">
 			
			<h2 class="nombre-producto"><?php the_title();?></h2>
			<?php the_post_thumbnail('post-image');?>
			<p><?php the_field( 'descripcion' ); ?></p>
			<p><span class="precio"><?php the_field( 'precio' ); ?></span></p>			
		</article> 


<?php endwhile; 

	 ?>
	
	</div><!-- #productos -->

	<nav>
		<ul class="pagination">
	                
		<?php
			                  
			$big = 999999999; // need an unlikely integer
			echo paginate_links( array(
			    'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
			    'format' => '?paged=%#%',
			    'current' => max( 1, get_query_var('paged') ),
			    'total' => $loop->max_num_pages
			) );?>
		</ul>
	</nav>


<?php $loop = null;    
    wp_reset_postdata();wp_reset_query();?>

<?php
}
else{
	echo "<article class='productos-error'>Lo sentimos pero en este monento no hay ningún producto de este tipo en la web </article>";
}?>


<?php get_footer(); ?>
