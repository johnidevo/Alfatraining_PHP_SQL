<?php

#set html content variable
#set data variable for javascript if needed
#

global $aPage;
$aPage = array();
$aPage['content'] = '';

$aPage['title'] = 'Home';

$aPage['content'] .= '<main>
	<div class="container">
		<div id="sidebar">
		
		</div>
		<div id="content">
			<h2>Main</h2>
		</div>
	</div>
</main>';


function home_init()
{
	#global $sPage;
	return true;
}


?>
