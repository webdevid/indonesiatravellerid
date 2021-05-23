<?php
$option             = $block_option;
$news_hide_image     = isset($option['news_hide_image']) ? $option['news_hide_image'] : '';
$news_hide_label    = isset($option['news_hide_label']) ? $option['news_hide_label'] : '';
$news_hide_date     = isset($option['news_hide_date']) ? $option['news_hide_date'] : '';
$image              = isset($block['news_image']) ? wpe_image_single($block['news_image']) : '';


if($class=='_featured'){
    $size = array('650', '450');
}else{
    $size = array('400', '300');
}


$image_p = wp_get_attachment_image( $block['news_image'], $size, TRUE, array( "class" => "img-responsive" ) );

$news_type       = isset($block['news_type']) ? $block['news_type'] : '';
$news_date_start = isset($block['news_date_start']) ? $block['news_date_start'] : '';
$news_date_end   = isset($block['news_date_end']) ? $block['news_date_end'] : '';

if($news_date_start!='' AND $news_date_end!=''){
    $date = wpe_date_event($news_date_start,$news_date_end).' . '.$news_type;
}else{
    $date = isset($block['news_date']) ? wpe_date($block['news_date']) : ''; //$block['news_date'];//
}

?>
<div class="post-box <?php echo $class;?>">
    <a href="<?php echo $block['news_url'];?>">
    <?php
    if($news_hide_image!='yes'){
        echo '<div class="post-box_thumbnail">'.$image_p.'</div>';
    }
    ?>
    <div class="post-box_content">
        <div class="post-box_group">
            <?php
            if($news_hide_label!='yes'){
                echo '<div class="content-label">'.$block['news_label'].'</div>';
            }
                echo '<h2 class="content-title">'.$block['news_title'].'</h2>';
            ?>
        </div>
        <?php
        if($news_hide_date!='yes'){
            ?>
            <div class="content-date"><?php echo $date;?></div>
            <?php
        }
        ?>
    </div>
    </a>
</div>