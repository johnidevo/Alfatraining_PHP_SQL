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
			<h3>Home</h3>
			<hr></br>
		</div>
	</div>
</main>';


function home_init()
{
	#global $sPage;
	return true;
}


?>
