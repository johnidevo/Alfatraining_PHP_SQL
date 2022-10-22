<?php


#set html content variable
#set data variable for javascript

global $sContent;
$sContent = '';

$sContent .= '<nav class="shadow">
	<div class="container">
		<img alt="Suiteziel" id="logo" src="assets/suiteziel_ug.svg">
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
	print $sContent;
	return true;
}


?>
