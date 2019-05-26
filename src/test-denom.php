<?php require_once("php/startup.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <?php
    $pageTitle  = "Denominational Turing Test";
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
        <div class="subtitle center">Christian Group Turing Test</div>

        <?php
        require_once("php/html-constructor.php");
        constructQuestionSection( "denom" );
        constructChoiceSection( "denom" );
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
        startTuringTest( elements, "denom", "<?php echo $_GET['group']; ?>" );
    }

    startTest();
</script>
<?php includeModals(); ?>
</html>