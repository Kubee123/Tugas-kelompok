<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> <a href="dashboard">Dashboard</a></h1>
        
    </div>
    <?php if ($is_admin ?? $user->is_admin == 1) : ?>
        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Jumlah Siswa Yang mendaftar</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $all ?></div>
                            </div>
                            <div class="col-auto">
                            <i class="fa-solid fa-user fa-2x text-gray-300"></i>
                                <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Jumlah Siswa yang di terima</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $terima ?></div>
                            </div>
                            <div class="col-auto">
                            <i class="fa-solid fa-user-check fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah siswa yang di tolak
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $tolak ?></div>

                            </div>
                            <div class="col-auto">
                            <i class="fa-solid fa-user-minus fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
            </div>
        </div>

        <!-- Content Row -->


    <?php else : ?>
        <!-- Content Row -->
        <div class="row">

            <!-- Content Column -->


            <div class="col-lg-12 mb-4">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Illustrations -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Status Siswa</h6>
                            </div>
                            <div class="card-body">
                                <?php if ($status ?? $user->status == 0) : ?>
                                    <div class="text-center">
                                        <i class="fa-solid fa-spinner text-warning" style="font-size:72px"></i>
                                        <!-- <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="..."> -->
                                    </div>
                                    <p class="text-center">Anda masih dalam proses seleksi</p>
                                    <!-- <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                                        unDraw &rarr;</a> -->
                                <?php elseif ($status ?? $user->status == 1) : ?>
                                    <div class="text-center">
                                        <i class="fa-regular fa-circle-check text-success" style="font-size:72px"></i>
                                        <!-- <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="..."> -->
                                    </div>
                                    <p class="text-center">Anda telah di terima Memasuki SMK Hebat</p>
                                    <!-- <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                                        unDraw &rarr;</a> -->
                                <?php elseif ($status ?? $user->status == 2) : ?>
                                    <div class="text-center">
                                        <i class="fa-regular fa-circle-xmark text-danger" style="font-size:72px"></i>
                                        <!-- <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="..."> -->
                                    </div>
                                    <p class="text-center">Anda tidak diterima masuk , silahkan mencoba lain waktu</p>
                                    <!-- <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                                        unDraw &rarr;</a> -->
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if ($bukti_transfer ?? $user->bukti_transfer == null) : ?>
                            <form method="POST" enctype="multipart/form-data" action="<?= base_url('admin/upload/bukti_transaksi') ?>">

                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Bukti Pembayaran</h6>
                                    </div>
                                    <div class="card-body ">
                                        <div class="d-flex justify-content-center flex-column">
                                            <h5 class="text-center">BCA</h5>
                                            <h3 class="text-center">082122660155</h3>
                                        </div>

                                        <!-- <div class="image"></div> -->
                                        <input type="file" name="images" class="form-control">
                                        <?php echo form_error('images', '<small class="text-danger">', '</small>'); ?>
                                        <div class="d-flex justify-content-end mt-2">
                                            <button class="btn btn-primary">Kirim Bukti</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <!-- Approach -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Nama Lengkap :</label>
                                            <p class="font-weight-bold"><?= $name ?? $user->name ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Nama Orang Tua :</label>
                                            <p class="font-weight-bold"><?= $nama_orang_tua ?? $user->nama_orang_tua ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Email :</label>
                                            <p class="font-weight-bold"><?= $email ?? $user->email ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">No Telephone :</label>
                                            <p class="font-weight-bold"><?= $no_handphone_orang_tua ?? $user->no_handphone_orang_tua ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Nik :</label>
                                            <p class="font-weight-bold"><?= $nik ?? $user->nik ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">No KK :</label>
                                            <p class="font-weight-bold"><?= $no_kk ?? $user->no_kk ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Jenis Kelamin :</label>
                                            <p class="font-weight-bold"><?= $jenis_kelamin ?? $user->jenis_kelamin == 1 ? 'Pria' : 'Wanita' ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Alamat :</label>
                                            <p class="font-weight-bold"><?= $alamat ?? $user->alamat ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Status :</label>
                                            <?php if ($status ?? $user->status == 0) : ?>
                                                <p class="font-weight-bold">Menunggu Konfirmasi Admin</p>
                                            <?php elseif ($status ?? $user->status == 1) : ?>
                                                <p class="font-weight-bold">Success</p>
                                            <?php elseif ($status ?? $user->status == 2) : ?>
                                                <p class="font-weight-bold">Anda tidak di terima</p>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php if ($bukti_transfer ?? $user->bukti_transfer != null) : ?>
                                        <?php $bukti_transfer = $bukti_transfer ?? $user->bukti_transfer ?>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Bukti Transfer :</label>
                                                <div class="spotlight-group">
                                                    <a href="<?= base_url('uploads/bukti_transfer/') . $bukti_transfer ; ?>" class="spotlight" data-title="Bukti Transfer">
                                                        <img src="<?= base_url('uploads/bukti_transfer/') . $bukti_transfer; ?>" alt="" class="img-fluid" width="500">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





            </div>
        </div>
    <?php endif; ?>

</div>
<!-- /.container-fluid -->