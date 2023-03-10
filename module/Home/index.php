<?php if(!isset($_POST["btnSearchSubmit"])){ ?>

<!-- list best seller -->
<div class="position-relative d-flex">
    <h2 class="text-success">Khóa học bán chạy</h2>
    <h4 class="text-success position-absolute end-0 bottom-0">xem thêm ></h4>
</div>


<div class="list-group list-group-horizontal scrollView">

    <?php
    //Lấy top 3 số lần mua và lấy không trùng
    $KhoaHoc = $course->getTopThreeBestSeller();
    foreach($KhoaHoc as $item){
    ?>
    <div class="list-group-item border-0">
        <?php printCourse($item); ?>
    </div>

    <?php } ?>
</div>
<!-- end list best seller -->
<?php } ?>

<!-- list lesson -->
<h2 class="text-success">Danh sách khóa học</h2>
<div class="container">
    <div class="row row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4 d-flex justify-content-around">
        <?php
        $KhoaHoc;
        $page = 1;
        $countCourses = ceil($course->countCourses()/KHOA_HOC_MOT_TRANG);
        if(getIndex("page") != ''){
            $page = getIndex("page");
        }
                    
        $KhoaHoc = $course->getAllForShow(($page-1)*KHOA_HOC_MOT_TRANG);
        foreach($KhoaHoc as $khoa){

?>
        <div class="col cols-sm-6 cols-md-4 cols-lg-3 cols-xl-3 pdm-No mb-3">
            <?php printCourse($khoa); ?>
            <h6><i class='fas fa-user-friends text-primary'
                    style='font-size:12px'></i><?php echo "  " . $purchasedCourse->countByCourseId($khoa["maKhoaHoc"])["lanmua"]; ?>
            </h6>
        </div>
        <?php } ?>
    </div>

    <!-- Phân trang -->
    <?php if ($countCourses > 1) { ?>
    <div class="row">
        <div class="col d-flex justify-content-center">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php if ($page > 1) { ?>
                    <!-- page < 1 không cho lùi -->
                    <li class="page-item">
                        <a class="page-link" href="./index.php?action=home&page=<?php echo $page - 1; ?>"
                            aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php } ?>
                    <li class="page-item <?php if (1 == $page) {
                    echo "active";} ?>"><a class="page-link" href="./index.php?action=home&page=1">1</a></li>
                    <li class="page-item"><a class="page-link">&nbsp;</a></li>
                    <?php for ($i = $page - 2; $i <= $countCourses-1; $i++) {
                            if ($i > 1 && $i <= $page + 2) { ?>
                    <!-- chỉ xuất 5 trang trong khoản của page hiện tại -->
                    <li class="page-item <?php if ($i == $page) {
                    echo "active";} ?>"><a class="page-link"
                            href="./index.php?action=home&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php }} ?>
                    <li class="page-item"><a class="page-link">&nbsp;</a></li>
                    <li class="page-item <?php if ($countCourses == $page) {
                    echo "active";} ?>"><a class="page-link"
                            href="./index.php?action=home&page=<?php echo $countCourses; ?>"><?php echo $countCourses; ?></a>
                    </li>
                    <?php if ($page < $countCourses) { ?>
                    <!-- page = max không cho tiến tới -->
                    <li class="page-item">
                        <a class="page-link" href="./index.php?action=home&page=<?php echo $page+1; ?>"
                            aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </div>
    <?php } ?>
</div>
<!-- end list lesson -->
<div class="container">
    <div class="row">
        <h4 class="col text-center pb-4 pt-4 text-success">3 LÝ DO BẠN NÊN HỌC ONLINE TẠI TM_Studying</h4>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pdm-No text-center">
            <div class="mb-4">
                <div>
                    <i class='fas fa-chalkboard-teacher' style='font-size:70px'></i>
                    <h5>Giảng viên uy tín</h5>
                    <span>Bài giảng chất lượng</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pdm-No text-center">
            <div class="mb-4">
                <div>
                    <i class='fas fa-atlas' style='font-size:70px'></i>
                    <h5>Thanh toán 1 lần</h5>
                    <span>Học mãi mãi</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pdm-No text-center">
            <div class="mb-4">
                <div>
                    <i class='fas fa-chalkboard-teacher' style='font-size:70px'></i>
                    <h5>Học trực tuyến</h5>
                    <span>Hỗ trợ trực tiếp</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- page-1*soPT -->
<!-- <h1><a href="module/Home/home.php" target="moiTrang">nhap vao</a></h1><br>
<h1><a href="test.php?id=123" target="moiTrang">nhap vao test</a></h1> -->