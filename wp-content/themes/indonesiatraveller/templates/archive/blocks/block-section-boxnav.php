<?php
$blocks =   block_field($block);
//show($blocks);
$nav_items = $block['nav_items'];
$column = $block['nav_full_column']==1 ? 12 : 8;
if($block['nav_full_section']){
echo '
<!-- close div before -->
            </div>
        </div>
    </div>
</div>';
}
?>

<style>
    .section-boxnav::before{ background-color:<?php echo $nav_items[0]['nav_background_color']?>}
    .section-boxnav::after{background-color:<?php echo $nav_items[1]['nav_background_color']?>}
    <?php echo $blocks['block_css_code']; ?>
</style>
<?php
if($block['nav_full_section']){
    echo '
    <div id="page-wrapper-inner" class="page-wrapper container '.$blocks['block_class'].'">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-'.$column.'">
                <div class="entry-content content-inner">
                    ';
}
?>
<!-- section news -->
<div  <?php if($blocks['block_id']!=''){ echo 'id="'.$blocks['block_id'].'"'; } ?> class="<?php echo $blocks['block_class']; ?> wpe-block section-boxnav">
    <?php
    //wpe_block_part('_header',$blocks);
    echo ' <div class="row gap-0">';
    $no=1;
    foreach($nav_items as $nav){
        echo ' <div class="col-lg-6" style="background-color:'.$nav['nav_background_color'].'">
                    <div class="boxnav-item _item-'.$no.'">
                        <div class="row">
                            <div class="col-lg-8">
                                <h3>'.$nav['nav_title'].'</h3>
                            </div>
                            <div class="col-lg-4 text-end">
                                <a href="'.$nav['nav_url'].'" class="btn btn-outline-light">'.$nav['nav_label'].'</a>
                            </div>
                        </div>
                    </div>
                </div>';
                $no++;
    }
    echo '</div>';


    //wpe_block_part('_linkmore',$blocks);
    ?>
</div>