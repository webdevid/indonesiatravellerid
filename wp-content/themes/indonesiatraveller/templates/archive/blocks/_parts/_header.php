<?php
if($block['block_title']!=''){
?>
<div class="row text-center">
    <div class="col-md-12">
        <div class="wpe-block-header">
            <div class="wpe-block-title text-uppercase">
                <h2><?php echo $block['block_title']; ?></h2>
            </div>
            <?php
            if($block['block_desc']){
                ?>
                <div class="wpe-block-description ">
                    <p><?php echo $block['block_desc']; ?></p>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<?php
}
?>