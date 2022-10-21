<?php
global $aPicsum;


if (!get_picsum_list()) print 'Error: get_picsum_list() function';
var_dump($aPicsum);

var_dump(array(
	__FILE__,
	#PUBLIC
));

?>
