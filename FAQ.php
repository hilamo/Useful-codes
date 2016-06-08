<?php $fields = simple_fields_values("question,answer");?>

<div class="content_holder">
	<?php if(!empty($fields)):?>
		<div class="box_container">
		<?php foreach($fields as $field):?>
			<div class="wrap_question">
				<h3 class="question plus"><?php echo $field['question'];?></h3>
				<div class="answer">
					<?php echo $field['answer'];?>
				</div>
			</div>
			<hr />
		<?php endforeach;?>
		</div>
	<?php else: echo 'חסר תוכן לעמוד זה.';?>
	<?php endif;?>
</div>




<script>
// FAQ 
jQuery('.wrap_question').click(function(){
   jQuery(this).find('.answer').slideToggle(400);
   jQuery(this).find('.question').toggleClass('minus');
   
});
</script>
<?php 
/**
CSS 
.wrap_question{
    position: relative;
    display: block;
    cursor: pointer;
}
.question{
    position: relative;
    display: block;
    padding-right: 40px;
    line-height: 30px;
}
.answer{
    display: none;
}
.question.plus{
    background: url(images/plus.png) no-repeat top right;
}
.question.minus{
    background: url(images/minus.png) no-repeat top right;
}

*/
?>


