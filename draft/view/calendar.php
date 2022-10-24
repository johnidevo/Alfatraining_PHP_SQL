<?php

#set html content variable
#set data variable for javascript if needed
#

global $aPage;
$aPage = array();
$aPage['content'] = $aPage['script'] = '';

$aPage['title'] = 'Calendar';

$aPage['content'] .= '
	<div id="sidebar">
	</div>
	<div id="content">
		<h3>Calendar</h3>
		<hr></br>
	</div>
';

function calendar_init()
{
	global $aRouter;
	return true;
}


?>
