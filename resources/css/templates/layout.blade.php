<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="max-age=604800">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Website title - bootstrap html template</title>


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" type="text/javascript"></script>

    <!-- Bootstrap4 files-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" type="text/javascript">
    </script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"
        type="text/css">

    <!-- Font awesome 5 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" type="text/css"
        rel="stylesheet">

    <!-- plugin: fancybox  -->

    <!-- custom style -->
    <link href="{{ url_for('static', filename='css/ui.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url_for('static', filename='css/responsive.css') }}" rel="stylesheet"
        media="only screen and (max-width: 1200px)">

    <!-- custom javascript -->
    <script>
        $(document).ready(function () {

            $(document).on('click', '.dropdown-menu', function (e) {
                e.stopPropagation();
            });

            if ($('[data-toggle="tooltip"]').length > 0) { // check if element exists
                $('[data-toggle="tooltip"]').tooltip()
            }

        });
    </script>

</head>

<body style="">


    <header class="section-header">
        <section class="header-main border-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-4">
                        <a href="#" class="brand-wrap">
                            <img class="logo" src="">
                        </a> <!-- brand-wrap.// -->
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <form action="#" class="search">
                            <div class="input-group w-100">
                                <input type="text" class="form-control" placeholder="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form> <!-- search-wrap .end// -->
                    </div> <!-- col.// -->
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="widgets-wrap float-md-right">
                            <div class="widget-header  mr-3">
                                <a href="#" class="icon icon-sm rounded-circle border"><i
                                        class="fa fa-shopping-cart"></i></a>
                                <span class="badge badge-pill badge-danger notify">0</span>
                            </div>
                            <div class="widget-header icontext">
                                <a href="#" class="icon icon-sm rounded-circle border"><i class="fa fa-user"></i></a>
                                <div class="text">
                                    <span class="text-muted">Welcome!</span>
                                    <div>
                                        <a href="{{ url_for('login') }}">Sign in</a> |
                                        <a href="{{ url_for('register') }}">Register</a>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- widgets-wrap.// -->
                    </div> <!-- col.// -->
                </div> <!-- row.// -->
            </div> <!-- container.// -->
        </section> <!-- header-main .// -->
    </header> <!-- section-header.// -->

{% block content %}
{% endblock %}


    <!-- ========================= FOOTER ========================= -->
    <footer class="section-footer border-top padding-y">
        <div class="container">
            <p class="float-md-right">
                © Copyright 2019 All rights reserved
            </p>
            <p>
                <a href="#">Terms and conditions</a>
            </p>
        </div><!-- //container -->
    </footer>
    <!-- ========================= FOOTER END // ========================= -->




</body>

</html>