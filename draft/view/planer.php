<?php

#set html content variable
#set data variable for javascript if needed
#

global $aRouter, $aPage, $aScheduler;
$aPage = array();
$aPage['content'] = $aPage['planer_content'] = $aPage['planer_sidebar'] = '';
$aPage['title'] = 'Terminplaner';

# uri
if (!isset($aRouter['month'])) $sUserSelection = time();
else $sUserSelection = strtotime($aRouter['month'] .'01 12:00:00');

# content
$aTableWeekDays = array('Mon.','Tue.','Wed.','Thu.','Fri.','Sat.','Sun.');
$sTableHeaderContent = array();
foreach($aTableWeekDays as $s) array_push($sTableHeaderContent, '<th>'. $s .'</th>');
$iDateNow = date('w');
$iDatePrev = date('w', strtotime(date('Y-m-1', $sUserSelection))) - 1;
$iDateNext = 7 - date('w', strtotime(date('Y-m-t', $sUserSelection)));
$iDatePrevTable = strtotime(date('Y-m-1', $sUserSelection) .' - '. $iDatePrev .' days'); //
$iDateNextTable = strtotime(date('Y-m-t', $sUserSelection) .' + '. $iDateNext .' days'); //<<

# table header
$aPage['planer_content'] .= '<table>';
$aPage['planer_content'] .= '<thead><tr><th colspan="7">'. date('F Y', $sUserSelection) .'</th></tr>';
$aPage['planer_content'] .= '<tr>'. implode('', $sTableHeaderContent) .'</tr></thead>';
$aPage['planer_content'] .= '<tbody>';
$sField = $sChecked = '';
for ($i = $iDatePrevTable, $k=0; $i <= $iDateNextTable; $i = $i + (24*60*60), $k++)
{
	if (isset($aScheduler['update']))
	if (date('Y-m-d', $aScheduler['update']['date']) == date('Y-m-d', $i)) $sChecked = 'checked';
	if (date('Ym', time()) == date('Ym', $i)) 
		$sField .= '<td><b>'. html_planer_radio_day(date('d', $i), $i, $sChecked) .'</b></td>';
	else 
		$sField .= '<td>'. html_planer_radio_day(date('d', $i), $i, $sChecked) .'</td>';
	$sChecked = '';
	if ($k == 6){
		$k = -1;
		$aPage['planer_content'] .= '<tr>'. $sField .'</tr>';
		$sField = '';
	}
}

# table footer
if (!isset($aRouter['month'])) $sLinkFootDate = time();
else $sLinkFootDate = strtotime($aRouter['month'] .'01 12:00:00');
$sMonthPrev = strtotime(date('Y-m-d 12:00:00', $sLinkFootDate) .' - 1 Month');
$sMonthNext = strtotime(date('Y-m-d 12:00:00', $sLinkFootDate) .' + 1 Month');
$aMonthPrev = $aRouter;
$aMonthPrev['month'] = date('Ym', $sMonthPrev);
$aMonthNext = $aRouter;
$aMonthNext['month'] = date('Ym', $sMonthNext);
$aPage['planer_content'] .= '<tfoot><tr>';
$aPage['planer_content'] .= '<td colspan="2">';
$aPage['planer_content'] .= '<button><a href="/?'. http_build_query($aMonthPrev) .'">'. date('F', $sMonthPrev) .'</a></button>';
$aPage['planer_content'] .= '</td>';
$aPage['planer_content'] .= '<td colspan="3"></td>';
$aPage['planer_content'] .= '<td colspan="2">';
$aPage['planer_content'] .= '<button><a href="/?'. http_build_query($aMonthNext) .'">'. date('F', $sMonthNext) .'</a></button>';
$aPage['planer_content'] .= '</td>';
$aPage['planer_content'] .= '</tr></tfoot>';
$aPage['planer_content'] .= '</tbody>';
$aPage['planer_content'] .= '</table>';

# sidebar
$aPage['planer_sidebar'] .= '<table><thead><tr><td>Besprechungsstunde</td></tr></thead>';
$aPage['planer_content'] .= '<tbody>';
$sChecked = '';
for ($i = 9; $i <= 15; $i++)
{
	if (isset($aScheduler['update']))
	if (date('G', $aScheduler['update']['date']) == $i) $sChecked = 'checked';
	$sField .= '<td>'. html_planer_radio_hour($i, $sChecked) .'</b></td>';
	$aPage['planer_sidebar'] .= '<tr>'. $sField .'</tr>';
	$sField = $sChecked = '';
}
if (isset($aScheduler['update'])) $sSubmitValue = 'Aktualisieren';
else $sSubmitValue = 'Einreichen';
$aCancel = $aRouter;
if (isset($aCancel['id'])) unset($aCancel['id']);
if (isset($aScheduler['update'])) $sSubmitCancel = '<a href="/?'. http_build_query($aCancel) .'">Abbrechen</a>';
else $sSubmitCancel = '';
$aDelete = $aRouter;
if (isset($aDelete['id'])) unset($aDelete['id']);
if (isset($aRouter['id'])) $aDelete['delete'] = $aRouter['id'];
if (isset($aDelete['delete'])) $sSubmitDelete = '<a href="/?'. http_build_query($aDelete) .'">Löschen</a>';
else $sSubmitDelete = '';
$aPage['planer_content'] .= '</tbody>';
$aPage['planer_sidebar'] .= '<tfoot><tr><td>';
$aPage['planer_sidebar'] .= '<input type="submit" value="'. $sSubmitValue .'">' .PHP_EOL;
$aPage['planer_sidebar'] .= $sSubmitCancel .PHP_EOL;
$aPage['planer_sidebar'] .= $sSubmitDelete .PHP_EOL;
$aPage['planer_sidebar'] .= '</td></tr></tfoot>';
$aPage['planer_sidebar'] .= '</table>';

/*
10 P	3. Daten anzeigen: Erstellen Sie einen รถffentlichen Bereich 
		mit einer Anzeige.		
15 P	6. Daten einfügen: Erstellen Sie ein Formular zum Erstellen 
		von neuen Terminen und speichern Sie den Termin in der Datenbank.		
*/
if (isset($aRouter['id'])) unset($aRouter['id']);
$aPage['content'] .= '
	<form action="/?'. http_build_query($aRouter) .'" method="post">
		<div id="content">
			<h3>Terminplaner</h3>
			<hr></br>
			'. $aPage['planer_content'] .'
		</div>
		<div id="sidebar">
			<h3>Stunden auswählen</h3>
			<hr></br>
			'. $aPage['planer_sidebar'] .'
		</div>
	</form>
';

function html_planer_radio_day($sName, $iValue, $sChecked = ''){
	return '<label for="date_'. $sName .'">'. $sName .'</label>
	<input type="radio" name="date_planer" value="'. $iValue .'" id="date_'. $sName .'" '. $sChecked .'/>';
}

function html_planer_radio_hour($i, $sChecked = ''){
	return '<input type="radio" name="hour_planer" value="'. str_pad($i, 2, 0, STR_PAD_LEFT) .':00:00" id="hour_'. $i .'" '. $sChecked .' />
	<label for="hour_'. $i .'">'. str_pad($i, 2, 0, STR_PAD_LEFT) .':00</label>';
}

function planer_init()
{
	global $sPage;
	return true;
}

?>
