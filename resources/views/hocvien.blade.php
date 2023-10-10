@extends('layout')

@section('title')
    Học viên
@endsection

@section('content')
    <section class="section-padding">
        <div class="container">
            <div class="row">
                @if (isset($type) && $type == 'edit')
                    <div class="col-lg-12 col-12 ">
                        <h3 class="mb-4 text-center">Cập nhật thông tin học viên</h3>
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-8">
                                @if (count($data) == 0)
                                    <p class="text-danger text-center">Không tìm thấy học viên!</p>
                                @else
                                    <form class="needs-validation" action="/hocvien" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <input type="text" class="form-control" id="inputMaHocVien" name="inputMaHocVien"
                                            value="<?php echo $data[0]->MaHocVien; ?>" style="display: none;">

                                        <div class="row mb-3 justify-content-center">
                                            <div class="col-6">
                                                <img src="{{ $data[0]->HinhAnh ? asset('storage/' . $data[0]->HinhAnh) : asset('images/monhoc_without_image.png') }}"
                                                    class="custom-block-image img-fluid mx-auto" id="HinhAnh"
                                                    alt="">
                                                <div class="input-group mb-3">
                                                    <input type="file" class="form-control form-control-lg" id="inputHinhAnh" name="inputHinhAnh" accept=".jpg, .png">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label for="inputHoTen" class="form-label">Họ tên học viên<small
                                                        class="text-danger">*</small> :</label>
                                                <input type="text" class="form-control" id="inputHoTen" name="inputHoTen"
                                                    value="<?php echo $data[0]->HoTen; ?>" required>
                                            </div>
                                            <div class="col">
                                                <label for="inputGioiTinh" class="form-label">Giới tính<small
                                                        class="text-danger">*</small> :</label>
                                                <select class="form-select" aria-label="Môn học" id="inputGioiTinh"
                                                    name="inputGioiTinh" value="<?php echo $data[0]->GioiTinh; ?>" required>
                                                    <option value="1"
                                                        @if ($data[0]->GioiTinh == 1) selected @endif>Nam</option>
                                                    <option value="0"
                                                        @if ($data[0]->GioiTinh == 0) selected @endif>Nữ</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label for="inputNgaySinh" class="col-form-label">Ngày sinh <small
                                                        class="text-danger">*</small> :</label>
                                                        <script>
                                                            
                                                        </script>
                                                <input type="text" class="form-control" id="inputNgaySinh"
                                                    name="inputNgaySinh" value="<?php echo $data[0]->NgaySinh; ?>" required>
                                            </div>
                                            <div class="col">
                                                <label for="inputSoDT" class="col-form-label">Điện thoại:</label>
                                                <input type="number" class="form-control" id="inputSoDT" name="inputSoDT"
                                                    value="<?php echo $data[0]->SoDT; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label for="inputEmail" class="col-form-label">Email<small
                                                        class="text-danger">*</small>
                                                    :</label>
                                                <input type="email" class="form-control" id="inputEmail" name="inputEmail"
                                                    value="<?php echo $data[0]->Email; ?>" required>
                                            </div>
                                            <div class="col">
                                                <label for="inputDiaChi" class="col-form-label">Địa chỉ<small
                                                        class="text-danger">*</small> :</label>
                                                <input type="text" class="form-control" id="inputDiaChi"
                                                    name="inputDiaChi" value="<?php echo $data[0]->DiaChi; ?>" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col d-flex justify-content-end">
                                                <a href="/hocvien" class="custom-btn-secondary me-2">Hủy</a>
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
                        <h3 class="mb-4">Danh sách học viên</h3>
                        <a href="#" class="mb-4 btn custom-btn" data-bs-toggle="modal"
                            data-bs-target="#ModalTaoHocVien">Tạo mới học viên</a>
                        <form action="/hocvien" method="GET">
                            <div class="row">
                                <div class="col-4"></div>
                                <div class="col-4">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Tên học viên"
                                            aria-label="Thông tin học viên" aria-describedby="button-addon2"
                                            name="search" value="">
                                        <button class="custom-btn" type="submit" id="inputTimKiemHocVien">Tìm kiếm</button>
                                    </div>
                                </div>
                                <div class="col-4"></div>

                            </div>
                        </form>
                    </div>

                    <!-- Danh sách học viên -->
                    @if (count($data) == 0)
                        <p class="text-center pt-3">Không tìm thấy dữ liệu!</p>
                    @else
                        <div class="col-lg-8 col-12 text-center mx-auto">
                            <p>Có <?php echo count($data); ?> học viên được tìm thấy</p>
                        </div>

                        <?php foreach ($data as $hocvien):?>
                        <div class="col-lg-8 col-12 mt-3 mx-auto custom-list-item shadow">
                            <div class="row p-2 custom-list-item-header">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1"><?php echo $hocvien->HoTen; ?></h5>
                                    <small><b>Mã học viên: <?php echo $hocvien->MaHocVien; ?></b></small>
                                    <a class="delete-button" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Xóa học viên này"
                                        onclick="confirmBeforeRedirect('/hocvien?delete=<?php echo $hocvien->MaHocVien; ?>', 'Bạn có chắc chắn muốn xóa học viên \'<?php echo $hocvien->HoTen; ?>\'?')"></a>
                                </div>
                            </div>
                            <div class="custom-block custom-block-topics-listing custom-list-item-content" data-bs-toggle="tooltip" data-bs-placement="right" title="Click để cập nhật học viên" onclick="toggleLoadingScreen();window.location.assign('/hocvien?edit=<?php echo $hocvien->MaHocVien; ?>');">
                                <div class="d-flex">
                                    <img id="HinhAnh" src="{{$hocvien->HinhAnh ? asset('storage/'.$hocvien->HinhAnh) : asset('images/monhoc_without_image.png')}}" class="custom-block-image img-fluid" alt="">
                                    
                                    <div class="custom-block-topics-listing-info-small d-flex" style="cursor: pointer;">
                                        <div>
                                            <div class="mt-2">
                                                <label class="me-4">Giới tính: <b>
                                                        @if ($hocvien->GioiTinh == 1)
                                                            Nam
                                                        @else
                                                            Nữ
                                                        @endif
                                                    </b></label>
                                                <label class="me-4">Ngày sinh: <b><?php echo $hocvien->NgaySinh?></b></label>
                                                <label>Điện thoại: <b><?php echo $hocvien->SoDT ?></b></label>
                                            </div>
                                            <div class="mt-2">
                                                <label class="me-4">Email: <b><?php echo $hocvien->Email ?></b></label>
                                            </div>
                                            <div class="mt-2">
                                                <label class="me-4">Địa chỉ: <b><?php echo $hocvien->DiaChi ?></b></label>
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
    <!-- Tao Hoc Viên Modal -->
    <div class="modal fade" id="ModalTaoHocVien" tabindex="-1" aria-labelledby="Học Viên" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5">Tạo Học Viên</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="needs-validation" action="/hocvien" method="POST" enctype="multipart/form-data">
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
                                <label for="inputHoTen" class="form-label">Họ tên<small
                                        class="text-danger">*</small>:</label>
                                <input type="text" class="form-control" id="inputHoTen" name="inputHoTen"
                                    value="" required>
                            </div>
                            <div class="col">
                                <label for="inputGioiTinh" class="form-label">Giới tính<small
                                        class="text-danger">*</small>:</label>
                                <select class="form-select" aria-label="Môn học" id="inputGioiTinh" name="inputGioiTinh"
                                    value="" required>
                                    <option value="1" selected>Nam</option>
                                    <option value="0">Nữ</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="inputNgaySinh" class="col-form-label">Ngày sinh <small
                                        class="text-danger">*</small>:</label>
                                <input type="text" class="form-control" id="inputNgaySinh" name="inputNgaySinh"
                                    value="" required>
                            </div>
                            <div class="col">
                                <label for="inputSoDT" class="col-form-label">Điện thoại:</label>
                                <input type="number" class="form-control" id="inputSoDT" name="inputSoDT"
                                    value="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="inputEmail" class="col-form-label">Email<small class="text-danger">*</small>:</label>
                                <input type="email" class="form-control" id="inputEmail" name="inputEmail"
                                    value="" required>
                            </div>
                            <div class="col">
                                <label for="inputDiaChi" class="col-form-label">Địa chỉ<small
                                        class="text-danger">*</small>:</label>
                                <input type="text" class="form-control" id="inputDiaChi" name="inputDiaChi"
                                    value="" required>
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
