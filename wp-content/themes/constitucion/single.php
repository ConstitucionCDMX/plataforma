<?php get_header(); the_post();
$date_arr = getDateTransform( $post->post_date ); ?>

<section class="[ container ]">
	<div class="[ row ]">
		<div class="[ col-xs-12 ][ content-user ]">
			<?php if ( has_post_thumbnail() ):
				the_post_thumbnail('large', array('class' => '[ img-responsive ]'));
			else:
				echo '<img src="http://placehold.it/912x420" />';
			endif;?>
			<p><?php echo $date_arr[4].' '.$date_arr[1].' '.$date_arr[2] ?></p>
			<div class="[ margin-bottom ]">
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
			</div>
			<?php if (is_singular('post')): ?>
				<a class="[ btn btn-primary btn-large ]" href="<?php echo site_url('/noticias/'); ?>">Regresar</a>
			<?php endif; ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>