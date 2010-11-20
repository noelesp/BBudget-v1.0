<?php include 'auth.php'; ?>
<?PHP

//**********************************************************************************//
//		WRITTEN BY NOEL ESPINALES (C) 2010
//
//		FUNCTIONS TO CALCULATE TOTALS
//
//
//**********************************************************************************


//************************************************************
//               RETURN TOTAL INCOME GIVEN MONTH AND YEAR
//
//*******************************************************

function yearIncomeTotal($sMonth, $sYear)
{
include 'config.php';
include 'opendb.php';
$sqlYearMonthTotal = "SELECT *  FROM `bbudget_inc` WHERE `transaction` LIKE 'Ingreso - Ofrenda Semanal' AND `date` LIKE '$sMonth-%-$sYear'";

$prevYearMonthlyTotal = mysql_query($sqlYearMonthTotal);

while ($rowMonthly = mysql_fetch_array($prevYearMonthlyTotal)) 
{

$yearTotalIncome = $yearTotalIncome + $rowMonthly[5];

} 

mysql_close($conn);


return $yearTotalIncome;

}


//************************************************************
//               RETURN TOTAL EXPENSES GIVEN MONTH AND YEAR
//
//***********************************************************

function yearExpenseTotal($sMonth, $sYear)

{
include 'config.php';
include 'opendb.php';
$sqlYearMonthTotal = "SELECT *  FROM `bbudget_ex` WHERE `date` LIKE '$sMonth-%-$sYear'";

$prevYearMonthlyTotal = mysql_query($sqlYearMonthTotal);

while ($rowMonthly = mysql_fetch_array($prevYearMonthlyTotal)) 
{

$yearTotalExpense = $yearTotalExpense + $rowMonthly[5];

} 

mysql_close($conn);



return $yearTotalExpense;


}


//*****************************************************
//               RETURN TOTAL INCOME FOR FISCAL YEAR
//
//****************************************************

function YTDIncomeTotal()
{
//Set Current Year
	$year = date("Y");
	for ($counter = 0; $counter <=11; $counter +=1)

	{
		$x = $x + 1;
		$YTDIncome = $YTDIncome + yearIncomeTotal($x, $year);
	}

return $YTDIncome;

}


//*****************************************************
//               RETURN TOTAL EXPENSES FOR FISCAL YEAR
//
//****************************************************

function YTDExpenseTotal()

{
//Set Current Year
	$year = date("Y");
	for ($counter = 0; $counter <=11; $counter +=1)

	{
		$x = $x + 1;
		$YTDExpense = $YTDExpense + yearExpenseTotal($x, $year);
	}

return $YTDExpense;

}


function yearMissionTotal()

{
include 'config.php';
include 'opendb.php';

$year = date("Y");


$sqlMission = "SELECT *  FROM `bbudget_inc` WHERE `transaction` LIKE 'Ingreso - Misiones'  AND  `date` LIKE '%-%-$year'";

$yearMissionTotal = mysql_query($sqlMission);

while ($rowMission = mysql_fetch_array($yearMissionTotal)) 
{

$yearMissionsTotal = $yearMissionsTotal + $rowMission[5];

} 

mysql_close($conn);



return $yearMissionsTotal;


}

// QUERY TO RETURN TOTAL FOR A GIVEN DATE


function querySearch($sQuery, $sDay, $sMonth, $sYear, $sDB)

{

include 'config.php';
include 'opendb.php';

if ($sDB = "ad")
{
$sql = "SELECT *  FROM `bbudget_inc` WHERE `transaction` LIKE '$sQuery'  AND  `date` LIKE '$sDay-$sMonth-$year'";


}elseif ($sDB = "ex")
{
$sql = "SELECT *  FROM `bbudget_ex` WHERE `transaction` LIKE '$sQuery'  AND  `date` LIKE '$sDay-$sMonth-$year'";


}

$myQuery = mysql_query($sql);

while ($row = mysql_fetch_array($myQuery)) 
{

$queryTotal = $queryTotal + $row[5];

} 
mysql_close($conn);

return $queryTotal;

}





?>
