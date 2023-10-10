<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DangKyLopHoc;
use App\Models\HocVien;
use App\Models\LopHoc;
use App\Models\MonHoc;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        MonHoc::create([
            'MaMonHoc' => 1,
            'Ten' => 'Lập trình Web 01'
        ]);

        MonHoc::create([
            'MaMonHoc' => 2,
            'Ten' => 'Lập trình Web 02'
        ]);

        MonHoc::create([
            'MaMonHoc' => 3,
            'Ten' => 'Hệ quản trị CSDL'
        ]);

        MonHoc::create([
            'MaMonHoc' => 4,
            'Ten' => 'Môi trường và công cụ tiếp thị số'
        ]);

        MonHoc::create([
            'MaMonHoc' => 5,
            'Ten' => 'Cơ Sở Dữ Liệu'
        ]);

        MonHoc::create([
            'MaMonHoc' => 6,
            'Ten' => 'Phát triển ứng dụng web'
        ]);

        MonHoc::create([
            'MaMonHoc' => 7,
            'Ten' => 'Kỹ thuật lập trình'
        ]);

        MonHoc::create([
            'MaMonHoc' => 8,
            'Ten' => 'Mạng máy tính'
        ]);

        MonHoc::create([
            'MaMonHoc' => 9,
            'Ten' => 'Kiểm thử phần mềm'
        ]);        

        LopHoc::create([
            'MaLopHoc' => 1,
            'MaMonHoc' => 1,
            'HocKy' => 1,
            'NamHoc' => 2024,
            'MoDangKy' => true,
            'HocPhi' => 750000,
            'HinhAnh' => ''
        ]);
        LopHoc::create([
            'MaLopHoc' => 2,
            'MaMonHoc' => 2,
            'HocKy' => 1,
            'NamHoc' => 2024,
            'MoDangKy' => true,
            'HocPhi' => 750000,
            'HinhAnh' => ''
        ]);
        LopHoc::create([
            'MaLopHoc' => 3,
            'MaMonHoc' => 3,
            'HocKy' => 1,
            'NamHoc' => 2024,
            'MoDangKy' => true,
            'HocPhi' => 750000,
            'HinhAnh' => ''
        ]);
        LopHoc::create([
            'MaLopHoc' => 4,
            'MaMonHoc' => 4,
            'HocKy' => 1,
            'NamHoc' => 2024,
            'MoDangKy' => true,
            'HocPhi' => 750000,
            'HinhAnh' => ''
        ]);
        LopHoc::create([
            'MaLopHoc' => 5,
            'MaMonHoc' => 5,
            'HocKy' => 1,
            'NamHoc' => 2024,
            'MoDangKy' => true,
            'HocPhi' => 750000,
            'HinhAnh' => ''
        ]);
        LopHoc::create([
            'MaLopHoc' => 6,
            'MaMonHoc' => 6,
            'HocKy' => 1,
            'NamHoc' => 2024,
            'MoDangKy' => true,
            'HocPhi' => 750000,
            'HinhAnh' => ''
        ]);
        LopHoc::create([
            'MaLopHoc' => 7,
            'MaMonHoc' => 7,
            'HocKy' => 1,
            'NamHoc' => 2024,
            'MoDangKy' => true,
            'HocPhi' => 750000,
            'HinhAnh' => ''
        ]);
        LopHoc::create([
            'MaLopHoc' => 8,
            'MaMonHoc' => 8,
            'HocKy' => 1,
            'NamHoc' => 2024,
            'MoDangKy' => true,
            'HocPhi' => 750000,
            'HinhAnh' => ''
        ]);
        LopHoc::create([
            'MaLopHoc' => 9,
            'MaMonHoc' => 9,
            'HocKy' => 1,
            'NamHoc' => 2024,
            'MoDangKy' => true,
            'HocPhi' => 750000,
            'HinhAnh' => ''
        ]);
        LopHoc::create([
            'MaLopHoc' => 1,
            'MaMonHoc' => 1,
            'HocKy' => 1,
            'NamHoc' => 2024,
            'MoDangKy' => true,
            'HocPhi' => 750000,
            'HinhAnh' => ''
        ]);

        HocVien::create(['MaHocVien' => 1, 'HoTen' => 'Lê Viết Thanh', 'SoDT' => '0765088879', 'NgaySinh' => '08-08-1989', 'GioiTinh' => 1, 'DiaChi' => '101 Nguyễn Văn Cừ, quận 5, TPHCM', 'Email' => 'vietthanh.le89@edu.vn']);
        HocVien::create(['MaHocVien' => 2, 'HoTen' => 'Trương Trung Đức', 'SoDT' => '0901234567', 'NgaySinh' => '11-08-2000', 'GioiTinh' => 1, 'DiaChi' => '1A Bùi Thị Xuân, phường 1, quận 3, TPHCM', 'Email' => 'truongduc1108@edu.vn']);
        HocVien::create(['MaHocVien' => 3, 'HoTen' => 'Đặng Tuấn Anh', 'SoDT' => '0901111111', 'NgaySinh' => '10-01-1998', 'GioiTinh' => 1, 'DiaChi' => '85-87 Trần Hưng Đạo, Hoàn Kiếm, TP. Hà Nội', 'Email' => 'anhdang@edu.vn']);
        HocVien::create(['MaHocVien' => 4, 'HoTen' => 'Hoàng Đức Anh', 'SoDT' => '0901111112', 'NgaySinh' => '11-02-1998', 'GioiTinh' => 1, 'DiaChi' => '268 Trần Hưng Đạo, P. Nguyễn Cư Trinh, Q.1, TP. HCM', 'Email' => 'anhhoang@edu.vn']);
        HocVien::create(['MaHocVien' => 5, 'HoTen' => 'Lưu Trang Anh', 'SoDT' => '0901111113', 'NgaySinh' => '12-03-1998', 'GioiTinh' => 0, 'DiaChi' => '02 Lê Đại Hành, P. Minh Khai, Q. Hồng Bàng, Tp. HP', 'Email' => 'anhluu@edu.vn']);
        HocVien::create(['MaHocVien' => 6, 'HoTen' => 'Phạm Hoàng Anh', 'SoDT' => '0901111114', 'NgaySinh' => '13-04-1999', 'GioiTinh' => 1, 'DiaChi' => '80 Lê Lợi - Thành phố Đà Nẵng', 'anhpham@edu.vn']);
        HocVien::create(['MaHocVien' => 7, 'HoTen' => 'Phạm Thị Hiền Anh', 'SoDT' => '0901111115', 'NgaySinh' => '14-05-1999', 'GioiTinh' => 0, 'DiaChi' => '9A Trần Phú, P. Cái Khế, Q. Ninh Kiều, TP. Cần Thơ', 'Email' => 'anhthipham@edu.vn']);
        HocVien::create(['MaHocVien' => 8, 'HoTen' => 'Phạm Khắc Việt Anh', 'SoDT' => '0901111116', 'NgaySinh' => '15-06-1999', 'GioiTinh' => 1, 'DiaChi' => '18 Lê Hồng Phong, P. Ba Đình, TP Thanh Hóa', 'Email' => 'anhvietpham@edu.vn']);
        HocVien::create(['MaHocVien' => 9, 'HoTen' => 'Đỗ Hoàng Gia Bảo', 'SoDT' => '0901111117', 'NgaySinh' => '16-07-1999', 'GioiTinh' => 1, 'DiaChi' => '2 Thống Nhất, P.1, Tp. Vũng Tàu', 'Email' => 'baodo@edu.vn']);
        HocVien::create(['MaHocVien' => 10, 'HoTen' => 'Trần Thị Minh Châu', 'SoDT' => '0901111118', 'NgaySinh' => '17-08-1995', 'GioiTinh' => 0, 'DiaChi' => '3 Hoàng  Văn Thụ, P. Ngô Quyền, TP. Bắc Giang', 'Email' => 'chautran@edu.vn']);
        HocVien::create(['MaHocVien' => 11, 'HoTen' => 'Tăng Phương Chi', 'SoDT' => '0901111119', 'NgaySinh' => '18-09-1995', 'GioiTinh' => 0, 'DiaChi' => '12 Trường Chinh, TP. Bắc Cạn, T. Bắc Cạn', 'Email' => 'chitang@edu.vn']);
        HocVien::create(['MaHocVien' => 12, 'HoTen' => 'Nguyễn Thái Dương', 'SoDT' => '0901111120', 'NgaySinh' => '19-10-1995', 'GioiTinh' => 1, 'DiaChi' => 'Phú Khương, TP. Bến Tre, T. Bến Tre', 'Email' => 'duongnguyen@edu.vn']);

        DangKyLopHoc::create(['MaDangKy' => 1, 'MaLopHoc' =>1, 'MaHocVien' =>1, 'HocPhi' => 750000]);
        DangKyLopHoc::create(['MaDangKy' => 2, 'MaLopHoc' =>1, 'MaHocVien' =>1, 'HocPhi' => 750000]);
        DangKyLopHoc::create(['MaDangKy' => 3, 'MaLopHoc' =>2, 'MaHocVien' =>1, 'HocPhi' => 750000]);
        DangKyLopHoc::create(['MaDangKy' => 4, 'MaLopHoc' =>3, 'MaHocVien' =>1, 'HocPhi' => 750000]);
        DangKyLopHoc::create(['MaDangKy' => 5, 'MaLopHoc' =>4, 'MaHocVien' =>2, 'HocPhi' => 750000]);
        DangKyLopHoc::create(['MaDangKy' => 6, 'MaLopHoc' =>5, 'MaHocVien' =>2, 'HocPhi' => 750000]);
        DangKyLopHoc::create(['MaDangKy' => 7, 'MaLopHoc' =>6, 'MaHocVien' =>2, 'HocPhi' => 750000]);
        DangKyLopHoc::create(['MaDangKy' => 8, 'MaLopHoc' =>7, 'MaHocVien' =>3, 'HocPhi' => 750000]);
        DangKyLopHoc::create(['MaDangKy' => 9, 'MaLopHoc' =>8, 'MaHocVien' =>3, 'HocPhi' => 750000]);
        DangKyLopHoc::create(['MaDangKy' => 10, 'MaLopHoc' =>9, 'MaHocVien' =>3, 'HocPhi' => 750000]);
        DangKyLopHoc::create(['MaDangKy' => 11, 'MaLopHoc' =>10, 'MaHocVien' =>4, 'HocPhi' => 750000]);
        DangKyLopHoc::create(['MaDangKy' => 12, 'MaLopHoc' =>11, 'MaHocVien' =>4, 'HocPhi' => 750000]);
        DangKyLopHoc::create(['MaDangKy' => 13, 'MaLopHoc' =>12, 'MaHocVien' =>4, 'HocPhi' => 750000]);
        DangKyLopHoc::create(['MaDangKy' => 14, 'MaLopHoc' =>13, 'MaHocVien' =>5, 'HocPhi' => 750000]);
        DangKyLopHoc::create(['MaDangKy' => 15, 'MaLopHoc' =>14, 'MaHocVien' =>5, 'HocPhi' => 750000]);
        DangKyLopHoc::create(['MaDangKy' => 16, 'MaLopHoc' =>15, 'MaHocVien' =>5, 'HocPhi' => 750000]);
        DangKyLopHoc::create(['MaDangKy' => 17, 'MaLopHoc' =>16, 'MaHocVien' =>6, 'HocPhi' => 750000]);
        DangKyLopHoc::create(['MaDangKy' => 18, 'MaLopHoc' =>1, 'MaHocVien' =>6, 'HocPhi' => 750000]);
        DangKyLopHoc::create(['MaDangKy' => 19, 'MaLopHoc' =>2, 'MaHocVien' =>6, 'HocPhi' => 750000]);
        DangKyLopHoc::create(['MaDangKy' => 20, 'MaLopHoc' =>3, 'MaHocVien' =>7, 'HocPhi' => 750000]);
        DangKyLopHoc::create(['MaDangKy' => 21, 'MaLopHoc' =>4, 'MaHocVien' =>7, 'HocPhi' => 750000]);
        DangKyLopHoc::create(['MaDangKy' => 22, 'MaLopHoc' =>5, 'MaHocVien' =>8, 'HocPhi' => 750000]);
        DangKyLopHoc::create(['MaDangKy' => 23, 'MaLopHoc' =>6, 'MaHocVien' =>8, 'HocPhi' => 750000]);
        DangKyLopHoc::create(['MaDangKy' => 24, 'MaLopHoc' =>7, 'MaHocVien' =>8, 'HocPhi' => 750000]);
        DangKyLopHoc::create(['MaDangKy' => 25, 'MaLopHoc' =>8, 'MaHocVien' =>9, 'HocPhi' => 750000]);
        DangKyLopHoc::create(['MaDangKy' => 26, 'MaLopHoc' =>9, 'MaHocVien' =>9, 'HocPhi' => 750000]);
        DangKyLopHoc::create(['MaDangKy' => 27, 'MaLopHoc' =>10, 'MaHocVien' =>10, 'HocPhi' => 750000]);
        DangKyLopHoc::create(['MaDangKy' => 28, 'MaLopHoc' =>11, 'MaHocVien' =>10, 'HocPhi' => 750000]);
        DangKyLopHoc::create(['MaDangKy' => 29, 'MaLopHoc' =>12, 'MaHocVien' =>11, 'HocPhi' => 750000]);
        DangKyLopHoc::create(['MaDangKy' => 30, 'MaLopHoc' =>13, 'MaHocVien' =>11, 'HocPhi' => 750000]);
        DangKyLopHoc::create(['MaDangKy' => 31, 'MaLopHoc' =>14, 'MaHocVien' =>12, 'HocPhi' => 750000]);
        DangKyLopHoc::create(['MaDangKy' => 32, 'MaLopHoc' =>15, 'MaHocVien' =>12, 'HocPhi' => 750000]);
        DangKyLopHoc::create(['MaDangKy' => 33, 'MaLopHoc' =>16, 'MaHocVien' =>12, 'HocPhi' => 750000]);
        DangKyLopHoc::create(['MaDangKy' => 34, 'MaLopHoc' =>1, 'MaHocVien' =>12, 'HocPhi' => 750000]);
        DangKyLopHoc::create(['MaDangKy' => 35, 'MaLopHoc' =>2, 'MaHocVien' =>12, 'HocPhi' => 750000]);
        DangKyLopHoc::create(['MaDangKy' => 36, 'MaLopHoc' =>3, 'MaHocVien' =>10, 'HocPhi' => 750000]);
        DangKyLopHoc::create(['MaDangKy' => 37, 'MaLopHoc' =>4, 'MaHocVien' =>11, 'HocPhi' => 750000]);


        
    }
}
