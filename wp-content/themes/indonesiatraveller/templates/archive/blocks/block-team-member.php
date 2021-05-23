<?php
$blocks         =   block_field($block);
$team_members = isset($block['team_members']) ? $block['team_members']: '';
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
<div  <?php if($blocks['block_id']!=''){ echo 'id="'.$blocks['block_id'].'"'; } ?> class="<?php echo $blocks['block_class']; ?> mt-5">
    <?php
      if(count($team_members) > 0){
          foreach($team_members as $team_member){
              ?>
                <div class="row mb-2" id="<?php echo isset($team_member['division_id']) ? $team_member['division_id'] : ''; ?>">
                  <div class="col">
                    <h3><?php echo $team_member['division_name']; ?></h3>
                  </div>
                </div>
                <div class="row">
                  <?php
                    if(count($team_member['team_member_detail']) > 0){
                        foreach($team_member['team_member_detail'] as $personnel){
                            ?>
                              <div class="col-md-6 mb-4">
                                <strong><span><?php echo $personnel['team_member_name']; ?></span></strong>
                                <?php echo $personnel['team_member_description']; ?>
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