<?php
include "control/connectDB.php";
function getAllCart($name)
{
    // hàm này để lấy ra toàn bộ sản phẩm trong giỏ hàng
    global $conn;
    $sql = "SELECT
    *
FROM
    `cart`
WHERE
    cart.nameUser = '$name'";
    // câu lện query này thì nó sẽ lấy ra tất cả bản ghi trong table cart
    // với điều kiện nameUser = $name với name chính là tên người dùng
    // thì với mỗi người dùng sẽ có giỏ hàng khác nhau không giống nhau được
    // và nó sẽ thay đổi theo tên người dùng
    $result = mysqli_query($conn, $sql);
    $cart = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // thực thi câu lệnh trên và lấy ra kết quả
    // sau đó chuyển kết quả này sang array bằng mysqli_fetch_all
    mysqli_free_result($result);
    // mysqli_free_result xoá kết qủa trong bộ nhớ để nhẹ web
    return $cart;
    // trả về cart để show ra web cho người dùng thấy
}
function subTotalCart($cart)
{
    // hàm này để tính tổng tiền trong giỏ hàng
    // ví dụ : giỏ hàng của trang
    /*     tên sản phẩm        số lượng       giá
    đầm bầu                2        300.000
    chân váy               1        200.000
     */
    // thì tổng tiền trong giỏ hàng sẽ bằng số lượng * giá
    // 2*300.000 + 1*200.000 = 800.000
    $result = 0;
    for ($i = 0; $i < count($cart); $i++) {
        $result += $cart[$i]["quantity"] * $cart[$i]["price"];
    }
    // vòng lặp này sẽ chạy từ 0 đến count($cart) sẽ trả về độ dài của mảng
    // $cart ni sẽ là mảng chứa các sản phẩm trong giỏ hàng
    // nó sẽ đọc lần lượt các phần tử
    // và tính tổng tiền của từng sản phẩm sau đó trả về để hiển thị trên web
    return $result;
}
function checkProductToCart($nameCart, $nameuser)
{
    global $conn;
    $sql = "SELECT * FROM `cart` WHERE name='$nameCart' AND nameUser='$nameuser' ";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    return $num;
}
function updateQuanlity($cartid, $quanlity)
{
    global $conn;
    $sql = "UPDATE
    `cart`
SET
    `quantity` = $quanlity
WHERE
    cart_id = $cartid ";
    // gọi câu lệnh query này sẽ thực hiện cập nhật lại số lượng sản phẩm với id
    // chính là cái cartid mình truyền vào
    // nó sẽ cập nhật với quanlity là cái quanlity mình truyền vào luôn
    // trong cái bảng cart trong database của mình hihi
    $result = mysqli_query($conn, $sql);
}
function deleteItemInCart($cartid)
{
    global $conn;
    $sql = "DELETE FROM `cart` WHERE cart_id=$cartid ";
    // đơn giản chỉ là truyền vào cartid nó sẽ xoá cái bản ghi có id là cartid mình truyền vào ...
    $result = mysqli_query($conn, $sql);
}

