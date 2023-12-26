<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">List Siswa</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <table class="table" id="datatables">
            <thead>
              <th>#</th>
              <th>Nama</th>
              <th>email</th>
              <th>Status User</th>
              <th>Status Pembayaran</th>
              <th>action</th>
            </thead>
            <tbody>

              <?php $i = 1;

              foreach ($list_siswa as $value) : ?>

                <tr>
                  <td><?= $i ?></td>
                  <td><?= $value->name ?></td>
                  <td><?= $value->email ?></td>

                  <td>
                    <?php if ($status ?? $value->status_formulir == 0) : ?>

                      <p class="text-center">Proccess</p>
                      <!-- <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                  unDraw &rarr;</a> -->
                    <?php elseif ($status ?? $value->status_formulir == 1) : ?>

                      <p class="text-center">Approve</p>
                      <!-- <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                  unDraw &rarr;</a> -->
                    <?php elseif ($status ?? $value->status_formulir == 2) : ?>

                      <p class="text-center">Decline</p>
                      <!-- <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                  unDraw &rarr;</a> -->

                    <?php endif; ?>
                  </td>
                  <td>
                    <?php if ($status ?? $value->status == 0) : ?>

                      <div class="badge bg-info p-3">
                        <span class="text-white">Waiting Transfer</span>
                      </div>
                      <!-- <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                                        unDraw &rarr;</a> -->
                    <?php elseif ($status ?? $value->status == 1) : ?>
                      <div class="badge bg-info p-3">
                        <span class="text-white">Waiting Approval</span>
                      </div>
                      <a href="<?= base_url('uploads/data/' . $value->bukti) ?>" class="spotlight">Lihat Bukti</a>

                      <!-- <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                                        unDraw &rarr;</a> -->
                    <?php elseif ($status ?? $value->status == 2) : ?>
                      <div class="badge bg-success p-3">
                        <span class="text-white">Approve</span>
                      </div>
                      <a href="<?= base_url('uploads/data/' . $value->bukti) ?>" class="spotlight">Lihat Bukti</a>
                      <!-- <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                                        unDraw &rarr;</a> -->
                    <?php elseif ($status ?? $value->status == 3) : ?>
                      <div class="badge bg-danger p-3">
                        <span class="text-white">Decline</span>
                      </div>
                      <a href="<?= base_url('uploads/data/' . $value->bukti) ?>" class="spotlight">Lihat Bukti</a>
                    <?php endif; ?>
                  </td>
                  <td>
                    <div class="d-flex" style="gap:16px">
                      <a href="<?= base_url('admin/list/calon_siswa/' . $value->formulir_id . '/detail') ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                      <?php if ($value->status == 1 && $value->bukti != null) : ?>
                        <a href="javascript:;" class="btn btn-success btnApprove" data-toggle="modal" data-target="#exampleModal" data-id="<?= $value->formulir_id ?>"> <i class="fas fa-check"></i> </a>
                        <a href="javascript:;" class="btn btn-danger btnDecline" data-toggle="modal" data-target="#declineModal" data-id="<?= $value->formulir_id ?>"><i class="fa-regular fa-circle-xmark"></i> </a>

                      <?php endif; ?>
                    </div>
                  </td>
                </tr>
              <?php $i++;
              endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are You Sure?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to approve?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="#" class="btn btn-primary" id="btnApprove">Approve</a>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="declineModal" tabindex="-1" aria-labelledby="declineModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="declineModalLabel">Are You Sure?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to Decline?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="#" class="btn btn-danger" id="btnDecline">Decline</a>
      </div>
    </div>
  </div>
</div>