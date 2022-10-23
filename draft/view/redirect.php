<?php

#set html content variable
#set data variable for javascript if needed
#

global $aPage;
$aPage = array();
$aPage['content'] = $aPage['script'] = '';

$aPage['title'] = 'Redirect';

$aPage['content'] .= '<main>
	<div class="container">
		<div id="sidebar" class="redirect-sidebar">
		</div>
		<div id="content">
			<h3>Redirect</h3>
			<hr></br>
		</div>
	</div>
</main>';

$aPage['script'] = 'window.location.href = "?page=dashboard";';
	
function redirect_init()
{
	global $aRouter;
	return true;
}


?>