function generateRandomString($length = 5)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function checkOut($carts)
{
    global $conn;
    if (isset($_POST['btnCheckout'])) {
        // nếu người dùng đã kiểm tra kĩ càng và chọn vào nút thanh toán ngay
        // thì ta tiến hành thanh toán cho người dùng
        if (!isset($_POST['rule'])) {
            // nếu người dùng chưa chọn vào cái chấp nhận điều khoản thì ta
            // sẽ tiến hành thông báo cho người dùng thấy
            // cái này a dùng js để tạo một cái alert thầy có hỏi mấy em thì kêu mò trên mạng :v
            echo "<script type='text/javascript'>alert('Vui lòng chấp nhận điều khoản');</script>";
        } else {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $company = $_POST['company'];
            $number = $_POST['number'];
            $email = $_POST['email'];
            $selectCountry = $_POST['selectOption'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $street = $_POST['street'];
            $pay = $_POST['selector'];
            $subTotal = $_POST['subtotal'];
            $shipping = $_POST['shipping'];
            $user = $_SESSION['user'];
            // lấy ra các thông tin ta đã nhập ở bên trang checkout ở cái form bên chi tiết thanh toán
            // và ta cũng lấy ra name của user từ session để tiến hành thanh toán
            // sau đó ta gọi hàm generateRandomString để tạo ra một cái id ngẫu nhiên có độ dài là 5
            // để ta thêm id bên cái table checkout và detailCheckout
            // hai cái này phải chung id nên ta ms phải tạo một cái id ngẫu nhiên
            $id = generateRandomString();
            if (empty($firstName) || empty($lastName) || empty($company) || empty($number) || empty($email) || empty($company) || empty($selectCountry) || empty($city) || empty($district) || !isset($pay) || empty($street)) {
                echo "<script type='text/javascript'>alert('Không được để trống trường nào');</script>";
                // nễu người dùng ko nhập một trong các trường ở bên chi tiết thanh toán
                // thì nó sẽ thông báo cho người dùng biết
            } else {
                $sql = "INSERT INTO `checkout`(
                `id`,
                `firstName`,
                `lastName`,
                `company`,
                `numberPhone`,
                `email`,
                `country`,
                `city`,
                `district`,
                `street`,
                `pay`,
                `subtotal`,
                `shipping`,
                `user`
            )
            VALUES('$id','$firstName','$lastName', '$company', '$number', '$email', '$selectCountry', '$city', '$district', '$street','$pay',$subTotal,$shipping,'$user') ";
                $result = mysqli_query($conn, $sql);
                // sau khi kiểm tra và tạo ra các biến cần thiết thì ta tiến hành
                // thêm các biến đó vào trong tbale checkout để thành một cái bản ghi mới
                if ($result) {
                    // sau đó nếu câu lệnh insert ở trên của ta thành công thì ta tiến hành
                    // hai công việc ở dưới này
                    // cùng tìm hai cái hàm này ở cartControl để xem nó làm việc gì nhé <3
                    addDetailCheckout($id, $carts);
                    removeALLCart($carts);
                    header('Location:index.php?success=true');
                    // sau đó chuyển trang này sang trang index với tham số success
                    // để bên trang index hiện một cái thông báo
                    // cho ta biết ta đã mua hàng thành công
                }
            }
        }
    }
}
function removeALLCart($cart)
{
    global $conn;
    // hàm này có công việc là nó sẽ xoá hết tất cả sản phẩm trong giỏ hàng
    // của người dùng thì sau khi thanh toán mấy cái món trong giỏ hàng rồi
    // thì chắc chắn mấy cái món đó trong giỏ hàng sẽ bị mất đi rồi
    // ở ngoài đời nó thế mà nhỉ :)
    foreach ($cart as $item) {
        // sau đó chạy một vòng for
        // lặp qua từng phần tử trong mảng cart để
        // lấy ra từng id sản phẩm trong cart để ta có thể tiến hành xoá lần lượt từng
        // phẩn tử trong nó
        $id = $item['cart_id'];
        $sql = "DELETE FROM `cart` WHERE cart_id=$id";
        // gọi câu lệnh delete để xoá một bản ghi trong table cart
        // với điều kiện cart_id sẽ bằng id sản phẩm mình đang lặp qua
        $result = mysqli_query($conn, $sql);
        // thực thi câu lệnh với mysqli_query
    }
}
function addDetailCheckout($id, $cart)
{
    global $conn;
    // hàm này để thêm sản phẩm bên cái chi tiết giỏ hàng
    // database của ta sẽ có hai cái checkout và detailCheckout
    // table checkout sẽ chứa những thông tin cơ bản của người mua và tổng tiền người dùng phải thanh toán
    // table detailCheckout sẽ chứa những sản phẩm người dùng đã mua trong lần thanh toán này
    foreach ($cart as $item) {
        $name = $item['name'];
        $quantity = $item['quantity'];
        $price = $item['price'];
        // chạy một vòng for để tiến hành thêm mới các bản ghi
        // vào trong table detailCheckout để lưu các sản phẩm người dùng đã mua
        $sql = "INSERT INTO `detailCheckout`( `idCheckout`, `quanlity`, `price`, `name`) VALUES ('$id',$quantity,$price,'$name')";
        $result = mysqli_query($conn, $sql);
    }
}
