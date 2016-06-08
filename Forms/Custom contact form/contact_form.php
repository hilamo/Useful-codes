<div class="wrap_form_content">
<?php 
    global $redux;
    
    $title = $redux['form_title'];
    $text = $redux['form_desc'];
    $email_to = $redux['send_to'];
?>
<div class="content">
    <h2><?php echo $title;?></h2>
    <div class="description"><?php echo $text;?></div>
</div>
    <form class="main_contact_form" action="<?php echo $redux['thankyou_page_link'];?>" method="POST">
        <input name="full_name" type="text" class="text required" placeholder="<?php _e('Full name:','nativ'); ?>" />
        <input name="email" type="text" class="text required" placeholder="<?php _e('Email','nativ'); ?>" />
        <input name="phone" type="text" class="text required" placeholder="<?php _e('Phone','nativ'); ?>" />
        <input name="message" type="text" class="text required" placeholder="<?php _e('Somrthing...','nativ'); ?>" />
        <input name="form_submit_btn" type="submit" id="form_submit_btn" value="Send" />
    </form>
</div>
<?php 
    if(isset($_POST['form_submit_btn'])){
        send_conact_form_email();
    }
?>