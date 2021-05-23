<?php
$blocks =   block_field($block);
$text_image = isset($block['text_image']) ? wpe_image_single($block['text_image']) : '';
$column = $block['text_full_column']==1 ? 12 : 8;

?>
<style>
    <?php
    if($block['text_full_section']){
        if($blocks['block_id']!=''){ echo '#'.$blocks['block_id'];}?>.wpe-section::before{
            background-image:url(<?php echo $text_image['url'];?>);
        }
        <?php
    }
    echo $blocks['block_css_code'];
    ?>
</style>
<?php

if(get_page_template_slug(get_the_ID())=='templates/template-page-fullwidth.php'){
    ?>
    <div <?php if($blocks['block_id']!=''){ echo 'id="'.$blocks['block_id'].'"'; } ?> class="<?php echo $blocks['block_class']; ?>  wpe-section section-text">

        <div class="row">
            <div class="col-lg-12">
                <h2 class="wpe-section-title"><?php echo $block['block_title']; ?></h2>
            </div>
            <div class="col-lg-12">
                <div class="wpe-section-desc">
                    <?php echo wpe_nl2p($block['block_desc']); ?>
                    <?php echo $block['text_content']; ?>
                    <?php echo $block['text_code']; ?>
                </div>
            </div>
        </div>
        <?php
        if($text_image['caption_image']!=''){
            ?>
            <div class="hero-photo-credit">
                <?php echo $text_image['caption_image'];?>
            </div>
            <?php
        }
        ?>
    </div>

    <?php
}else{


    if($block['text_full_section']){
        echo '
        <!-- close div before -->
                    </div>
                </div>
            </div>
        </div>';
    }

    if($block['text_full_section']){
        echo '
        <div id="page-wrapper-inner" class="page-wrapper container '.$blocks['block_class'].'">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-'.$column.'">
                    <div class="entry-content content-inner">
                        ';
    }
                        ?>
                        <div <?php if($blocks['block_id']!=''){ echo 'id="'.$blocks['block_id'].'"'; } ?> class="<?php echo $blocks['block_class']; ?>  wpe-section section-text">

                            <div class="row">
                                <div class="col-lg-12">
                                    <h2 class="wpe-section-title"><?php echo $block['block_title']; ?></h2>
                                </div>
                                <div class="col-lg-12">
                                    <div class="wpe-section-desc">
                                        <?php echo wpe_nl2p($block['block_desc']); ?>
                                        <?php echo $block['text_content']; ?>
                                        <?php echo $block['text_code']; ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <?php
    if($column){
        echo '
            </div>
        </div>
        <div class="col-lg-3"><div class="wpe-blank">1</div></div>
        <div class="col-lg-8">';
    }
}
?>