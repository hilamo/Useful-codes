<?php 
/** This is the style

ul.top_tabs{
	position: relative;
    display: inline-block;
    width: 100%;
    list-style: none;
    margin-bottom: 0;
    padding: 0;
}
.tabs_content_holder {
	position: relative;
    display: block;
    min-height: 100px;
    padding: 10px;
    border: 1px solid #000;
    border-top: 0;
}
ul.top_tabs li{
	position: relative;
    display: inline-block;
    float: right;
    margin-right: 5px;
}
ul.top_tabs li a{
	position: relative;
    display: block;
	color: #4a4848;
	padding: 10px;
    border: 1px solid #000;
}
ul.top_tabs li a:hover,
ul.top_tabs li a:focus{
	text-decoration: none;
}
ul.top_tabs li.active a{
	border-bottom: 0;
	color: #0f7bec;
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
    <div id="tab_1" class="tab_content active_content">
        here will be some content
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    </div>
    <div id="tab_2" class="tab_content">
        content of tab number 02
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </div>
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
