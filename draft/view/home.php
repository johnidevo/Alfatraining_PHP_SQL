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


#$aWidget['script'] .= '<script>'. file_get_contents(DRAFT .'static/'. $aRouter['page'] .'.js') .'</script>';

/*
function home_init()
{
	global $sPage;
	var_dump('home_init');
	return true;
}
*/

?>
