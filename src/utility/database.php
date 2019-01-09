<?php

function getStatistics( $type )
{
	$mysqli = new mysqli( 'localhost', 'religiv3_admin', '1corinthians3:9', 'religiv3_overflow' );

    $actualTable = getActualTable( $type );
    $infoTable = getInfoTable( $type );
    $testTable = getTestTable( $type );
    $userTable = getUserTable( $type );
	$sql = "SELECT
              $userTable.groupId as of_group,
              $testTable.groupId as on_group,
              $infoTable.name as of_name,
              $actualTable.userCount as of_count,
              COUNT(*) as test_count,
              AVG($testTable.percentCorrect) as user_avg,
              (SELECT name FROM $infoTable WHERE $infoTable.groupId = $testTable.groupId LIMIT 1) as on_name
            FROM $testTable
              JOIN $userTable     ON $testTable.userId =  $userTable.userId
              JOIN $infoTable     ON $userTable.groupId = $infoTable.groupId
              JOIN $actualTable   ON $userTable.groupId = $actualTable.groupId
            GROUP BY of_group, on_group";
	return $mysqli->query( $sql );
}

function getActuals( $type, $group )
{
	$mysqli = new mysqli( 'localhost', 'religiv3_admin', '1corinthians3:9', 'religiv3_overflow' );
	
	$userActuals = "none";
	$actualTable = getActualTable( $type );
    $sql = "SELECT ans1, ans2, ans3, ans4, ans5, ans6, ans7, ans8, ans9, ans10 FROM $actualTable WHERE groupId = '$group'";

	$result = $mysqli->query( $sql );
	if ( $result && $result->num_rows > 0 )
	{
		$row = $result->fetch_assoc();
		$userActuals = combineAnswers( $row );
	}

	return $userActuals;
}

function getPersonal( $userId, $type )
{
	return json_encode([
	    "answers" => getPersonalAnswers( $userId, $type ),
	    "groupId" => getPersonalGroup( $userId, $type ),
	    "acceptsEmails" => getPersonalAcceptsEmails( $userId, $type )
    ]);
}

function getPersonalAnswers( $userId, $type )
{
	$mysqli = new mysqli( 'localhost', 'religiv3_admin', '1corinthians3:9', 'religiv3_overflow' );

    $userAnswers = "none";
    $userTable = getUserTable( $type );
	$sql = "SELECT ans1, ans2, ans3, ans4, ans5, ans6, ans7, ans8, ans9, ans10 FROM $userTable WHERE userId = '$userId'";

	$result = $mysqli->query( $sql );
	if ( $result && $result->num_rows > 0 )
	{
		$row = $result->fetch_assoc();
		$userAnswers = combineAnswers( $row );
	}

	return $userAnswers;
}

function getPersonalGroup( $userId, $type )
{
	$mysqli = new mysqli( 'localhost', 'religiv3_admin', '1corinthians3:9', 'religiv3_overflow' );

    $group = "";
    $userTable = getUserTable( $type );
	$sql = "SELECT groupId FROM $userTable WHERE userId = '$userId'";

	$result = $mysqli->query( $sql );
	if ( $result && $result->num_rows > 0 )
	{
		$row = $result->fetch_assoc();
		$group = $row['groupId'];
	}

	return $group;
}

function getPersonalAcceptsEmails( $userId, $type )
{
	$mysqli = new mysqli( 'localhost', 'religiv3_admin', '1corinthians3:9', 'religiv3_overflow' );

    $acceptsEmails = false;
    $userTable = getUserTable( $type );
	$sql = "SELECT acceptsEmails FROM $userTable WHERE userId = '$userId'";

	$result = $mysqli->query( $sql );
	if ( $result && $result->num_rows > 0 && $result->fetch_assoc()['acceptsEmails'] <> NULL )
	{
		$acceptsEmails = true;
	}

	return $acceptsEmails;
}

function savePersonalTest( $userId, $type, $groupChoice, $answers, $acceptsEmails )
{
	$mysqli = new mysqli( 'localhost', 'religiv3_admin', '1corinthians3:9', 'religiv3_overflow' );

	$userTable = getUserTable( $type );
	$answerArray = splitAnswers( $answers );
    $sql = "REPLACE INTO $userTable (
    		   userId,
    		   groupId,
    		   acceptsEmails,
    		   ans1, 
    		   ans2, 
    		   ans3, 
    		   ans4, 
    		   ans5, 
    		   ans6, 
    		   ans7, 
    		   ans8, 
    		   ans9, 
    		   ans10 )
            VALUES ( 
               '$userId', 
               '$groupChoice', 
               '$acceptsEmails', 
               '$answerArray[0]', 
               '$answerArray[1]', 
               '$answerArray[2]', 
               '$answerArray[3]', 
               '$answerArray[4]', 
               '$answerArray[5]', 
               '$answerArray[6]', 
               '$answerArray[7]', 
               '$answerArray[8]', 
               '$answerArray[9]'
            )";

	$mysqli->query( $sql );

	return "true";
}

function saveGroupTest( $userId, $type, $groupId, $answers, $percentCorrect )
{
	$mysqli = new mysqli( 'localhost', 'religiv3_admin', '1corinthians3:9', 'religiv3_overflow' );

	$testTable = getTestTable( $type );
	$answerArray = splitAnswers( $answers );
	$sql = "REPLACE INTO $testTable (
               userId,
               groupId,
               percentCorrect,
               ans1, 
               ans2, 
               ans3, 
               ans4, 
               ans5, 
               ans6, 
               ans7, 
               ans8, 
               ans9, 
               ans10 )
            VALUES ( 
               '$userId', 
               '$groupId', 
               '$percentCorrect', 
               '$answerArray[0]', 
               '$answerArray[1]', 
               '$answerArray[2]', 
               '$answerArray[3]', 
               '$answerArray[4]', 
               '$answerArray[5]', 
               '$answerArray[6]', 
               '$answerArray[7]', 
               '$answerArray[8]', 
               '$answerArray[9]'
            )";

	$mysqli->query( $sql );

	return "true";
}

function splitAnswers( $answers )
{
	return str_split( $answers );
}

function combineAnswers( $row )
{
	return implode( $row );
}

function getUserTable( $type )
{
	return $type . "_users";
}

function getTestTable( $type )
{
	return $type . "_tests";
}

function getActualTable( $type )
{
	return $type . "_actuals";
}

function getInfoTable( $type )
{
	return $type . "_info";
}

if ( isset( $_POST['action'] ) && function_exists( $_POST['action'] ) )
{
	$action = $_POST['action'];
    $result = null;

	if ( isset( $_POST['userId'] ) && isset( $_POST['type'] ) )
	{
		$result = $action( $_POST['userId'], $_POST['type'] );
	}
	else
	{
		$result = $action();
	}

	echo $result;
}

?>