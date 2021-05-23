<?php
$blocks =   block_field($block);
//show($blocks);
$list_items = $block['list_items'];
?>
<style>
    <?php echo $blocks['block_css_code']; ?>
</style>
<!-- section news -->
<div  <?php if($blocks['block_id']!=''){ echo 'id="'.$blocks['block_id'].'"'; } ?> class="<?php echo $blocks['block_class']; ?> wpe-block wpe-section-members">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="wpe-section-title"><?php echo $block['block_title']; ?></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class=""><?php echo $block['block_desc']; ?>
            </div>
        </div>
    </div>
    <div class="row mt-5">
                <?php
                foreach($list_items as $li){
                    //show($li);
                    echo '  <div class="col-lg-4 col-sm-6">
                                <a href="'.$li['list_url'].'">
                                <div class="member-item">
                                    <div class="member-thumbnail">
                                    '.wp_get_attachment_image( $li['list_image'], array('700', '600'), TRUE, array( "class" => "img-responsive" ) ).'
                                    </div>
                                    <div class="member-title">
                                        '.$li['list_title'].'
                                    </div>
                                    <div class="member-label">
                                        '.$li['list_label'].'
                                    </div>
                                </div>
                                </a>
                            </div>';
                }
                ?>
    </div>
</div>