<?php

#set html content variable
#set data variable for javascript if needed
#

global $aPage;
$aPage = array();
$aPage['content'] = $aPage['script'] = '';

$aPage['title'] = 'Redirect';

$aPage['content'] .= '<main>
	<div class="container">
		<div id="sidebar">
		</div>
		<div id="content">
			<h3>Redirect</h3>
			<hr></br>
		</div>
	</div>
</main>';

$aPage['content'] .= '<script type="text/javascript">
	window.location = "'. $_SESSION['redirect'] .'"
</script>';

#$aPage['script'] .= 'var router = {redirect: "?page='. $_SESSION['redirect'] .'"};'. PHP_EOL;
#$aPage['script'] .= 'console.log(router.redirect);';
$_SESSION['redirect'] = '';

function redirect_init()
{
	global $aRouter;
	var_dump(array('$_SESSION', $_SESSION));
	unset($_SESSION['redirect']);
	return true;
}


?>
