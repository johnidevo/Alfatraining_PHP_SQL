<?php

#set html content variable
#set data variable for javascript if needed
#

global $aPage;
$aPage = array();
$aPage['content'] = $aPage['planer'] = '';

$aPage['title'] = 'Terminplaner';


$aTableWeekDays = array('Mon.','Tue.','Wed.','Thu.','Fri.','Sat.','Sun.');
$sTableHeaderContent = array();
foreach($aTableWeekDays as $s) array_push($sTableHeaderContent, '<th>'. $s .'</th>');

$aPage['planer'] .= '<table>';
$aPage['planer'] .= '<thead><tr>'. implode('', $sTableHeaderContent) .'</tr></thead>';

$iDateNow = date('w');
$iDatePrev = date('w', strtotime(date('Y-m-1', time())));
$iDateNext = date('w', strtotime(date('Y-m-t', time())));

$iDatePrevTable = date('Y-m-d', strtotime(date('Y-m-1', time()) .' - '. $iDatePrev .' days')); //<<
$iDateNextTable = date('Y-m-d', strtotime(date('Y-m-t', time()) .' + '. $iDateNext .' days')); //<<

echo '<pre>';
#var_dump(['$iDateNow', date('w'), '$iDatePrev', date('Y-m-t', time()), '$iDateNext', date('Y-m-01 H:i:s')]);
var_dump(['$iDatePrevTable', $iDatePrevTable, '$iDateNextTable', $iDateNextTable]);
var_dump(['$iDateNow', $iDateNow, '$iDatePrev', $iDatePrev, '$iDateNext', $iDateNext]);

echo '</pre>';


#for ($i = date('w'); ){}
	
/*
<thead>
<tr>
<th>Month</th>
<th>Savings</th>
</tr>
</thead>
	
<tbody>
<tr>
<td>January</td>
<td>$100</td>
</tr>
	
</tbody>
	
<tfoot>
<tr>
<td>Sum</td>
<td>$180</td>
</tr>
</tfoot>
*/
	
$aPage['planer'] .= '</table>';






/*
10 P	3. Daten anzeigen: Erstellen Sie einen รถffentlichen Bereich 
		mit einer Anzeige.		
*/
$aPage['content'] .= '<main>
	<div class="container">
		<div id="content">
			<h3>Terminplaner</h3>
			<hr></br>
			'. $aPage['planer'] .'
		</div>
		<div id="sidebar">
		
			<h3></h3>
		</div>
	</div>
</main>';


function planer_init()
{
	#global $sPage;
	return true;
}


?>
