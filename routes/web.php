<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DBController;

Route::get('/', function () {
    if(session('logged') == true){
        return redirect("/lophoc");
    }else{
        session(['logged' => false]);
        return view('dangnhap');
    }
});

Route::post('/', function (Request $request) {
    if((isset($request->inputUsername) && isset($request->inputPassword) && $request->inputUsername == "thanhle" && $request->inputPassword == "10diem")){
        session(['logged' => true]);
        return redirect("/lophoc");
    }else{
        return redirect('/')->with('message', 'Sai tên đăng nhập hoặc mật khẩu!');;
    }  
});

Route::get('/dangxuat', function () {
    session(['logged' => false]);
    return redirect("/");
});


// Đăng ký lớp học
Route::get('/dangkylophoc', function (Request $request) {
    if(session('logged') != true){
        return redirect('/');
    }

    $dsHocVien = DBController::getAllHocVien();
    $dsLopHoc = [];
    $dsDangky = [];

    if(isset($request->inputNamHoc) && isset($request->inputHocKy)){
        $dsLopHoc = DBController::getLopHocByHocKy($request->inputNamHoc, $request->inputHocKy);
        $dsDangky = DBController::getDSDangKyLopHoc($request->inputNamHoc, $request->inputHocKy);
    }

    return view('dangkylophoc', ['dsHocVien' => $dsHocVien, 'dsLopHoc' => $dsLopHoc, 'dsDangky' => $dsDangky]);
});

Route::post('/dangkylophoc', function (Request $request) {
    if(session('logged') != true){
        return redirect('/');
    }

    $result = DBController::createDangKyLopHoc($request);
    $message = 'Đăng ký lớp thành công!';

    if($result == false){
        $message = 'Lỗi xảy ra khi đăng ký lớp!';
    }

    return redirect("/dangkylophoc?inputNamHoc=".$request->inputNamHoc."&inputHocKy=".$request->inputHocKy)->with('message', ['is_success'=>$result, 'content'=>$message]);
});

// Học viên
Route::get('/hocvien', function (Request $request) {
    if(session('logged') != true){
        return redirect('/');
    }

    $data = [];
    if(isset($request->edit)){
        $data = ['type'=> 'edit', 'data' => DBController::searchHocVienByID($request->edit)];
    }
    elseif(isset($request->search)){
        $data = ['type'=> 'display', 'data' => DBController::searchHocVien($request->search)];
    }
    elseif(isset($request->delete)){
        $result = DBController::deleteHocVien($request->delete);
        $message = 'Học viên đã được xóa!';

        if($result == false){
            $message = 'Lỗi xảy ra khi xóa học viên!';
        }
        return redirect("/hocvien")->with('message', ['is_success'=>$result, 'content'=>$message]);
    }
    else{
        $data = ['type'=> 'display', 'data' => DBController::getAllHocVien()];
    }

    return view('hocvien', $data);
});

Route::put('/hocvien', function (Request $request) {
    if(session('logged') != true){
        return redirect('/');
    }

    $result = DBController::updateHocVien($request);
    $message = 'Thông tin học viên '.$request->inputHoTen.' đã được cập nhật!';
    if($result == false){
        $message = 'Lỗi xảy ra khi cập nhật thông tin học viê '.$request->inputHoTen.'!';
    }

    return redirect("/hocvien")->with('message', ['is_success'=>$result, 'content'=>$message]);
});

Route::post('/hocvien', function (Request $request) {
    if(session('logged') != true){
        return redirect('/');
    }

    $result = DBController::createHocVien($request);
    $message = 'Học viên '.$request->inputHoTen.' đã được thêm mới!';

    if($result == false){
        $message = 'Lỗi xảy ra khi tạo mới học viên '.$request->inputHoTen.'!';
    }

    return redirect("/hocvien")->with('message', ['is_success'=>$result, 'content'=>$message]);
});

