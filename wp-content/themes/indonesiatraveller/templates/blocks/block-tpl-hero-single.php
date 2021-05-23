<?php
$blocks =   block_field($block);
?>
<style>
    <?php echo $blocks['block_css_code']; ?>
</style>
<div <?php if($blocks['block_id']!=''){ echo 'id="'.$blocks['block_id'].'"'; } ?> class="<?php echo $blocks['block_class']; ?>  wpe-block section-single-hero">
    <div class="page-hero">
        <div class="page-hero_image">
            <!-- <img src="https://via.placeholder.com/1600x600/f8f8f8/dddddd/"> -->
        </div>
        <div class="page-hero_content -light d-flex align-items-center">
            <div>
                <div class="row">
                    <div class="col-lg-5 col-xl-5 col-12 ">
                        <div class="hero-single-thumb mb-4 mb-lg-0 mb-xl-0">
                            <img src="https://via.placeholder.com/800x600/f8f8f8/dddddd/">
                        </div>
                    </div>
                    <div class="col-lg-7 col-xl-7 col-12  d-flex align-items-center order-xl-first order-lg-first">
                        <div class="hero-single-content">
                            <span class="hero-label"><a href="#">Travel news</a></span>
                            <h1 class="hero-title mb-3">Kyoto and Nara 2 or 3-Day Bullet Train Tour from Tokyo</h1>

                            <div class="hero-author">
                                <div class="hero-author_thumb">
                                    <img src="https://via.placeholder.com/65x65/f8f8f8/dddddd/">
                                </div>
                                <div class="hero-author_text">
                                    <h3>Jhon Doe</h3>
                                    <span>Fulltime Traveller</span>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>