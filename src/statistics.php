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

    <!--Main-->
    <div class="col-10 main">
        <div class="subtitle center">Statistics</div>

        <div class="col-10">
            <div class="textBlock">
                Each row describes how well a <span name="typeTitle">[TYPE]</span>, in the far-left column,
                understands the beliefs of another <span name="typeTitle">[TYPE]</span>, the &ldquo;Subject.&rdquo;
                The far-right column depicts the average score of test takers.
            </div>

            <table>
                <tr>
                    <td style="padding-right: 1em; font-weight: bold"><span name="typeTitle">[TYPE]</span></td>
                    <td style="padding-right: 1em; font-weight: bold">Subject</td>
                    <td style="padding-right: 1em; font-weight: bold">Avg Score (%)</td>
                    <!--<td style="font-weight: bold">Count</td>-->
                </tr>

            <?php
            include("utility/database.php");
            include("utility/html-constructor.php");
            constructStatistics( $_GET['type'] )
            ?>
            </table>
        </div>
    </div>

</body>

<script src="javascript/test.js"></script>
<script>
function showAnswers( memberAnswers )
{
	showMessage( "The member answers for this group are: " + memberAnswers );
}

function setDisplay()
{
    var turingTestStatic = new TuringTest();
    var typeTitle = turingTestStatic.getTypeTitle( "<?php echo $_GET['type']; ?>" );

    $('span[name="typeTitle"]').each(function() {
        this.innerText = typeTitle;
    });
}

setDisplay();
</script>
<?php includeModals(); ?>
</html>