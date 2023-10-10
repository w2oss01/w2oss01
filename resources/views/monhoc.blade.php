@extends('layout')

@section('title')
    Môn học
@endsection

@section('content')
    
    <section class="section-padding">
        <div class="container">
            <div class="row">
                @if (isset($type) && $type == 'edit')                  
                    <div class="col-lg-12 col-12 ">
                        <h3 class="mb-4 text-center">Cập nhật môn học</h3>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">
                                <form class="needs-validation" action="/monhoc" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" class="form-control" id="inputMaMonHoc" name="inputMaMonHoc"
                                        value="<?php echo $data[0]->MaMonHoc ?>" style="display: none;">

                                    <div class="row mb-3">
                                        <label for="inputTenMonHoc" class="form-label">Tên môn học<small
                                                class="text-danger">*</small>:</label>
                                        <input type="text" class="form-control" id="inputTenMonHoc" name="inputTenMonHoc"
                                            value="<?php echo $data[0]->Ten ?>" required>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputHocPhi" class="form-label">Học phí<small
                                                class="text-danger">*</small>:</label>
                                        <input type="number" class="form-control" id="inputHocPhi" name="inputHocPhi"
                                            value="<?php echo $data[0]->HocPhi ?>" required>
                                    </div>

                                    <div class="row">                                        
                                        <div class="col d-flex justify-content-end">
                                            <a href="/monhoc" class="custom-btn-secondary me-2">Hủy</a>
                                            <button type="submit" class="custom-btn">Cập nhật</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <div class="col-4"></div>

                        </div>
                    </div>
                @else
                    <div class="col-lg-12 col-12 text-center">
                        <a href="#" class="mb-4 btn custom-btn" data-bs-toggle="modal"
                            data-bs-target="#ModalTaoMonHoc">Tạo mới môn học</a>

                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">
                                <form action="/monhoc" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="search" class="form-control" placeholder="Tên môn học"
                                            aria-label="Tên môn học" aria-describedby="button-addon2" name="search"
                                            value="">
                                        <button class="custom-btn" type="submit" id="inputTimKiemMonHoc" onclick="toggleLoadingScreen();">Tìm kiếm</button>
                                    </div>
                                </form>

                            </div>
                            <div class="col-4"></div>

                        </div>
                    </div>

                    <!-- Danh sách môn học -->
                    @if(count($data) == 0)
                        <p class="text-center pt-3">Không tìm thấy dữ liệu!</p>
                    @else
                        <div class="col-lg-8 col-12 text-center mx-auto">
                            <p>Có <?php echo count($data);?> môn học được tìm thấy</p>
                        </div>
                        <?php foreach ($data as $monhoc):?>
                        <div class="col-lg-8 col-12 mt-3 mx-auto custom-list-item shadow">
                            <div class="row p-2 custom-list-item-header">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1"><?php echo $monhoc->Ten; ?></h5>
                                    <a class="delete-button" data-bs-toggle="tooltip" data-bs-placement="top" title="Xóa môn học này" onclick="confirmBeforeRedirect('/monhoc?delete=<?php echo $monhoc->MaMonHoc; ?>', 'Bạn có chắc chắn muốn xóa môn học \'<?php echo $monhoc->Ten; ?>\'?')"></a>
                                </div>
                            </div>
                            <div class="row custom-list-item-content" data-bs-toggle="tooltip" data-bs-placement="right" title="Click để cập nhật môn học" onclick="toggleLoadingScreen(); window.location.assign('/monhoc?edit=<?php echo $monhoc->MaMonHoc; ?>');">
                                <div class="mt-2">
                                    <label class="me-4">Học phí môn học: <b>
                                            <?php
                                            $amount = new NumberFormatter('vi_VN', NumberFormatter::CURRENCY);
                                            echo $amount->formatCurrency($monhoc->HocPhi, 'VND');
                                            ?>
                                        </b></label>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                    @endif
                @endif

            </div>
        </div>
    </section>

    <!-- Tao Mon Hoc Modal -->
    <div class="modal fade" id="ModalTaoMonHoc" tabindex="-1" aria-labelledby="Môn Học" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5">Tạo Môn Học</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="needs-validation" action="/monhoc" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label for="inputTenMonHoc" class="form-label">Tên môn học<small class="text-danger">*</small>
                                :</label>
                            <input type="text" class="form-control" id="inputTenMonHoc" name="inputTenMonHoc"
                                value="" required>
                        </div>

                        <div class="row mb-3">
                            <label for="inputTenMonHoc" class="form-label">Học phí<small class="text-danger">*</small>
                                :</label>
                            <input type="number" class="form-control" id="inputHocPhi" name="inputHocPhi"
                                value="" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="custom-btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="custom-btn">Tạo mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Tao Mon Hoc Modal -->
    


@endsection
