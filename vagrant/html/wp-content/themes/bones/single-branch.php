<?php
/*
 * CUSTOM POST TYPE TEMPLATE
 *
 * This is the custom post type post template. If you edit the post type name, you've got
 * to change the name of this template to reflect that name change.
 *
 * For Example, if your custom post type is "register_post_type( 'bookmarks')",
 * then your single template should be single-bookmarks.php
 *
 * Be aware that you should rename 'custom_cat' and 'custom_tag' to the appropiate custom
 * category and taxonomy slugs, or this template will not finish to load properly.
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates
*/
?>

<?php get_header(); ?>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBrXqz1O1WNeHPIIEHUxicc5p-2qjLLlL8"></script>

			<div id="content">

                <div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                                <?php get_template_part('content-branch'); ?>

							<?php endwhile; ?>

							<?php else : ?>

                                <article id="post-not-found" class="hentry cf"> <header class="article-header">
											<h1><?php _e( 'oops, post not found!', 'bonestheme' ); ?></h1>
										</header>

										<section class="entry-content">
											<p><?php _e( 'uh oh. something is missing. try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
											<p><?php _e( 'this is the error message in the single-custom_type.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</main>

						<?php get_sidebar('branch'); ?>

				</div>

			</div>

<?php get_footer(); ?>
