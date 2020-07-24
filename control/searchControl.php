<?php
include "control/connectDB.php";
function searchProducts($name = '', $category = '', $type = '')
{
    // nhìn ở trên parameter của hàm này kìa
    // thấy nó có cái gì lạ không
    // ($tenBien = giá trị ) khi ta dùng như thế này thì hàm của ta có 3 tham số truyền vào
    // nhưng mà ta có thể tuỳ biến nó có thể chỉ chuyền 1 hoặc 2 tham số thôi hoặc không thích truyền vào gì cũng đc
    // vd ở cái if đầu tiên bên trang product_list anh gọi hàm này nhưng a chỉ truyền
    // tham số cho cái name còn hai cái kia ko truyền
    // khi a không truyền cho nó thì nó sẽ có giá trị mặc định là cái sau dấu bằng
    // mà ở đây của anh chính là một cái chuổi rổng :)
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
// đây là câu lệnh tìm kiếm sản phẩm trong cái table product
    // nhưng để ý kỉ một chút em sẽ thấy nó kết thúc ở where thì đâu có đc đúng không
    // đâu có đúng cú pháp ta đã học đâu @@
    // ở đây không phải do a ngu a viết thế đâu mà do
    // khi mấy em ở cái trang product list ấy có thể thấy ngoài tìm theo tên
    // ta có thể tìm kiếm theo danh mục và thể loại
    // anh làm thế để cho người dùng có thể thoải mái
    // không cần phải nhập cả tên hay là phải chọn cả mấy cái select option
    // người dùng có thể nhập cả 3 , hay chỉ nhập 1 hoặc 2 cái thôi vẫn được
    // không bị báo lỗi gì cả <3
    if (!empty($name)) {
        // điều kiện ở đây có nghĩa là gì
        // khi ta truyền vào cái tên sản phẩm để tìm
        // thì chắc chắn nó sẽ khác rổng rồi mà đã khác rổng thì ta sẽ chạy xuống đây
        // $tênbiến = $tênbiến . "chuỗi"
        // đây chính là cách cộng chuổi trong php (hợp nhất hai chuỗi lại thành 1)
        // nên nếu cái name này khác rổng thì ta sẽ thêm điều kiện vào trong cái câu lệnh sql của ta
        $sql = $sql . ($index == 0 ? " name LIKE '%$name%'" : " AND name LIKE '%$name%'");
        $index++;
        // mấy em học sql rồi nhớ nhớ cái đoạn where khi ta muốn thêm nhiều điều kiện vào một câu truy vấn
        // thì ta phải làm sao : AND là tất cả điều kiện đều phải là true
        // OR là chỉ cần một trong các điều kiện là true là ổn áp rồi
        // đó nên nếu index = 0 nghĩa là đây là điều kiện đầu tiên được thêm vào sql trước đó
        // nên sẽ không có dấu AND còn nếu đã có một điều kiện được thêm vào
        // thì điều kiện tiếp theo được thêm vào sẽ phải có dấu AND ở đằng trước
    }
    if (!empty($category) && $category != "none") {
        $sql = $sql . ($index == 0 ? " catagori.catagori_name='$category'" : " AND catagori.catagori_name='$category'");
        $index++;
        // ở đây thì nó cũng tương tự như ở cái trên cái name
        // nếu người dùng click vào category và chọn danh mục thì nó sẽ thêm điều kiện vào trong câu lệnh sql
    }
    if (!empty($type) && $type != "none") {
        $sql = $sql . ($index == 0 ? " category.categoryi_name='$type'" : " AND category.categoryi_name='$type'");
        $index++;
    }
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // sau đó chuyển kết quả từ câu truy vấn thành array và trả về cho người dùng
    mysqli_free_result($result);
    return $product;
}
