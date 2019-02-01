<?php require_once("$_SERVER[DOCUMENT_ROOT]/php/startup.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <?php
    $pageTitle  = "World Religion Turing Test";
    includeHeadInfo();
    ?>
    <script src="javascript/test.js"></script>
</head>

<body>

	<!--Header-->
    <?php includeHeader(); ?>
    <div class="col-10 header">
        <div class="title center"><a class="clickable" href="<?php echo $homeUrl; ?>">
            Turing Tests
        </a></div>
    </div>

    <!--Main-->
    <div class="col-10 main">
        <div class="subtitle center">World Religion Turing Test</div>

        <?php
        require_once("php/html-constructor.php");
        constructQuestionSection( "world" );
        constructChoiceSection( "world" );
        include("html/submission.php");
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