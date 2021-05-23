<?php
$blocks =   block_field($block);
//show($blocks);
$list_items = $block['list_items'];
?>
<style>
    <?php echo $blocks['block_css_code']; ?>
</style>
<!-- section news -->
<div  <?php if($blocks['block_id']!=''){ echo 'id="'.$blocks['block_id'].'"'; } ?> class="<?php echo $blocks['block_class']; ?> wpe-block wpe-section-textlist">
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
    <div class="row">
        <div class="col-lg-12">
            <div class="wpe-section-list">
                <ol class="list-items">

                <?php
                foreach($list_items as $li){
                    //show($li);
                    echo '  <li>
                                <div class="list-item">
                                    <div class="list-item_title">'.$li['list_title'].'</div>
                                    <div class="list-item_desc">'.$li['list_desc'].'</div>
                                </div>
                            </li>';
                }
                ?>
                </ul>
            </div>
        </div>
    </div>
</div>