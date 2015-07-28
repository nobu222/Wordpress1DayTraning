
							<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">

								<header class="article-header">

									<h1 class="single-title custom-post-type-title"><?php the_title(); ?></h1>
									<p class="byline vcard"><?php
										printf( __( 'Posted <time class="updated" datetime="%1$s" itemprop="datePublished">%2$s</time> by <span class="author">%3$s</span> <span class="amp">&</span> filed under %4$s.', 'bonestheme' ), get_the_time( 'Y-m-j' ), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) ), get_the_term_list( $post->ID, 'custom_cat', ' ', ', ', '' ) );
									?></p>

								</header>

								<section class="entry-content cf">
                                    <h2>営業所情報</h2>
                                    <ul>
                                        <li><?php echo esc_html(get_post_meta($post->ID, 'cf_zip', true)); ?></li>
                                        <li><?php echo esc_html(get_post_meta($post->ID, 'cf_address', true)); ?></li>
                                        <li><?php echo esc_html(get_post_meta($post->ID, 'cf_tel', true)); ?></li>
                                        <li><?php echo esc_html(get_post_meta($post->ID, 'cf_open', true)); ?></li>
                                        <li><?php the_content(); ?></li>
                                    </ul>
                                    <div class="maps">
                                        <h2>地図</h2>
                                        <script>
                                        function initialize() {
                                           var mapOptions = {
                                            center: {
                                                lat: <?php echo esc_js(get_post_meta($post->ID, 'cf_lat', true)); ?>,
                                                lng: <?php echo esc_js(get_post_meta($post->ID, 'cf_lng', true)); ?>
                                            },
                                            zoom: 16
                                           };
                                           var map = new google.maps.Map(document.getElementById('google_map_<?php echo $post->ID; ?>'),mapOptions);
                                           var maker = new google.maps.Marker({
                                            position: mapOptions.center,
                                            map: map,
                                            title: '<?php the_title(); ?>'
                                           });
                                        }
                                        google.maps.event.addDomListener(window, 'load', initialize);
                                        </script>
                                        <div id="google_map_<?php echo $post->ID; ?>" class="google_map">
                                        </div>
                                    </div>
<style>.google_map{ margin:0;padding:0;height:600px;}</style>
                                    
								</section> <!-- end article section -->

								<footer class="article-footer">
									<p class="tags"><?php echo get_the_term_list( get_the_ID(), 'custom_tag', '<span class="tags-title">' . __( 'Custom Tags:', 'bonestheme' ) . '</span> ', ', ' ) ?></p>

								</footer>

								<?php comments_template(); ?>

							</article>

