<?php
global $wpdb;

$image   = isset($data['_hero_background']) ? wpe_image_single($data['_hero_background']) : '';

$vars     = $GLOBALS['wp_query']->query_vars;
$bot_slug = isset($vars['bot_slug']) ? $vars['bot_slug'] : '';
$row = array();
if($bot_slug){
    $sql = "SELECT * FROM {$wpdb->prefix}_bot WHERE slug='$bot_slug'";
    $rows = $wpdb->get_results(  $sql , OBJECT );
    $row = $rows[0];
}
?>
<style>
    .page-hero::before{
        background-image:url(<?php echo $image['url'];?>);
    }
    .page-hero a{
        color:#FFFFFF;
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
                            echo '<a href="'.get_the_permalink().'"><div class="page-hero_label">'.$data['_hero_label'].'</div></a>';
                        }
                        if(isset($data['_hero_title'])){
                            echo '<h1>'.$data['_hero_title'].'</h1>';
                        }
                        // if($data['_hero_desc']!=''){
                        //     echo '<div class="page-hero_content-desc">'.$data['_hero_desc'].'</div>';
                        // }
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