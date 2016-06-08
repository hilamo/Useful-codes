<!DOCTYPE html>
<!-- Example from Mashkanta4U Site -->
<html>
	<head>
		<style>
			.accordion_content {
				color: #505151;
				font-size: 18px;
				font-weight: normal;
				display: none;
			}
			h2.accordion_title{
				background: url(images/faq_plus.png) no-repeat right center;
				font-size: 26px;
				line-height: 30px;
				border-bottom: 1px solid #e0dedf;
				padding: 10px 30px 10px 0;
			}
			h2.accordion_title.minus{
				background: url(images/faq_minus.png) no-repeat right center;   
			}
			h2.accordion_title a{
				color:#828282;
			}
			h2.accordion_title.minus a{
				color: #37b8df;
				
			}
		</style>
	</head>
	
	<body>
		<div class="accordion_holder">
			<h2 class="accordion_title">
				<a class="toggle_accordion"><?php echo $field['question'];?></a>
			</h2>
			<div class="accordion_content">
				<?php echo wpautop($field['answer']);?>
			</div>
		</div>
	</body>

</html>


<script>
/** FAQ Page Accordion */
    jQuery( ".accordion_holder a.toggle_accordion").click(function() {
    
        jQuery(this).parent().removeClass('plus');
        jQuery(this).parent().removeClass('minus');
        var hidden = jQuery(this).parent().next(".accordion_content").is(':hidden');
        
        jQuery(this).parent().next(".accordion_content").slideToggle("slow");
        //return true if the content is hidden, false otherwise
        if(hidden){        
            jQuery(this).parent().addClass('minus');
        }
        else{
            jQuery(this).parent().addClass('plus');
        }
    });
</script>

