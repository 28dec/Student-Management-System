# Student-Management-System
Quản lý sinh viên PHP
Hệ thống quản lý sinh viên bao gồm các tính năng:
- Đăng nhập
- Thêm, sửa, xóa Sinh viên
- Thêm, sửa, xóa Môn học
- Thêm, sửa, xóa Lớp học
- Thêm, sửa, xóa sinh viên trong lớp học
- Thêm, sửa, xóa điểm cho sinh viên
# Mô hình hệ thống: M-V-C
HTML view <-> jQuery -> PHP Controller <-> PHP Model <-> Mysql database
Database thiết kế chuẩn 3 (3rd Normal Form), truy vấn + thay đổi dữ liệu qua Stored procedure
# REQUIREMENTS
- Apache PHP 5 (XAMPP)
- MySQL 5
- jQuery 3
- Bootstrap 4

# HOW TO USE.

- Clone project vào thư mục htdocs.
- Tạo 1 database mới với tên là "qlsv", charset là UTF8, collation là utf8_unicode_ci
- Import file qlsv.sql vào db vừa tạo.
