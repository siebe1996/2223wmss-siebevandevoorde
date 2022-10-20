<?php

/**
 * Main Code
 */

// initial values
$name = isset($_POST['name']) ? (string) $_POST['name'] : '';
$age = isset($_POST['age']) ? (string) $_POST['age'] : '';
$moduleAction = isset($_POST['moduleAction']) ? (string) $_POST['moduleAction'] : '';
$msgName = '*';
$msgAge = '*';
$usbsticks = [64=>19.0, 128=>33.0, 256=>62];
$moduleAction = isset($_POST['moduleAction']) ? (string) $_POST['moduleAction'] : '';
$usb = isset($_POST['usb']) ? (string) $_POST['usb'] : '';
$prijs = '';

if ($moduleAction === 'processUsb'){
    $prijs = $usbsticks[$usb];
}

// form is sent: perform formchecking!
if ($moduleAction == 'processName') {

    $allOk = true;

    // name not empty
    if (trim($name) === '') {
        $msgName = 'Please enter your name';
        $allOk = false;
    }

    // end of form check. If $allOk still is true, then the form was sent in correctly
    if ($allOk) {
        header('Location: formchecking_thanks.php?name=' . urlencode($name));
        exit();
    }

}

// form is sent: perform formchecking!
if ($moduleAction == 'processAge') {

    $allOk = true;

    // age not empty
    if ((trim($age) == '') || ((int) $age == 0)) {
        $msgAge = 'Please enter your age';
        $allOk = false;
    }

    // end of form check. If $allOk still is true, then the form was sent in correctly
    if ($allOk === true) {
        header('Location: formchecking_thanks.php?age=' . urlencode($age));
    }

}

//deel 4
$name2 = isset($_POST['name']) ? (string) $_POST['name'] : '';
$email = isset($_POST['email']) ? (string) $_POST['email'] : '';
$bedrijf = isset($_POST['bedrijf']) ? (string) $_POST['bedrijf'] : '';
$land = isset($_POST['land']) ? (int) $_POST['land'] : 0;
$food = isset($_POST['food']) ? (string) $_POST['food'] : '';
$moduleAction = isset($_POST['moduleAction']) ? (string) $_POST['moduleAction'] : '';
$voorkeur = isset($_POST['voorkeur']) ? (string) $_POST['voorkeur'] : '';
$voorkeuren = ['server-side','front-end','full-stack'];
$message1 = '*';
$message2 = '*';
$message3 = '*';
$message4 = '*';
$message5 = '*';

$action = $_SERVER["PHP_SELF"];

if ($moduleAction === 'processConfrence'){
    $isValid = true;
    if(trim($name2) === ''){
        $message1 = 'Gelieve een naam in te vullen';
        $isValid = false;
    }
    if(trim($email) === ''){
        $message2 = 'Gelieve een email in te vullen';
        $isValid = false;
    }
    if(trim($bedrijf) === ''){
        $message3 = 'Gelieve een bedrijf in te vullen';
        $isValid = false;
    }
    if($land === 0){
        $message4 = 'Gelieve een land in te vullen';
        $isValid = false;
    }
    if ($voorkeur === ''){
        $message5 = 'Gelieve een voorkeur in te vullen';
        $isValid = false;
    }
    if ($isValid){
        header('Location: thx.php?name='.urlencode($name2).'&email='.urlencode($email));
    }
}

?><!DOCTYPE html>
<html>
<head>
    <title>Testform</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    <fieldset>

        <h2>Testform #1</h2>

        <dl class="clearfix">

            <dt><label for="name">Name</label></dt>
            <dd class="text">
                <input type="text" id="name" name="name" value="<?php echo htmlentities($name); ?>" class="input-text" />
                <span class="message error"><?php echo $msgName; ?></span>
            </dd>

            <dt class="full clearfix" id="lastrow">
                <input type="hidden" name="moduleAction" value="processName" />
                <input type="submit" id="btnSubmit" name="btnSubmit" value="Send" />
            </dt>

        </dl>

    </fieldset>

