<div class="container mt-3">
    <div class="row row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4 d-flex justify-content-around">
        <?php
    if(isset($_POST["btnSearchSubmit"])){
        $KhoaHoc = $course->getCourseByName($_POST["search"]);
        foreach($KhoaHoc as $kh){ ?>
            <div class="col cols-sm-6 cols-md-4 cols-lg-3 cols-xl-3 pdm-No mb-3">
            <?php printCourse($kh); ?>
            <h6><i class='fas fa-user-friends'
                    style='font-size:12px'></i><?php echo "  " . $purchasedCourse->countByCourseId($kh["maKhoaHoc"])["lanmua"]; ?>
            </h6>
        </div>            
        <?php }
        
        //$countCourses = ceil(count($KhoaHoc)/KHOA_HOC_MOT_TRANG);
    }

?>
    </div>
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
