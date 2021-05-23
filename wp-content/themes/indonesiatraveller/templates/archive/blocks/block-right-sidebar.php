<?php
// render
  $class_aside = isset($block['block_class']) ? $block['block_class'] : '';
  $block_css_code = isset($block['block_css_code']) ? $block['block_css_code'] : '';
  ?>
  <style>
  .aside.-profile{

  }
  .aside.-profile img{
      margin-bottom:15px;
      max-width:150px;
  }
  .aside.-profile p{

  }
  <?php
      echo $block_css_code;
  ?>
  </style>
  <div class="section <?php echo $class_aside; ?> float-lg-end right-sidebar float-none mt-5 mt-lg-1">
        <div class="row">
			<div class="col">
				<div class="aside -<?php echo $class_aside;?> ms-4 mb-4">
				<?php
				if(isset($block['link'])){
					if(trim($block['link'])!=''){
						echo '<a href="'.$block['link'].'">';
					}
				}
				if(isset($block['image'])){
					if(trim($block['image'])!=''){
						echo '<img src="'.$block['image'].'" class="img-circle">';
					}
				}

				echo $block['block_sidebar'];
				if(isset($block['link'])){
					if(trim($block['link'])!=''){
						echo '</a>';
					}
				}
				?>
				</div>
			</div>
		</div>
  </div>