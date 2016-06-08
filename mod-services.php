<div class="services_container">
    <h1><?php echo $services_title;?></h1>
    <p><?php echo $services_content;?></p>
    <?php $count = 0;?> 
    <?php if (have_posts()) : ?>
    <ul id="services_menu" class="clearfix">
        <?php while (have_posts()) : the_post(); ?>
        <?php $count++;?>
            <?php if($count == 1){
                        $style = 'one';
                    }else if($count == 6 ){
                    $style = 'six';
        	        $count = 0;
                           
            ?>  
            <?php }else
                        $style = '';
            ?>     
        <li class="aligncenter <?php echo $style;?>"><a href="<?php the_permalink();?>"><?php the_title();?></a></li> 
        <?php if($count == 0){?><div class="empty_row"></div><?php } ?>
        <?php endwhile; wp_reset_query(); ?>
    </ul>
    <?php endif; ?>
</div>

