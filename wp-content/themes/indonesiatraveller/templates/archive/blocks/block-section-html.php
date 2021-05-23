<?php
$blocks =   block_field($block);
$html_image = isset($block['html_image']) ? wpe_image_single($block['html_image'])['url'] : '';
$column = $block['html_full_column']==1 ? 12 : 8;

?>
<style>
    .section-html::before{
        background-image:url(<?php echo $html_image;?>);
        background-repeat:no-repeat;
        background-size:cover;
        background-position:center center;
        background-attachment:fixed;
    }
    <?php echo $blocks['block_css_code']; ?>
</style>
<?php

if(get_page_template_slug(get_the_ID())=='templates/template-page-fullwidth.php'){
    ?>
    <div <?php if($blocks['block_id']!=''){ echo 'id="'.$blocks['block_id'].'"'; } ?> class="<?php echo $blocks['block_class']; ?>  wpe-section section-html">
        <?php echo $block['html_code'];?>
    </div>
    <?php
}else{
    if($block['html_full_section']){
        echo '
        <!-- close div before -->
                    </div>
                </div>
            </div>
        </div>';
    }

    if($block['html_full_section']){
        echo '
        <div id="page-wrapper-inner" class="page-wrapper container '.$blocks['block_class'].'">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-'.$column.'">
                    <div class="entry-content content-inner">
                        ';
    }
        ?>

                    <div <?php if($blocks['block_id']!=''){ echo 'id="'.$blocks['block_id'].'"'; } ?> class="<?php echo $blocks['block_class']; ?>  wpe-section section-html">
                        <?php echo $block['html_code'];?>
                    </div>

        <?php
    if($column){
        echo '
                </div>
            </div>
        <div class="col-lg-3"><div class="wpe-blank"></div></div>
        <div class="col-lg-8">';
    }
}
?>