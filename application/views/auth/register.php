<div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="First Name" name="first_name" value="<?php echo set_value('first_name'); ?>">
                                            <?php echo form_error('first_name', '<small class="text-danger">', '</small>'); ?>

                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Last Name" name="last_name" value="<?php echo set_value('first_name'); ?>">
                                            <?php echo form_error('last_name', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">

                                        <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                            placeholder="Email Address" name="email" value="<?php echo set_value('email'); ?>">
                                            <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="no_telp"
                                            placeholder="Nomor Telphone Orang Tua" name="no_handphone_orang_tua" value="<?php echo set_value('no_handphone_orang_tua'); ?>">
                                            <?php echo form_error('no_handphone_orang_tua', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            id="nik" placeholder="NIK (Nomor Induk Kependudukan)" name="nik" value="<?php echo set_value('nik'); ?>">
                                            <?php echo form_error('nik', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            id="no_kk" placeholder="Nomor KK" name="no_kk" value="<?php echo set_value('no_kk'); ?>">
                                            <?php echo form_error('no_kk', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            id="nama_orang_tua" placeholder="Nama Orang Tua" name="nama_orang_tua" value="<?php echo set_value('nama_orang_tua'); ?>">
                                            <?php echo form_error('nama_orang_tua', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control select2">
                                            <option value="">Select Jenis Kelamin</option>
                                            <option value="1" <?= set_value('jenis_kelamin') == 1 ? 'selected' : '' ?>>Laki Laki</option>
                                            <option value="0" <?= set_value('jenis_kelamin') == 0 ? 'selected' : '' ?>>Perempuan</option>

                                        </select>
                                        <?php echo form_error('jenis_kelamin', '<small class="text-danger">', '</small>'); ?>
                                        <!-- <input type="text" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password"> -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control" placeholder="Alamat Lengkap"><?php echo set_value('alamat'); ?></textarea>
                                    <?php echo form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <button  class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                              
                            </form>
                            <hr>
                          
                            <div class="text-center">
                                <a class="small" href="<?= base_url('auth') ?>">Sudah punya Akun? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>