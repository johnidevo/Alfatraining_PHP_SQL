<?php

#set html content variable
#set data variable for javascript if needed
#

global $aPage;
$aPage = array();
$aPage['content'] = '';

$aPage['title'] = 'Login';

/*
10 p	4. Login: Erstellen Sie einen Loginformular zum einloggen 
		für einen internen Bereich (inkl. Logout).
*/
$aPage['content'] .= '<main>
	<div class="container">
		<div id="sidebar">
		
		</div>
		<div id="content">
			<h3>Login</h3>
			<hr><br/>
			<form action="?page=login" method="post">
				<label for="password">Benutzer:</label> 
				<input type="text" name="username" value="John"/>
				<label for="password">Passwort:</label> 
				<input type="password" name="password" value="muster"/>
				<br/>
				<input type="checkbox" name="merken" value="ja" /> Angemeldet bleiben
				<br/>
				<button type="submit">Anmeldung</button>
			</form>
		</div>
	</div>
</main>';


function login_init()
{
	#global $sPage;
	return true;
}


?>
