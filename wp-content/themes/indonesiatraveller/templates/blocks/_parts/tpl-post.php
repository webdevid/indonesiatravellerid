<?php
$bo     = $block_option;
$data   = $block;
$size = array('400', '300');
$image_p = wp_get_attachment_image( $data['d_image'], $size, TRUE, array( "class" => "img-responsive" ) );
?>
<div class="post-item <?php echo $class;?>">
    <?php
    if($bo['show_image']!='')
    {
        ?>
        <div class="post-item_thumb">
            <a href="<?php echo $data['d_link']; ?>" title="<?php echo $data['d_title'];?>">
            <?php
            echo $image_p;
            ?>
        </a>
        </div>
        <?php
    }
    ?>
    <div class="post-item_text">
    <?php
        //if($bo['show_label']!='')
        //{
            ?>
            <span class="meta-category"><a href="#" title="<?php echo $data['d_title'];?>"><?php //echo $data['d_label']; ?>HOTEL</a></span>
            <?php
        //}
        ?>
        <h1><a href="<?php echo $data['d_link']; ?>" title="<?php echo $data['d_title'];?>"><?php echo wp_trim_words( $data['d_title'], 10, '...' ); ?></a></h1>
        <?php
        if($bo['show_date']!='')
        {
            ?>
            <span class="meta-date"><?php echo $data['d_date']; ?></span>
            <?php
        }
        if($bo['show_author']!='')
        {
            ?>
                <span class="meta-author"><a href="#" title="<?php echo $data['d_title'];?>"><?php echo $data['d_author']; ?></a></span>
            <?php
        }
        if($bo['show_excerpt']!='')
        {
            ?>
            <div class="post-item_excerpt">
            <?php echo $data['d_excerpt']; ?>
            </div>
            <?php
        }
        if($bo['show_more']!='')
        {
        ?>
        <div>
            <a href="<?php echo $data['d_link']; ?>" class="post-item_more" title="<?php echo $data['d_title'];?>">Read more</a>
        </div>
        <?php
        }
        ?>

    </div>
</div>