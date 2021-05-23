<?php
$blocks         =   block_field($block);
$title          = isset($block['hero_title']) ? $block['hero_title'] : '';
$description    = isset($block['hero_description']) ? $block['hero_description'] : '';
$label          = isset($block['hero_label']) ? $block['hero_label'] : '';
$date_start     = isset($block['hero_date_start']) ? $block['hero_date_start'] : '';
$date_end       = isset($block['hero_date_end']) ? $block['hero_date_end'] : '';
$type           = isset($block['hero_type']) ? $block['hero_type'] : '';
$button_title   = isset($block['hero_button']) ? $block['hero_button'] : '';
$button_url       = isset($block['hero_url']) ? $block['hero_url'] : '';
$image   = isset($block['hero_image']) ? wpe_image_single($block['hero_image']) : '';
?>
<style>
    .section-page-hero::before{
        background-image:url(<?php echo $image['url'];?>);
        background-repeat:no-repeat;
        background-size:cover;
        background-position:center center;
        background-attachment:fixed;
    }
    <?php echo $blocks['block_css_code']; ?>
</style>
<!-- section page hero -->
<div  <?php if($blocks['block_id']!=''){ echo 'id="'.$blocks['block_id'].'"'; } ?> class="<?php echo $blocks['block_class']; ?> wpe-block section-page-hero">
    <div class="row">
        <div class="col-lg-6 align-self-center">
            <div class="event-box">
                <div class="event-box-type"><?php echo $label; ?></div>
                <div class="event-box-title"><h1><?php echo $title; ?></h1></div>
                <div class="event-box-date"><?php echo wpe_date($date_start); ?> | <?php echo $type; ?></div>
                <a href="<?php echo $button_url; ?>" class="btn btn-dark mt-4"><?php echo $button_title;?></a>
            </div>
        </div>
    </div>
</div>