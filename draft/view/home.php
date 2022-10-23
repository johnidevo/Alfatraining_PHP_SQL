<?php

#set html content variable
#set data variable for javascript if needed
#

global $aPage;
$aPage = array();
$aPage['content'] = '';

$aPage['title'] = 'Home';

/*
10 P	3. Daten anzeigen: Erstellen Sie einen öffentlichen Bereich 
		mit einer Anzeige.		
*/
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
