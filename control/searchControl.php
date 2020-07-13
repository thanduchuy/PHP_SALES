<?php
include "control/connectDB.php";
function searchProducts($name = '', $category = '', $type = '')
{
    global $conn;
    $index = 0;
    $sql = "SELECT
    `product_id`,
    catagori.catagori_name,
    category.categoryi_name,
    `name`,
    `price`,
    `image`,
    `content`,
    `rate`
FROM
    `product`
JOIN `category` ON product.category_id = category.categoryi_id
JOIN catagori ON product.catagori_id = catagori.catagori_id
WHERE
";
    if (!empty($name)) {
        $sql = $sql . ($index == 0 ? " name LIKE '%$name%'" : " AND name LIKE '%$name%'");
        $index++;
    }
    if (!empty($category) && $category != "none") {
        $sql = $sql . ($index == 0 ? " catagori.catagori_name='$category'" : " AND catagori.catagori_name='$category'");
        $index++;
    }
    if (!empty($type) && $type != "none") {
        $sql = $sql . ($index == 0 ? " category.categoryi_name='$type'" : " AND category.categoryi_name='$type'");
        $index++;
    }
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    return $product;
}
