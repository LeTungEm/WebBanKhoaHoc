<?php
    $user = null;
    if($customer->checkLogin()){
        $user = $customer->getCustomer(getSession("customer_sdt"));
    }else if($employee->checkLogin()){
        $user = $employee->getEmployee(getSession("employee_sdt"));
    }else if($admin->checkLogin()){
        $user = $admin->getAdmin(getSession("admin_sdt"));
    }
?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand text-success fw-bold" href="./index.php?action=home">TM_Studying</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php if (getIndex("action") == "home") {
                        echo "text-success";} ?>" aria-current="page" href="./index.php?action=home">Trang chủ</a>
                </li>
            </ul>
            <?php if (!$admin->checkLogin()) { ?>
            <form action="./index.php?action=search" class="d-flex" method="post" role="search">
                <input class="form-control me-3" name="search" type="search" placeholder="Tìm khóa học"
                    aria-label="Search">
                <button class="btn btn-outline-success" name="btnSearchSubmit" type="submit"><i class='fas fa-search'
                        style='font-size:20px'></i></button>
            </form>
            <?php } ?>
        </div>    
    </div>
    <?php if ($user != null) { ?>
        <!-- Menu người dùng -->
        <div class="user_menu dropdown mx-3">
            <div id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="./media/image/user/<?php if ($user != null) {
                        if ($user["hinh"] != null) {
                            echo $user["hinh"];
                        } else {
                            echo "default.png";}} ?>" width="40px" height="40px" class="rounded-circle" alt="...">
            </div>
            <ul class="dropdown-menu" style="left: unset; right: 0px;" aria-labelledby="dropdownMenuButton2">
                <li class="mx-2 text-center">
                    <img src="./media/image/user/<?php if ($user != null) {
                        if ($user["hinh"] != null) {
                            echo $user["hinh"];
                        } else {
                            echo "default.png";}} ?>" class="img-thumbnail" alt="...">
                    <h5 class=""><?php echo $user["ten"]; ?></h5>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item  me-5" href="?action=account_infomation">Thông tin tài khoản</a></li>
                <?php if($customer->checkLogin()){ ?>
                <li><a class="dropdown-item" href="?action=cus_purchasedCourse">Khóa học đã mua</a></li>
                <?php } ?>
                <li><a class="dropdown-item" onclick="getCLick()" href="?action=dangxuat">Đăng xuất</a></li>
            </ul>
        </div>
        <?php }else{ ?>
        <a href="./?action=login&mod=login" class="btn btn-success text-white m-3 navbar-brand" type="button"><b>Đăng
                nhập</b></a>
        <?php } ?>
</nav>
<!-- end navbar -->
<div style="margin-top: 90px;"></div>
<!-- slideshow -->
<?php if(getIndex("action") == "home" && $customer->checkLogin()){ ?>
<div class="mx-5">
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="4000">
                <img src="media/image/slide/1.jpg" class="d-block w-100" height="250px" alt="...">
                <div class="carousel-caption d-md-block">
                    <h5 class="text-white">Lợi ích về thời gian</h5>
                    <p class="text-white">Tự chủ về thời gian học tập.</p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="media/image/slide/2.jpg" class="d-block w-100" height="250px" alt="...">
                <div class="carousel-caption d-md-block">
                    <h5 class="text-white">Nhiều bài học bổ ích</h5>
                    <p class="text-white">Hàng chục khóa học bổ ích giúp phát triển bản thân.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="media/image/slide/3.jpg" class="d-block w-100" height="250px" alt="...">
                <div class="carousel-caption d-md-block">
                    <h5 class="text-white">Giảng viên có kinh nghiệm</h5>
                    <p class="text-white">Giảng viên có nhiều kinh nghiệm trong giảng dạy và xây dụng bài học.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<?php } ?>
<!-- end slideshow -->