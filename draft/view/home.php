<?php

#set html content variable
#set data variable for javascript if needed
#

global $sContent;
$sContent = '';


$sContent .= '<nav class="shadow">
	<div class="container">
		<h2>Suite & Ziel <small>Charts</small></h2>
	</div>
</nav>';

$sContent .= '<main>
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
	global $sContent;
	var_dump('home_init');
	return true;
}


?>
