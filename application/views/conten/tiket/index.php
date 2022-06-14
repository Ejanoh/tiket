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
    margin: 11% auto;
    /* 15% from the top and centered */
    padding: 20px;
    border-radius: 1.3rem !important;
    border: 1px solid #888;
    width: 80%;
    /* Could be more or less, depending on screen size */
  }

  .modal-contentss {
    background-color: #fefefe;
    margin: 5% auto;
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
    <h6 class="mb-4">Tabel Tiket</h6>
    <?php if ($this->session->flashdata('pesan')) {
      echo '<div class="alert alert-success" role="alert">
                    Success ! ';
      echo $this->session->flashdata('pesan');
      echo '</div>';
    } ?>
    <div class="text-align-right">
      <button type="button" class="btn btn-primary rounded-pill m-2" id="add"><i class="fa fa-user-plus me-2"></i>Tambah Data</button>
    </div>
    <div class="table-responsive">
      <table id="tiket" class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Lengkap</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Divisi</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($tiket as $value) {
          ?>
            <tr>
              <th scope="row"><?= $no++; ?></th>
              <td>
                <button namal="<?= $value->namal; ?>" namap="<?= $value->namap; ?>" jk="<?= $value->jk; ?>" divisi="<?= $value->divisi; ?>" alamat="<?= $value->alamat; ?>" nohp="<?= $value->nohp; ?>" status="<?= $value->status; ?>" type="button" class="btn btn-sm btn-primary rounded-pill m-2 detail">
                  <?= $value->namal; ?>
                </button>
              </td>
              <td>
                <?php if ($value->jk == 1) { ?>
                  Laki- Laki
                <?php } else if ($value->jk == 0) { ?>
                  Perempuan
                <?php } ?>
              </td>
              <td>
                <?php if ($value->divisi == 1) { ?>
                  Div. Jaringan
                <?php } else if ($value->divisi == 2) { ?>
                  Div. Programmer
                <?php } else if ($value->divisi == 3) { ?>
                  Div. Website
                <?php } ?>
              </td>
              <td>
                <?php if ($value->status == 1) { ?>
                  <a type="button" href="<?= base_url('tiket/nonaktif/') . $value->id ?>" class="btn btn-sm btn-primary rounded-pill m-2">Active</a>
                <?php } else if ($value->status == 0) { ?>
                  <a type="button" href="<?= base_url('tiket/aktif/') . $value->id ?>" class="btn btn-sm btn-danger rounded-pill m-2">Non Aktive</a>
                <?php } ?>
              </td>
              <td>
                <button type="button" id="<?= $value->id; ?>" namal="<?= $value->namal; ?>" namap="<?= $value->namap; ?>" jk="<?= $value->jk; ?>" divisi="<?= $value->divisi; ?>" alamat="<?= $value->alamat; ?>" nohp="<?= $value->nohp; ?>" class="btn btn-sm btn-success rounded-pill m-2 editdata">Edit</button>
              </td>
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
          Nama Lengkap =>
        </div>
        <div class="col-md-4">            
          <h5 id="dnamal"></h5>
        </div>
        <div class="col-md-2 ">
          Nama Panggilan =>
        </div>
        <div class="col-md-4">      
          <h5 id="dnamap"></h5>
        </div>
      </div>
      <div class="row">
        <div class="col-md-2">
          Alamat =>
        </div>
        <div class="col-md-4">            
          <h5 id="dalamat"></h5>
        </div>
        <div class="col-md-2 ">
          Nomor HP =>
        </div>
        <div class="col-md-4">      
          <h5 id="dnohp"></h5>
        </div>
      </div>
      <div class="row">
        <div class="col-md-2">
          Jenis Kelamin =>
        </div>
        <div class="col-md-4">            
          <h5 id="djk"></h5>
        </div>
        <div class="col-md-2 ">
          Divisi =>
        </div>
        <div class="col-md-4">      
          <h5 id="ddivisi"></h5>
        </div>
      </div>
      <div class="row">
        <div class="col-md-2">
          Status =>
        </div>
        <div class="col-md-4">            
          <h5 id="dstatus"></h5>
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
            <label for="namal" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="ednamal" name="namal" aria-describedby="NamaLengkap">
            <input type="text" class="form-control" id="edid" name="id" hidden>
          </div>
          <div class="col-md-6">
            <label for="namap" class="form-label">Nama Panggilan</label>
            <input type="text" class="form-control" id="ednamap" name="namap" aria-describedby="NamaPanggilan">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-6">
            <label for="jk" class="form-label">Jenis Kelamin</label>
            <select class="form-select" id="edjk" name="jk" aria-label="Default select example">
              <option selected>Open this select menu</option>
              <option value="1">Laki - Laki</option>
              <option value="0">Perempuan</option>
            </select>
          </div>
          <div class="col-md-6">
            <label for="divisi" class="form-label">Divisi</label>
            <select class="form-select" id="eddivisi" name="divisi" aria-label="Default select example">
              <option selected>Open this select menu</option>
              <option value="1">Divisi Jaringan</option>
            </select>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-6">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="edalamat" name="alamat" aria-describedby="Alamat">
          </div>
          <div class="col-md-6">
            <label for="nohp" class="form-label">Nomor Hp</label>
            <input type="text" class="form-control" id="ednohp" name="nohp" aria-describedby="noHp">
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
            <label for="namal" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="namal" name="namal" aria-describedby="NamaLengkap" require>
          </div>
          <div class="col-md-6">
            <label for="namap" class="form-label">Nama Panggilan</label>
            <input type="text" class="form-control" id="namap" name="namap" aria-describedby="NamaPanggilan" require>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-6">
            <label for="jk" class="form-label">Jenis Kelamin</label>
            <select class="form-select" id="jk" name="jk" aria-label="Default select example">
              <option selected>Open this select menu</option>
              <option value="1">Laki - Laki</option>
              <option value="2">Perempuan</option>
            </select>
          </div>
          <div class="col-md-6">
            <label for="divisi" class="form-label">Divisi</label>
            <select class="form-select" id="divisi" name="divisi" aria-label="Default select example">
              <option selected>Open this select menu</option>
              <option value="1">Divisi Jaringan</option>
            </select>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-6">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" aria-describedby="Alamat" require>
          </div>
          <div class="col-md-6">
            <label for="nohp" class="form-label">Nomor Hp</label>
            <input type="text" class="form-control" id="nohp" name="nohp" aria-describedby="noHp" require>
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

  // Modal Detail
  var modaldetail = document.getElementById("modaldetail");
  $('.detail').click(function() {
    modaldetail.style.display = "block";
    var namal = $(this).attr('namal');
    $('#dnamal').text(namal);
    var namap = $(this).attr('namap');
    $('#dnamap').text(namap);
    var alamat = $(this).attr('alamat');
    $('#dalamat').text(alamat);
    var nohp = $(this).attr('nohp');
    $('#dnohp').text(nohp);
    var divisi = $(this).attr('divisi');
    if (divisi == 1) {
      $('#ddivisi').text('Divisi Jaringan');
    } else if (divisi == 2){
      $('#ddivisi').text('Divisi Programmer');      
    }    
    var jk = $(this).attr('jk');
    if (jk == 1) {
      $('#djk').text('Laki-Laki');
    } else if (jk == 0){
      $('#djk').text('Perempuan');
    }
    var status = $(this).attr('status');
    if (status == 1) {
      $('#dstatus').text('Aktif');
    } else if (status == 0){
      $('#dstatus').text('Tidak Aktif');
    }
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
    var namal = $(this).attr('namal');
    $('#ednamal').val(namal);
    var namap = $(this).attr('namap');
    $('#ednamap').val(namap);
    var alamat = $(this).attr('alamat');
    $('#edalamat').val(alamat);
    var nohp = $(this).attr('nohp');
    $('#ednohp').val(nohp);
    var divisi = $(this).attr('divisi');
    $('#eddivisi').val(divisi);
    var jk = $(this).attr('jk');
    $('#edjk').val(jk);
  });
  // End Modal Add

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