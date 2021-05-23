<?php
$blocks         =   block_field($block);
$news_items     = $block['news_items'];
$pagination = isset($block['enable_pagination']) ? $block['enable_pagination'] : '';


?>
<style>
    <?php echo $blocks['block_css_code']; ?>
</style>
<div  <?php if($blocks['block_id']!=''){ echo 'id="'.$blocks['block_id'].'"'; } ?> class="<?php echo $blocks['block_class']; ?> wpe-block _section">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="wpe-section-title"><?php echo $block['block_title']; ?></h2>
        </div>
    </div>

    <?php
    if($block['enable_query']){
        // The Query
        echo '<div class="row">';
        $the_query = new WP_Query( $blocks['arg'] );

        // The Loop
        if ( $the_query->have_posts() ) {
            while ( $the_query->have_posts() ) {
                $the_query->the_post();

                $result = array(
                    'news_title'=>get_the_title(),
                    'news_label'=>'',
                    'news_date'=> get_the_date( 'Y-d-n' ),
                    'news_image'=> get_post_thumbnail_id(),
                    'news_url'=> get_the_permalink()
                );

                echo '<div class="col-lg-4  parent_eh">';
                        wpe_block_part('_post-box',$result,'_grid',$block);
                echo '</div>';

            }


        } else {
            // no posts found
        }

        echo '</div>';

        if($pagination){
            echo '<div class="row">';
            echo '  <div class="columns-12"><div class="page-pagination">';

            $big = 999999999; // need an unlikely integer

            echo paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $the_query->max_num_pages
            ) );

            echo '</div></div>';
            echo '</div>';
        }
        /* Restore original Post Data */
        wp_reset_postdata();

    }else{
        echo '<div class="row">';
        foreach($news_items as $ni){
            echo '<div class="col-lg-4  parent_eh">';
                    if(isset($news_items[0])){
                        wpe_block_part('_post-box',$ni,'_grid',$block);
                    }
            echo '</div>';
        }
        echo '</div>';
    }
    ?>


    <?php
    wpe_block_part('_linkmore_small',$blocks);
    ?>
</div>