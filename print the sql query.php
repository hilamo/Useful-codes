<?php 
/** print the sql query that the wordpress generates */
//this is an example of query:
query_posts($query_string . '&order=ASC&meta_key=wpcf-event_dates&orderby=meta_value_num');

global $wp_query; 
print_r("<p>REQUEST:$wp_query->request</p>");

?>