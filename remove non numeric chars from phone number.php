<?php 
/* Remove non-numeric characters from a string. */
$string_number = $data['header_number'];
$strNumeric = preg_replace('/\D/', '', $string_number);
?>
<a href="tel:<?php echo $strNumeric; ?>"><?php $data['header_number']; ?></a>
?>