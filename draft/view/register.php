<?php

#set html content variable
#set data variable for javascript if needed
#

global $aPage;
$aPage = array();
$aPage['content'] = '';

$aPage['title'] = 'Register';

$aPage['content'] .= '
	<div id="sidebar">

	</div>
	<div id="content">
		<h3>Register</h3>
		<hr></br>
		<form action="?page=register" method="post">
			<label for="password">Benutzer:</label> 
			<input type="text" name="username" value="John"/>
			<label for="password">Passwort:</label> 
			<input type="password" name="password" value="muster"/>
			<label for="password">Repeat Passwort:</label> 
			<input type="password" name="password" value="muster"/>
			<br />
			<input type="checkbox" name="merken" value="ja" /> Ich akzeptiere die AGBs
			<br />
			<button type="submit">Registrieren</button>
		</form>
	</div>
';


function register_init()
{
	return true;
}


?>
