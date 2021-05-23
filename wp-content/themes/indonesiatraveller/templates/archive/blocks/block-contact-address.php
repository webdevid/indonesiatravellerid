<?php
$blocks         =   block_field($block);
$contact_addresses = isset($block['contact_addresses']) ? $block['contact_addresses']: '';
?>
<style>
    .section-page-hero::before{
        background-image:url(<?php echo $image['url'];?>);
        background-repeat:no-repeat;
        background-size:cover;
        background-position:center center;
        background-attachment:fixed;
    }
    <?php echo $blocks['block_css_code']; ?>
</style>
<!-- section page hero -->
<div  <?php if($blocks['block_id']!=''){ echo 'id="'.$blocks['block_id'].'"'; } ?> class="<?php echo $blocks['block_class']; ?> my-5">
    <?php
      if(count($contact_addresses) > 0){
          foreach($contact_addresses as $contact_address){
              ?>
                <div class="row mb-2" id="<?php echo isset($contact_address['address_id']) ? $contact_address['address_id'] : ''; ?>">
                  <div class="col">
                    <h3><?php echo $contact_address['address_area']; ?></h3>
                  </div>
                </div>
                <div class="row">
                  <?php
                    if(count($contact_address['contact_address_detail']) > 0){
                        foreach($contact_address['contact_address_detail'] as $address){
                            ?>
                              <div class="col-md-6 mb-4 text-break">
                                <strong><span><?php echo $address['country_name']; ?></span></strong>
                                <?php echo $address['address_description']; ?>
                              </div>
                            <?php
                        }
                    }
                  ?>
                </div>
              <?php
          }
      }
    ?>
</div>