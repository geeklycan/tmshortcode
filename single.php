<?php
/**
 * The template for displaying all single posts.
 *
 * @package lycans
 */

get_header(); ?>

<?php 
$sidexist = is_active_sidebar('sidebar-1');

if($sidexist){
	$leftclass = "col-md-9";
}else{
	$leftclass = "col-md-12";
}
?>
	
	<div class="container">
		<div class="row">
			<div class="<?php echo $leftclass; ?>">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php the_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	</div>
<?php if($sidexist){ ?>
	<div class="col-md-3"> 
		<?php get_sidebar(); ?>
	</div>
<?php } ?>
</div>
</div>


<?php get_footer(); ?>
