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
        <div class="subtitle center">Christian Group Turing Test</div>

        <?php
        include("utility/html-constructor.php");
        constructQuestionSection( "denom" );
        constructChoiceSection( "denom" );
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
        startTuringTest( elements, "denom", "<?php echo $_GET['group']; ?>" );
    }

    startTest();
</script>

<?php include($BASE_PATH . "/common/html/modal.html"); ?>
<?php include($BASE_PATH . "/common/html/toaster.html"); ?>
</html>