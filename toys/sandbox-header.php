<!DOCTYPE HTML>
<!--[if lt IE 7 ]> <html class="ie6 ie nojs" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7 ie nojs" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 ie nojs" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9 ie nojs" lang="en"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="nojs"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title ?></title>



        <meta name="description" content="">
        <meta name="author" content="kyle hamilton">

        <link rel="stylesheet" href="main-styles.css"/>
        <?php if($stylesheet) {
            echo "<link rel='stylesheet' type='text/css' href='{$stylesheet}'>"; 
        }
        ?>
        

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script src="/js/scripts.js"></script> 
        

    </head>

    <body>
        <?php include_once("analyticstracking.php") ?>

        <div class="wrapper">

          