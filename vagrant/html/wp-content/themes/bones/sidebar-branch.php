        <div id="sidebar1" class="sidebar m-all t-1of3 d-2of7 last-col cf" role="complementary">
        <div class="side_nav">
            <?php wp_page_menu( array('include' => get_page_by_path('office')->ID) ); ?>
            <ul class="sub_nav">
                <?php add_filter('wp_list_pages', 'apt_add_current'); ?>
                <?php wp_list_pages( array('post_type' => 'branch', 'title_li' => 0)); ?>
                <?php remove_filter('wp_list_pages', 'apt_add_current'); ?>
            </ul>
        </div>
        <?php get_template_part('sidebar-common'); ?>
        </div>
