<?php
$blocks =   block_field($block);
//show($blocks);
$news_items = $block['news_items'];
$layout =isset($block['layout']) ? $block['layout'] : '';

?>
<style>
    <?php echo $blocks['block_css_code']; ?>
</style>
<!-- section news -->
<div  <?php if($blocks['block_id']!=''){ echo 'id="'.$blocks['block_id'].'"'; } ?> class="<?php echo $blocks['block_class'].' layout_'.strtolower($layout);?> container megamenu">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="wpe-section-title"><?php echo $block['block_title']; ?></h2>
        </div>
    </div>
    <?php
    if($layout=='L1'){
        ?>
        <div class="row">
            <?php
            if($block['enable_query']){
                $results = megamenu_cpt_query( $blocks['arg']);
                $n=1;
                foreach($results as $ns){
                    if($n<=4){
                    ?>
                    <div class="col-lg-6 col-md-12  col-xs-12  parent_eh">
                        <div class="post-box-list _flex-column layout-01 <?php echo 'b-'.$n;?>">
                            <?php
                                wpe_block_part('_post-box',$ns,'',$block);
                            ?>
                        </div>
                    </div>
                    <?php
                    }
                    $n++;
                }

            }else{
                $n=1;
                foreach($news_items as $ns){
                    ?>
                    <div class="col-lg-6 col-md-12  col-xs-12  parent_eh">
                        <div class="post-box-list _flex-column layout-01 <?php echo 'b-'.$n;?>">
                            <?php
                                wpe_block_part('_post-box',$ns,'',$block);
                            ?>
                        </div>
                    </div>
                    <?php
                    $n++;
                }
            }



            ?>
        </div>
        <?php

    }elseif($layout=='L2'){

        if($block['enable_query']){
            $news_items = megamenu_cpt_query( $blocks['arg']);
        }
        ?>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-xs-12 parent_eh">
                <?php
                    if(isset($news_items[0])){
                        wpe_block_part('_post-box',$news_items[0],'_featured',$block);
                    }
                ?>
            </div>
            <div class="col-lg-6 col-md-12  col-xs-12  parent_eh">
                <div class="post-box-list _flex-column">
                    <?php
                    if(isset($news_items[1])){
                        wpe_block_part('_post-box',$news_items[1],'',$block);
                    }
                    if(isset($news_items[2])){
                        wpe_block_part('_post-box',$news_items[2],'',$block);
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php

    }elseif($layout=='L3'){

        if($block['enable_query']){
            $news_items = megamenu_cpt_query( $blocks['arg']);
        }
        ?>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-xs-12 parent_eh">
                <?php
                    if(isset($news_items[0])){
                        $block['featured_size'] = array(634,420);
                        wpe_block_part('_post-box',$news_items[0],'_featured',$block);
                    }
                ?>
            </div>
            <div class="col-lg-6 col-md-12  col-xs-12  parent_eh">
                <div class="post-box-list _flex-column">
                    <?php
                    if(isset($news_items[1])){
                        wpe_block_part('_post-box',$news_items[1],'',$block);
                    }
                    if(isset($news_items[2])){
                        wpe_block_part('_post-box',$news_items[2],'',$block);
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
    }elseif($layout=='L4'){
        ?>
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-5 job-lists justify-content-center">
            <?php
            if($block['enable_query']){

                $post__in = isset($block['postin'])  ? explode(',',$block['postin']) : array();
                $post__not_in = isset($block['postnotin']) ? explode(',',$block['postnotin']) : array();

                $blocks['arg']['post__in'] = $post__in;
                $blocks['arg']['post__not_in'] = $post__not_in;
                $the_query = new WP_query( $blocks['arg']);
                $n=1;
                $size = array('480', '640');

                // The Loop
                if ( $the_query->have_posts() ) {
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post();

                        $data_desc  = carbon_get_post_meta(get_the_ID(),'data_description');
                        $data_image = carbon_get_post_meta(get_the_ID(),'data_image');
                        $data_button = carbon_get_post_meta(get_the_ID(),'data_btn_title');

                        $image_p = wp_get_attachment_image( $data_image, $size, TRUE, array( "class" => "img-responsive" ) );

                        echo    '<div class="col">
                                    <div class="post-box-column layout-4 b-'.$n.'">';
                                        echo '<a href="'.get_the_permalink().'">';
                                        echo '<div class="post-box_thumbnail">'.$image_p.'</div>';
                                        echo '<div class="post-box_content"><h2 class="content-title">'.get_the_title().'</h2></div>';
                                        echo '</a>';
                        echo        '</div>
                                </div>';
                    }
                } else {
                    // no posts found
                }
                /* Restore original Post Data */
                wp_reset_postdata();


            }else{
                /*
                $n=1;
                foreach($news_items as $ns){
                    ?>
                    <div class="col">
                        <div class="post-box-column layout-4 <?php echo 'b-'.$n;?>">
                            <?php
                                show($ns);
                            ?>
                        </div>
                    </div>
                    <?php
                    $n++;
                }
                */
            }
            ?>
        </div>
        <?php
    }else{
        if($block['enable_query']){
            $news_items = megamenu_cpt_query( $blocks['arg']);
        }
        ?>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-xs-12 parent_eh">
                <?php
                    if(isset($news_items[0])){
                        wpe_block_part('_post-box',$news_items[0],'_featured',$block);
                    }
                ?>
            </div>
            <div class="col-lg-6 col-md-12  col-xs-12  parent_eh">
                <div class="post-box-list _flex-column">
                    <?php
                    if(isset($news_items[1])){
                        wpe_block_part('_post-box',$news_items[1],'',$block);
                    }
                    if(isset($news_items[2])){
                        wpe_block_part('_post-box',$news_items[2],'',$block);
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
    }
    wpe_block_part('_linkmore',$blocks);
    ?>
</div>