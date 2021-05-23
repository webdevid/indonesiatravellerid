<?php
$blocks         =   block_field($block);
$news_items     = $block['news_items'];
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
    <div class="row">
        <div class="col-lg-4 col-md-12 col-xs-12 parent_eh">
            <?php
                if(isset($news_items[0])){
                    wpe_block_part('_post-box',$news_items[0],'_grid');
                }
            ?>
        </div>
        <div class="col-lg-8 col-md-12  col-xs-12  parent_eh">
            <div class="post-box-list _flex-column">
                <?php
                if(isset($news_items[1])){
                    wpe_block_part('_post-box',$news_items[1]);
                }
                if(isset($news_items[2])){
                    wpe_block_part('_post-box',$news_items[2]);
                }
                if(isset($news_items[3])){
                    wpe_block_part('_post-box',$news_items[3]);
                }
                ?>
            </div>
        </div>
    </div>
    <?php

        // echo '<div class="row">';
        // foreach($news_items as $ni){
        //     echo '<div class="col-lg-4">';
        //             if(isset($news_items[0])){
        //                 wpe_block_part('_post-box',$ni,'_grid',$block);
        //             }
        //     echo '</div>';
        // }
        // echo '</div>';

    ?>


    <?php
    wpe_block_part('_linkmore_small',$blocks);
    ?>
</div>