<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"/>
    <!-- Nucleo Icons -->
    <link href="./assets/css/nucleo-icons.css" rel="stylesheet"/>
    <link href="./assets/css/nucleo-svg.css" rel="stylesheet"/>
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="./assets/css/nucleo-svg.css" rel="stylesheet"/>
    <!-- CSS Files -->
    <link id="pagestyle" href="./assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet"/>
</head>

<body>
<main class="main-content position-relative border-radius-lg ">
    <?php include_once WEBROOT . '/views/nav.php' ?>
    <div class="container-fluid py-4">
        {{content}}
    </div>

</main>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="/assets/js/plugins/Validation.js"></script>
<script>

    (() => {
        setTimeout(() => {
            const closeButton = document.querySelector('button.btn-close[data-bs-dismiss="alert"][aria-label="Close"]');
            if (closeButton) {
                closeButton.click();
            }
        }, 4000);
    })();

    if (document.querySelector('#form-user')) {
        Validator({
            form: '#form-user',
            formGroupSelector: '.form-group',
            errorSelector: '.form-message',

            rules: [
                Validator.isRequired('input[name="email"]', 'Email is require !'),
            ],

            onSubmit: function (data) {
                console.log(data);
                //
                document.querySelector(this.form).submit();
            }

        })
    }
</script>
</body>

</html>