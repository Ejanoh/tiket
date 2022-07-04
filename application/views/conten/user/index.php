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
            <table id="user" class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Username</th>
                        <th scope="col">Role</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($user as $u) {
                    ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td>
                                <button nama="<?= $u->nama; ?>" username="<?= $u->username; ?>" password="<?= $u->password; ?>" role="<?= $u->role; ?>" active="<?= $u->active; ?>" type=" button" class="btn btn-sm btn-primary rounded-pill m-2 detail">
                                    <?= $u->nama; ?>
                                </button>
                            </td>
                            <td>
                                <?= $u->username; ?>
                            </td>
                            <td>
                                <?php if ($u->role == 1) { ?>
                                    User
                                <?php } else if ($u->role == 2) { ?>
                                    Helpdesk
                                <?php } else if ($u->role == 3) { ?>
                                    Pimpinan
                                <?php } else if ($u->role == 4) { ?>
                                    Super Admin
                                <?php } ?>
                            </td>
                            <td>
                                <?php if ($u->active == 1) { ?>
                                    Active
                                <?php } else if ($u->active == 0) { ?>
                                    Not Active
                                <?php } ?>
                            </td>
                            <td>
                                <button type="button" id="<?= $u->id; ?>" nama="<?= $u->nama; ?>" username="<?= $u->username; ?>" password="<?= $u->password; ?>" role="<?= $u->role; ?>" active="<?= $u->active; ?>" class="btn btn-sm btn-success rounded-pill m-2 editdata">Edit</button>
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
            <h3>Detail Data User</h3>
            <hr>
            <div class="row">
                <div class="col-md-2">
                    Nama =>
                </div>
                <div class="col-md-4">
                    <h5 id="dnama"></h5>
                </div>
                <div class="col-md-2 ">
                    Username =>
                </div>
                <div class="col-md-4">
                    <h5 id="dusername"></h5>
                </div>
                <div class="col-md-2">
                    Role =>
                </div>
                <div class="col-md-4">
                    <h5 id="drole"></h5>
                </div>
                <div class="col-md-2">
                    Password =>
                </div>
                <div class="col-md-4">
                    <h5 id="dpassword"></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    Status =>
                </div>
                <div class="col-md-4">
                    <h5 id="dactive"></h5>
                </div>
            </div>
            <div class="modal-footer">
            </div>
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
            <h3>Edit Data User</h3>
            <hr>
            <form action="<?= base_url('user') ?>/update" method="POST">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="ednama" name="nama" aria-describedby="nama">
                        <input type="text" class="form-control" id="edid" name="id" hidden>
                    </div>
                    <div class="col-md-6">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="edusername" name="username" aria-describedby="username">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" class="form-control" id="edpassword" name="password" aria-describedby="password">
                    </div>
                    <div class="col-md-6">
                        <label for="role" class="form-label">role</label>
                        <select class="form-select" id="edrole" name="role" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">User</option>
                            <option value="2">Helpdesk</option>
                            <option value="3">Pimpinan</option>
                            <option value="4">Super Admin</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="active" class="form-label">Status</label>
                        <select class="form-select" id="edactive" name="active" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">Active</option>
                            <option value="0">Not Active</option>
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
            <h3>Tambah User</h3>
            <hr>
            <form action="<?= base_url('user') ?>/adddata" method="POST">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" aria-describedby="Nama" require>
                    </div>
                    <div class="col-md-6">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" aria-describedby="Username" require>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" class="form-control" id="password" name="password" aria-describedby="Password" require>
                    </div>
                    <div class="col-md-6">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" id="role" name="role" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">User</option>
                            <option value="2">Helpdesk</option>
                            <option value="3">Pimpinan</option>
                            <option value="4">Super Admin</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="active" class="form-label">Status</label>
                        <select class="form-select" id="active" name="active" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">Active</option>
                            <option value="2">Not Active</option>
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
        $('#user').DataTable();
    });

    // Modal Detail
    var modaldetail = document.getElementById("modaldetail");
    $('.detail').click(function() {
        modaldetail.style.display = "block";
        var nama = $(this).attr('nama');
        $('#dnama').text(nama);
        var username = $(this).attr('username');
        $('#dusername').text(username);
        var password = $(this).attr('password');
        $('#dpassword').text(password);
        var role = $(this).attr('role');
        if (role == 1) {
            $('#drole').text('User');
        } else if (role == 2) {
            $('#drole').text('Helpdesk');
        } else if (role == 3) {
            $('#drole').text('Pimpinan');
        } else if (role == 4) {
            $('#drole').text('Super Admin');
        }
        var active = $(this).attr('active');
        if (active == 1) {
            $('#dactive').text('Active');
        } else if (active == 0) {
            $('#dactive').text('Not Active');
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
        var nama = $(this).attr('nama');
        $('#ednama').val(nama);
        var username = $(this).attr('username');
        $('#edusername').val(username);
        var password = $(this).attr('password');
        $('#edpassword').val(password);
        var role = $(this).attr('role');
        $('#edrole').val(role);
        var active = $(this).attr('active');
        $('#edactive').val(active);
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

<script>
    // Get the modal
    // var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    // var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    // var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    // btn.onclick = function() {
    //   // modal.style.display = "block";
    //   alert("OK");
    // }

    // When the user clicks on <span> (x), close the modal
    // span.onclick = function() {
    //   modal.style.display = "none";
    // }

    // When the user clicks anywhere outside of the modal, close it
    // window.onclick = function(event) {
    //   if (event.target == modal) {
    //     modal.style.display = "none";
    //   }
    // }
</script>