<?php

#set html content variable
#set data variable for javascript if needed
#

global $sPage;
$sPage = '';


$sPage .= '<nav class="shadow">
	<div class="container">
		<h2>Suite & Ziel <small>Charts</small></h2>
	</div>
</nav>';

$sPage .= '<main>
	<div class="container">
		<div id="sidebar">
			<div id="settings"></div>
		</div>
		<div id="content">
			<div id="cover"></div>
		</div>
	</div>
</main>';


function home_init()
{
	global $sPage;
	return true;
}


?>
