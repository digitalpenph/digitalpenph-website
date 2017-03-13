<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php echo $this->config->item('title'); ?></title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet">

        <!-- Theme CSS -->
        <link href="<?php echo base_url("assets/css/freelancer.min.css"); ?>" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo base_url("assets/vendor/font-awesome/css/font-awesome.min.css"); ?>" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

        <!-- DigitalPenPH CSS -->
        <link href="<?php echo base_url("assets/css/digitalpenph.css"); ?>" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script>
            var conturl = <?php echo json_encode(base_url('DigitalPenPhController/contactus')); ?>;
        </script>
    </head>

    <body id="page-top" class="index">

        <!-- Navigation -->
        <?php include 'templates/navigation.php' ?>

        <!-- Header -->
        <?php include 'templates/header.php' ?>

        <!-- Body content -->
        <?php $this->load->view($content); ?>

        <!-- Footer -->
        <?php include 'templates/footer.php' ?>

        <!-- jQuery -->
        <script src="<?php echo base_url("assets/vendor/jquery/jquery.min.js"); ?>"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url("assets/vendor/bootstrap/js/bootstrap.min.js"); ?>"></script>

        <!-- Plugin JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

        <!-- Contact Form JavaScript -->
        <script src="<?php echo base_url("assets/js/jqBootstrapValidation.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/contact_me.js"); ?>"></script>

        <!-- Theme JavaScript -->
        <script src="<?php echo base_url("assets/js/freelancer.min.js"); ?>"></script>

    </body>

</html>
