<?php
include_once("database.php");

function constructChoiceSection( $type )
{
    $title = getTypeTitle( $type );
    echo "<div id=\"groupChoiceSection\" class=\"col-10\" style=\"margin-bottom: 2em\">\n";
    echo "<div class=\"textBlock\">
          Which $title do you identify with?
          </div>\n\n";
    echo "<fieldset>
          <legend>Pick one group:</legend>
          <table>\n";

    $choices = file("resources/group-" . $type . ".txt");
    foreach ( $choices as $index => $choice )
    {
        $choice = explode( "|", $choice );
        $groupId = $choice[0];
        $groupName = $choice[1];
        echo "<tr>
              <td><input id=\"$groupId\" name=\"group\" type=\"radio\" value=\"$groupId\"></td>
              <td><label for=\"$groupId\">$groupName</label></td>
              </tr>\n";
    }

    echo "</table>
          </fieldset>\n";
    echo "</div>\n";
}

function constructQuestionSection( $type )
{
    $title = getTypeTitle( $type );
    echo "<div id=\"questionsSection\" class=\"col-10\" style=\"margin-bottom: 2em\">\n";
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/tests.css\"/>
          <script src=\"javascript/test.js\"></script>\n\n";
    echo "<div id=\"personalInstructions\" class=\"textBlock\" style=\"display: none\">
          Answer the questions below according to your own beliefs. Sometimes multiple answers may seem correct or they may all seem incorrect&mdash;give the <em>best</em> answer.
          </div>
          <div id=\"groupInstructions\" class=\"textBlock\" style=\"display: none\">
          Answer the questions below according to how most practitioners of the $title have answered the question. Sometimes multiple answers may seem correct or they may all seem incorrect&mdash;give the <em>best</em> answer.
          </div>\n\n";

    if ( $type === "idea" )
    {
        echo "<div id=\"conQuestions\" style=\"display: none\">\n";
        constructQuestions( "$type-con" );
        echo "</div>\n";
        echo "<div id=\"libQuestions\" style=\"display: none\">\n";
        constructQuestions( "$type-lib" );
        echo "</div>\n";
    }
    else
    {
        constructQuestions( $type );
    }

    echo "</div>\n";
}

function constructQuestions( $type )
{
    $suffix = getSuffix( $type );
    $fileIndex = 0;
    $file = file("resources/questions-" . $type . ".txt");
    $questionOptionCounts = getQuestionOptionCounts( $file );
    foreach ( $questionOptionCounts as $questionIndex => $questionOptionCount )
    {
        $questionNumber = $questionIndex + 1;
        $question = trim( $file[$fileIndex] );
        echo "<fieldset id=\"question$questionNumber\">
              <legend>$questionNumber. $question</legend>
              <table>\n";
        $fileIndex++;

        for ( $i = 0; $i < $questionOptionCount; $i++ )
        {
            $line = explode( "|", $file[$fileIndex] );
            $optionLetterLower = $line[0];
            $optionLetterUpper = strtoupper( $line[0] );
            $name = "q" . $questionNumber . $suffix;
            $id = "q" . $questionNumber . $optionLetterLower . $suffix;
            $option = trim( $line[1] );
            echo "<tr>
                  <td><input id=\"$id\" name=\"$name\" type=\"radio\" value=\"$optionLetterLower\"></td>
                  <td><label for=\"$id\">$optionLetterUpper. $option</label></td>
                  </tr>\n";
            $fileIndex++;
        }

        echo "</table>
              </fieldset>
              <br />\n\n";
    }
}

function getSuffix( $type )
{
    $result = "";
    $types = explode( "-", $type );
    if ( count( $types ) === 2 )
    {
        $result = "-$types[1]";
    }
    return $result;
}

function getQuestionOptionCounts( $file )
{
    $result = array();
    $index = -1;
    foreach ( $file as $i => $line )
    {
        $line = explode( "|", $line );
        if ( count( $line ) === 1 )
        {
            array_push( $result, 0 );
            $index++;
        }
        else
        {
            $result[$index]++;
        }
    }
    return $result;
}

function constructIndexList( $type )
{
    $choices = file("resources/group-" . $type . ".txt");
    foreach ( $choices as $index => $choice )
    {
        $choice = explode( "|", $choice );
        if ( $choice[0] !== "_x_" )
        {
            $groupId = $choice[0];
            $groupName = $choice[1];
            echo "<a class=\"link\" href=\"http://turing.religionandstory.com/test-$type.php?group=$groupId\">$groupName</a><br />\n";
        }
    }
}

function constructStatistics( $type )
{
    $stats = getStatistics( $type );
    if ( $stats && $stats->num_rows > 0 )
    {
        $groupNames = array();
        while( $row = $stats->fetch_array() )
        {
            echo "<tr>\n";

            $groupName = $row['of_name'];
            if ( !in_array( $groupName, $groupNames ) )
            {
                $memberCount= $row['of_count'];
                $actuals = getActuals( $type, $row['of_group'] );
                //echo "<td style="padding-right: 1em"><span onclick=\"showAnswers('$actuals')\">$groupName</span>($memberCount)</td>\n";
                //echo "<td style="padding-right: 1em"><span onclick=\"showAnswers('$actuals')\">$groupName</span></td>\n";
                echo "<td style=\"padding-right: 1em\">$groupName</td>\n";
                array_push( $groupNames, $groupName );
            }
            else
            {
                echo "<td></td>\n";
            }

            $average = number_format( $row['user_avg'], 2 );
            echo "<td style=\"padding-right: 1em\">$row[on_name]</td>\n";
           	echo "<td style=\"padding-right: 1em\">$average</td>\n";
            /*$count = $row['test_count'];
           	if ( intval( $count ) < 20 )
           	{
           		$count = "< 20";
           	}
           	echo "<td style=\"padding-right: 1em\">$count</td>\n";*/
            echo "</tr>\n";
        }
    }
}

function getTypeTitle( $type )
{
    $title = "Type";
    if ( $type === "denom" )
    {
        $title = "Christian Group";
    }
    else if ( $type === "world" )
    {
        $title = "World Religion";
    }
    else if ( $type === "idea" )
    {
        $title = "Religious Ideology";
    }
    return $title;
}
?>