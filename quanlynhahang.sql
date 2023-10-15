CREATE SCHEMA `dbT2` ;

CREATE TABLE NhanVien (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ma_nhan_vien VARCHAR(255) not null,
    ten_nhan_vien VARCHAR(255) not null,
    so_dien_thoai VARCHAR(15) not null,
    chuc_vu VARCHAR(255),
    ca_lam_viec VARCHAR(255),
    luong DECIMAL(10, 2)
);

CREATE TABLE KhachHang (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ten_khach_hang VARCHAR(255) not null,
    so_dien_thoai VARCHAR(15) not null
);

CREATE TABLE HoaDon (
    ma_hoa_don INT AUTO_INCREMENT PRIMARY KEY,
    thoi_gian DATETIME not null,
    khach_hang_id int not null,
    nhan_vien_id int not null,
    noi_dung TEXT, 
    ban_so varchar(10),
    phuong_thuc_thanh_toan varchar(50),
    tong_tien DECIMAL(12, 2),
    trang_thai varchar(50),
    FOREIGN KEY (khach_hang_id) REFERENCES KhachHang(id),
    FOREIGN KEY (nhan_vien_id) REFERENCES NhanVien(id)
);

CREATE TABLE ThucDon (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ten_mon varchar(255) not null,
    don_gia DECIMAL(10, 2) not null
);

CREATE TABLE ChiTietHoaDon (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ma_hoa_don INT NOT NULL,
    mon_an_id INT NOT NULL,
    so_luong INT NOT NULL,
    FOREIGN KEY (ma_hoa_don) REFERENCES HoaDon(ma_hoa_don),
    FOREIGN KEY (mon_an_id) REFERENCES ThucDon(id)
);

CREATE TABLE Accounts (
    account_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role varchar(50) not null,
    nhan_vien_id int not null,
    FOREIGN KEY (nhan_vien_id) REFERENCES NhanVien(id)
);

CREATE TABLE Kho_hang (
    id INT AUTO_INCREMENT PRIMARY KEY,
    mon_an_id int NOT NULL,
    so_luong int NOT NULL,
    FOREIGN KEY (mon_an_id) REFERENCES ThucDon(id)
);

CREATE TABLE Ban (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(10) NOT NULL UNIQUE,
    trang_thai VARCHAR(10) not null,
    ma_hoa_don INT
);