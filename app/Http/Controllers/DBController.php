<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class DBController
{
    // Môn học
    public static function getAllMonHoc()
    {
        try {
            return DB::select("Select * from monhoc;");
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function searchMonHoc($keyword)
    {
        try {
            return DB::select("SELECT * FROM monhoc WHERE Ten LIKE '%$keyword%';");
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function searchMonHocByID($id)
    {
        try {
            return DB::select("SELECT * FROM monhoc WHERE MaMonHoc=$id;");
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function updateMonHoc(Request $request)
    {
        try {
            $query = "UPDATE monhoc SET Ten=\"$request->inputTenMonHoc\", HocPhi=$request->inputHocPhi WHERE MaMonHoc=$request->inputMaMonHoc;";
            DB::select($query);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function createMonHoc(Request $request)
    {
        try {
            DB::table('monhoc')->insert(
                ['MaMonHoc' => $request->inputMaMonHoc, 'Ten' => $request->inputTenMonHoc, 'HocPhi' => $request->inputHocPhi]
            );
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function deleteMonHoc($id)
    {
        try {
            $query = "DELETE FROM monhoc WHERE MaMonHoc = $id;";
            DB::select($query);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    // Lớp học
    public static function getAllLopHoc()
    {
        try {
            return DB::select("SELECT lophoc.*, monhoc.Ten FROM lophoc inner join monhoc where lophoc.MaMonHoc = monhoc.MaMonHoc;");
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function getLopHocByHocKy($namhoc, $hocky)
    {
        try {
            return DB::select("SELECT lophoc.*, monhoc.Ten FROM lophoc inner join monhoc on monhoc.MaMonHoc = lophoc.MaMonHoc where MoDangKy = 1 AND HocKy=$hocky AND NamHoc=$namhoc;");
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function searchLopHoc($keyword)
    {
        try {
            return DB::select("SELECT lophoc.*, monhoc.Ten FROM lophoc inner join monhoc where lophoc.MaMonHoc = monhoc.MaMonHoc AND monhoc.Ten LIKE '%$keyword%';");
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function searchLopHocByMonHoc($keyword, $maMonHoc)
    {
        try {

            if ($keyword == "" && !is_numeric($maMonHoc)) {
                return DBController::getAllLopHoc();
            }

            $query = "SELECT lophoc.*, monhoc.Ten FROM lophoc inner join monhoc where lophoc.MaMonHoc = monhoc.MaMonHoc AND monhoc.Ten LIKE '%$keyword%';";
            if (is_numeric($maMonHoc) && $keyword != "") {
                $query = "SELECT lophoc.*, monhoc.Ten FROM lophoc inner join monhoc where lophoc.MaMonHoc = monhoc.MaMonHoc AND monhoc.Ten LIKE '%$keyword%' AND monhoc.MaMonHoc = $maMonHoc;";
            } elseif (is_numeric($maMonHoc) && $keyword == "") {
                $query = "SELECT lophoc.*, monhoc.Ten FROM lophoc inner join monhoc where lophoc.MaMonHoc = monhoc.MaMonHoc AND monhoc.MaMonHoc = $maMonHoc;";
            }

            return DB::select($query);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function searchLopHocByID($id)
    {
        try {
            return DB::select("SELECT lophoc.*, monhoc.Ten FROM lophoc inner join monhoc where lophoc.MaMonHoc = monhoc.MaMonHoc AND lophoc.MaLopHoc=$id;");
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function updateLopHoc(Request $request)
    {
        try {
            if ($request->hasFile('inputHinhAnh')) {
                $imagePath = "";
                $imagePath = $request->file('inputHinhAnh')->store('w2oss01-images', 'public');
                $query = "UPDATE lophoc SET MaMonHoc=$request->inputMaMonHoc, GhiChu=\"$request->inputGhiChu\", HocPhi=$request->inputHocPhi, HocKy=$request->inputHocKy, NamHoc=$request->inputNamHoc, MoDangKy=$request->inputMoDangKy, HinhAnh=\"$imagePath\" WHERE MaLopHoc=$request->inputMaLopHoc;";
            } else {
                $query = "UPDATE lophoc SET MaMonHoc=$request->inputMaMonHoc, GhiChu=\"$request->inputGhiChu\", HocPhi=$request->inputHocPhi, HocKy=$request->inputHocKy, NamHoc=$request->inputNamHoc, MoDangKy=$request->inputMoDangKy WHERE MaLopHoc=$request->inputMaLopHoc;";
            }

            DB::select($query);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function createLopHoc(Request $request)
    {
        try {
            $imagePath = "";
            if ($request->hasFile('inputHinhAnh')) {
                $imagePath = $request->file('inputHinhAnh')->store('w2oss01-images', 'public');
            }

            DB::table('lophoc')->insert(
                ['MaMonHoc' => $request->inputMaMonHoc, 'GhiChu' => $request->inputGhiChu, 'HocPhi' => $request->inputHocPhi, 'HocKy' => $request->inputHocKy, 'NamHoc' => $request->inputNamHoc, 'MoDangKy' => $request->inputMoDangKy, 'HinhAnh' => $imagePath],
            );

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function deleteLopHoc($id)
    {
        try {
            $query = "DELETE FROM lophoc WHERE MaLopHoc = $id;";
            DB::select($query);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    // Học viên
    public static function getAllHocVien()
    {
        try {
            return DB::select("Select * from hocvien;");
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function searchHocVien($keyword)
    {
        try {
            return DB::select("SELECT * FROM hocvien WHERE HoTen LIKE '%$keyword%';");
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function searchHocVienByID($id)
    {
        try {
            return DB::select("SELECT * FROM hocvien WHERE MaHocVien=$id;");
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function updateHocVien(Request $request)
    {
        try {
            if ($request->hasFile('inputHinhAnh')) {
                $imagePath = $request->file('inputHinhAnh')->store('w2oss01-images', 'public');
                $query = "UPDATE hocvien SET HoTen=\"$request->inputHoTen\", SoDT=\"$request->inputSoDT\", NgaySinh=\"$request->inputNgaySinh\", GioiTinh=$request->inputGioiTinh, DiaChi=\"$request->inputDiaChi\", Email=\"$request->inputEmail\", HinhAnh=\"$imagePath\" WHERE MaHocVien=$request->inputMaHocVien;";
            } else {
                $query = "UPDATE hocvien SET HoTen=\"$request->inputHoTen\", SoDT=\"$request->inputSoDT\", NgaySinh=\"$request->inputNgaySinh\", GioiTinh=$request->inputGioiTinh, DiaChi=\"$request->inputDiaChi\", Email=\"$request->inputEmail\" WHERE MaHocVien=$request->inputMaHocVien;";
            }

            DB::select($query);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function createHocVien(Request $request)
    {
        try {
            $imagePath = "";
            if ($request->hasFile('inputHinhAnh')) {
                $imagePath = $request->file('inputHinhAnh')->store('w2oss01-images', 'public');
            }

            // dd($request);
            DB::table('hocvien')->insert(
                ['HoTen' => $request->inputHoTen, 'SoDT' => $request->inputSoDT, 'NgaySinh' => $request->inputNgaySinh, 'GioiTinh' => $request->inputGioiTinh, 'DiaChi' => $request->inputDiaChi, 'Email' => $request->inputEmail, 'HinhAnh' => $imagePath]
            );

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function deleteHocVien($id)
    {
        try {
            $query = "DELETE FROM hocvien WHERE MaHocVien = $id;";
            DB::select($query);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    // Đăng ký lớp học
    public static function createDangKyLopHoc(Request $request)
    {
        try {
            $dsMaHocVien = preg_split("/\,/", $request->inputDSMaHocVien);
            $dsMaLopHoc = preg_split("/\,/", $request->inputDSMaLopHoc);
            $dsMaHocVienKhongDK = preg_split("/\,/", $request->inputDSMaHocVienKhongDK);
            $dsMaLopHocKhongDK = preg_split("/\,/", $request->inputDSMaLopHocKhongDK);

            foreach ($dsMaHocVienKhongDK as $maHocVien) {
                foreach($dsMaLopHoc as $maLopHoc){
                    if (DB::table("dangkylophoc")->where(['MaLop' => $maLopHoc, 'MaHocVien' => $maHocVien])->first()) {
                        DB::select("DELETE FROM dangkylophoc WHERE MaLop = $maLopHoc AND MaHocVien = $maHocVien;");
                    }
                }

                foreach($dsMaLopHocKhongDK as $maLopHoc){
                    if (DB::table("dangkylophoc")->where(['MaLop' => $maLopHoc, 'MaHocVien' => $maHocVien])->first()) {
                        DB::select("DELETE FROM dangkylophoc WHERE MaLop = $maLopHoc AND MaHocVien = $maHocVien;");
                    }
                }
            }

            foreach ($dsMaHocVien as $maHocVien) {
                foreach($dsMaLopHoc as $maLopHoc){
                    if (!DB::table("dangkylophoc")->where(['MaLop' => $maLopHoc, 'MaHocVien' => $maHocVien])->first()) {
                        DB::table("dangkylophoc")->insert(['MaLop' => $maLopHoc, 'MaHocVien' => $maHocVien]);
                    }
                }

                foreach($dsMaLopHocKhongDK as $maLopHoc){
                    if (DB::table("dangkylophoc")->where(['MaLop' => $maLopHoc, 'MaHocVien' => $maHocVien])->first()) {
                        DB::select("DELETE FROM dangkylophoc WHERE MaLop = $maLopHoc AND MaHocVien = $maHocVien;");
                    }
                }
            }
            
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function getDSDangKyLopHoc($namhoc, $hocky){
        try {
            $query = "SELECT dangkylophoc.* FROM dangkylophoc
            INNER JOIN lophoc ON lophoc.MaMonHoc = dangkylophoc.MaLop
            WHERE lophoc.HocKy = $hocky AND lophoc.NamHoc = $namhoc;";

            return DB::select($query);
        } catch (\Throwable $th) {
            return null;
        }
    }
}
