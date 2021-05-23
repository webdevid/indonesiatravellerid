<?php
$image   = isset($block['event_image']) ? wpe_image_single($block['event_image']) : '';
$class   = isset($class) ? $class : '';
$event_date_start = isset($block['event_date_start']) ? $block['event_date_start'] : '';
$event_date_end   = isset($block['event_date_end']) ? $block['event_date_end'] : '';

if($class=='_featured'){
    $size = array('600', '400');
}else{
    $size = array('400', '300');
}
$image_p = wp_get_attachment_image( $block['event_image'], $size, TRUE, array( "class" => "img-responsive" ) );


if($event_date_start!='Invalid date' AND $event_date_end!='Invalid date' AND $event_date_start!='' AND $event_date_end!=''){
    $date = wpe_date_event($event_date_start,$event_date_end);
}elseif($event_date_start!='' AND $event_date_end=='Invalid date'){
    $date = wpe_date($event_date_start);
}elseif($block['event_date']!=''){
    $date = wpe_date($block['event_date']);
}else{
    $date = isset($block['news_date']) ? wpe_date($block['news_date']) : ''; //$block['news_date'];//
}

?>
<div class="post-box-event <?php echo $class; ?> d-flex align-items-stretch">
    <div class="post-box ">
        <a href="<?php echo $block['event_url']; ?>">
            <?php
            if($image['url']!=''){
                ?>
                <div class="post-box_thumbnail" ><?php /* style="background-image:url(<?php echo $image['url'];?>);" */ ?>
                    <?php echo $image_p; ?>
                </div>
                <?php
            }
            ?>
            <div class="post-box_content">
                <div class="post-box_group">
                    <div class="content-label"><?php echo $block['event_label']; ?></div>
                    <h2 class="content-title"><?php echo $block['event_title']; ?></h2>
                </div>
                <div class="content-date"><?php echo $date; ?> . <?php echo $block['event_type']; ?></div>
            </div>
        </a>
    </div>
</div>