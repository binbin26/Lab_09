<?php
require_once("db_module.php");

if(isset($_POST['ten'])){
    $ten = trim($_POST['ten']);
    if($ten != ""){
        $sql = "INSERT INTO tbl_danhmuc(ten) VALUES ('$ten')";
        executeQuery($sql, false);
        echo "Thêm danh mục thành công! <a href='index.php'>Về trang chủ</a>";
    } else {
        echo "Tên danh mục không được bỏ trống.";
    }
}
?>

<form method="POST">
    <label>Tên danh mục:</label>
    <input type="text" name="ten">
    <button type="submit">Thêm</button>
</form>
<?php
require_once("db_module.php");

$dsdm = executeQuery("SELECT * FROM tbl_danhmuc");

if(isset($_POST['ten'])){
    $ten = trim($_POST['ten']);
    $mota = trim($_POST['mota']);
    $gia = (int)$_POST['gia'];
    $id_dm = (int)$_POST['id_dm'];

    $sql = "INSERT INTO tbl_sanpham(ten, mota, gia, id_dm) 
            VALUES ('$ten', '$mota', $gia, $id_dm)";
    executeQuery($sql, false);
    echo "Thêm sản phẩm thành công! <a href='index.php'>Về trang chủ</a>";
}
?>

<form method="POST">
    <label>Tên sản phẩm:</label>
    <input type="text" name="ten"><br>

    <label>Mô tả:</label>
    <textarea name="mota"></textarea><br>

    <label>Giá:</label>
    <input type="number" name="gia"><br>

    <label>Danh mục:</label>
    <select name="id_dm">
        <?php foreach($dsdm as $dm): ?>
            <option value="<?=$dm['id']?>"><?=$dm['ten']?></option>
        <?php endforeach; ?>
    </select><br>

    <button type="submit">Thêm</button>
</form>
