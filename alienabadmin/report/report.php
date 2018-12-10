<style>
    .boldText {
        font-weight: bold;
    }
</style>

<?php
//get the responses from the form, report it
$fname = $_POST[fname];
$lname = $_POST[lname];
$when = $_POST[when];
$howLong = $_POST[howLong];
$howMany = $_POST[howMany];
$what = $_POST[what];
$describe = $_POST[describe];
$fluffy = $_POST[fluffy];
$whatElse = $_POST[whatElse];
$email = $_POST[email];




print <<<MESSAGE
<span class="boldText"><p>Thanks for submitting the form $fname $lname.</p>
<p>You were abducted on $when and gone for $howLong.</p>
<p>You said there were $howMany of them.</p>
<p>And they $what.</p>
<p>You described them as: $describe.</p>
<p>Did you see Fluffy? You answered: $fluffy.</p>
<p>Your other comments were: $whatElse.</p>
<p>We will contact you at $email if we have any relevant news.</p></span>
MESSAGE;

?>


