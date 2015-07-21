<?php $cat_id = apt_category_id(); ?>
				<div id="sidebar1" class="sidebar m-all t-1of3 d-2of7 last-col cf" role="complementary">
        <div class="side_nav">
            <h2>お知らせ</h2>
                <ul class="sub_nav">
                    <?php wp_list_pages( array('include' => get_page_by_path('news')->ID, 'title_li' => 0 )); 
var_dump(get_page_by_path('news'));
                    wp_list_pages( array('title_li' => false, 'hide_empty' => true, 'currentcategory' => $cat_id)); ?>
                </ul>
        </div>
        <?php get_template_part('sidebar-common'); ?>
        </div>
