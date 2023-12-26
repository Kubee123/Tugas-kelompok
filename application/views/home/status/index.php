<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="<?= base_url('assets/vendor/spotlight/css/spotlight.min.css') ?>">
    <style>
        body {
            background: #f5f5f5
        }

        .rounded {
            border-radius: 1rem
        }

        .nav-pills .nav-link {
            color: #555
        }

        .nav-pills .nav-link.active {
            color: white
        }

        input[type="radio"] {
            margin-right: 5px
        }

        .bold {
            font-weight: bold
        }

        .font-icon {
            font-size: 72px;
        }
    </style>
    <title>Hello, world!</title>
</head>

<body>
    <div class="container py-5">
        <!-- For demo purpose -->
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-6"></h1>
            </div>
        </div> <!-- End -->
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card ">
                    <div class="card-header">

                        <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                            <!-- Credit card form tabs -->
                            <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">

                                <li class="nav-item"> <a data-toggle="pill" href="#net-banking" class="nav-link active"> <i class="fas fa-mobile-alt mr-2"></i>
                                        Payment Status
                                    </a> </li>
                            </ul>
                        </div> <!-- End -->
                        <!-- Credit card form content -->


                        <!-- bank transfer info -->
                        <div id="net-banking" class="tab-pane fade active show pt-3">
                            <div class="d-flex justify-content-center">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                            <div>
                                                <?php if ($payment->status == 0) : ?>
                                                    <i class="fas fa-spinner font-icon text-info"></i>
                                                <?php elseif ($payment->status == 1) : ?>
                                                    <i class="fas fa-spinner font-icon text-info"></i>

                                                <?php elseif ($payment->status == 2) : ?>
                                                    <i class="far fa-check-circle font-icon text-success"></i>

                                                <?php elseif ($payment->status == 3) : ?>
                                                    <i class="fas fa-times-circle font-icon text-danger"></i>
                                                <?php endif; ?>
                                            </div>
                                            <div>

                                                <?php if ($payment->status == 0) : ?>
                                                    <h1 class=" ">Waiting Transfer</h1>
                                                <?php elseif ($payment->status == 1) : ?>
                                                    <h1 class=" ">Waiting Approval</h1>
                                                <?php elseif ($payment->status == 2) : ?>
                                                    <h1 class=" ">Payment Successfully</h1>
                                                <?php elseif ($payment->status == 3) : ?>
                                                    <h1 class="">Payment Failed</h1>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div> <!-- End -->
                    <!-- End -->
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/vendor/spotlight/js/spotlight.min.js') ?>"></script>
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
        $("#ccmonth").on('change', function() {
            let val = $(this).val();
            val = val.split("|");
            $("#va").show();
            $("#va h4").text(val[0]);
            $("#va h5").text(val[1]);

        });
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>