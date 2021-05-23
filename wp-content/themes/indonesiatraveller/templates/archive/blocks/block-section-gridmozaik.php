<?php
$blocks =   block_field($block);
$text_image = isset($block['text_image']) ? wpe_image_single($block['text_image'])['url'] : '';
$grid_items = isset($block['grid_items']) ? $block['grid_items'] : '';

$column = $block['text_full_column']==1 ? 12 : 8;
if($block['text_full_section']){
echo '
<!-- close div before -->
            </div>
        </div>
    </div>
</div>';
}
?>
<style>
    <?php
    if($block['text_full_section']){
        if($blocks['block_id']!=''){ echo '#'.$blocks['block_id'];}?>.wpe-section::before{
            background-image:url(<?php echo $text_image;?>);
        }
        <?php
    }
    echo $blocks['block_css_code'];
    ?>
</style>
<?php
if($block['text_full_section']){
    echo '
    <div id="page-wrapper-inner" class="page-wrapper container '.$blocks['block_class'].'">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-'.$column.'">
                <div class="entry-content content-inner">
                    ';
}
?>

                <div <?php if($blocks['block_id']!=''){ echo 'id="'.$blocks['block_id'].'"'; } ?> class="<?php echo $blocks['block_class']; ?>  wpe-section section-gridmoz">

                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="wpe-section-title"><?php echo $block['block_title']; ?></h2>
                        </div>
                        <div class="col-lg-12">
                            <div class="wpe-section-desc">
                                <?php echo wpe_nl2p($block['block_desc']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="gridmoz">
                        <?php
                            foreach($grid_items as $gi){
                                $type =isset($gi['grid_type']) ? $gi['grid_type'] : '';
                                $image   = isset($gi['grid_image']) ? wpe_image_single($gi['grid_image'])['url'] : '';
                                switch ($type) {
                                    case 'grid_a':
                                        echo '<div class="gridmoz-item gridmoz-item--a d-flex align-items-end" style="background-image:url('.$image.')">';
                                        wpe_block_part('_gridmoz-item',$gi);
                                        echo '</div>';
                                        break;
                                    case 'grid_b':
                                        echo '<div class="gridmoz-item gridmoz-item--b d-flex align-items-end" style="background-image:url('.$image.')">';
                                        wpe_block_part('_gridmoz-item',$gi);
                                        echo '</div>';
                                        break;
                                    case 'grid_c':
                                        echo '<div class="gridmoz-item gridmoz-item--c d-flex align-items-end" style="background-image:url('.$image.')">';
                                        wpe_block_part('_gridmoz-item',$gi);
                                        echo '</div>';
                                        break;
                                }
                            }
                        ?>
                    </div>

                </div>
                <script type='text/javascript' src='https://unpkg.com/packery@2/dist/packery.pkgd.min.js?ver=20211215' id='wpe-grid-js-js'></script>
                <script>
                    var elem = document.querySelector('.gridmoz');
                    var pckry = new Packery( elem, {
                        // options
                        itemSelector: '.gridmoz-item',
                        gutter: 10,
                        percentPosition: true
                    });
                    if(pckry.size.width < 600){
                        pckry.destroy();
                    }
                </script>
<?php
    if($column){
        echo '
            </div>
        </div>
        <div class="col-lg-3"></div>
        <div class="col-lg-8">';
    }
?>