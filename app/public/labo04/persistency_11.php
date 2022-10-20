<?php

// Show all errors (for educational purposes)
ini_set('error_reporting', E_ALL);

// Get all variables
$name = isset($_GET['name']) ? (string) $_GET['name'] : '';
$pass = isset($_GET['pass']) ? (string) $_GET['pass'] : '';
$gender = isset($_GET['gender']) ? (string) $_GET['gender'] : '';
$cont = isset($_GET['cont']) ? (int) $_GET['cont'] : 0;
$meals = isset($_GET['meals']) ? (array) $_GET['meals'] : array();
$remark = isset($_GET['remark']) ? (string) $_GET['remark'] : '';
$moduleAction = isset($_GET['moduleAction']) ? (string) $_GET['moduleAction'] : '';
$message = '*';
$allOk = true;
$messageName = 'Gelieve een naam in te vullen';
$number1 = isset($_GET['number1']) ? (string)$_GET['number1'] : rand(0,100);
$number2 = isset($_GET['number2']) ? (string)$_GET['number2'] : rand(0,100);
$som='';

if ($moduleAction === 'processName'){
    if(trim($name) === ''){
        $allOk = false;
    }
    if (filter_var($number1, FILTER_VALIDATE_INT) && filter_var($number2, FILTER_VALIDATE_INT)){
        $som = $number1 + $number2;
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

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">

    <fieldset>

        <h2>Testform</h2>

        <dl class="clearfix">
            <input type="hidden" name="moduleAction" value="processName">

            <dt><label for="name">Name</label></dt>
            <dd class="text"><input type="text" id="name" name="name" value="<?php echo htmlentities($name); ?>" class="input-text" /></dd>
            <?php if (trim($name) === '' && !$allOk) {
                echo '<p class="error">'.$messageName.'</p>';
            }?>

            <dt><label for="number1">Number1</label></dt>
            <dd class="text"><input type="text" id="number1" name="number1" value="<?php echo htmlentities($number1); ?>" class="input-text" /></dd>

            <dt><label for="number2">Number2</label></dt>
            <dd class="text"><input type="text" id="number2" name="number2" value="<?php echo htmlentities($number2); ?>" class="input-text" /></dd>

            <dt><label for="som">Som</label></dt>
            <dd class="text"><input type="text" id="som" name="som" value="<?php echo htmlentities($som); ?>" class="input-text" /></dd>


            <dt><label for="pass">Password</label></dt>
            <dd class="text"><input type="password" id="pass" name="pass" value="<?php echo htmlentities($pass); ?>" class="input-text" /></dd>

            <dt><label>Gender</label></dt>
            <dd>
                <label for="gender_male"><input type="radio" class="option" name="gender" id="gender_male" value="male"<?php if ($gender == 'male') { echo ' checked="checked"'; } ?> />Male</label>
                <label for="gender_female"><input type="radio" class="option" name="gender" id="gender_female" value="female"<?php if ($gender == 'female') { echo ' checked="checked"'; } ?> />Female</label>
            </dd>

            <dt><label for="cont">Continent</label></dt>
            <dd>
                <select name="cont" id="cont">
                    <option value="0"<?php if ($cont == 0) { echo ' selected="selected"'; } ?>>Please select...</option>
                    <option value="1"<?php if ($cont == 1) { echo ' selected="selected"'; } ?>>Africa</option>
                    <option value="2"<?php if ($cont == 2) { echo ' selected="selected"'; } ?>>America</option>
                    <option value="3"<?php if ($cont == 3) { echo ' selected="selected"'; } ?>>Antarctica</option>
                    <option value="4"<?php if ($cont == 4) { echo ' selected="selected"'; } ?>>Asia</option>
                    <option value="5"<?php if ($cont == 5) { echo ' selected="selected"'; } ?>>Europe</option>
                    <option value="6"<?php if ($cont == 6) { echo ' selected="selected"'; } ?>>Oceania</option>
                </select>
            </dd>

            <dt><label>Meals</label></dt>
            <dd>
                <label for="meal0"><input type="checkbox" class="option" name="meals[]" id="meal0" value="breakfast"<?php if (in_array('breakfast', $meals)) { echo ' checked="checked"'; } ?> />breakfast</label>
                <label for="meal1"><input type="checkbox" class="option" name="meals[]" id="meal1" value="lunch"<?php if (in_array('lunch', $meals)) { echo ' checked="checked"'; } ?> />lunch</label>
                <label for="meal2"><input type="checkbox" class="option" name="meals[]" id="meal2" value="dinner"<?php if (in_array('dinner', $meals)) { echo ' checked="checked"'; } ?> />dinner</label>
            </dd>

            <dt><label for="remark">Remark</label></dt>
            <dd class="text"><textarea name="remark" id="remark" rows="5" cols="40"><?php echo htmlentities($remark); ?></textarea></dd>

            <dt class="full clearfix" id="lastrow">
                <input type="submit" id="btnSubmit" name="btnSubmit" value="Send" />
            </dt>

        </dl>

    </fieldset>

</form>

</body>
</html>