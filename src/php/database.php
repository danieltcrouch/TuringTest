<?php

function getStatistics( $type )
{
	$mysqli = new mysqli( 'localhost', 'religiv3_admin', '1corinthians3:9', 'religiv3_turing' );

    $resultTable = getResultTable( $type );
    $metaTable = getMetaTable( $type );
    $testTable = getTestTable( $type );
    $userTable = getUserTable( $type );
	$sql = "SELECT
              $userTable.groupId as of_group,
              $testTable.groupId as on_group,
              $metaTable.name as of_name,
              $resultTable.userCount as of_count,
              COUNT(*) as test_count,
              AVG($testTable.percentCorrect) as user_avg,
              (SELECT name FROM $metaTable WHERE $metaTable.groupId = $testTable.groupId LIMIT 1) as on_name
            FROM $testTable
              JOIN $userTable     ON $testTable.userId =  $userTable.userId
              JOIN $metaTable     ON $userTable.groupId = $metaTable.groupId
              JOIN $resultTable   ON $userTable.groupId = $resultTable.groupId
            GROUP BY of_group, on_group";
	return $mysqli->query( $sql );
}

function getActuals( $type, $group )
{
	$mysqli = new mysqli( 'localhost', 'religiv3_admin', '1corinthians3:9', 'religiv3_turing' );
	
	$results = "none";
	$resultTable = getResultTable( $type );
    $sql = "SELECT ans1, ans2, ans3, ans4, ans5, ans6, ans7, ans8, ans9, ans10 FROM $resultTable WHERE groupId = '$group'";

	$result = $mysqli->query( $sql );
	if ( $result && $result->num_rows > 0 )
	{
		$row = $result->fetch_assoc();
        $results = combineAnswers( $row );
	}

	return $results;
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
	$mysqli = new mysqli( 'localhost', 'religiv3_admin', '1corinthians3:9', 'religiv3_turing' );

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
	$mysqli = new mysqli( 'localhost', 'religiv3_admin', '1corinthians3:9', 'religiv3_turing' );

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
	$mysqli = new mysqli( 'localhost', 'religiv3_admin', '1corinthians3:9', 'religiv3_turing' );

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
	$mysqli = new mysqli( 'localhost', 'religiv3_admin', '1corinthians3:9', 'religiv3_turing' );

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
	$mysqli = new mysqli( 'localhost', 'religiv3_admin', '1corinthians3:9', 'religiv3_turing' );

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

function getResultTable($type )
{
	return $type . "_results";
}

function getMetaTable($type )
{
	return $type . "_meta";
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