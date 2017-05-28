<?php $nonavbar = '';$pagetitle  =   "";require_once 'init.php';$stamp  =  "SAg06EXntt";$stmt   =    $con->query("SELECT * FROM `pastes` WHERE `stamp` = '$stamp'");
$stmt   =   $stmt->fetch(PDO::FETCH_OBJ);
$title  =   $stmt->title;
$text   =   $stmt->text;
$date   =   $stmt->date;
$time   =   $stmt->time;?><html>
    <head>
        <title><?php echo $title;?></title>
        <style>
            h3{
                text-align: center;
            }
            .row{
                margin-top: 10px;
                margin-left: 0px;
                padding: 0px;
                left: 5%;
                width: 90%;
            }
        </style>
    </head>
    <body onload="window.print();">
        <h3><?php echo $title; ?></h3>
        <div class="row">
            <code>
                <?php echo $text; ?> 
            </code>
        </div>
    </body>
</html>