

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Nhà hàng DBT2</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php echo ($activePage == 'dashboard') ? 'active' : ''; ?>">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Quản trị chung</span></a>
    </li> 
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Đặt bàn
    </div>
    <li class="nav-item <?php echo ($activePage == 'customer') ? 'active' : ''; ?>">
        <a class="nav-link" href="khachhang.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Khách hàng</span>
        </a>
    </li>
    <li class="nav-item <?php echo ($activePage == 'orders') ? 'active' : ''; ?>">
        <a class="nav-link" href="datban.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Đơn hàng</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Quản lý thông tin
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?php echo ($activePage == 'menu') ? 'active' : ''; ?>">
        <a class="nav-link" href="menu.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Thực đơn</span>
        </a>
    </li>
    <li class="nav-item <?php echo ($activePage == 'employee') ? 'active' : ''; ?>">
        <a class="nav-link" href="nhanvien.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Nhân viên</span>
        </a>
    </li>
    
    <li class="nav-item <?php echo ($activePage == 'accounts') ? 'active' : ''; ?>">
        <a class="nav-link" href="taikhoan.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Tài khoản</span>
        </a>
    </li>
</ul>
<!-- End of Sidebar -->



