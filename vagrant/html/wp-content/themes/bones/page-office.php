<?php get_header(); ?>
			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>

									<p class="byline vcard">
										<?php printf( __( 'Posted', 'bonestheme').' <time class="updated" datetime="%1$s" itemprop="datePublished">%2$s</time> '.__( 'by',  'bonestheme').' <span class="author">%3$s</span>', get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
									</p>

								</header> <?php // end article header ?>

								<section class="entry-content cf" itemprop="articleBody">
                                        <?php
                                            query_posts( array('post_type' => 'branch', 'orderby' => 'menu_order', 'order' => 'ASC', 'posts_per_page' => 0) );
                                            if (have_posts()) : while (have_posts()) : the_post();
                                        ?>

                                        <article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

                                                <?php get_template_part('content-archive-branch'); ?>

                                        </article>

                                        <?php endwhile; ?>

                                                <?php bones_page_navi(); ?>

                                        <?php else : ?>

                                                <article id="post-not-found" class="hentry cf">
                                                    <header class="article-header">
                                                        <h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
                                                    </header>
                                                    <section class="entry-content">
                                                        <p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
                                                    </section>
                                                    <footer class="article-footer">
                                                            <p><?php _e( 'This is the error message in the archive.php template.', 'bonestheme' ); ?></p>
                                                    </footer>
                                                </article>

                                        <?php endif; ?>
                                        <?php wp_reset_query(); ?>
							</article>

							<?php endwhile; endif; ?>

						</main>

						<?php get_sidebar('branch'); ?>

				</div>

			</div>

<?php get_footer(); ?>
