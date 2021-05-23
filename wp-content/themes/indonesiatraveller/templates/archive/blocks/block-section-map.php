<?php
$blocks =   block_field($block);
$column = $block['map_full_column']==1 ? 12 : 8;

?>
<style>
    <?php echo $blocks['block_css_code']; ?>
</style>
<?php
if(get_page_template_slug(get_the_ID())=='templates/template-page-fullwidth.php'){
    ?>
    <div <?php if($blocks['block_id']!=''){ echo 'id="'.$blocks['block_id'].'"'; } ?> class="<?php echo $blocks['block_class']; ?> section-map">
        <div class="map-block">
            <div class="map-popup-wrapper">
                <div class="map-container" id="map"></div>
                <div class="map-popup"></div>
                <div class="json-map-loader"> Please wait while map being loaded&#8230;</div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <link rel='stylesheet' id='select-style-css'  href='<?php echo site_url();?>/api/map/research-map/select2.min.css?ver=5.4.2' type='text/css' media='all' />
        <link rel='stylesheet' id='map-style-css'  href='<?php echo site_url();?>/api/map/research-map/map-custom.css?ver=5.4.2' type='text/css' media='all' />
        <link rel='stylesheet' id='custom-scrollbar-style-css'  href='<?php echo site_url();?>/api/map/research-map/jquery.mCustomScrollbar.min.css?ver=5.4.2' type='text/css' media='all' />

        <script type='text/javascript' src='<?php echo site_url();?>/api/map/research-map/select2.full.min.js?ver=20151215'></script>
        <script type='text/javascript' src='<?php echo site_url();?>/api/map/research-map/underscore-min.js?ver=20151215'></script>
        <script type='text/javascript' src='<?php echo site_url();?>/api/map/research-map/highcharts.js?ver=20151215'></script>
        <script type='text/javascript' src='<?php echo site_url();?>/api/map/research-map/exporting.js?ver=20151215'></script>
        <script type='text/javascript' src='<?php echo site_url();?>/api/map/research-map/map.js?ver=20151215'></script>
        <script type='text/javascript' src='<?php echo site_url();?>/api/map/research-map/data.js?ver=20151215'></script>
        <script type='text/javascript' src='<?php echo site_url();?>/api/map/research-map/world.js?ver=20151215'></script>
        <script type='text/javascript' src='<?php echo site_url();?>/api/map/research-map/jquery.mCustomScrollbar.concat.min.js?ver=20151215'></script>
        <script type='text/javascript' src='<?php echo site_url();?>/wp-content/themes/starter/assets/js/cifor.js?ver=20200412'></script>
        <script type='text/javascript'>
        /* <![CDATA[ */
        var theMap = {"team":"1","dace_uri":"https:\/\/solr.cgiar.id\/"};
        /* ]]> */
        </script>
        <script type='text/javascript' src='<?php echo site_url();?>/api/map/research-map/research-map.js?ver=20200412'></script>
        </div>
    <?php
}else{
    if($block['map_full_section']){
        echo '
        <!-- close div before -->
                    </div>
                </div>
            </div>
        </div>';
    }

    if($block['map_full_section']){
        echo '
        <div id="page-wrapper-inner" class="page-wrapper container '.$blocks['block_class'].'">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-'.$column.'">
                    <div class="entry-content content-inner">
                        ';
    }
    ?>
                <div <?php if($blocks['block_id']!=''){ echo 'id="'.$blocks['block_id'].'"'; } ?> class="<?php echo $blocks['block_class']; ?> section-map">
                    <h3 class="text-center pt-5 mb-5"><?php echo $block['block_title']; ?></h3>
                    <?php
                        $js_map = '<div class="map-block">
                                    <div class="map-popup-wrapper">
                                        <div class="map-container" id="map"></div>
                                        <div class="map-popup"></div>
                                        <div class="json-map-loader"> Please wait while map being loaded&#8230;</div>
                                    </div>
                                </div>';

                        if (isset($block['map_image'])) {
                            if ($block['map_image']) {
                                ?>
                                    <img src="<?php echo wpe_image_single($block['map_image'])['url']; ?>" alt="" class="w-100 mb-5">
                                <?php
                            } else {
                                echo $js_map;
                            }
                            
                        } else {
                            echo $js_map;
                        }
                    ?>


                    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
                    <link rel='stylesheet' id='select-style-css'  href='<?php echo site_url();?>/api/map/research-map/select2.min.css?ver=5.4.2' type='text/css' media='all' />
                    <link rel='stylesheet' id='map-style-css'  href='<?php echo site_url();?>/api/map/research-map/map-custom.css?ver=5.4.2' type='text/css' media='all' />
                    <link rel='stylesheet' id='custom-scrollbar-style-css'  href='<?php echo site_url();?>/api/map/research-map/jquery.mCustomScrollbar.min.css?ver=5.4.2' type='text/css' media='all' />


                    <script type='text/javascript' src='<?php echo site_url();?>/api/map/research-map/select2.full.min.js?ver=20151215'></script>
                    <script type='text/javascript' src='<?php echo site_url();?>/api/map/research-map/underscore-min.js?ver=20151215'></script>
                    <script type='text/javascript' src='<?php echo site_url();?>/api/map/research-map/highcharts.js?ver=20151215'></script>
                    <script type='text/javascript' src='<?php echo site_url();?>/api/map/research-map/exporting.js?ver=20151215'></script>
                    <script type='text/javascript' src='<?php echo site_url();?>/api/map/research-map/map.js?ver=20151215'></script>
                    <script type='text/javascript' src='<?php echo site_url();?>/api/map/research-map/data.js?ver=20151215'></script>
                    <script type='text/javascript' src='<?php echo site_url();?>/api/map/research-map/world.js?ver=20151215'></script>
                    <script type='text/javascript' src='<?php echo site_url();?>/api/map/research-map/jquery.mCustomScrollbar.concat.min.js?ver=20151215'></script>
                    <script type='text/javascript' src='<?php echo site_url();?>/wp-content/themes/starter/assets/js/cifor.js?ver=20200411'></script>
                    <script type='text/javascript'>
                    /* <![CDATA[ */
                    var theMap = {"team":"1","dace_uri":"https:\/\/solr.cgiar.id\/"};
                    /* ]]> */
                    </script>
                    <script type='text/javascript' src='<?php echo site_url();?>/api/map/research-map/research-map.js?ver=20200411'></script>
                </div>

    <?php
    if($column){
        echo '
                </div>
            </div>
        <div class="col-lg-3"><div class="wpe-blank"></div></div>
        <div class="col-lg-8">';
    }
}
?>
