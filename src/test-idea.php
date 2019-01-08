<?php include_once($_SERVER["DOCUMENT_ROOT"] . "/rns/common/php/startup.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Turing Tests</title>
    <?php include($BASE_PATH . "/common/html/head.html"); ?>
</head>

<body>

	<!--Header-->
    <?php include($BASE_PATH . "/common/html/header.html"); ?>
    <div class="col-10 main">
        <div class="title center clickable"><a href="http://religionandstory.webutu.com/rns/turingTest/">Turing Tests</a></div>
    </div>

    <!--Main-->
    <div class="col-10 main">
        <div class="subtitle center">Ideology Turing Test</div>

        <div id="groupChoiceSection" class="col-10 center">
            <button id="con" name="ideology" class="bigButton inverseButton" style="width: 8em; margin: .25em;">Conservative</button>
            <button id="lib" name="ideology" class="bigButton inverseButton" style="width: 8em; margin: .25em;">Liberal</button>

            <div id="ideologyPrompt" class="textBlock" style="margin-top: 2em">
                Choose an Ideology to begin.
            </div>
        </div>

        <?php
        include("utility/html-constructor.php");
        constructQuestionSection( "idea" );
        include("html/submission.html");
        ?>
    </div>

</body>

<script>
    var groupId = "<?php echo $_GET['group']; ?>";

    function showQuestions( group )
    {
        if ( group !== "you" )
        {
            $( '#conQuestions, #libQuestions' ).hide();
            $( '#' + group + 'Questions' ).show();

            if ( getSelectedRadioButton( "ideology" ) )
            {
                $( '#ideologyPrompt' ).hide();
                $( '#questionsSection' ).show();
            }
        }
    }

    function startTest()
    {
        var elements = {
            personalInstructions: $('#personalInstructions'),
            groupInstructions:  $('#groupInstructions'),
            questionsSection:   $('#questionsSection'),
            groupChoiceSection: $('#groupChoiceSection'),
            submitForm:         $('#submitForm'),
            idInput:            $('#idInput'),
            submitButton:       $('#submitButton'),
            findButton:         $('#findButton'),
            answers:            $('#answers'),
            groupChoice:        $('#groupChoice'),
            acceptsEmails:      $('#acceptsEmails'),
            type:               $('#type'),
            group:              $('#group')
        };
        startTuringTest( elements, "idea", groupId );
    }

    if ( groupId === "you" )
    {
        $('#questionsSection').hide();
    }
    else
    {
        showQuestions( groupId );
    }
    setRadioCallback( "ideology", function( group ){showQuestions( group );} );
    startTest();
</script>

<?php include($BASE_PATH . "/common/html/modal.html"); ?>
<?php include($BASE_PATH . "/common/html/toaster.html"); ?>
</html>