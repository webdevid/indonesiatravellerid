<?php
$blocks         =   block_field($block);
$theme_items    =   isset($block['theme_items']) ? $block['theme_items'] : '';
$enable_query   =   isset($block['enable_query']) ? $block['enable_query'] : '';
$association    =   isset($block['crb_association']) ? $block['crb_association'] : '';
$option_description = isset($block['option_description']) ? $block['option_description'] : '';
?>
<style>
    <?php echo $blocks['block_css_code']; ?>
</style>
<!-- section themes & projects -->
<div  <?php if($blocks['block_id']!=''){ echo 'id="'.$blocks['block_id'].'"'; } ?> class="<?php echo $blocks['block_class']; ?> wpe-block">
    <?php
    wpe_block_part('_header',$blocks);
    ?>
    <div class="row">
        <?php
        if($enable_query){
            ?>
                <div class="col-lg-4">
                    <div class="post-box-grid grid-01">
                        <?php
                        echo $option_description;
                        ?>
                    </div>
                </div>
            <?php
            $t=2;
            foreach($association as $pid){
                $ids[]= $pid['id'];
            }

            $arg = array(
                'post__in'=>$ids,
                'no_found_rows'=>true,
                'post_type'=>array('page'),
                'orderby'=>'post__in'
            );
            $the_query = new WP_Query( $arg );

            // The Loop
            if ( $the_query->have_posts() ) {
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    $data_desc  = carbon_get_post_meta(get_the_ID(),'data_description');
                    $data_image = carbon_get_post_meta(get_the_ID(),'data_image');
                    $data_button = carbon_get_post_meta(get_the_ID(),'data_btn_title');

                    $theme = array(
                        'theme_title'=> get_the_title(),
                        'theme_desc'=> get_the_excerpt(),
                        'theme_image'=>$data_image,
                        'theme_button'=>$data_button,
                        'theme_url'=> get_the_permalink()
                    );

                    //foreach($theme_items as $theme){
                        $image   = isset($theme['theme_image']) ? wpe_image_single($theme['theme_image'])['url'] : '';
                        ?>
                        <div class="col-lg-4">
                            <div class="post-box-grid grid-<?php echo $t;?>">
                                <div class="box-layer-01 bg-overlay" style="background-image:url(<?php echo $image;?>);">
                                    <h3><?php echo $theme['theme_title']; ?></h3>
                                </div>
                                <div class="box-layer-02">
                                    <div class="group">
                                        <?php echo $data_desc; ?>
                                    </div>
                                    <div class="group">
                                        <a href="<?php echo $theme['theme_url']; ?>" class="btn btn-outline-light btn-lg mt-3">
                                            <?php if($theme['theme_button']){ echo $theme['theme_button']; }else{ echo 'Read more'; } ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $t++;
                    //}

                }
            }

        }else{

            foreach($theme_items as $theme){
                $image   = isset($theme['theme_image']) ? wpe_image_single($theme['theme_image']) : '';
            ?>
            <div class="col-lg-4">
                <div class="post-box-grid">
                    <div class="box-layer-01 bg-overlay" style="background-image:url(<?php echo $image['url'];?>);">
                        <h3><?php echo $theme['theme_title']; ?></h3>
                    </div>
                    <div class="box-layer-02">
                        <?php echo $theme['theme_desc']; ?>
                        <a href="<?php echo $theme['theme_url']; ?>" class="btn btn-outline-light btn-lg mt-3">
                            <?php if($theme['theme_button']){ echo $theme['theme_button']; }else{ echo 'Explore project'; } ?>
                        </a>
                    </div>
                </div>
            </div>
            <?php
            }
        }
        ?>
    </div>
    <?php
    wpe_block_part('_linkmore',$blocks);
    ?>

</div>