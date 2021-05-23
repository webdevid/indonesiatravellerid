<?php
$image   = isset($block['event_image']) ? wpe_image_single($block['event_image']) : '';
$image_p = wp_get_attachment_image( $block['event_image'], array('650', '450'), TRUE, array( "class" => "img-responsive" ) );
$event_date_start = isset($block['event_date_start']) ? $block['event_date_start'] : '';
$event_date_end   = isset($block['event_date_end']) ? $block['event_date_end'] : '';


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
<div class="post-box _feature-event">
    <div class="post-box_content">
        <div class="content-label"><?php echo $block['event_label']; ?></div>
        <h2 class="content-title"><?php echo $block['event_title']; ?></h2>
        <div class="content-description">
            <p>
            <?php echo $block['event_desc']; ?>
            </p>
        </div>
        <div class="content-event-meta">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="event-meta-date">
                        <i class="bi bi-calendar4"></i>
                        <?php
                        if($block['event_date_end']!=''){
                            echo $date;
                        }else{

                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="event-meta-type">
                        <i class="bi bi-geo-alt"></i>
                        <?php echo $block['event_type']; ?>
                    </div>
                </div>
            </div>
        </div>
        <a href="<?php echo $block['event_url']; ?>" class="link-more">MORE</a>
    </div>
    <div class="post-box_thumbnail" > <?php /* style="background-image:url(<?php echo $image['url'];?>);" */ ?>
        <?php echo $image_p; ?>
    </div>
</div>