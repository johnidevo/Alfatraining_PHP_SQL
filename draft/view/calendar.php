<?php

#set html content variable
#set data variable for javascript if needed
#

global $aPage, $aRouter, $aResults;
$aPage = array();
$aPage['content'] = $aPage['script'] = '';
$aPage['title'] = 'Suche';

if (isset($aRouter['date'])) $iDateCurrentMonth = date('n', $aRouter['date'] .'01 12:00:00');
else $iDateCurrentMonth = date('n', time());
$aSelectOptions = array();
for ($i = $iDateCurrentMonth, $j = 0; $j <= 12; $i++, $j++)
{
	if ($j == 0) $iSelectYear = (int) date('Y', time());
	$iSelectMonth = str_pad($i, 2, 0, STR_PAD_LEFT);
	$sSelectMonth = date('F', strtotime($iSelectYear .'-'. str_pad($i, 2, 0, STR_PAD_LEFT) .'-01') );
	if ($i == 12) $i = 0; 
	if ($i == 1) $iSelectYear = $iSelectYear + 1;
	if ($aRouter['date'] == $iSelectYear.$iSelectMonth) $sSelected = 'selected';
	else $sSelected = '';
	$sOption = '<option value="'. $iSelectYear.$iSelectMonth .'" '. $sSelected .'>'. $iSelectYear .' - '. $sSelectMonth .'</option>';
	array_push($aSelectOptions, $sOption);
}


/* Content */
$aTableWeekDays = array('Mon.','Tue.','Wed.','Thu.','Fri.','Sat.','Sun.');
$sTableHeaderContent = array();
foreach($aTableWeekDays as $s) array_push($sTableHeaderContent, '<th>'. $s .'</th>');

$iDateNow = date('w');
$iDatePrev = date('w', strtotime(date('Y-m-1', time()))) - 1;
$iDateNext = 7 - date('w', strtotime(date('Y-m-t', time())));

$iDatePrevTable = strtotime(date('Y-m-1', time()) .' - '. $iDatePrev .' days'); //
$iDateNextTable = strtotime(date('Y-m-t', time()) .' + '. $iDateNext .' days'); //<<

$aPage['calendar_content'] .= '<table>';
$aPage['calendar_content'] .= '<thead>';
$aPage['calendar_content'] .= '<tr><th colspan="3">';
$aPage['calendar_content'] .= '<label for="suche_date">Wählen einen Monat aus:</label>';
$aPage['calendar_content'] .= '<select name="date">'. implode('', $aSelectOptions) .'</select>';
$aPage['calendar_content'] .= '</th>';
$aPage['calendar_content'] .= '<th colspan="4">';
$aPage['calendar_content'] .= '<br/>';
$aPage['calendar_content'] .= '<input type="submit" value="Vorlegen" />';
$aPage['calendar_content'] .= '</th></tr>';
$aPage['calendar_content'] .= '<tr><th colspan="7">'. date('F', time()) .'</th></tr>';
$aPage['calendar_content'] .= '<tr>'. implode('', $sTableHeaderContent) .'</tr></thead>';
$aPage['calendar_content'] .= '<tbody>';

$sField = $sChecked = '';
for ($i = $iDatePrevTable, $k=0; $i <= $iDateNextTable; $i = $i + 86400, $k++)
{
	if (isset($aScheduler['update']))
	if (date('Y-m-d', $aScheduler['update']['date']) == date('Y-m-d', $i)) $sChecked = 'checked';
	if (date('Ym', time()) == date('Ym', $i)) 
		$sField .= '<td><b>'. html_planer_radio_day(date('d', $i), $i, $sChecked) .'</b></td>';
	else 
		$sField .= '<td>'. html_planer_radio_day(date('d', $i), $i, $sChecked) .'</b></td>';
	$sChecked = '';
	if ($k == 6){
		$k = -1;
		$aPage['calendar_content'] .= '<tr>'. $sField .'</tr>';
		$sField = '';
	}
}

$aPage['calendar_content'] .= '<tfoot><tr><td colspan="1">';
$aPage['calendar_content'] .= '' .PHP_EOL;
$aPage['calendar_content'] .= '</td><td colspan="5"></td><td colspan="1">';
$aPage['calendar_content'] .= '' .PHP_EOL;
$aPage['calendar_content'] .= '</td></tr></tfoot>';

$aPage['calendar_content'] .= '</tbody>';
$aPage['calendar_content'] .= '</table>';

#
$aPage['content'] .= '
	<div id="sidebar">
	</div>
	<div id="content">
		<h3>Suche</h3>
		<hr></br>
		<form action="/?'. http_build_query($aRouter) .'" method="post">
			'. $aPage['calendar_content'] .'
		</form>
	</div>
';

#var_dump($aResults);

function html_planer_radio_day($sName, $iValue, $sChecked = ''){
	return '<label for="date_'. $sName .'">'. $sName .'</label>';
}

function calendar_init()
{
	global $aRouter;
	return true;
}


?>
