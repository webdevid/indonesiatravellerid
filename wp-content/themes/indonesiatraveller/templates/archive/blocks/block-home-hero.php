<?php
$blocks =   block_field($block);

$hero_title             = isset($block['hero_title']) ? $block['hero_title'] : '';
$hero_featured_title    = isset($block['hero_featured_title']) ? $block['hero_featured_title'] : '';
$hero_description       = isset($block['hero_description']) ? $block['hero_description'] : '';
$hero_image             = isset($block['hero_image']) ? wpe_image_single($block['hero_image']) : '';
$hero_anchor            = isset($block['hero_anchor']) ? $block['hero_anchor'] : '';
?>
<style>
    .section-hero::before{
        background-image:url(<?php echo $hero_image['url'];?>);
    }
    <?php echo $blocks['block_css_code']; ?>
</style>
<!-- section hero -->
<div <?php if($blocks['block_id']!=''){ echo 'id="'.$blocks['block_id'].'"'; } ?> class="<?php echo $blocks['block_class']; ?> wpe-block section-hero _overlay">
    <div class="row">
        <div class="col-lg-7">
            <div class="hero-title"><h1><a href="" class="link-light"><?php echo $hero_title; ?></a></h1></div>
        </div>
    </div>
    <div class="row hero-featured">
        <?php /*
        <div class="col-lg-4 position-relative">
            <div class="hero-arrow">
                <a href="<?php echo $hero_anchor; ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-bottom.svg"></a>
            </div>

            <div class="hero-featured-title text-lg-center mb-sm-5">
            <?php echo $hero_featured_title; ?>
            </div>
        </div>
        */ ?>
        <div class="col-lg-7">
            <div class="hero-featured-content">
                <div class="content-description">
                    <p><?php echo $hero_description; ?></p>
                </div>
                <?php /*
                <div class="content-url"><a href="<?php echo $blocks['link_more_url']; ?>" class="link-light" ><?php echo $blocks['link_more_title']; ?><i class="bi bi-arrow-right middle"></i></a></div>
                */ ?>
            </div>
        </div>
    </div>
    <?php
    if($hero_image['caption_image']!=''){
        ?>
        <div class="hero-photo-credit">
            <?php echo $hero_image['caption_image'];?>
        </div>
        <?php
    }
    ?>
</div>