// Lớp học
Route::get('/lophoc', function (Request $request) {
    if(session('logged') != true){
        return redirect('/');
    }

    $dsmonhoc = DBController::getAllMonHoc();
    $data = [];

    if(isset($request->edit)){
        $data = ['type'=> 'edit', 'dsmonhoc' => $dsmonhoc, 'data' => DBController::searchLopHocByID($request->edit)];
    }
    elseif(isset($request->search) || isset($request->maMonHoc)){
        $data = ['type'=> 'display', 'dsmonhoc' => $dsmonhoc, 'data' => DBController::searchLopHocByMonHoc($request->search, $request->maMonHoc)];
    }
    elseif(isset($request->delete)){
        $result = DBController::deleteLopHoc($request->delete);
        $message = 'Lớp học đã được xóa!';

        if($result == false){
            $message = 'Lỗi xảy ra khi xóa lớp học!';
        }
        return redirect("/lophoc")->with('message', ['is_success'=>$result, 'content'=>$message]);
    }
    else{
        $data = ['type'=> 'display', 'dsmonhoc' => $dsmonhoc, 'data' => DBController::getAllLopHoc()];
    }

    return view('lophoc', $data);
});

Route::put('/lophoc', function (Request $request) {
    if(session('logged') != true){
        return redirect('/');
    }

    $result = DBController::updateLopHoc($request);
    $updatedLopHoc = DBController::searchLopHocByID($request->inputMaLopHoc);
    $name = $updatedLopHoc[0]->Ten." (HK".$updatedLopHoc[0]->HocKy."/".$updatedLopHoc[0]->NamHoc.")";
    $message = 'Lớp học '.$name.') đã được cập nhật!';

    if($result == false){
        $message = 'Lỗi xảy ra khi cập nhật lớp học '.$name.'!';
    }

    return redirect("/lophoc")->with('message', ['is_success'=>$result, 'content'=>$message]);
});

Route::post('/lophoc', function (Request $request) {
    if(session('logged') != true){
        return redirect('/');
    }

    $result = DBController::createLopHoc($request);
    $monhoc = DBController::searchMonHocByID($request->inputMaMonHoc);
    $name = $monhoc[0]->Ten." (HK".$request->inputHocKy."/".$request->inputNamHoc.")";

    $message = 'Lớp học '.$name.' đã được thêm mới!';

    if($result == false){
        $message = 'Lỗi xảy ra khi tạo mới môn học '.$name.'!';
    }

    return redirect("/lophoc")->with('message', ['is_success'=>$result, 'content'=>$message]);
});

// Môn học
Route::get('/monhoc', function (Request $request) {
    if(session('logged') != true){
        return redirect('/');
    }

    $data = [];
    if(isset($request->edit)){
        $data = ['type'=> 'edit', 'data' => DBController::searchMonHocByID($request->edit)];
    }
    elseif(isset($request->search)){
        $data = ['type'=> 'display', 'data' => DBController::searchMonHoc($request->search)];
    }
    elseif(isset($request->delete)){
        $result = DBController::deleteMonHoc($request->delete);
        $message = 'Môn học đã được xóa!';

        if($result == false){
            $message = 'Lỗi xảy ra khi xóa môn học!';
        }
        return redirect("/monhoc")->with('message', ['is_success'=>$result, 'content'=>$message]);
    }
    else{
        $data = ['type'=> 'display', 'data' => DBController::getAllMonHoc()];
    }

    return view('monhoc', $data);
});

Route::put('/monhoc', function (Request $request) {
    if(session('logged') != true){
        return redirect('/');
    }

    $result = DBController::updateMonHoc($request);
    $message = 'Môn học '.$request->inputTenMonHoc.' đã được cập nhật!';
    if($result == false){
        $message = 'Lỗi xảy ra khi cập nhật môn học '.$request->inputTenMonHoc.'!';
    }

    return redirect("/monhoc")->with('message', ['is_success'=>$result, 'content'=>$message]);
});

Route::post('/monhoc', function (Request $request) {
    if(session('logged') != true){
        return redirect('/');
    }

    $result = DBController::createMonHoc($request);
    $message = 'Môn học '.$request->inputTenMonHoc.' đã được thêm mới!';

    if($result == false){
        $message = 'Lỗi xảy ra khi tạo mới môn học '.$request->inputTenMonHoc.'!';
    }

    return redirect("/monhoc")->with('message', ['is_success'=>$result, 'content'=>$message]);
});




