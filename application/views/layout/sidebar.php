<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Ticketing</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="<?= base_url('assets') ?>/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0"><?= $this->session->userdata('user'); ?></h6>
                <span>
                    <?php if ($this->session->userdata('role') == 1) { ?>
                        Pengguna
                    <?php } else if ($this->session->userdata('role') == 2) { ?>
                        Helpdesk
                    <?php } else if ($this->session->userdata('role') == 3) { ?>
                        Pimpinan
                    <?php } else if ($this->session->userdata('role') == 4) { ?>
                        Super Admin
                    <?php } ?>
                </span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="<?= base_url('dashboard') ?>" class="nav-item nav-link <?= ($title === "Dashboard") ? 'active' : '' ?>"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="<?= base_url('pegawai') ?>" class="nav-item nav-link <?= ($title === "Pegawai") ? 'active' : '' ?>"><i class="far fa-file-alt me-2"></i>Pegawai</a>
            <a href="<?= base_url('tiket') ?>" class="nav-item nav-link <?= ($title === "Tiket") ? 'active' : '' ?>"><i class="fa fa-th me-2"></i>Tiket</a>
            <?php if (($this->session->userdata('role') == 3) || ($this->session->userdata('role') == 4)) { ?>
                <a href="<?= base_url('reckup') ?>" class="nav-item nav-link <?= ($title === "Reckup Tiket") ? 'active' : '' ?>"><i class="fa fa-th me-2"></i>Reckup Tiket</a>
            <?php } else {
            } ?>
            <?php if ($this->session->userdata('role') == 4) { ?>
                <a href="<?= base_url('user') ?>" class="nav-item nav-link <?= ($title === "Management User") ? 'active' : '' ?>"><i class="fa fa-user me-2"></i>Management User</a>
            <?php } else {
            } ?>
            <a href="<?= base_url('login/logout') ?>" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Log out</a>
        </div>
    </nav>
</div>
<!-- Sidebar End -->