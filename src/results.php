<?php require_once("$_SERVER[DOCUMENT_ROOT]/utility/startup.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Turing Tests</title>
    <?php includeHeadInfo(); ?>
    <script src="javascript/test.js"></script>
</head>

<body>

	<!--Header-->
    <?php includeHeader(); ?>

    <?php
    	require_once("utility/database.php");
    	if ( isset( $_POST['id'] ) )
    	{
    		$_SESSION['tt_id'] = $_POST['id'];

    		$actualGroupId = $_POST['group'] === "you" ? $_POST['groupChoice'] : $_POST['group'];
            $actuals = getActuals( $_POST['type'], $actualGroupId );

            if ( $_POST['group'] === "you" )
            {
                savePersonalTest( $_POST['id'], $_POST['type'], $_POST['groupChoice'], $_POST['answers'], $_POST['acceptsEmails'] );
            }
            else
            {
                $groupMatchPercent = compareAnswers( $actuals, $_POST['answers'] );
                saveGroupTest( $_POST['id'], $_POST['type'], $_POST['group'], $_POST['answers'], $groupMatchPercent );
            }

            $personalMatchPercent = compareAnswers( $actuals, getPersonalAnswers( $_POST['id'], $_POST['type'] ) );
    	}

    	function compareAnswers( $actuals, $answers )
    	{
    		$percent = 0;
    		if ( $actuals <> "none" && $answers <> "none" )
    		{
    			for ($i = 0; $i < 10; $i++)
    			{
    				if ( mb_substr($actuals, $i, 1) == mb_substr($answers, $i, 1) )
    				{
    					$percent += 10;
    				}
    			}
    		}
    		return $percent;
    	}
    ?>

    <!--Main-->
    <div class="col-10 main">
        <div class="subtitle center">Test Results</div>

        <div id="personalResults" class="textBlock">
            <div style="text-align: center">
                Your personal beliefs match <span name="personalMatchPercent">[PERCENT]</span>%
                with the members of this <span name="typeTitle">[TYPE]</span>.
            </div>
            <div style="text-align: center">
                Your answers will be used to average the answers for members of the <span name="typeTitle">[TYPE]</span> you have identified with.
                Remember the ID you have chosen and enter it any time you take a test on this site.<br />
                Note: There is no security preventing someone from using the same ID.
            </div>
        </div>
        <div id="groupResults" class="textBlock" style="display: none">
            <div style="text-align: center">
                You answered <span name="groupMatchPercent">[PERCENT]</span>% of the questions for this <span name="typeTitle">[TYPE]</span> correctly.
            </div>
            <div style="text-align: center">
                Based on Step 1, your personal beliefs match <span name="personalMatchPercent">[PERCENT]</span>% with the members of this <span name="typeTitle">[TYPE]</span>.
            </div>
        </div>

        <div class="center">
            <a href="index.php"><button class="button" style="width: 10em">Return</button></a>
        </div>
    </div>

    <?php
    //$title = "Turing Test";
    //$description = "Take the test!";
    //$subUrl = "/rns/turingTest/results.php";
    //$subUrlSafe = "%2Frns%2FturingTest%2Fresults.php";
    //include($BASE_PATH . "/common/html/facebook.html");
    ?>

</body>

<script>
    var type = "<?php echo $_POST['type']; ?>";
    var group = "<?php echo $_POST['group']; ?>";

    var personalMatchPercent = "<?php echo $personalMatchPercent; ?>";
    var groupMatchPercent = "<?php echo $groupMatchPercent; ?>";

    function setDisplay()
    {
        var turingTestStatic = new TuringTest();
        var typeTitle = turingTestStatic.getTypeTitle( type );

        if ( group === turingTestStatic.PERSONAL_GROUP )
        {
            $('#personalResults').show();
            $('#groupResults').hide();
        }
        else
        {
            $('#groupResults').show();
            $('#personalResults').hide();
        }

        $('span[name="personalMatchPercent"]').each(function() {
            this.innerText = personalMatchPercent;
            this.style.fontWeight = "bold";
        });
        $('span[name="groupMatchPercent"]').each(function() {
            this.innerText = groupMatchPercent;
            this.style.fontWeight = "bold";
        });
        $('span[name="typeTitle"]').each(function() {
            this.innerText = typeTitle;
        });
    }

    setDisplay();
</script>
<?php includeModals(); ?>
</html>