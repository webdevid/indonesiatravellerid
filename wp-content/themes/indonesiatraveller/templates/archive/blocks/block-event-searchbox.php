<!-- search box -->
<div class="event-search-box">
    <form class="d-none d-lg-block" action="<?php echo site_url();?>/events/search/" method="get">
        <div class="row">
            <div class="col-5">
                <label class="form-label">KEYWORDS</label>
                <input type="text" name="ekey"
                <?php if(isset($_GET['ekey'])){
                    if($_GET['ekey']!=''){
                        echo 'value="'.$_GET['ekey'].'"';
                    }
                } ?>
                class="form-control input-lg" placeholder="Event name">

            </div>
            <div class="col-3">
                <label class="form-label">TYPE</label>
                <div class="custom-dropdown">
                    <select class="form-control select-lg" name="eyear">
                        <option value="">Event type...</option>
                        <option value="1">CONFERENCE</option>
                        <option value="2">WEBINAR</option>
                        <option value="3">EXHIBITION</option>
                    </select>
                </div>
            </div>
            <div class="col-3">
                <label class="form-label">YEAR</label>
                <select class="form-control select-lg" name="eyear">
                    <option value="">Year</option>
                    <?php
                        foreach(range(date('Y'), 2007) as $year){
                            $geyear = isset($_GET['eyear']) ? $_GET['eyear'] : '';
                            if($geyear==$year){
                                    echo '<option value="'.$year.'" selected>'.$year.'</option>';
                            }else{
                                echo '<option value="'.$year.'">'.$year.'</option>';
                            }

                        }
                    ?>

                </select>
            </div>
            <div class="col-1">
                <button type="submit" class="btn btn-dark "><i class="bi bi-search"></i></button>
            </div>
        </div>
    </form>
    <form class="d-lg-none" action="<?php echo site_url();?>/events/search/" method="get">
        <div class="row">
            <div class="col-12 mb-2">
                <label class="form-label">KEYWORDS</label>
                <input type="text" name="ekey"
                <?php if(isset($_GET['ekey'])){
                    if($_GET['ekey']!=''){
                        echo 'value="'.$_GET['ekey'].'"';
                    }
                } ?>
                class="form-control input-lg" placeholder="Event name">

            </div>
            <div class="col-12 mb-2">
                <label class="form-label">TYPE</label>
                <div class="custom-dropdown">
                    <select class="form-control select-lg" name="eyear">
                        <option value="">Event type...</option>
                        <option value="1">CONFERENCE</option>
                        <option value="2">WEBINAR</option>
                        <option value="3">EXHIBITION</option>
                    </select>
                </div>
            </div>
            <div class="col-12 mb-2">
                <label class="form-label">YEAR</label>
                <select class="form-control select-lg" name="eyear">
                    <option value="">Year</option>
                    <?php
                        foreach(range(date('Y'), 2007) as $year){
                            $geyear = isset($_GET['eyear']) ? $_GET['eyear'] : '';
                            if($geyear==$year){
                                    echo '<option value="'.$year.'" selected>'.$year.'</option>';
                            }else{
                                echo '<option value="'.$year.'">'.$year.'</option>';
                            }

                        }
                    ?>

                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-dark btn-lg" style="width:100%;">Search</button>
            </div>
        </div>
    </form>
</div>