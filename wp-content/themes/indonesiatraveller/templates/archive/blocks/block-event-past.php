<?php
$blocks =   block_field($block);
$events = isset($block['event_items']) ? $block['event_items']: '';
?>
<style>
    <?php echo $blocks['block_css_code']; ?>
</style>
<!-- past events -->
<div  <?php if($blocks['block_id']!=''){ echo 'id="'.$blocks['block_id'].'"'; } ?> class="<?php echo $blocks['block_class']; ?> wpe-block">
    <?php
        wpe_block_part('_header',$blocks);
    ?>
    <div class="row mt-4">
        <?php
        if(count($events) > 0){
            foreach($events as $event){
                $class = 'no-thumb';
                echo '<div class="col-lg-4 d-flex align-items-stretch">';
                    wpe_block_part('_post-box-event',$event,$class);
                echo '</div>';
            }
        }
        ?>
        <?php /*
        <div class="col-lg-4 d-flex">
            <div class="post-box-event no-thumb d-flex align-items-stretch ">
                <div class="post-box align-self-stretch">
                    <a href="">
                    <div class="post-box_content">
                        <div class="content-label">WEBINAR</div>
                        <h2 class="content-title">Restoring Africa’s Drylands: Accelerating Action On the Ground</h2>
                        <div class="content-date">3 APR 2021</div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 d-flex">
            <div class="post-box-event no-thumb d-flex align-items-stretch ">
                <div class="post-box align-self-stretch">
                    <a href="">
                    <div class="post-box_content">
                        <div class="content-label">WEBINAR</div>
                        <h2 class="content-title">How the world can expand its food sources and fight hunger</h2>
                        <div class="content-date">3 APR 2021</div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 d-flex">
            <div class="post-box-event no-thumb d-flex align-items-stretch ">
                <div class="post-box align-self-stretch">
                    <a href="">
                    <div class="post-box_content">
                        <div class="content-label">WEBINAR</div>
                        <h2 class="content-title">How the world can expand its food sources and fight hunger</h2>
                        <div class="content-date">3 APR 2021</div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 d-flex">
            <div class="post-box-event no-thumb d-flex align-items-stretch">
                <div class="post-box align-self-stretch">
                    <a href="">
                    <div class="post-box_content">
                        <div class="content-label">WEBINAR</div>
                        <h2 class="content-title">Restoring Africa’s Drylands: Accelerating Action On the Ground</h2>
                        <div class="content-date">3 APR 2021</div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 d-flex">
            <div class="post-box-event no-thumb d-flex align-items-stretch ">
                <div class="post-box align-self-stretch">
                    <a href="">
                    <div class="post-box_content">
                        <div class="content-label">WEBINAR</div>
                        <h2 class="content-title">How the world can expand its food sources and fight hunger</h2>
                        <div class="content-date">3 APR 2021</div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 d-flex">
            <div class="post-box-event no-thumb d-flex align-items-stretch">
                <div class="post-box align-self-stretch">
                    <a href="">
                    <div class="post-box_content">
                        <div class="content-label">WEBINAR</div>
                        <h2 class="content-title">How the world can expand its food sources and fight hunger</h2>
                        <div class="content-date">3 APR 2021</div>
                    </div>
                    </a>
                </div>
            </div>
        </div> */ ?>
    </div>
    <div class="row mt-4">
        <?php /*
        <div class="col--lg-12">
            <nav class="page-pagination mt-5" aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link" href="#"><i class="bi bi-chevron-left"></i></a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#"><i class="bi bi-chevron-right"></i></a></li>
                </ul>
            </nav>
        </div>
        */ ?>
    </div>
</div>