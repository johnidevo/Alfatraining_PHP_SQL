<?php

#set html content variable
#set data variable for javascript if needed
#

global $aPage;
$aPage = array();
$aPage['content'] = $aPage['script'] = '';

$aPage['title'] = 'Dashboard';

/*
10 P	5. Daten bearbeiten: Erstellen Sie einen internen Bereich 
		mit einer Anzeige der Verwaltungsübersicht inkl. Sortierung der Daten.	
*/
$aPage['content'] .= '
	<div id="sidebar">
	</div>
	<div id="content">
		<h3>Dashboard</h3>
		<hr></br>
	</div>
';

function dashboard_init()
{
	global $aRouter;
	return true;
}


?>
