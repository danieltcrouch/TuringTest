<?php include("$_SERVER[DOCUMENT_ROOT]/common/php/startup.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Turing Tests</title>
    <?php includeHeadInfo(); ?>
</head>

<body>

	<!--Header-->
    <?php includeHeader(); ?>
    <div class="col-10 main">
        <div class="title center clickable"><a href="http://religionandstory.webutu.com/rns/turingTest/">Turing Tests</a></div>
    </div>

    <!--Main-->
    <div class="col-10 main">
        <div class="subtitle center">World Religion Turing Test</div>

        <?php
        include("utility/html-constructor.php");
        constructQuestionSection( "world" );
        constructChoiceSection( "world" );
        include("html/submission.html");
        ?>
    </div>

</body>

<script>
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
        startTuringTest( elements, "world", "<?php echo $_GET['group']; ?>" );
    }

    startTest();
</script>
<?php includeModals(); ?>
</html>