<form id="submitForm" name="submitForm" action="results.php" method='post'>
    <div>
        <input id="acceptsEmails" name="acceptsEmails" type="checkbox">
        <label for="acceptsEmails">Check if using an email address for your identifier and would like to receive updates on the Religious Turing Test</label>
    </div>
    <div>
        <input id="idInput" name="id" type="text" class="input" placeholder="Email Address" value="<?php echo $_SESSION['tt_id']; ?>" required>
    </div>
    <div class="center">
        <button id="submitButton" type="button" class="button" style="width: 10em; margin-bottom: 1em;">Submit</button>
    </div>
    <div class="center">
        <button id="findButton" type="button" class="button" style="width: 10em">Find Me</button>
    </div>

    <input id="type" name="type" type="hidden" required>
    <input id="group" name="group" type="hidden" required>
    <input id="answers" name="answers" type="hidden" required>
    <input id="groupChoice" name="groupChoice" type="hidden">
</form>