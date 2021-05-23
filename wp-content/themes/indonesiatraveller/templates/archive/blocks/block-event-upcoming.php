<?php
$blocks =   block_field($block);
$events = isset($block['event_items']) ? $block['event_items']: '';
?>
<style>
    <?php echo $blocks['block_css_code']; ?>
</style>
<!-- upcoming events -->
<div  <?php if($blocks['block_id']!=''){ echo 'id="'.$blocks['block_id'].'"'; } ?> class="<?php echo $blocks['block_class']; ?> wpe-block">
<?php /*
    <div class="row text-center">
        <div class="col-md-12">
            <div class="wpe-block-header ">
                <div class="wpe-block-title text-uppercase">
                    <h2>Upcoming events</h2>
                </div>
                <div class="wpe-block-description">
                    <p>Cras ultricies ligula sed magna dictum porta. Quisque velit nisi, pretium ut lacinia in, elementum id enim.</p>
                </div>
                <div class="dropdown float-start">
                    <button class="btn btn-outline-dark btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Filter by topics
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Topic 1</a></li>
                        <li><a class="dropdown-item" href="#">Topic 2</a></li>
                        <li><a class="dropdown-item" href="#">Topic 3</a></li>
                    </ul>
                </div>
                <div class="dropdown float-end">
                    <button class="btn btn-outline-dark btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Filter by type
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Type 1</a></li>
                        <li><a class="dropdown-item" href="#">Type 2</a></li>
                        <li><a class="dropdown-item" href="#">Type 3</a></li>
                    </ul>
                </div>
            </div>

            $arr_tab = array('ALL','JAN','FEB','MAR','APR','MAY','JUN','JUL','AUG','SEP','OCT','NOV','DEC')
            ?>
            <nav>
                <ul class="nav nav-tabs event-tab nav-fill" id="nav-tab" role="tablist">
                    <?php
                    $l=1;
                    foreach($arr_tab as $key=>$val){
                        if($l==1){$class="active";}else{ $class = '';}
                        echo '<li class="nav-item">';
                        echo '<button class="nav-link '.$class.'" id="nav-'.$val.'-tab" data-bs-toggle="tab" data-bs-target="#nav-'.$val.'" type="button" role="tab" aria-controls="nav-'.$val.'" aria-selected="true">'.$val.' <sup>2</sup></button>';
                        echo '</li>';
                        $l++;
                    }
                    ?>
                </ul>
            </nav>
            <div class="tab-content mt-5" id="nav-tabContent">
                <?php
                    $l=1;
                    foreach($arr_tab as $key=>$val){
                        if($l==1){$class="active";}else{ $class = '';}
                        echo '<div class="tab-pane fade show '.$class.'" id="nav-'.$val.'" role="tabpanel" aria-labelledby="nav-'.$val.'-tab">';
                        echo $val;
                        ?>
                        <div class="dropdown float-start">
                            <button class="btn btn-outline-dark btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Filter by topics
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Topic 1</a></li>
                                <li><a class="dropdown-item" href="#">Topic 2</a></li>
                                <li><a class="dropdown-item" href="#">Topic 3</a></li>
                            </ul>
                        </div>
                        <div class="dropdown float-end">
                            <button class="btn btn-outline-dark btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Filter by type
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Type 1</a></li>
                                <li><a class="dropdown-item" href="#">Type 2</a></li>
                                <li><a class="dropdown-item" href="#">Type 3</a></li>
                            </ul>
                        </div>
                        <div class="row mt-4 ">
                            <div class="col-lg-6 d-flex">
                                <div class="post-box-event d-flex align-items-stretch">
                                    <div class="post-box align-self-stretch">
                                        <a href="">
                                        <div class="post-box_thumbnail">

                                        </div>
                                        <div class="post-box_content">
                                            <div class="content-label">WEBINAR</div>
                                            <h2 class="content-title">Restoring Africa’s Drylands: Accelerating Action On the Ground</h2>
                                            <div class="content-date">3 APR 2021</div>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex">
                                <div class="post-box-event d-flex align-items-stretch">
                                    <div class="post-box align-self-stretch">
                                        <a href="">
                                        <div class="post-box_thumbnail">

                                        </div>
                                        <div class="post-box_content">
                                            <div class="content-label">WEBINAR</div>
                                            <h2 class="content-title">How the world can expand its food sources and fight hunger</h2>
                                            <div class="content-date">3 APR 2021</div>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-lg-4">
                            <div class="col-lg-6">
                                <div class="post-box-event">
                                    <div class="post-box">
                                        <a href="">
                                        <div class="post-box_thumbnail">

                                        </div>
                                        <div class="post-box_content">
                                            <div class="content-label">WEBINAR</div>
                                            <h2 class="content-title">How the world can expand its food sources and fight hunger</h2>
                                            <div class="content-date">3 APR 2021</div>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="post-box-event">
                                    <div class="post-box">
                                        <a href="">
                                        <div class="post-box_thumbnail">

                                        </div>
                                        <div class="post-box_content">
                                            <div class="content-label">WEBINAR</div>
                                            <h2 class="content-title">How the world can expand its food sources and fight hunger</h2>
                                            <div class="content-date">3 APR 2021</div>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
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
                        </div>
                        <?php
                        echo '</div>';
                        $l++;
                    }
                ?>
            </div>

            ?>
        </div>
    </div>
    */?>

    <?php
        wpe_block_part('_header',$blocks);
    ?>
    <?php /*
    <div class="row">
        <div class="col-md-12">
            <div class="dropdown float-start">
                <button class="btn btn-outline-dark btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Filter by topics
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">Topic 1</a></li>
                    <li><a class="dropdown-item" href="#">Topic 2</a></li>
                    <li><a class="dropdown-item" href="#">Topic 3</a></li>
                </ul>
            </div>
            <div class="dropdown float-end">
                <button class="btn btn-outline-dark btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Filter by type
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">Type 1</a></li>
                    <li><a class="dropdown-item" href="#">Type 2</a></li>
                    <li><a class="dropdown-item" href="#">Type 3</a></li>
                </ul>
            </div>
        </div>
    </div> */ ?>
    <div class="row mt-4">
        <?php
        if(count($events) > 0){

            foreach($events as $event){
                echo '<div class="col-lg-6 d-flex align-items-stretch">';
                    wpe_block_part('_post-box-event',$event);
                echo '</div>';
            }
        }
        ?>
        <?php /*
        <div class="col-lg-6 d-flex align-items-stretch">
            <div class="post-box-event d-flex align-self-stretch">
                <div class="post-box ">
                    <a href="">
                    <div class="post-box_thumbnail">

                    </div>
                    <div class="post-box_content">
                        <div class="content-label">WEBINAR</div>
                        <h2 class="content-title">Restoring Africa’s Drylands: Accelerating Action On the Ground</h2>
                        <div class="content-date">3 APR 2021</div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-6 d-flex align-items-stretch">
            <div class="post-box-event d-flex align-self-stretch">
                <div class="post-box ">
                    <a href="">
                    <div class="post-box_thumbnail">

                    </div>
                    <div class="post-box_content">
                        <div class="content-label">WEBINAR</div>
                        <h2 class="content-title">How the world can expand its food sources and fight hunger</h2>
                        <div class="content-date">3 APR 2021</div>
                    </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-6 d-flex align-items-stretch">
            <div class="post-box-event d-flex align-self-stretch">
                <div class="post-box ">
                    <a href="">
                    <div class="post-box_thumbnail">

                    </div>
                    <div class="post-box_content">
                        <div class="content-label">WEBINAR</div>
                        <h2 class="content-title">How the world can expand its food sources and fight hunger</h2>
                        <div class="content-date">3 APR 2021</div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-6 d-flex align-items-stretch">
            <div class="post-box-event d-flex align-self-stretch">
                <div class="post-box ">
                    <a href="">
                    <div class="post-box_thumbnail">

                    </div>
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