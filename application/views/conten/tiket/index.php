<style>
  /* The Modal (background) */
  .modal {
    display: none;
    /* Hidden by default */
    position: fixed;
    /* Stay in place */
    left: 0;
    top: 0;
    width: 100%;
    /* Full width */
    height: 100%;
    /* Full height */
    overflow: auto;
    /* Enable scroll if needed */
    background-color: rgb(0, 0, 0);
    /* Fallback color */
    background-color: rgba(0, 0, 0, 0.4);
    /* Black w/ opacity */
  }

  /* Modal Content/Box */
  .modal-content {
    background-color: #fefefe;
    margin: 10% auto;
    /* 15% from the top and centered */
    padding: 20px;
    border-radius: 1.3rem !important;
    border: 1px solid #888;
    width: 80%;
    /* Could be more or less, depending on screen size */
  }

  .modal-contentss {
    background-color: #fefefe;
    margin: 3% auto;
    /* 15% from the top and centered */
    padding: 20px;
    border-radius: 1.3rem !important;
    border: 1px solid #888;
    width: 80%;
    /* Could be more or less, depending on screen size */
  }

  /* The Close Button */
  .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }
</style>
<h3>Halaman <?= $title; ?></h3>

<div class="col-12">
  <div class="bg-light rounded h-100 p-4">
    <?php if ($this->session->flashdata('pesan')) {
      echo '<div class="alert alert-success" role="alert">
                    Success ! ';
      echo $this->session->flashdata('pesan');
      echo '</div>';
    } ?>
    <div class="bg-light rounded  p-2" id="divhide">
      <select class="form-select form-select-lg" id="bulan" aria-label=".form-select-lg example">
        <option value="0">Open this select Moon</option>
        <option value="1" <?= ($bulan === "01") ? $selected = 'selected' : '' ?>>Data Tiket Januari</option>
        <option value="2" <?= ($bulan === "02") ? $selected = 'selected' : '' ?>>Data Tiket Februari</option>
        <option value="3" <?= ($bulan === "03") ? $selected = 'selected' : '' ?>>Data Tiket Maret</option>
        <option value="4" <?= ($bulan === "04") ? $selected = 'selected' : '' ?>>Data Tiket April</option>
        <option value="5" <?= ($bulan === "05") ? $selected = 'selected' : '' ?>>Data Tiket Mei</option>
        <option value="6" <?= ($bulan === "06") ? $selected = 'selected' : '' ?>>Data Tiket Juni</option>
        <option value="7" <?= ($bulan === "07") ? $selected = 'selected' : '' ?>>Data Tiket Juli</option>
        <option value="8" <?= ($bulan === "08") ? $selected = 'selected' : '' ?>>Data Tiket Agustus</option>
        <option value="9" <?= ($bulan === "09") ? $selected = 'selected' : '' ?>>Data Tiket September</option>
        <option value="10 <?= ($bulan === "10") ? $selected = 'selected' : '' ?>" Data Tiket>Oktober</option>
        <option value="11 <?= ($bulan === "11") ? $selected = 'selected' : '' ?>" Data Tiket>November</option>
        <option value="12 <?= ($bulan === "12") ? $selected = 'selected' : '' ?>" Data Tiket>Desember</option>
      </select>
    </div>
    <?php if (($this->session->userdata('role') == 2) || ($this->session->userdata('role') == 4)) { ?>
      <div class="text-align-right">
        <button type="button" class="btn btn-primary rounded-pill m-2" id="add"><i class="fa fa-user-plus me-2"></i>Tambah Data</button>
      </div>
    <?php } else {
    } ?>
    <div class="table-responsive">
      <table id="tiket" class="table">
        <thead>
          <tr>
            <td>No</td>
            <td>Deskripsi</td>
            <td>PIC</td>
            <td>Request</td>
            <td>Status</td>
            <?php if (($this->session->userdata('role') == 2) || ($this->session->userdata('role') == 4)) { ?>
              <td>Action</td>
            <?php } else {
            } ?>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($tiket as $value) {
          ?>
            <tr>
              <td><?= $no++; ?></td>
              <td>
                <button id="<?= $value->id; ?>" desk="<?= $value->desk; ?>" pic="<?= $value->pic; ?>" request="<?= $value->request; ?>" pelapor="<?= $value->pelapor; ?>" team="<?= $value->team; ?>" priority="<?= $value->priority; ?>" status="<?= $value->status; ?>" divisi="<?= $value->divisi; ?>" tgl="<?= $value->tgl; ?>" bulan="<?= $value->bulan; ?>" tahun="<?= $value->tahun; ?>" type="button" class="btn btn-sm btn-primary rounded-pill m-2 detail">
                  <?= $value->desk; ?>
                </button>
              </td>
              <td>
                <?php foreach ($pegawai as $p) {
                  if ($value->pic == $p->id) { ?>
                    <?= $p->namal; ?>
                <?php }
                } ?>
              </td>
              <td>
                <?= $value->request; ?>
              </td>
              <td>
                <?php if ($value->status == 1) { ?>
                  On Progres
                <?php } else if ($value->status == 2) { ?>
                  Closed
                <?php } else if ($value->status == 3) { ?>
                  Pending
                <?php } ?>
              </td>
              <?php if (($this->session->userdata('role') == 2) || ($this->session->userdata('role') == 4)) { ?>
                <td>
                  <?php if ($value->status == 2) { ?>
                    ✅
                  <?php } else { ?>
                    <button id="<?= $value->id; ?>" desk="<?= $value->desk; ?>" pic="<?= $value->pic; ?>" request="<?= $value->request; ?>" pelapor="<?= $value->pelapor; ?>" team="<?= $value->team; ?>" priority="<?= $value->priority; ?>" status="<?= $value->status; ?>" divisi="<?= $value->divisi; ?>" type="button" class="btn btn-sm btn-success rounded-pill m-2 editdata"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button>
                    <a href="<?= base_url('tiket/delete/') . $value->id ?>" type="button" class="btn btn-sm btn-danger rounded-pill m-2">Hapus</a>
                  <?php } ?>
                </td>
              <?php } else {
              } ?>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal Detail -->
<div id="modaldetail" class="modal">
  <div class="modal-content">
    <span class="close text-dark text-align-right" label="Close">
      <span class="keluar" aria-hidden="true">×</span>
    </span>
    <div class="modal-body">
      <h3>Detail Data Tiket</h3>
      <hr>
      <div class="row">
        <div class="col-md-2">
          Deskripsi =>
        </div>
        <div class="col-md-10">
          <h5 id="ddesk"></h5>
        </div>
      </div>
      <div class="row">
        <div class="col-md-2">
          PIC =>
        </div>
        <div class="col-md-4">
          <h5 id="dpic"></h5>
        </div>
        <div class="col-md-2 ">
          Request =>
        </div>
        <div class="col-md-4">
          <h5 id="drequest"></h5>
        </div>
      </div>
      <div class="row">
        <div class="col-md-2 ">
          Pelapor =>
        </div>
        <div class="col-md-4">
          <h5 id="dpelapor"></h5>
        </div>
        <div class="col-md-2">
          Team =>
        </div>
        <div class="col-md-4">
          <h5 id="dteam"></h5>
        </div>
      </div>
      <div class="row">
        <div class="col-md-2 ">
          Priority =>
        </div>
        <div class="col-md-4">
          <h5 id="dpriority"></h5>
        </div>
        <div class="col-md-2">
          Status =>
        </div>
        <div class="col-md-4">
          <h5 id="dstatus"></h5>
        </div>
      </div>
      <div class="row">
        <div class="col-md-2 ">
          Divisi =>
        </div>
        <div class="col-md-4">
          <h5 id="ddivisi"></h5>
        </div>
        <div class="col-md-2">
          Tanggal =>
        </div>
        <div class="col-md-4">
          <h5 id="dtgl"></h5>
        </div>
      </div>
    </div>
    <div class="modal-footer">

    </div>
  </div>
</div>

<!-- Modal Edit -->
<div id="modaledit" class="modal">
  <div class="modal-contentss">
    <!-- <span class="close text-dark text-align-right" label="Close">
      <span class="keluar" aria-hidden="true">×</span>
    </span> -->
    <div class="modal-body">
      <h3>Edit Data Tiket</h3>
      <hr>
      <form action="<?= base_url('tiket') ?>/update" method="POST">
        <div class="row mb-3">
          <div class="col-md-6">
            <label for="desk" class="form-label">Deskripsi</label>
            <input type="text" class="form-control" id="eddesk" name="desk" aria-describedby="Deskripsi" require>
            <input type="text" class="form-control" id="edid" name="id" hidden>
          </div>
          <div class="col-md-6">
            <label for="pic" class="form-label">Penanggungjawab (PIC)</label>
            <select class="form-select" id="edpic" name="pic" aria-label="Default select example">
              <option selected>Open this select menu PIC</option>
              <?php foreach ($pegawai as $p) { ?>
                <option value="<?= $p->id; ?>"><?= $p->namal; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-6">
            <label for="request" class="form-label">Request</label>
            <input type="text" class="form-control" id="edrequest" name="request" aria-describedby="Request" require>
          </div>
          <div class="col-md-6">
            <label for="pelapor" class="form-label">Pelapor</label>
            <input type="text" class="form-control" id="edpelapor" name="pelapor" aria-describedby="Pelapor" require>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-6">
            <label for="team" class="form-label">Team</label>
            <select class="form-select" id="edteam" name="team" aria-label="Default select example">
              <option selected>Open this select menu Team</option>
              <?php foreach ($pegawai as $p) { ?>
                <option value="<?= $p->id; ?>"><?= $p->namal; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="col-md-6">
            <label for="priority" class="form-label">Priority</label>
            <select class="form-select" id="edpriority" name="priority" aria-label="Default select example">
              <option selected>Open this select menu Priority</option>
              <option value="1">High</option>
              <option value="0">Low</option>
            </select>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-6">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="edstatus" name="status" aria-label="Default select example">
              <option selected>Open this select menu Status</option>
              <option value="1">On Progres</option>
              <option value="2">Closed</option>
              <option value="3">Pending</option>
            </select>
          </div>
          <div class="col-md-6">
            <label for="divisi" class="form-label">Divisi</label>
            <select class="form-select" id="eddivisi" name="divisi" aria-label="Default select example">
              <option selected>Open this select menu divisi Divisi</option>
              <option value="1">Divisi Jaringan</option>
            </select>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Update Data</button>
        <div class="btn btn-secondary cancelmodal">Cancel</div>
      </form>
    </div>
    <div class="modal-footer">
    </div>
  </div>
</div>

<!-- Modal Add -->
<div id="modaladd" class="modal">
  <div class="modal-contentss">
    <!-- <span class="close text-dark text-align-right" label="Close">
      <span class="keluar" aria-hidden="true">×</span>
    </span> -->
    <div class="modal-body">
      <h3>Tambah Tiket</h3>
      <hr>
      <form action="<?= base_url('tiket') ?>/adddata" method="POST">
        <div class="row mb-3">
          <div class="col-md-6">
            <label for="desk" class="form-label">Deskripsi</label>
            <input type="text" class="form-control" id="desk" name="desk" aria-describedby="Deskripsi" require>
          </div>
          <div class="col-md-6">
            <label for="pic" class="form-label">Penanggungjawab (PIC)</label>
            <select class="form-select" id="pic" name="pic" aria-label="Default select example">
              <option selected>Open this select menu PIC</option>
              <?php foreach ($pegawai as $p) { ?>
                <option value="<?= $p->id; ?>"><?= $p->namal; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-6">
            <label for="request" class="form-label">Request</label>
            <input type="text" class="form-control" id="request" name="request" aria-describedby="Request" require>
          </div>
          <div class="col-md-6">
            <label for="pelapor" class="form-label">Pelapor</label>
            <input type="text" class="form-control" id="pelapor" name="pelapor" aria-describedby="Pelapor" require>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-6">
            <label for="team" class="form-label">Team</label>
            <select class="form-select" id="team" name="team" aria-label="Default select example">
              <option selected>Open this select menu Team</option>
              <?php foreach ($pegawai as $p) { ?>
                <option value="<?= $p->id; ?>"><?= $p->namal; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="col-md-6">
            <label for="priority" class="form-label">Priority</label>
            <select class="form-select" id="priority" name="priority" aria-label="Default select example">
              <option selected>Open this select menu Priority</option>
              <option value="1">High</option>
              <option value="0">Low</option>
            </select>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-6">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" aria-label="Default select example">
              <option selected>Open this select menu Status</option>
              <option value="1">On Progres</option>
              <option value="2">Closed</option>
              <option value="3">Pending</option>
            </select>
          </div>
          <div class="col-md-6">
            <label for="divisi" class="form-label">Divisi</label>
            <select class="form-select" id="divisi" name="divisi" aria-label="Default select example">
              <option selected>Open this select menu divisi Divisi</option>
              <option value="1">Divisi Jaringan</option>
            </select>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Add Data</button>
        <div class="btn btn-secondary cancelmodal">Cancel</div>
      </form>
    </div>
    <div class="modal-footer">
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#tiket').DataTable();
  });

  // Select
  $('#bulan').change(function() {
    let bulan = $('#bulan').val();
    if (bulan == 0) {
      location.reload();
    } else {
      window.location.href = '<?= base_url('tiket/bulan/') ?>' + bulan;
    }
  });

  // Modal Detail
  var modaldetail = document.getElementById("modaldetail");
  $('.detail').click(function() {
    modaldetail.style.display = "block";
    var id = $(this).attr('id');
    var desk = $(this).attr('desk');
    $('#ddesk').text(desk);
    var pic = $(this).attr('pic');
    <?php foreach ($pegawai as $peg) { ?>
      if (pic == <?= $peg->id; ?>) {
        $('#dpic').text('<?= $peg->namal; ?>');
      }
    <?php } ?>
    var request = $(this).attr('request');
    $('#drequest').text(request);
    var pelapor = $(this).attr('pelapor');
    $('#dpelapor').text(pelapor);
    var team = $(this).attr('team');
    <?php foreach ($pegawai as $peg) { ?>
      if (team == <?= $peg->id; ?>) {
        $('#dteam').text('<?= $peg->namal; ?>');
      }
    <?php } ?>
    // $('#dteam').text(team);
    var priority = $(this).attr('priority');
    if (priority == 1) {
      $('#dpriority').text('High');
    } else if (priority == 0) {
      $('#dpriority').text('Low');
    }
    var status = $(this).attr('status');
    if (status == 1) {
      $('#dstatus').text('On Progres');
    } else if (status == 2) {
      $('#dstatus').text('Selesai');
    } else if (status == 3) {
      $('#dstatus').text('Pending');
    }
    var divisi = $(this).attr('divisi');
    if (divisi == 1) {
      $('#ddivisi').text('Divisi Jaringan');
    } else if (divisi == 2) {
      $('#ddivisi').text('Divisi Programmer');
    }
    var tgl = $(this).attr('tgl');
    var bulan = $(this).attr('bulan');
    var tahun = $(this).attr('tahun');
    $('#dtgl').text(tgl + '/' + bulan + '/' + tahun);
  });
  // End Modal Detail

  // Modal Add
  var modaladd = document.getElementById("modaladd");
  $('#add').click(function() {
    modaladd.style.display = "block";
  });
  // End Modal Add

  // Modal Edit
  var modaledit = document.getElementById("modaledit");
  $('.editdata').click(function() {
    modaledit.style.display = "block";
    var id = $(this).attr('id');
    $('#edid').val(id);
    var desk = $(this).attr('desk');
    $('#eddesk').val(desk);
    var pic = $(this).attr('pic');
    $('#edpic').val(pic);
    var request = $(this).attr('request');
    $('#edrequest').val(request);
    var pelapor = $(this).attr('pelapor');
    $('#edpelapor').val(pelapor);
    var team = $(this).attr('team');
    $('#edteam').val(team);
    var priority = $(this).attr('priority');
    $('#edpriority').val(priority);
    var status = $(this).attr('status');
    $('#edstatus').val(status);
    var divisi = $(this).attr('divisi');
    $('#eddivisi').val(divisi);
  });
  // End Modal Edit

  $('.keluar').click(function() {
    modaldetail.style.display = "none";
  });

  $('.cancelmodal').click(function() {
    modaladd.style.display = "none";
    modaledit.style.display = "none";
  });

  window.onclick = function(event) {
    if (event.target == modaladd) {
      modaladd.style.display = "none";
    }
    if (event.target == modaldetail) {
      modaldetail.style.display = "none";
    }
    if (event.target == modaledit) {
      modaledit.style.display = "none";
    }
  }
</script>