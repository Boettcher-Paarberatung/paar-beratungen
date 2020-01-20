<?php $term_list = wp_get_post_terms( get_the_id(), 'category', array( "fields" => "names" ) ); ?>
<div class="news-block-three">
    <div class="inner-box">
        <?php if(has_post_thumbnail()):?>
        <div class="image">
            <a href="<?php echo esc_url(get_permalink(get_the_id()));?>">
                <?php the_post_thumbnail( 'mindron_1170x460', array( 'class' => 'img-responsive' ) ); ?>
            </a>
        </div>
        <?php endif;?>
        <div class="lower-content">
            <div class="upper-box clearfix">
                <div class="posted-date pull-left"><?php echo get_the_date();?></div>
                <ul class="post-meta pull-right">
                    <li><?php esc_html_e( 'By:', 'mindron' ); ?> <?php the_author(); ?></li>
                    <?php if($term_list):?>
                    <li><?php echo implode( ', ', (array)$term_list ); ?></li>
                    <?php endif;?>
                    <li><?php comments_number( wp_kses_post(__('0 Comments' , 'mindron')), wp_kses_post(__('1 Comment' , 'mindron')), wp_kses_post(__('% Comments' , 'mindron'))); ?></li>
                </ul>
            </div>
            <div class="lower-box">
                <h3><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title(); ?></a></h3>
                <div class="text"><?php the_excerpt();?></div>
                <a href="<?php echo esc_url(get_permalink(get_the_id()));?>" class="theme-btn btn-style-one read-more"><?php esc_html_e( 'Read more', 'mindron' ); ?></a>
            </div>
        </div>
    </div>
</div>