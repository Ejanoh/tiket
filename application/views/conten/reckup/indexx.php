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
  <div class="bg-light rounded  p-2">
    <select class="form-select form-select-lg" id="select" aria-label=".form-select-lg example">
      <option value="0">Open this select menu</option>
      <option value="1" <?= ($select === "1") ? $selected = 'selected' : '' ?>>Tampilkan Data Berdasarkan Data Terbanyak</option>
      <option value="2" <?= ($select === "2") ? $selected = 'selected' : '' ?>>Tampilkan Data Berdasarkan Data PIC Terbanyak</option>
      <option value="3" <?= ($select === "3") ? $selected = 'selected' : '' ?>>Tampilkan Data Berdasarkan Data Team Terbanyak</option>
      <option value="4" <?= ($select === "4") ? $selected = 'selected' : '' ?>>Tampilkan Data Berdasarkan Bulan</option>
    </select>
  </div>
  <div class="bg-light rounded  p-2" id="divhide">
    <select class="form-select form-select-lg" id="bulan" aria-label=".form-select-lg example">
      <option value="0">Open this select Moon</option>
      <option value="1" <?= ($bln === "1") ? $selected = 'selected' : '' ?>>Januari</option>
      <option value="2" <?= ($bln === "2") ? $selected = 'selected' : '' ?>>Februari</option>
      <option value="3" <?= ($bln === "3") ? $selected = 'selected' : '' ?>>Maret</option>
      <option value="4" <?= ($bln === "4") ? $selected = 'selected' : '' ?>>April</option>
      <option value="5" <?= ($bln === "5") ? $selected = 'selected' : '' ?>>Mei</option>
      <option value="6" <?= ($bln === "6") ? $selected = 'selected' : '' ?>>Juni</option>
      <option value="7" <?= ($bln === "7") ? $selected = 'selected' : '' ?>>Juli</option>
      <option value="8" <?= ($bln === "8") ? $selected = 'selected' : '' ?>>Agustus</option>
      <option value="9" <?= ($bln === "9") ? $selected = 'selected' : '' ?>>September</option>
      <option value="10 <?= ($bln === "10") ? $selected = 'selected' : '' ?>">Oktober</option>
      <option value="11 <?= ($bln === "11") ? $selected = 'selected' : '' ?>">November</option>
      <option value="12 <?= ($bln === "12") ? $selected = 'selected' : '' ?>">Desember</option>
    </select>
  </div>
  <div class="bg-light rounded h-100 p-4">
    <div class="table-responsive">
      <?php if ($select === "1") { ?>
        <table id="tiket" class="table">
          <thead>
            <tr>
              <td>No</td>
              <td>Nama</td>
              <td>PIC</td>
              <td>Team</td>
              <td>Jumlah</td>
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
                  <?php foreach ($pegawai as $p) {
                    if ($value->pic == $p->id) { ?>
                      <?= $p->namal; ?>
                  <?php }
                  } ?>
                </td>
                <td>
                  <?= $value->picc; ?>
                </td>
                <td>
                  <?php
                  $jmlteam = 0;
                  foreach ($tikets as $aa) {
                    if ($value->pic == $aa->team) {
                      $jmlteam = $aa->teams;
                  ?>
                      <?= $jmlteam; ?>
                  <?php }
                  } ?>
                </td>
                <td>
                  <?php $jml = $value->picc + $jmlteam ?>
                  <?= $jml; ?>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      <?php } else { ?>
        <table id="tiket" class="table">
          <thead>
            <tr>
              <td>No</td>
              <td>Deskripsi</td>
              <td>PIC</td>
              <td>Team</td>
              <td>Request</td>
              <td>Status</td>
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
                  <?php foreach ($pegawai as $p) {
                    if ($value->team == $p->id) { ?>
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
              </tr>
            <?php } ?>
          </tbody>
        </table>
      <?php } ?>
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

<script>
  $(document).ready(function() {
    // $('#tiket').DataTable();
    if (<?= $select; ?> == 4) {
      $('#divhide').show();
    } else {
      $('#divhide').hide();
    }
    let bln = <?= $bln; ?>;
    console.log(bln);
    if (bln != '') {
      $('#bulan').change(function() {
        let id = 4;
        let bulan = $('#bulan').val();
        if (bulan == 0) {
          location.reload();
        } else {
          window.location.href = '<?= base_url('reckup/get/') ?>' + id + '/' + bulan;
        }
      });
    }
  });

  // Fungsi Select
  $('#select').change(function() {
    let id = $('#select').val();
    if (id == 0) {
      location.reload();
    } else {
      if (id == 4) {
        $('#divhide').show();
        $('#bulan').change(function() {
          let bulan = $('#bulan').val();
          if (bulan == 0) {
            location.reload();
          } else {
            window.location.href = '<?= base_url('reckup/get/') ?>' + id + '/' + bulan;
          }
        });
      } else {
        $('#divhide').hide();
        window.location.href = '<?= base_url('reckup/get/') ?>' + id;
      }
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

  $('.keluar').click(function() {
    modaldetail.style.display = "none";
  });;

  window.onclick = function(event) {
    if (event.target == modaldetail) {
      modaldetail.style.display = "none";
    }
  }
</script>