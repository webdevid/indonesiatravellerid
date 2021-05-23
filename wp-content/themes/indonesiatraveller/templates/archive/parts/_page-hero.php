<?php
$image   = isset($data['_hero_background']) ? wpe_image_single($data['_hero_background']) : '';
?>
<style>
    .page-hero::before{
        background-image:url(<?php echo $image['url'];?>);
    }
</style>
<div class="page-hero">
    <div class="bg-image">
        <img src="<?php echo $image['url'];?>">
    </div>
    <div class="page-hero_content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                        <?php
                        if(isset($data['_hero_label'])){
                            echo '<div class="page-hero_label">'.$data['_hero_label'].'</div>';
                        }
                        if(isset($data['_hero_title'])){
                            echo '<h1 class="hide-desktop">'.wp_strip_all_tags($data['_hero_title']).'</h1>';
                            echo '<h1 class="hide-mobile">'.$data['_hero_title'].'</h1>';
                        }
                        if($data['_hero_desc']!=''){
                            echo '<div class="page-hero_content-desc">'.$data['_hero_desc'].'</div>';
                        }
                        ?>

                </div>
            </div>

        </div>
    </div>
    <?php
    if($image['caption_image']!=''){
        ?>
        <div class="hero-photo-credit">
            <?php echo $image['caption_image'];?>
        </div>
        <?php
    }
    ?>
</div>