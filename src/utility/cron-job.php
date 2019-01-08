<?php
function sendEmail()
{
    $mysqli = new mysqli('localhost', 'id511081_dcrouch1', '1corinthians39', 'id511081_main');
    $mysqli->query("UPDATE cron_job SET status = NULL");

    $to = "";
    $subject = "Religious Turing Test Update";
    $message = "<p>Hey, you are receiving this email to inform you that two more Turing Tests have been completed: <i>World Religions</i> and <i>Christian Ideologies</i>. </p><p>To take these tests, go <a href='http://religionandstory.webutu.com/rns/turingTest/'>here</a>. </p><p>Your participation helps improve the accuracy of each test. In fact, it would be a great help if you shared these, inviting your friends and family to also take these tests. This is particularly important for the World Religions test, that requires participation from more than Christians. </p><p>Though future emails are unlikely, to remove yourself from this list, go <a href='http://religionandstory.webutu.com/turing_test/Denom/you.php'>here</a>, find yourself, and uncheck the box. </p><br /><p>Have a blessed day! </p>";
    $message = wordwrap($message, 70);
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: ReligionAndStory<noreply@religionandstory.webutu.com>" . "\r\n" .
        "Bcc: danieltcrouch@gmail.com," .
        " dcrouch1@harding.edu";

    if (mail($to, $subject, $message, $headers))
    {
        $mysqli->query("UPDATE cron_job SET sent = CURRENT_TIMESTAMP");
    }
}

function isCronJobOn()
{
    $mysqli = new mysqli('localhost', 'id511081_dcrouch1', '1corinthians39', 'id511081_main');

    $cronJobOn = false;
    $result = $mysqli->query("SELECT status FROM cron_job LIMIT 1");
    if ($result && $result->num_rows > 0 && $result->fetch_assoc()['status'] <> NULL)
    {
        $cronJobOn = true;
    }

    return $cronJobOn;
}

if (isCronJobOn())
{
    sendEmail();
}
?>