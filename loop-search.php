<ul id="loop" class="posts posts-3 <?php if (!isset($_COOKIE['mode'])) { echo 'list';}  if($_COOKIE['mode'] == 'list') { echo 'list'; } if ($_COOKIE['mode'] == 'grid') { echo 'grid'; } ?> ">
	
	<?php $i = 0; foreach ($posts as $post) : setup_postdata($post); $i++; ?>
	
	<li<?php if ($i == 3 && option::get('sidebar_home') == 'on') {
		$i = 0;
		// echo " class=\"last\"";
	} elseif ($i == 4 && option::get('sidebar_home') == 'off') {
		$i = 0;
		// echo " class=\"last\"";
	} ?>>

 		<?php get_the_image( array( 'size' => 'thumbnail', 'width' => 228, 'height' => 160, 'before' => '<div class="cover">', 'after' => '</div>' ) );  ?>
		
		<div class="postcontent">
			<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<p class="postmetadata"><?php
if (option::get('display_date') == 'on') {
	$has_date					= true;
	if ( 'post' == $post->post_type ) {
		printf('%s at %s', get_the_date(), get_the_time());
	} elseif ( 'video' == $post->post_type ) {
		$taxonomy				= 'production_date';
		$terms					= get_the_terms( $post->ID, $taxonomy);
		if ( ! empty( $terms ) ) {
			$date				= array_shift( $terms );
			echo $date->name;
		} else {
			$has_date			= false;
		}
	} elseif ( 'document' == $post->post_type ) {
		$taxonomy				= 'publication_date';
		$terms					= get_the_terms( $post->ID, $taxonomy);
		if ( ! empty( $terms ) ) {
			$date				= array_shift( $terms );
			echo $date->name;
		} else {
			$has_date			= false;
		}
	}
}
?><?php if ($has_date && option::get('display_date') == 'on' && option::get('display_category') == 'on') { ?> / <?php } ?><?php if (option::get('display_category') == 'on') { ?><?php the_category(', '); ?><?php } ?></p>
				
				<?php the_excerpt(); ?>
<?php // echo "<p style=\"display: block;\">Score: {$post->relevance_score}</p>"; ?>
				
			<p class="more"><?php if (option::get('display_readmore') == 'on') { ?><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="readmore" rel="nofollow"><?php _e('Continue reading', 'wpzoom'); ?> &raquo;</a><?php } ?> <?php edit_post_link( __('Edit this post', 'wpzoom'), ' ', ''); ?></p>
		
		</div>
	</li>
	<?php if (false && $i == 0) {echo'<li class="cleaner">&nbsp;</li>';} ?>
	
	<?php endforeach; ?>
</ul>
<div class="cleaner">&nbsp;</div> 
<?php
if ( empty( $posts ) )
	 echo "\n<br /><p><strong>We're very sorry, your search returned no results.</strong></p>";
?>