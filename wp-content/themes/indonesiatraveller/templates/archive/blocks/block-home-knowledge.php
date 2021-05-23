<?php
$blocks =   block_field($block);
//show($block);
$knowledge_items = $block['knowledge_items'];
?>
<style>
    <?php echo $blocks['block_css_code']; ?>
    .shownumber{
        background: #000000;
        color: #FFFFFF;
        display: inline-block;
        width: 30px;
        text-align: center;
        margin-right: 10px;
        border: 1px solid #ddd;
    }
</style>
<!-- section knowledge -->
<div  <?php if($blocks['block_id']!=''){ echo 'id="'.$blocks['block_id'].'"'; } ?> class="<?php echo $blocks['block_class']; ?> wpe-block section-knowledge">
    <?php
    wpe_block_part('_header',$blocks);
    ?>
    <div class="grid">
        <?php
            $no = 1;
            foreach($knowledge_items as $ki ){
                $class = isset($ki['knowledge_class']) ? $ki['knowledge_class'] : '';
                $image   = isset($ki['knowledge_image']) ? wpe_image_single($ki['knowledge_image'])['url'] : '';
                if($image!='' AND $ki['_type']!='grid_b'){
                    $class .= ' bg-overlay ';
                }

                $type = ( isset($ki['knowledge_type']) AND $ki['knowledge_type']!='') ? $ki['knowledge_type'] : $ki['_type'];

                if($image!='' AND $type!='grid_b'){
                    $class .= ' bg-overlay ';
                }

                $ki['no'] = $no;

                $style = '';
                if($image){
                    $style .= 'background-image:url('.$image.');';
                }
                if(isset($ki['knowledge_bg_color'])){
                    $style .= "background-color:".$ki['knowledge_bg_color'].";";
                }
                switch ($type) {
                    case 'grid_a':
                        echo '<div class="'.$class.' grid-item grid-item--a d-flex align-items-end" style="'.$style.'">';
                            wpe_block_part('_grid-item-default',$ki);
                        echo '</div>';
                        break;
                    case 'grid_b':
                        echo '<div class="'.$class.' grid-item grid-item--b color-1">';
                            wpe_block_part('_grid-item-publication',$ki);
                        echo '</div>';
                        break;
                    case 'grid_c':
                        echo '<div class="'.$class.' grid-item grid-item--c d-flex align-items-end" style="'.$style.'">';
                            wpe_block_part('_grid-item-default',$ki);
                        echo '</div>';
                        break;
                    case 'grid_d':
                        echo '<div class="'.$class.' grid-item grid-item--d d-flex align-items-end" style="'.$style.'">';
                            wpe_block_part('_grid-item-default',$ki);
                        echo '</div>';
                        break;
                    case 'grid_e':
                        echo '<div class="'.$class.' grid-item grid-item--e d-flex align-items-end" style="'.$style.'">';
                            wpe_block_part('_grid-item-default',$ki);
                        echo '</div>';
                        break;
                    case 'grid_f':
                        echo '<div class="'.$class.' grid-item grid-item--f d-flex align-items-end" style="'.$style.'">';
                            wpe_block_part('_grid-item-default',$ki);
                        echo '</div>';
                        break;

                }

                $no++;
            }

        /*
        ?>
        <div class="grid-item grid-item--a d-flex align-items-end">
            <div class="grid-item_type"><img src="<?php echo get_template_directory_uri();  ?>/assets/images/icons/video.svg"> VIDEO</div>
            <div class="grid-item_bottom">
                <div class="grid-item_title">
                    <h1>Yangambi: Partnerships, capacity building and entrepreneurship for a sustainable landscape</h1>
                </div>
                <div class="grid-item_button"><a class="btn btn-light mt-4"><i class="bi bi-play-fill"></i> 23:31</a></div>
            </div>
        </div>

        <div class="grid-item grid-item--b color-1">
            <div class="grid-item_publication align-self-center">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="grid-item_pubthumb"><img src="https://www.cifor.org/uploads/webservice/7847.jpg"></div>
                    </div>
                    <div class="col-lg-8 position-relative">
                        <div class="grid-item_title">
                            <h1>Ten golden rules for reforestation to optimize carbon sequestration, biodiversity recovery and livelihood benefits</h1>
                        </div>
                        <div class="grid-item_pubyear">
                            2021
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid-item grid-item--b color-1">
            <div class="grid-item_publication">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="grid-item_pubthumb"><img src="https://www.cifor.org/uploads/webservice/7847.jpg"></div>
                    </div>
                    <div class="col-lg-8 position-relative">
                        <div class="grid-item_title">
                            <h1>Ten golden rules for reforestation to optimize carbon sequestration, biodiversity recovery and livelihood benefits</h1>
                        </div>
                        <div class="grid-item_pubyear">
                            2021
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid-item grid-item--c d-flex align-items-end">
            <div class="grid-item_type">
                <img src="<?php echo get_template_directory_uri();  ?>/assets/images/icons/video.svg">
                VIDEO
            </div>
            <div class="grid-item_bottom">
                <div class="grid-item_title">
                    <h1>Food-energy-environment trilemma: Bioenergy research in Indonesia is aiming for a triple win</h1>
                </div>
                <div class="grid-item_button"><a class="btn btn-light mt-4"><i class="bi bi-play-fill"></i> 23:31</a></div>
            </div>
        </div>
        <div class="grid-item grid-item--d d-flex align-items-end">
            <div class="grid-item_type">
                <img src="<?php echo get_template_directory_uri();  ?>/assets/images/icons/podcast.svg">
                PODCAST
            </div>
            <div class="grid-item_bottom">
                <div class="grid-item_title">
                    <h1>Yangambi: Partnerships, capacity building and entrepreneurship for a sustainable landscape</h1>
                </div>
                <div class="grid-item_button"><a class="btn btn-light mt-4"><i class="bi bi-play-fill"></i> 23:31</a></div>
            </div>
        </div>

        <div class="grid-item grid-item--c  color-2  d-flex align-items-end">
            <div class="grid-item_type">
                <img src="<?php echo get_template_directory_uri();  ?>/assets/images/icons/database.svg">
                DATABASE</div>
            <div class="grid-item_bottom">
                <div class="grid-item_title">
                    <h1 class="large">Tree Functional and Ecological Databases</h1>
                </div>
                <div class="grid-item_button"><a class="btn btn-dark mt-4">Read more</a></div>
            </div>
        </div>
        <div class="grid-item grid-item--e  d-flex align-items-end">
            <div class="grid-item_type">
                <img src="<?php echo get_template_directory_uri();  ?>/assets/images/icons/global.svg">
                WEBSITE
            </div>
            <div class="grid-item_bottom">
                <div class="grid-item_title">
                    <h1>A science, conservation and development hub in the heart of the Congo Basin</h1>
                </div>
                <div class="grid-item_button"><a class="btn btn-light mt-4">VISIT WEBSITE</a></div>
            </div>
        </div>
        <div class="grid-item grid-item--e  d-flex align-items-end">
            <div class="grid-item_type">
                <img src="<?php echo get_template_directory_uri();  ?>/assets/images/icons/podcast.svg">
                PODCAST
            </div>
            <div class="grid-item_bottom">
                <div class="grid-item_title">
                    <h1>Yangambi: Partnerships, capacity building and entrepreneurship for a sustainable landscape</h1>
                </div>
                <div class="grid-item_button"><a class="btn btn-light mt-4"><i class="bi bi-play-fill"></i> 23:31</a></div>
            </div>
        </div>
        <div class="grid-item grid-item--c  d-flex align-items-end">
            <div class="grid-item_type">
                <img src="<?php echo get_template_directory_uri();  ?>/assets/images/icons/video.svg">
                VIDEO
            </div>
            <div class="grid-item_bottom">
                <div class="grid-item_title">
                    <h1>Small entrepreneurs contribute to the local economy in Yangambi, DRC</h1>
                </div>
                <div class="grid-item_button"><a class="btn btn-light mt-4"><i class="bi bi-play-fill"></i> 23:31</a></div>
            </div>
        </div>
        <?php

        */
        ?>
    </div>
    <?php
    wpe_block_part('_linkmore',$blocks);
    ?>
    <script type='text/javascript' src='https://unpkg.com/packery@2/dist/packery.pkgd.min.js?ver=20211215' id='wpe-grid-js-js'></script>
    <script>
        var elem = document.querySelector('.grid');
        var pckry = new Packery( elem, {
            // options
            itemSelector: '.grid-item',
            gutter: 10,
            percentPosition: true
        });
        if(pckry.size.width < 600){
            pckry.destroy();
        }
    </script>
</div>