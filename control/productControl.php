<?php
include "control/connectDB.php";
include "model/Lastet.php";
// Ham nay de lay ra tat ca san pham o trong bang product
function getLastetAll()
{
    // hai cai pham vi cua bien :
    // global la bien toan cuc . la bien co cai pham vi o trong toan project
    // local la bien dia phuong . la bien co pham vi o trong mot cai ham hoac class
    global $conn;
    // tao mot cai bien co ten la sql
    // dung de chua cau truy van anh muon su dung
    $sql = "SELECT * FROM `product`
    JOIN catagori
    ON product.catagori_id = catagori.catagori_id
    ORDER BY RAND() LIMIT 6";
    // chon ngau nhien 6 ban ghi trong cai table product
    $result = mysqli_query($conn, $sql);
    // mysqli_query se nhan vao hai tham so .
    // Tham so dau tien la cai bien ket noi .
    // Tham so thu hai la cai cau truy van ma ban muon thuc thi .
    // no se tra ve cho a mot cai ket qua
    $product = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // mysqli_fetch_all no se chuyen cai ket qua tra ve tu cau truy van
    // thanh mot cai mang de co the su dung
    // nhan vo hai tham so :
    // tham so dau tien la result la cai ket qua
    // tham so thu hai la result Type la cai kieu  du lieu ma may em mong muon
    mysqli_free_result($result);
    // mysqli_free_result dung de xoa cai ket qua o trong bo nho
    $all = new Lastet("nav-home", $product);
    // anh se tao ra mot cai bien co ten la all
    // gan gia tri cho cai bien all la cai doi tuong lastet
    // cai bien $all nay no se co hai tham so
    // tham so dau tien la cai tab id la nav-home
    // tham so thu hai la cai array du lieu
    // sau khi anh da khoi tao xong doi tuong
    return $all;
    // se tra ve cai doi tuong day
}
function getAllProduct()
{
    global $conn;
    $sql = "SELECT * FROM `product`
    JOIN catagori
    ON product.catagori_id = catagori.catagori_id";
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    return $product;
}
function getLastetNew()
{
    global $conn;
    $sql = "SELECT
    *
FROM
    `product`
JOIN catagori ON product.catagori_id = catagori.catagori_id
WHERE
    product.catagori_id = '1'
ORDER BY
    RAND()";
    // cau truy van nay no se :
    // no se tra ve cho tat ca san pham co catagori la new
    // no se random thu tu cac san pham
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    $all = new Lastet("nav-profile", $product);
    // cai bien $all nay no se co hai tham so
    // tham so dau tien la cai tab id la nav-profile
    // tham so thu hai la cai array du lieu
    return $all;
}
function getLastetFeatured()
{
    global $conn;
    $sql = "SELECT
    *
FROM
    `product`
JOIN catagori ON product.catagori_id = catagori.catagori_id
WHERE
    product.catagori_id = '2'
ORDER BY
    RAND()";
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);
    $all = new Lastet("nav-contact", $product);
    // cai bien $all nay no se co hai tham so
    // tham so dau tien la cai tab id la nav-contact
    return $all;
}
function getLastetOffer()
{
    global $conn;
    $sql = "SELECT
    *
FROM
    `product`
JOIN catagori ON product.catagori_id = catagori.catagori_id
WHERE
    product.catagori_id = '3'
ORDER BY
    RAND()";
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);
    $all = new Lastet("nav-last", $product);
    // cai bien $all nay no se co hai tham so
    // tham so dau tien la cai tab id la nav-last
    return $all;
}
function getSingleProduct($idProduct)
{
    global $conn;
    $sql = "SELECT
    *
FROM
    `product`
WHERE
    product_id = $idProduct";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $product = mysqli_fetch_assoc($result);
        return $product;
    }
}
