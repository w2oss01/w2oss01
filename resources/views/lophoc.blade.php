@extends('layout')

@section('title')
    Lớp học
@endsection

@section('content')
    
    <section class="section-padding">
        <div class="container">
            <div class="row">
                @if (isset($type) && $type == 'edit')
                    <div class="col-lg-12 col-12 ">
                        <h3 class="mb-4 text-center">Cập nhật lớp học</h3>
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-8">
                                @if (count($data) == 0)
                                    <p class="text-danger text-center">Không tìm thấy lớp học!</p>
                                @else
                                <form class="needs-validation" action="/lophoc" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <input type="text" class="form-control" id="inputMaLopHoc" name="inputMaLopHoc"
                                        value="<?php echo $data[0]->MaLopHoc; ?>" style="display: none;">

                                    <div class="row mb-3 justify-content-center">
                                        <div class="col-6">
                                            <img src="{{$data[0]->HinhAnh ? asset('storage/'.$data[0]->HinhAnh) : asset('images/monhoc_without_image.png')}}"
                                                class="custom-block-image img-fluid mx-auto" id="HinhAnh" alt="">
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control form-control-lg" id="inputHinhAnh"
                                                    name="inputHinhAnh" accept=".jpg, .png">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="inputMaMonHoc" class="form-label">Môn học<small
                                                    class="text-danger">*</small>:</label>
                                            <select class="form-select" aria-label="" name="inputMaMonHoc" required>
                                                @foreach ($dsmonhoc as $monhoc)
                                                    @if($data[0]->MaMonHoc == $monhoc->MaMonHoc)
                                                        <option value="<?php echo $monhoc->MaMonHoc; ?>" selected><?php echo $monhoc->Ten; ?></option>
                                                    @else
                                                        <option value="<?php echo $monhoc->MaMonHoc; ?>"><?php echo $monhoc->Ten; ?></option>
                                                    @endif
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="col">
                                            <label for="inputHocPhi" class="form-label">Học phí<small
                                                    class="text-danger">*</small>:</label>
                                            <input type="text" class="form-control" id="inputHocPhi" name="inputHocPhi"
                                                value="<?php echo $data[0]->HocPhi?>" required>
                                        </div>

                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="inputNamHoc" class="col-form-label">Năm học<small
                                                    class="text-danger">*</small>:</label>
                                            <input type="number" min="2000" max="2099" class="form-control"
                                                id="inputNamHoc" name="inputNamHoc" value="<?php echo $data[0]->NamHoc?>" required>
                                        </div>
                                        <div class="col">
                                            <label for="inputHocKy" class="col-form-label">Học kỳ<small
                                                    class="text-danger">*</small>:</label>
                                            <select class="form-select" aria-label="Học kỳ" id="inputHocKy"
                                                name="inputHocKy" required>
                                                
                                                <option value="1" @if ($data[0]->HocKy == 1) selected @endif>Học kỳ I</option>
                                                <option value="2" @if ($data[0]->HocKy == 2) selected @endif>Học kỳ II</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="inputGhiChu" class="col-form-label">Ghi chú:</label>
                                            <input type="text" min="1" class="form-control" id="inputGhiChu"
                                                name="inputGhiChu" value="<?php echo $data[0]->GhiChu ?>" required>
                                        </div>
                                        <div class="col">
                                            <label for="inputMoDangKy" class="col-form-label">Trạng thái<small
                                                    class="text-danger">*</small> :</label>
                                            <select class="form-select" aria-label="Học kỳ" id="inputMoDangKy"
                                                name="inputMoDangKy" required>
                                                <option value="1" @if ($data[0]->MoDangKy == 1) selected @endif>Mở đăng ký</option>
                                                <option value="0" @if ($data[0]->MoDangKy == 0) selected @endif>Dừng đăng ký</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col d-flex justify-content-end">
                                            <a href="/lophoc" class="custom-btn-secondary me-2">Hủy</a>
                                            <button type="submit" class="custom-btn" >Cập nhật</button>
                                        </div>
                                    </div>
                                </form>
                                @endif

                                
                            </div>
                            <div class="col-2"></div>

                        </div>
                    </div>
                @else
                    <div class="col-lg-12 col-12 text-center">
                        <a href="#" class="mb-4 btn custom-btn" data-bs-toggle="modal"
                            data-bs-target="#ModalTaoLopHoc">Tạo mới lớp học</a>

                        <form action="/lophoc" method="GET">
                            <div class="row d-flex justify-content-center">
                                <div class="col-3">
                                    <select class="form-select" aria-label="" name="maMonHoc">
                                        <option value="all" selected>Chọn tất cả môn học</option>
                                        <?php foreach ($dsmonhoc as $monhoc): ?>
                                        <option value="<?php echo $monhoc->MaMonHoc; ?>"><?php echo $monhoc->Ten; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Tên môn học"
                                            aria-label="Tên môn học" aria-describedby="button-addon2" name="search" value="">
                                        <button class="custom-btn" type="submit" >Tìm kiếm</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>

                    {{-- Danh sách lớp học --}}
                    @if (count($data) == 0)
                        <p class="text-center pt-3">Không tìm thấy dữ liệu!</p>
                    @else
                        <div class="col-lg-8 col-12 text-center mx-auto">
                            <p>Có <?php echo count($data);?> lớp học được tìm thấy</p>
                        </div>
                        
                        <?php foreach ($data as $lophoc):?>
                        <div class="col-lg-8 col-12 mt-3 mx-auto custom-list-item shadow">
                            <div class="row p-2 custom-list-item-header">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1"><?php echo $lophoc->Ten; ?></h5>
                                    <small><b>Mã lớp học: <?php echo $lophoc->MaLopHoc; ?></b></small>
                                    <a class="delete-button" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Xóa lớp học này"
                                        onclick="confirmBeforeRedirect('/lophoc?delete=<?php echo $lophoc->MaLopHoc; ?>', 'Bạn có chắc chắn muốn xóa lớp học \'<?php echo $lophoc->Ten; ?>\'?')"></a>
                                </div>
                            </div>
                            <div class="custom-block custom-block-topics-listing custom-list-item-content" data-bs-toggle="tooltip" data-bs-placement="right" title="Click để cập nhật lớp học" onclick="toggleLoadingScreen();window.location.assign('/lophoc?edit=<?php echo $lophoc->MaLopHoc; ?>');">
                                <div class="d-flex">
                                    <img src="{{$lophoc->HinhAnh ? asset('storage/'.$lophoc->HinhAnh) : asset('images/monhoc_without_image.png')}}"
                                        class="custom-block-image img-fluid" alt="">

                                    <div class="custom-block-topics-listing-info-small d-flex" style="cursor: pointer;">
                                        <div>
                                            <div class="mt-2">
                                                <label class="me-4">Học kỳ:
                                                    <b><?php echo $lophoc->HocKy; ?>/<?php echo $lophoc->NamHoc; ?></b></label>
                                            </div>
                                            <div class="mt-2">
                                                <label class="me-4">Học phí: <b>
                                                        <?php
                                                        $amount = new NumberFormatter('vi_VN', NumberFormatter::CURRENCY);
                                                        echo $amount->formatCurrency($lophoc->HocPhi, 'VND');
                                                        ?>
                                                    </b></label>
                                            </div>
                                            <div class="mt-2">
                                                <label class="me-4">Trạng thái: 
                                                <?php
                                                if ($lophoc->MoDangKy == 1) {
                                                    echo "<b class='text-success'>Đang mở đăng ký</b>";
                                                } else {
                                                    echo "<b class='text-danger'>Đã đóng đăng ký</b>";
                                                }
                                                ?>
                                                </label>
                                            </div>
                                            <div class="mt-2">
                                                <label class="me-4">Ghi chú: <b><?php echo $lophoc->GhiChu; ?></b></label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                        </div>
                        <?php endforeach ?>
                    @endif
                @endif

            </div>
        </div>
    </section>

    <!-- Tao Lop Hoc Modal -->
    <div class="modal fade" id="ModalTaoLopHoc" tabindex="-1" aria-labelledby="Lớp Học" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5">Tạo Lớp Học</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="needs-validation" action="/lophoc" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3 justify-content-center">
                            <div class="col-6">
                                <img src="images/topics/undraw_Remote_design_team_re_urdx.png"
                                    class="custom-block-image img-fluid mx-auto" id="HinhAnh" alt="">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control form-control-lg" id="inputHinhAnh" name="inputHinhAnh"
                                        accept=".jpg, .png" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="inputMaMonHoc" class="form-label">Môn học<small
                                        class="text-danger">*</small>:</label>
                                <select class="form-select" aria-label="" name="inputMaMonHoc" required>
                                    @foreach ($dsmonhoc as $monhoc)
                                    <option value="<?php echo $monhoc->MaMonHoc; ?>"><?php echo $monhoc->Ten; ?></option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col">
                                <label for="inputHocPhi" class="form-label">Học phí<small
                                        class="text-danger">*</small>:</label>
                                <input type="text" class="form-control" id="inputHocPhi" name="inputHocPhi"
                                    value="" required>
                            </div>

                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="inputNamHoc" class="col-form-label">Năm học<small
                                        class="text-danger">*</small>:</label>
                                <input type="number" min="2000" max="2099" class="form-control"
                                    id="inputNamHoc" name="inputNamHoc" value="" required>
                            </div>
                            <div class="col">
                                <label for="inputHocKy" class="col-form-label">Học kỳ<small
                                        class="text-danger">*</small>:</label>
                                <select class="form-select" aria-label="Học kỳ" id="inputHocKy" name="inputHocKy"
                                    required>
                                    <option value="1" selected>Học kỳ I</option>
                                    <option value="2">Học kỳ II</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="inputGhiChu" class="col-form-label">Ghi chú:</label>
                                <input type="text" min="1" class="form-control" id="inputGhiChu"
                                    name="inputGhiChu" value="" >
                            </div>
                            <div class="col">
                                <label for="inputMoDangKy" class="col-form-label">Trạng thái<small
                                        class="text-danger">*</small> :</label>
                                <select class="form-select" aria-label="Học kỳ" id="inputMoDangKy" name="inputMoDangKy"
                                    required>
                                    <option value="1" selected>Mở đăng ký</option>
                                    <option value="0">Đóng đăng ký</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="custom-btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="custom-btn" >Tạo mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Tao Lop Hoc Modal -->
@endsection
