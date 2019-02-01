<?php require_once("$_SERVER[DOCUMENT_ROOT]/php/startup.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <?php includeHeadInfo(); ?>
</head>

<body>

	<!--Header-->
    <?php includeHeader(); ?>
    <div class="col-10 header">
        <div class="title center">Turing Tests</div>
    </div>

    <!--Main-->
	<div class="col-10 main">
        <div class="subtitle center">Our vision</div>
        <div class="textBlock">
            <div>The idea behind this test comes from Bryan Caplan&rsquo;s idea for an Ideological Turing Test and the now deprecated website: <a class="link" href="http://econturingtest.com/">EconTuringTest.com</a>. With our test, we are hoping to measure how well individuals know the religious views of different groups, including denominations and world religions. The Turing Test questions may seem difficult or as if multiple answers are correct, but they are specifically designed to test your ability to answer questions from the perspective of select groups.</div>
            <div>This is a side project, so play gentle and please don’t break anything. Let us know if there is any information not shared at the end of the test you&rsquo;d be interested in knowing. If your group is not included or you would like to see the findings thus far, feel free to contact us.</div>
        </div>
    </div>

    <div class="col-10 main">
        <?php require_once("php/html-constructor.php"); ?>
        <div class="center" style="padding-top: 3em"><img src="images/denom.png" class="logoImage"></div>
        <div class="subtitle center"><a class="clickable" href="statistics.php?type=denom">Denominational Turing Test</a></div>
        <div class="textBlock">
            <div>Begin by taking the test for &ldquo;Your Own Beliefs&rdquo; before taking the test for the other Christian Groups. This will allow the results page to determine how similar you are to the other Christian Groups when you take those tests. At the end, before submitting, please enter some sort of unique identifier to be used across all tests. We recommend using an email address.</div>
        </div>

        <div class="center" style="margin-bottom: 1em">
            Step 1:<br />
            <a class="link" href="test-denom.php?group=you">Your Own Beliefs</a>
        </div>
        <div class="center">
            Step 2:<br />
            <?php constructIndexList( "denom" ); ?>
        </div>
    </div>

    <div class="col-10 main">
        <div class="center" style="padding-top: 3em"><img src="images/world.png" class="logoImage"></div>
        <div class="subtitle center"><a class="clickable" href="statistics.php?type=world">World Religion Turing Test</a></div>
        <div class="textBlock">
            <div>Begin by taking the test for &ldquo;Your Own Beliefs&rdquo; before taking the test for the other World Religions. This will allow the results page to determine how similar you are to the other World Religions when you take those tests. At the end, before submitting, please enter some sort of unique identifier to be used across all tests. We recommend using an email address.</div>
            <!--div>Religions are included that have at least 0.05% of the world population with the notable exceptions of Spiritism (Cao Dao) and tribal/ethnic religions.<br /><br /></div-->
        </div>

        <div class="center" style="margin-bottom: 1em">
            Step 1:<br />
            <a class="link" href="test-world.php?group=you">Your Own Beliefs</a>
        </div>
        <div class="center">
            Step 2:<br />
            <?php constructIndexList( "world" ); ?>
        </div>
    </div>

    <div class="col-10 main">
        <div class="center" style="padding-top: 3em"><img src="images/idea.png" class="logoImage"></div>
        <div class="subtitle center"><a class="clickable" href="statistics.php?type=idea">(Christian) Ideological Turing Test</a></div>
        <div class="textBlock">
            <div>Begin by taking the test for &ldquo;Your Own Beliefs&rdquo; before taking the test for the other Christian Groups. This will allow the results page to determine how similar you are to the other Christian Groups when you take those tests. At the end, before submitting, please enter some sort of unique identifier to be used across all tests. We recommend using an email address.</div>
        </div>

        <div class="center" style="margin-bottom: 1em">
            Step 1:<br />
            <a class="link" href="test-idea.php?group=you">Your Own Beliefs</a>
        </div>
        <div class="center" style="padding-bottom: 2em">
            Step 2:<br />
            <a class="link" href="test-idea.php?group=con">Conservatism</a><br />
            <a class="link" href="test-idea.php?group=lib">Liberalism</a>
        </div>
    </div>

</body>
</html>