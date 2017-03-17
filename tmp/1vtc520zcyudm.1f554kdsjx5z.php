<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        <title>Blogg</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content= "description">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link rel="icon" type="image/png" href="<?php echo $BASE; ?>/assets/img/icon.png">
        <link rel="stylesheet" href="<?php echo $BASE; ?>/assets/uikit/css/uikit.min.css" />
        <link rel="stylesheet" href="<?php echo $BASE; ?>/assets/css/style.css" />
        <link href="https://fonts.googleapis.com/css?family=Armata|Oswald|Raleway" rel="stylesheet">
        <script src="<?php echo $BASE; ?>/assets/uikit/js/jquery.min.js"></script>
        <script src="<?php echo $BASE; ?>/assets/uikit/js/uikit.min.js"></script>
        <script src="<?php echo $BASE; ?>/assets/tinymce/tinymce.min.js"></script>
    </head>
    <body>

       <?php echo $this->render($header,$this->mime,get_defined_vars(),0); ?>

	   <?php echo $this->render($content,$this->mime,get_defined_vars(),0); ?>

	   <?php echo $this->render($footer,$this->mime,get_defined_vars(),0); ?>

    </body>
</html>