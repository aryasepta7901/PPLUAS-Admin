<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php if ($this->uri->segment(1) == 'admin') {
                            echo 'active';
                        } ?>">
        <a class="nav-link " href="<?= base_url('admin'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data
    </div>
    <!-- Nav Item - Mahasiswa -->
    <li class="nav-item <?php if ($this->uri->segment(1) == 'mahasiswa') {
                            echo 'active';
                        } ?>">
        <a class="nav-link " href="<?= base_url('mahasiswa'); ?>">
            <i class="fas fa-fw fa-graduation-cap"></i>
            <span>Mahasiswa</span></a>
    </li>
    <!-- Nav Item - Event -->
    <li class="nav-item <?php if ($this->uri->segment(1) == 'event') {
                            echo 'active';
                        } ?>">
        <a class="nav-link " href="<?= base_url('event'); ?>">
            <i class="fas fa-fw fa-sitemap"></i>
            <span>Event</span></a>
    </li>



</ul>
<!-- End of Sidebar -->