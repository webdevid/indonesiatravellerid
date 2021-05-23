<?php
$blocks =   block_field($block);
$news_items = $block['news_items'];

?>
<style>
    <?php echo $blocks['block_css_code']; ?>
</style>
<!-- section news -->
<div  <?php if($blocks['block_id']!=''){ echo 'id="'.$blocks['block_id'].'"'; } ?> class="<?php echo $blocks['block_class']; ?> wpe-block">
    <?php
    wpe_block_part('_header',$blocks);

    $the_query = new WP_Query( array( 'post_type' => 'post', 'post_status' => 'publish, future', 'posts_per_page' => -1 ) );

    // The Loop
    if ( $the_query->have_posts() ) {
        $index = 1;
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            $result = array(
                'news_title'=>get_the_title(),
                'news_label'=> get_the_tags()[0]->{'name'},
                'news_date'=> get_the_date(),
                'news_image'=> get_post_thumbnail_id(),
                'news_url'=> get_page_link()
            );

            // Add dynamic variable to get data based on index to outside of while loop
            ${"latest_news_" . $index}= $result;
            
            $index++;
        }


    } else {
        // no posts found
    }
    ?>
    <div class="row">
        <div class="col-lg-5 col-md-12 col-xs-12 parent_eh">
            <?php
                if(isset($latest_news_4)){
                    wpe_block_part('_post-box',$latest_news_4,'_featured');
                }
            ?>
        </div>
        <div class="col-lg-4 col-md-12  col-xs-12  parent_eh">
            <div class="post-box-list _flex-column">
                <?php
                if(isset($latest_news_2)){
                    wpe_block_part('_post-box',$latest_news_2);
                }
                if(isset($latest_news_3)){
                    wpe_block_part('_post-box',$latest_news_3);
                }
                if(isset($latest_news_5)){
                    wpe_block_part('_post-box',$latest_news_5);
                }
                ?>
            </div>
        </div>
        <div class="col-lg-3 col-md-12 col-xs-12 parent_eh">
            <?php
            if(isset($latest_news_1)){
                wpe_block_part('_post-box',$latest_news_1,'_aside');
            }
            ?>
        </div>
    </div>
    <?php
    wpe_block_part('_linkmore',$blocks);
    ?>
</div>