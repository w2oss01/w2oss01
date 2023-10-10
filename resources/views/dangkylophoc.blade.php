@extends('layout')

@section('title')
    Đăng ký lớp học
@endsection

@section('content')
    <section class="section-padding">
        <div class="container">

            <div class="row mb-4">
                <form class="row gy-2 gx-3 align-items-center form-floating" action="/dangkylophoc" method="GET">
                    <div class="col-auto">
                        <h5>Khóa học:</h5>
                    </div>
                    <div class="col-auto">
                        <input type="number" min="2000" max="2099" class="form-control" id="inputNamHoc"
                            name="inputNamHoc" value="<?php
                            if (isset($_GET['inputNamHoc'])) {
                                echo $_GET['inputNamHoc'];
                            } else {
                                echo '';
                            }
                            ?>" placeholder="Năm học" style="width: 160px"
                            required>
                    </div>
                    <div class="col-auto">
                        <select class="form-select" aria-label="Học kỳ" id="inputHocKy" name="inputHocKy" required>
                            <option value="1">Học kỳ I</option>
                            <option value="2">Học kỳ II</option>
                        </select>
                    </div>
                    <div class="col-auto"><button class="custom-btn" type="submit">Chọn</button></div>
                </form>
            </div>

            <div class="row ">
                <div class="col-4">
                    <h5>Danh sách học viên:</h5>
                    <div class="form-check mb-1">
                        <input class="form-check-input" type="checkbox" value="1" id="chbChonTatCaHocVien">
                        <label class="form-check-label select-label" for="chbChonTatCaHocVien">
                            <b>Chọn tất cả</b>
                        </label>
                    </div>
                    <hr>
                </div>
                <div class="col-6">
                    <h5>Danh sách lớp học:</h5>
                    <div class="form-check mb-1">
                        <input class="form-check-input" type="checkbox" value="1" id="chbChonTatCaLopHoc">
                        <label class="form-check-label select-label" for="chbChonTatCaLopHoc">
                            <b>Chọn tất cả</b>
                        </label>
                    </div>
                    <hr>
                </div>
            </div>
            <form class="needs-validation" action="/dangkylophoc" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" class="form-control" id="inputDSMaHocVien" name="inputDSMaHocVien" value=""
                    style="display: none;" required>
                <input type="text" class="form-control" id="inputDSMaLopHoc" name="inputDSMaLopHoc" value=""
                    style="display: none;" required>
                <input type="text" class="form-control" id="inputDSMaHocVienKhongDK" name="inputDSMaHocVienKhongDK"
                    value="" style="display: none;" required>
                <input type="text" class="form-control" id="inputDSMaLopHocKhongDK" name="inputDSMaLopHocKhongDK"
                    value="" style="display: none;" required>
                <input type="number" min="2000" max="2099" class="form-control" id="inputNamHoc" name="inputNamHoc"
                    style="display: none;" value="<?php
                    if (isset($_GET['inputNamHoc'])) {
                        echo $_GET['inputNamHoc'];
                    } else {
                        echo '';
                    }
                    ?>">
                <input type="number" class="form-control" id="inputHocKy" name="inputHocKy" style="display: none;"
                    value="<?php
                    if (isset($_GET['inputHocKy'])) {
                        echo $_GET['inputHocKy'];
                    } else {
                        echo '';
                    }
                    ?>">

                <div class="row">
                    <div class="col-4" style="max-height: 500px; overflow: auto;">
                        <?php foreach ($dsHocVien as $hocvien): ?>
                        <?php 
                            $dk = "";

                            foreach ($dsDangky as $item) {
                                if($item->MaHocVien == $hocvien->MaHocVien){
                                    $dk = "checked";
                                    break;
                                }
                            }
                        ?>

                        <div class="form-check mb-1">
                            <input class="form-check-input hocvien-check-input" type="checkbox" value="<?php echo $hocvien->MaHocVien; ?>"
                                name="inputMaHocVien<?php echo $hocvien->MaHocVien; ?>" id="inputMaHocVien<?php echo $hocvien->MaHocVien; ?>" <?php echo $dk; ?>>
                            <label class="form-check-label select-label" for="inputMaHocVien<?php echo $hocvien->MaHocVien; ?>">
                                <b><?php echo $hocvien->HoTen; ?></b> (Mã học viên: <?php echo $hocvien->MaHocVien; ?>)
                            </label>
                        </div>
                        <?php endforeach ?>

                    </div>
                    <div class="col-6" style="max-height: 500px; overflow: auto;">
                        <?php foreach ($dsLopHoc as $lophoc): ?>
                        <?php 
                            $dk = "";

                            foreach ($dsDangky as $item) {
                                if($item->MaLop == $lophoc->MaLopHoc){
                                    $dk = "checked";
                                    break;
                                }
                            }
                        ?>
                        <div class="form-check mb-1">
                            <input class="form-check-input lophoc-check-input" type="checkbox"
                                value="<?php echo $lophoc->MaLopHoc; ?>" hocphi-lophoc="<?php echo $lophoc->HocPhi; ?>"
                                name="inputMaLopHoc<?php echo $lophoc->MaLopHoc; ?>" id="inputMaLopHoc<?php echo $lophoc->MaLopHoc; ?>" <?php echo $dk; ?>>
                            <label class="form-check-label select-label" for="inputMaLopHoc<?php echo $lophoc->MaLopHoc; ?>">
                                <b><?php echo $lophoc->Ten; ?></b> - <span><?php
                                $amount = new NumberFormatter('vi_VN', NumberFormatter::CURRENCY);
                                echo $amount->formatCurrency($lophoc->HocPhi, 'VND');
                                ?></span>
                            </label>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-4">
                        <hr>
                        Đã chọn: <b id="tongSoHocVienChon">0</b> học viên
                    </div>
                    <div class="col-6">
                        <hr>
                        Đã chọn: <b id="tongSoLopHocChon">0</b> lớp học<br> (Học phí: <b id="TongHocPhi">0 ₫</b>/học viên)
                    </div>
                </div>

                <div class="row mt-5 ">
                    <div class="col-lg-10 col-10 text-left">
                        <button class="custom-btn" type="submit" id="btnDKLopHoc" disabled>Đăng ký</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
