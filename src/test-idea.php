<?php require_once("$_SERVER[DOCUMENT_ROOT]/utility/startup.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <?php
    $pageTitle  = "Ideological Turing Test";
    includeHeadInfo();
    ?>
    <script src="javascript/test.js"></script>
</head>

<body>

	<!--Header-->
    <?php includeHeader(); ?>
    <div class="col-10 header">
        <div class="title center clickable"><a href="<?php echo $homeUrl; ?>">Turing Tests</a></div>
    </div>

    <!--Main-->
    <div class="col-10 main">
        <div class="subtitle center">Ideology Turing Test</div>

        <div id="groupChoiceSection" class="col-10 center" style="margin-bottom: 2em">
            <button id="con" name="ideology" class="button inverseButton" style="width: 8em; margin: .25em;">Conservative</button>
            <button id="lib" name="ideology" class="button inverseButton" style="width: 8em; margin: .25em;">Liberal</button>

            <div id="ideologyPrompt" style="margin-top: 2em">
                Choose an Ideology to begin.
            </div>
        </div>

        <?php
        require_once("utility/html-constructor.php");
        constructQuestionSection( "idea" );
        include("html/submission.php");
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
<?php includeModals(); ?>
</html>