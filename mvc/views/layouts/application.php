<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo in_array("home", $data) ? "Ô PHOTOGRAPHY CONTEST - Nét đẹp phương Đông" : "Admin" ?></title>

    <meta property="og:title" content="Ô PHOTOGRAPHY CONTEST - Nét đẹp phương Đông" />
    <!--<meta property="og:description" content="..." />-->
    <meta property="og:image" content="http://o.lofficielvietnam.com/ORIENTAL-BEAUTY.jpg" />
    <meta name="twitter:image" content="http://o.lofficielvietnam.com/ORIENTAL-BEAUTY.jpg">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/public/assets/vendor/bootstrap/css/bootstrap.min.css">

    <!-- Admin -->
    <?php if (in_array("admin", $data) || in_array("login", $data) || in_array("verify",$data)) { ?>
        <link href="/public/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
        <link rel="stylesheet" href="/public/assets/libs/css/style.css">
        <link rel="stylesheet" href="/public/assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <?php } ?>
    <!-- Font Awesome  -->
    <link rel="stylesheet" href="/public/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">


    <!-- Frontend assets -->
    <?php if (in_array("home", $data)) { ?>
        <link rel="stylesheet" href="/public/frontEnd/assests/css/style.css">
        <link rel="stylesheet" href="/public/frontEnd/assests/css/responsive.css">
        <link rel="stylesheet" href="/public/assets/vendor/slick/slick.css">
        <link rel="stylesheet" href="/public/assets/vendor/slick/slick-theme.css">
    <?php } ?>

    <!-- Page login -->
    <?php if (in_array("login", $data) || (in_array("verify",$data))) { ?>
        <style>
            html,
            body {
                height: 100%;
            }

            body {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-align: center;
                align-items: center;
                padding-top: 40px;
                padding-bottom: 40px;
            }

            .photography-form .logo-img {
                height: auto;
                width: 100%;
                max-width: 200px;
            }
        </style>
    <?php } ?>

    <?php
    if (in_array("admin", $data)) { ?>
        <style>
            .logo-img {
                height: 40px;
                width: auto;
            }
        </style>
        <link rel="stylesheet" type="text/css" href="/public/assets/vendor/datatables/css/dataTables.bootstrap4.css">
        <link rel="stylesheet" type="text/css" href="/public/assets/vendor/datatables/css/buttons.bootstrap4.css">
        <link rel="stylesheet" type="text/css" href="/public/assets/vendor/datatables/css/select.bootstrap4.css">
        <link rel="stylesheet" type="text/css" href="/public/assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
        <!-- <link rel="stylesheet" href="/public/assets/vendor/bootstrap/css/bootstrapv5.min.css"> -->

    <?php } ?>

</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->

    <div class="photography-main" style="width: 100%;">
        <?= @$content ?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <!-- <script src="/public/assets/vendor/jquery/jquery.min-3.6.js"></script> -->
    <script src="/public/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="/public/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="/public/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="/public/assets/libs/js/main-js.js"></script>

    <!-- sclick library -->
    <script src="/public/assets/vendor/slick/slick.min.js"></script>

    <!-- Frontend Script -->
    <script src="/public/assets/js/main.js"></script>
    <script src="/public/frontEnd/assests/js/app.js"></script>

    <?php if (in_array("admin", $data)) { ?>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="/public/assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
        <script src="/public/assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
        <script src="/public/assets/vendor/datatables/js/data-table.js"></script>
    <?php } ?>

    <?php
    echo '<!-- Button trigger modal -->
    <button type="button" class="btn btn-danger btnTriggerModalSuccess d-none" data-toggle="modal" data-target="#modelSuccess">
    Success
    </button>';

    popupSuccess('modal_success');
    ?>
</body>

</html>