<?php

#set html content variable
#set data variable for javascript if needed
#

global $aPage;
$aPage = array();
$aPage['content'] = $aPage['script'] = '';

$aPage['title'] = 'Dashboard';

$aPage['content'] .= '<main>
	<div class="container">
		<div id="sidebar">
		</div>
		<div id="content">
			<h3>Dashboard</h3>
			<hr></br>
		</div>
	</div>
</main>';

function dashboard_init()
{
	global $aRouter;
	return true;
}


?>
