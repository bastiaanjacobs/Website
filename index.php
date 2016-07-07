<?php get_header(); ?>
    
    <!--main-->
    <main>

        <section class="back-to__top">
            <ul>
                <li><i class="fa fa-chevron-up" aria-hidden="true"></i></li>
            </ul>
        </section>

        <section class="row post-filter">
        
        <div class="filter filter-item" data-filter="all"><li class="fa fa-tag" aria-hidden="true"></li>all</div>

            <?php
                $categories = get_the_category(array('type' => 'post','child_of' => 0,'orderby' => 'name','order' => 'ASC','hide_empty' => true));
                $category_count = 0; 
                $category_col = 1;
                
                foreach($categories as $catty) {
                    $category_count++;
                    ${'category_list_'.$category_col}[] = array('name'=>$catty->cat_name,'url'=>$catty->category_nicename);
                }
            ?>

            <?php foreach($category_list_1 as $item) { echo '<div class="filter filter-item" data-filter="',$item['name'],'"><li class="fa fa-tag" aria-hidden="true"></li>',$item['name'],'</div>'; } ?>
        </section>

        <section class="post-grid__container">
            <section class="row post-grid">
                <article id="person" class="stamp">
                    <img class="person__bg" src="<?php echo get_template_directory_uri(); ?>/img/bg20.jpg" alt="person background">
                    <img class="person__face" src="<?php echo get_template_directory_uri(); ?>/img/bastiaanjacobs.jpg" alt="bastiaan jacobs his face">
                    <div class="person__introduction">
                        Aliquam non nunc metus. Phasellus sollicitudin mauris id risus faucibus, quis convallis turpis faucibus.
                        <img class="hidden" src="<?php echo get_template_directory_uri(); ?>/img/macaw.png" alt"Macaw Logo">
                    </div>
                    <ul class="person__social">
                        <li><i class="fa fa-linkedin" aria-hidden="true"></i></li>
                        <li><i class="fa fa-twitter" aria-hidden="true"></i></li>
                        <li><i class="fa fa-instagram" aria-hidden="true"></i></li>
                    </ul>
                </article>

                <?php function the_category_list($separator = '') {
                    $categories = (array) get_the_category();
                    
                    $thelist = '';
                    foreach($categories as $category) { //concate
                        $thelist .= $separator . $category->category_nicename;
                    }
                    
                    echo $thelist;
                }?>

                <?php while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" class="post-unit<?php the_category_list(' '); ?> active" data-filter="filter-cat<?php the_category_list(' '); ?>">
                        <figure class="post-unit__image">
                            <a href="<?php echo esc_url( get_permalink( get_page_by_title() ) ); ?>">
                                <?php echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'post-unit-image' ) ); ?>
                            </a>
                        </figure>
                        <section class="post-unit__more"><a href="<?php echo esc_url( get_permalink( get_page_by_title() ) ); ?>">read more...</a></section>
                        <section class="post-unit__intro">
                            <section class="post-title">
                                <a href="<?php echo esc_url( get_permalink( get_page_by_title() ) ); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </section>
                            <section class="post-cat"><?php the_category(); ?></section>
                            <section class="post-date"><?php the_time('F j, Y'); ?></section>
                        </section>
                    </article>
                <?php endwhile; ?>

            </section>
        </section>

    </main>
    <!--main-->

<?php get_footer(); ?>