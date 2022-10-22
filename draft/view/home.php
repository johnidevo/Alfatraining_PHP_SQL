<?php

#set html content variable
#set data variable for javascript if needed
#

global $sPage;
$sPage = '';


$sPage .= '<nav class="shadow">
	<div class="container">
		<img alt="Suiteziel" id="logo" src="public/suiteziel_ug.svg">
		<h2>Suite & Ziel <small>Charts</small></h2>
	</div>
</nav>';

$sPage .= '<main>
	<div class="container">
		<div id="sidebar">
			<div id="settings"></div>
		</div>
		<div id="content">
		</div>
	</div>
</main>';


function home_init()
{
	global $sPage;
	return true;
}


?>
