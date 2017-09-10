<?php 
function my_mce4_options( $init ) {
$default_colours = '
	"000000", "Black",
	"993300", "Burnt orange",
	"333300", "Dark olive",
	"003300", "Dark green",
	"003366", "Dark azure",
	"000080", "Navy Blue",
	"333399", "Indigo",
	"333333", "Very dark gray",
	"800000", "Maroon",
	"FF6600", "Orange",
	"808000", "Olive",
	"008000", "Green",
	"008080", "Teal",
	"0000FF", "Blue",
	"666699", "Grayish blue",
	"808080", "Gray",
	"FF0000", "Red",
	"FF9900", "Amber",
	"99CC00", "Yellow green",
	"339966", "Sea green",
	"33CCCC", "Turquoise",
	"3366FF", "Royal blue",
	"800080", "Purple",
	"999999", "Medium gray",
	"FF00FF", "Magenta",
	"FFCC00", "Gold",
	"FFFF00", "Yellow",
	"00FF00", "Lime",
	"00FFFF", "Aqua",
	"00CCFF", "Sky blue",
	"993366", "Brown",
	"C0C0C0", "Silver",
	"FF99CC", "Pink",
	"FFCC99", "Peach",
	"FFFF99", "Light yellow",
	"CCFFCC", "Pale green",
	"CCFFFF", "Pale cyan",
	"99CCFF", "Light sky blue",
	"CC99FF", "Plum",
	"FFFFFF", "White"
	';
/*$default_colours = '
    "000000", "Black",        "993300", "Burnt orange", "333300", "Dark olive",   "003300", "Dark green",   "003366", "Dark azure",   "000080", "Navy Blue",      "333399", "Indigo",       "333333", "Very dark gray",
    "800000", "Maroon",       "FF6600", "Orange",       "808000", "Olive",        "008000", "Green",        "008080", "Teal",         "0000FF", "Blue",           "666699", "Grayish blue", "808080", "Gray",
    "FF0000", "Red",          "FF9900", "Amber",        "99CC00", "Yellow green", "339966", "Sea green",    "33CCCC", "Turquoise",    "3366FF", "Royal blue",     "800080", "Purple",       "999999", "Medium gray",
    "FF00FF", "Magenta",      "FFCC00", "Gold",         "FFFF00", "Yellow",       "00FF00", "Lime",         "00FFFF", "Aqua",         "00CCFF", "Sky blue",       "993366", "Brown",        "C0C0C0", "Silver",
    "FF99CC", "Pink",         "FFCC99", "Peach",        "FFFF99", "Light yellow", "CCFFCC", "Pale green",   "CCFFFF", "Pale cyan",    "99CCFF", "Light sky blue", "CC99FF", "Plum",         "FFFFFF", "White"
';*/
$custom_colours = '
	"e14d43", "Color 1 Name",
	"d83131", "Color 2 Name",
	"ed1c24", "Color 3 Name",
	"f99b1c", "Color 4 Name",
	"50b848", "Color 5 Name",
	"00a859", "Color 6 Name",
	"00aae7", "Color 7 Name",
	"282828", "Color 8 Name"
	';
$init['textcolor_map'] = '['.$default_colours.','.$custom_colours.']';
$init['textcolor_rows'] = 6; // expand colour grid to 6 rows
return $init;
}
add_filter('tiny_mce_before_init', 'my_mce4_options');