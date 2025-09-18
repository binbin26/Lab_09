<?php
require_once("db_module.php");

// Lấy danh mục
$dsdm = executeQuery("SELECT * FROM tbl_danhmuc");

// Lấy sản phẩm
$dssp = executeQuery("SELECT sp.id, sp.ten, sp.mota, sp.gia, dm.ten as danhmuc
                      FROM tbl_sanpham sp 
                      JOIN tbl_danhmuc dm ON sp.id_dm = dm.id");
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang chủ</title>
    <style>
        body { display: flex; font-family: Arial; }
        .menu { width: 20%; background: #eee; padding: 10px; }
        .content { width: 80%; padding: 10px; }
        .sp { border: 1px solid #ccc; margin: 5px; padding: 5px; }
    </style>
</head>
<body>
    <div class="menu">
        <h3>Danh mục</h3>
        <ul>
            <?php foreach($dsdm as $dm): ?>
                <li><?=$dm['ten']?></li>
            <?php endforeach; ?>
        </ul>
        <a href="themdm.php">+ Thêm danh mục</a><br>
        <a href="themsp.php">+ Thêm sản phẩm</a>
    </div>

    <div class="content">
        <h3>Sản phẩm</h3>
        <?php foreach($dssp as $sp): ?>
            <div class="sp">
                <h4><?=$sp['ten']?></h4>
                <p><?=$sp['mota']?></p>
                <p>Giá: <?=$sp['gia']?> đ</p>
                <small>Danh mục: <?=$sp['danhmuc']?></small>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
