
<?php
$pwd = getcwd();
$fileArr = [];
$path ='';

if (isset($_GET['path'])){
    $pathbool = true;

    $path = (string)$_GET['path'];
    /*var_dump($path . PHP_EOL);
    var_dump($_SERVER['PHP_SELF']);
    var_dump($pwd . PHP_EOL);*/

}
else {
    $pathbool = false;
}

foreach (new DirectoryIterator('.'.$path) as $file) {
    if($file->isDot()) continue;
    if ($file->isDir()){
        $fileArr[$file ->getFilename()] = 'folder';
    }
    else{
        $fileArr[$file ->getFilename()] = $file -> getExtension();
    }
}

?>

<!doctype html>
<html>
<head>
    <title>fileExplorer</title>
    <meta charset="utf-8" />
    <style>
        ul {
            margin: 0;
            padding: 0;
        }
        li {
            list-style: none;
            display: block;
            height: 24px;
            line-height: 24px;
            font-family: monospace;
        }

        li:nth-child(2n) {
            background: rgba(0,0,0,0.05);
        }

        li:hover {
            background: #c2e1ff;
        }

        li img {
            margin-right: 4px;
            position: relative;
            top: 4px;
        }
    </style>
</head>
<body>


<h1>Browsing <code><?php echo $pwd.$path;?></code></h1>

<ul>
    <?php
    if ($pathbool === true){
        ?>
        <li>
            <a href="<?php echo basename($_SERVER['PHP_SELF'])?>">
                <img src="icons/up.gif">
            </a>
        </li>
        <?php
    }
    /*if (basename($_SERVER['PHP_SELF']) !== $path){
        ?>
        <li>
            <a href="<?php echo basename($_SERVER['PHP_SELF'])?>">
                <img src="icons/up.gif">
            </a>
        </li>
        <?php
    }*/
    foreach ($fileArr as $key => $value){
        ?>
        <li>
            <?php if($value === 'folder'){
                ?>
                <a href="<?php echo basename($_SERVER['PHP_SELF']).'?path='.$path.'/'.$key ?>" >
                <?php
            }?>
                <img src="
                <?php

                echo './icons/'.$value.'.gif';

                ?>
                " />
                <?php echo $key;
                if($value === 'folder'){
                ?>
            </a><?php
        }?>
            <?php
            if($value !== 'folder') {
                echo '<em>('.filesize(__DIR__.$path.'/'.$key).'bytes)</em>';
            }
            ?>

        </li>
        <?php
    }
    ?>
</ul>

</body>
</html>