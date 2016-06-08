<?php 
/** This is the style

ul.top_tabs{
  position: relative;
  display: inline-block;
  width: 100%;  
}
ul.top_tabs li{
    float: right;
    margin-right: 20px;
}
ul.top_tabs li:first-child{
    margin-right: 0;
}
.tabs_content_holder .tab_content{
    display: none;
}
.tabs_content_holder .tab_content.active_content{
    display: block;
}

*/
?>
<ul class="top_tabs">
     <li class="active"><a href="#tab_1" class="tab_head">Title - Tab 1</a></li>
     <li><a href="#tab_2" class="tab_head">Title - Tab 2</a></li>
     <li><a href="#tab_3" class="tab_head">Title - Tab 3</a></li>
</ul>

<div class="tabs_content_holder">
    <div id="tab_1" class="tab_content active_content">here will be some content</div>
    <div id="tab_2" class="tab_content">content of tab number 02</div>
    <div id="tab_3" class="tab_content">another content for tab number 03, another content for tab number 03</div>
</div>


<script>
    jQuery(document).ready(function(){
       jQuery('.top_tabs li a').click(function(e){
            e.preventDefault();
            var id = jQuery(this).attr('href');
            jQuery('ul.top_tabs .active').removeClass('active');
            jQuery('.tabs_content_holder .tab_content.active_content').removeClass('active_content');
            jQuery(id).addClass('active_content');
            jQuery(this).parent().addClass('active');
       }); 
    });
</script>