</form>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    <fieldset>

        <h2>Testform #2</h2>

        <dl class="clearfix">

            <dt><label for="name">Age</label></dt>
            <dd class="text">
                <input type="number" id="age" name="age" value="<?php echo htmlentities($age); ?>" class="input-text" />
                <span class="message error"><?php echo $msgAge; ?></span>
            </dd>

            <dt class="full clearfix" id="lastrow">
                <input type="hidden" name="moduleAction" value="processAge" />
                <input type="submit" id="btnSubmit" name="btnSubmit" value="Send" />
            </dt>

        </dl>

    </fieldset>

</form>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    <input type="hidden" name="moduleAction" value="processUsb">

    <fieldset>

        <h2>Testform #3</h2>

        <dl class="clearfix">

            <dt><label>Usb stick</label></dt>
            <dd>
                <?php foreach($usbsticks as $key => $value){
                    ?>
                    <label for="usb_<?php echo $key?>"><input type="radio" class="option" name="usb" id="usb_<?php echo $key?>" value="<?php echo $key?>"<?php if ($usb == $key) { echo ' checked="checked"'; } ?> /><?php echo $key?>GB €<?php echo $value?></label>
                    <?php
                }
                ?>
            </dd>

            <dt class="full clearfix" id="lastrow">
                <input type="hidden" name="moduleAction" value="processAge" />
                <input type="submit" id="btnSubmit" name="btnSubmit" value="Send" />
            </dt>

        </dl>

    </fieldset>

</form>

<form action='<?php echo $action; ?>' method="post">

    <fieldset>

        <h2>Schrijf je in voor onze conferentie</h2>

        <dl class="clearfix">
            <input type="hidden" name="moduleAction" value="processConfrence"> <!--checkt als formulier is verstuurt-->

            <dt><label for="name">Name</label></dt>
            <dd class="text"><input type="text" id="name" name="name" value="<?php echo htmlentities($name2); ?>" class="input-text" />
                <span class="message error"><?php echo  $message1;?></span>
            </dd>

            <dt><label for="email">Email</label></dt>
            <dd class="text"><input type="email" id="email" name="email" value="<?php echo htmlentities($email); ?>" class="input-text" />
                <span class="message error"><?php echo  $message2;?></span>
            </dd>

            <dt><label for="bedrijf">Bedrijf</label></dt>
            <dd class="text"><input type="text" id="bedrijf" name="bedrijf" value="<?php echo htmlentities($bedrijf); ?>" class="input-text" />
                <span class="message error"><?php echo  $message3;?></span>
            </dd>

            <dt><label for="land">Land</label></dt>
            <dd>
                <select name="land" id="land">
                    <option value="0"<?php if ($land == 0) { echo ' selected="selected"'; } ?>>Please select...</option>
                    <option value="1"<?php if ($land == 1) { echo ' selected="selected"'; } ?>>Belgie</option>
                    <option value="2"<?php if ($land == 2) { echo ' selected="selected"'; } ?>>Nederland</option>
                    <option value="3"<?php if ($land == 3) { echo ' selected="selected"'; } ?>>Frankrijk</option>
                    <option value="4"<?php if ($land == 4) { echo ' selected="selected"'; } ?>>Engeland</option>
                    <option value="5"<?php if ($land == 5) { echo ' selected="selected"'; } ?>>Duitsland</option>
                </select>
                <span class="message error"><?php echo  $message4;?></span>
            </dd>

            <dt><label>Voorkeur</label></dt>
            <dd>
                <?php foreach($voorkeuren as $value){
                    ?>
                    <label for="voorkeur_<?php echo $value?>"><input type="radio" class="option" name="voorkeur" id="voorkeur_<?php echo $value?>" value="<?php echo $value?>"<?php if ($voorkeur == $value) { echo ' checked="checked"'; } ?> /><?php echo $value?></label>
                    <?php
                }?>
                <span class="message error"><?php echo  $message5;?></span>
            </dd>

            <dt><label for="food">Food restrictions</label></dt>
            <dd class="text"><textarea name="food" id="food" rows="5" cols="40"><?php echo htmlentities($food); ?></textarea></dd>

            <dt class="full clearfix" id="lastrow">
                <input type="submit" id="btnSubmit" name="btnSubmit" value="Send" />
            </dt>

        </dl>

    </fieldset>

</form>

</body>
</html>
