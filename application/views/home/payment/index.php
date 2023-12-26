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
    </style>
    <title>Hello, world!</title>
</head>

<body>
    <div class="container py-5">
        <!-- For demo purpose -->
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-6">Payment</h1>
            </div>
        </div> <!-- End -->
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card ">
                    <div class="card-header">

                        <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                            <!-- Credit card form tabs -->
                            <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                                <li class="nav-item"> <a data-toggle="pill" href="#credit-card" class="nav-link active "> <i class="fas fa-user mr-2"></i> Detail Siswa </a> </li>
                                <li class="nav-item"> <a data-toggle="pill" href="#paypal" class="nav-link "> <i class="fas fa-file-invoice-dollar mr-2"></i> Detail Pembayaran </a> </li>
                                <li class="nav-item"> <a data-toggle="pill" href="#net-banking" class="nav-link "> <i class="fas fa-mobile-alt mr-2"></i> Payment Method </a> </li>
                            </ul>
                        </div> <!-- End -->
                        <!-- Credit card form content -->
                        <div class="tab-content">
                            <?php echo form_error('bank', '<small class="text-danger">', '</small>'); ?>
                            <!-- credit card info-->
                            <div id="credit-card" class="tab-pane fade show active pt-3">

                                <form role="form" onsubmit="event.preventDefault()">
                                    <hr>
                                    <h4>Detail Siswa</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Nama Lengkap</label>
                                                <h4><?= $siswa->name ?></h4>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="asal_sekolah">Asal Sekolah</label>
                                                <h4><?= $siswa->asal_sekolah ?></h4>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nisn">NISN</label>
                                                <h4><?= $siswa->nisn ?></h4>


                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jurusan">Jurusan</label>
                                                <h4><?= $siswa->jurusan ?></h4>


                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="agama">Agama</label>
                                                <h4><?= $siswa->agama ?></h4>


                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                                <h4><?= $siswa->jenis_kelamin == 1 ? 'Pria' : 'Perempuan' ?></h4>



                                                <!-- <input type="text" id="name" class="form-control "> -->
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email Address</label>
                                                <h4><?= $siswa->email ?></h4>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                                <h4> <?= formatTime($siswa->tanggal_lahir)  ?></h4>


                                            </div>
                                        </div>



                                    </div>
                                    <hr>
                                    <h4>Detail Orang Tua</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama_ortu">Nama Orang Tua</label>
                                                <h4><?= $siswa->nama_ortu ?></h4>

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="no_telp_ortu">Nomor Telephone Orang Tua</label>
                                                <h4><?= $siswa->no_telp_ortu ?></h4>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="pekerjaan_ortu">Pekerjaan Orang Tua</label>
                                                <h4><?= $siswa->pekerjaan_ortu ?></h4>

                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <h4>Dokument</h4>
                                    <div class="spotlight-group">

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="foto_diri">Foto Diri</label>
                                                    <a href="<?= base_url('uploads/data/' . $siswa->foto_diri) ?>" class="spotlight" data-title="Foto Diri">
                                                        <img src="<?= base_url('uploads/data/' . $siswa->foto_diri) ?>" alt="" width="150">
                                                    </a>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="ijasah">Ijasah</label>
                                                    <a href="<?= base_url('uploads/data/' . $siswa->ijasah) ?>" class="spotlight" data-title="Ijasah">
                                                        <img src="<?= base_url('uploads/data/' . $siswa->ijasah) ?>" alt="" width="150">
                                                    </a>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="skhun">SKHUN</label>
                                                    <a href="<?= base_url('uploads/data/' . $siswa->skhun) ?>" class="spotlight" data-title="SKHUN">
                                                        <img src="<?= base_url('uploads/data/' . $siswa->skhun) ?>" alt="" width="150">
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group"> <label for="username">
                                            <h6>Card Owner</h6>
                                        </label> <input type="text" name="username" placeholder="Card Owner Name" required class="form-control "> </div> -->
                                    <!-- <div class="form-group"> <label for="cardNumber">
                                            <h6>Card number</h6>
                                        </label>
                                        <div class="input-group"> <input type="text" name="cardNumber" placeholder="Valid card number" class="form-control " required>
                                            <div class="input-group-append"> <span class="input-group-text text-muted"> <i class="fab fa-cc-visa mx-1"></i> <i class="fab fa-cc-mastercard mx-1"></i> <i class="fab fa-cc-amex mx-1"></i> </span> </div>
                                        </div>
                                    </div> -->
                                    <!-- <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group"> <label><span class="hidden-xs">
                                                        <h6>Expiration Date</h6>
                                                    </span></label>
                                                <div class="input-group"> <input type="number" placeholder="MM" name="" class="form-control" required> <input type="number" placeholder="YY" name="" class="form-control" required> </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-4"> <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                                    <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                                </label> <input type="text" required class="form-control"> </div>
                                        </div>
                                    </div> -->
                                    <div class="card-footer">
                                </form>
                            </div>
                        </div> <!-- End -->
                        <!-- Paypal info -->
                        <div id="paypal" class="tab-pane fade pt-3">
                            <div class="container">
                                <div class="card">
                                    <!-- <div class="card-header">
                                        Invoice
                                        <strong>01/01/01/2018</strong>
                                        <span class="float-right"> <strong>Status:</strong> Pending</span>

                                    </div> -->
                                    <div class="card-body">
                                        <div class="row mb-4">
                                            <div class="col-sm-6">
                                                <h6 class="mb-3">From:</h6>
                                                <div>
                                                    <strong>SMK Hebat</strong>
                                                </div>
                                                <div>Jl. Keramat Aja</div>
                                                <div>Keramat, Indonesia</div>
                                                <div>Email: Smkhebataja@gmail.com</div>
                                                <div>Phone: +62 888873636</div>
                                            </div>

                                            <!-- <div class="col-sm-6">
                                                <h6 class="mb-3">To:</h6>
                                                <div>
                                                    <strong>Bob Mart</strong>
                                                </div>
                                                <div>Attn: Daniel Marek</div>
                                                <div>43-190 Mikolow, Poland</div>
                                                <div>Email: marek@daniel.com</div>
                                                <div>Phone: +48 123 456 789</div>
                                            </div> -->


                                            <div class="col-lg-6 col-sm-6 ">
                                                <table class="table table-clear">
                                                    <tbody>
                                                        <tr>
                                                            <td class="left">
                                                                <strong>Subtotal</strong>
                                                            </td>
                                                            <td class="right">Rp. 2.000.000</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="left">
                                                                <strong>PPN (11%)</strong>
                                                            </td>
                                                            <td class="right">Rp. 220.000</td>
                                                        </tr>

                                                        <tr>
                                                            <td class="left">
                                                                <strong>Total</strong>
                                                            </td>
                                                            <td class="right">
                                                                <strong>Rp. 2.220.000</strong>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div> <!-- End -->
                        <!-- bank transfer info -->
                        <div id="net-banking" class="tab-pane fade pt-3">
                            <form method="POST">

                                <div class="d-flex flex-column justify-content-center align-items-center border" style="display: none !important;" id="va">
                                    <h4 class="text-center">BCA</h4>
                                    <h5>93442028784298</h5>
                                </div>
                                <div class="form-group "> <label for="Select Your Bank">

                                        <h6>Select your Payment Method</h6>
                                    </label> <select class="form-control" id="ccmonth" name="bank">
                                        <option value="" selected disabled>--Please select your Payment Method--</option>
                                        <option value="BCA|<?= randomChar(20) ?>">BCA</option>
                                        <option value="BNI|<?= randomChar(23) ?>">BNI</option>
                                        <option value="MANDIRI|<?= randomChar(22) ?>">MANDIRI</option>
                                    </select> </div>
                                <div class="form-group">

                                    <p> <button class="btn btn-primary "><i class="fas fa-mobile-alt mr-2"></i> Proceed Payment</button> </p>
                                </div>
                                <p class="text-muted">Note: After clicking on the button, you will be directed to a secure gateway for payment. After completing the payment process, you will be redirected back to the website to view details of your order. </p>
                            </form>
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