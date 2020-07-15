<?php
include "connectDB.php";
// đây là trang giúp ta có thể thêm sản phẩm vào trong giỏ hàng
session_start();
// session_start đây là câu lệnh giúp ta có thể truy cập vào một phiên làm việc
// có thể mấy em không biết session là gì thì :
// session hay còn gọi là một phiên làm việc
// session sẽ được lưu trong trang
// và chỉ kết thúc khi hết thời gian timeout hoặc khi bạn đóng ứng dụng
// giống như các em thấy khi các em đăng nhập vào facebook .
// các em chỉ cần đăng nhập một lần đầu tiên thôi
// những lần khác khi mấy em vào lại trang facebook nó không cần bắt mấy em đăng nhập tiếp nữa
// đó là bởi vì nó đã lưu nick em vào trong session ở lần đăng nhập đầu tiên rồi
// lần đăng nhập tiếp theo nó chỉ cần kiểm tra session có tồn tại hay không thôi
// nếu có session nghĩa là em đã đăng nhập còn không thì chưa đăng nhập
// thế đấy đó chính là công dụng của session :)
if (isset($_SESSION['user'])) {
    // ở bên kia a đã chỉ isset là gì rồi
    // nó dùng để kiểm tra một cái biến đã được khởi tạo hay chưa
    // nói đơn giản là có tồn tại hay không đấy :v
    // như ở trên a nói đấy thì mình muốn mua hàng thì mình phải đăng nhập
    // nên ở đây nó sẽ kiểm tra mình đã đăng nhập hay chưa
    // bằng cách kiểm tra sự tồn tại của session
    // nếu đã đăng nhập rồi thì ta cho phép nó mua hàng thôi hihi
    $quanlity = $_GET['quanlity']; //khi a chọn addCart từ bên trang thông tin sản phẩm
    $price = $_GET['price']; // nó sẽ chuyển đường link qua trang này
    $idP = $_GET['idP']; // và a dùng $_GET để có thể lấy ra những thông tin cần thiết
    $image = $_GET['image']; // để có thể thêm sản phẩm vào trong giỏ hàng của anh
    $name = $_GET['name'];
    $user = $_SESSION['user'];
    // $_SESSION nó cũng tương tự như $_GET nó cũng là một cái biến toàn cục trong php
    // $_SESSION nó sẽ trả về một mảng các session được lưu vào trong bộ nhớ
    if (checkProductToCart($name, $user) > 0) {
        // ở đây ta sẽ gọi hàm checkProductToCart ở trong cái addProduct này
        // rồi ta lướt xuống và xem cái checkProductToCart nó sẽ làm gì nhé :)
        // sau khi mấy e đã đọc xong cái checkProductToCart rồi thì ta tiếp tục thôi
        // nhớ đọc đấy không đọc là uổng công a viết lắm đó ... với lại đọc ms hiểu nó là gì
        // rồi checkProductToCart nó sẽ trả về cho a một con số gì đó
        // rồi a sẽ xem nếu số trả về nó lớn hơn 0 có nghĩa là
        // sản phẩm đã tồn tại trong giỏ hàng
        // còn trả về 0 có nghĩa là sản phẩm này chưa có trong giỏ hàng
        updateCountCart($name, $user, number_format($quanlity));
        // rồi ta tiếp tục lướt màn hình và tìm cái hàm updateCountCart trong trang này
        // để xem a Huy giải thích hàm này làm gì nhé ...
        // không xem là không hiểu được đâu nên xem đi
        header('Location:../index.php');
        // sau khi cập nhật laị số lượng sản phẩm
        // thì chuyển trang này sang trang khác đó chính là index trang chủ của chúng ta
    } else {
        if (addProductToCart(number_format($quanlity), number_format($price), $image, number_format($idP), $name, $user)) {
            // nào tiếp tục tìm cái hàm addProductToCart ngồi đọc cho hiểu nào :)
            // sau khi thực thi hàm này nó sẽ trả về cho a một giá trị boolean
            // nếu nó là true thì nghĩa là ta đã thêm sản phẩm thành công
            // còn false thì thất bại cmnr :(
            header('Location:../index.php');
            // rồi nêú thành công nó sẽ xuống đây và chuyển trang này sang trang index
        }
    }
} else {
    header('Location:../login.php');
    // đây là trường hợp nếu ta chưa đăng nhập
    // thì nó sẽ chuyển trang hiện tại sang trang login và bắt ta đăng nhập
    // phải đăng nhập thì tui mới cho ông mua hàng còn không thì tui không cho mua đâu
    // kiểu vậy đấy :))
}
function checkProductToCart($nameCart, $nameuser)
{
    // đây là nơi kiểm tra xem sản phẩm mình muốn thêm vô
    // đã có trong giỏ hàng hay chưa ???
    global $conn;
    $sql = "SELECT * FROM `cart` WHERE name='$nameCart' AND nameUser='$nameuser' ";
    // để kiểm tra ta sẽ thực hiện câu truy vấn này
    // câu truy vấn này sẽ thực hiện truy vấn đến table cart
    // và lấy ra tất cả bản ghi trong nó với hai cái điều kiện
    // điều kiện đầu tiên là name(tên sản phẩm) sẽ bằng cái nameCart mình truyền vào
    // điều kiện thứ hai là nameUser(tên người mua) sẽ bằng cái nameuser mình truyền vào
    $result = mysqli_query($conn, $sql);
    // sau đó ta sẽ thực hiện câu truy vấn này và có được một kết quả
    $num = mysqli_num_rows($result);
    // mysqli_num_rows nó sẽ trả về số lượng bản ghi từ kết qủa của câu truy vấn
    // mấy em thấy nó giống cái gì ở sql của ta nào ??
    // nếu mấy em nghĩ đến cái count thì đúng rồi đấy nó tương tự y nhau đấy
    return $num;
    // và sau đó ta sẽ trả về cái số lượng hàng ấy
    // rồi ta hãy lướt lại lên trên để xem mình dùng hàm này như thế nào nhé hihi
}
function updateCountCart($name, $user, $quanlity)
{
    // nếu hàng đã tồn tại trong giỏ hàng nó sẽ thực thi hàm này
    // nó sẽ cập nhật số lượng của sản phẩm trong giỏ hàng lại
    // suy nghĩ đơn giản ở trong thực tế như thế này nè
    // khi bé phương vô một cái shop online
    // bé phương thấy một cái đầm đẹp nên quyết định thêm nó vào trong giỏ hàng để mua
    // bây giờ giỏ hàng của phương sẽ là
    /*          tên sản phẩm         số lượng
    đầm xoè nữ              1
     */
    // sau đó bé phương đem đi cho bé trang xem
    // bé trang thấy đẹp quá nên kêu bé phương mua cho trang một cái y như thế
    // thế là phương tiếp tục mua thêm cái đầm như thế nữa
    // bây giờ giỏ hàng của phương sẽ là
    /*          tên sản phẩm         số lượng
    đầm xoè nữ             2
     */
    // chứ nó không phải là như thế này . như thế này là sai như ở trên mới đúng
    /*          tên sản phẩm         số lượng
    đầm xoè nữ             1
    đầm xoè nữ             1
     */
    // đó chính là cái nhiệm vụ của hàm này
    global $conn;
    $sql = "UPDATE `cart` SET `quantity`=quantity+$quanlity WHERE name='$name' AND nameUser='$user'";
    // thực thi câu truy vấn này
    // thực hiện cập nhật số lượng sản phẩm bằng số lượng sản phẩm cũ cộng cho số lượng bạn muốn thêm vô
    // hai cái điều kiện kia để tìm ra sản phẩm nào có tên sản phẩm và tên người mua trùng với cái mình muốn sữa
    $result = mysqli_query($conn, $sql);
    // thực thi câu truy vấn
}
function addProductToCart($quanlity, $price, $image, $idP, $name, $user)
{
    global $conn;
    // hàm này sẽ có năm tham số
    // số lượng -- giá sản phẩm -- hình ảnh sản phẩm -- mã sản phẩm
    // tên sản phẩm -- tên người mua
    $sql = "INSERT INTO `cart`(
            `quantity`,
            `price`,
            `image`,
            `product_id`,
            `name`,
            `nameUser`
        )
    VALUES($quanlity,$price,'$image',$idP,'$name','$user')";
    // hàm này đơn giản là thêm sản phẩm vào trong giỏ hàng nếu sản phẩm đó chưa có
    // sử dụng câu lệnh insert để thêm một sản phẩm vào trong giỏ hàng
    $result = mysqli_query($conn, $sql);
    // sau đó thực thi câu truy vấn này để thêm một bản ghi vào table cart
    // sau đó ta trả về cái biến $result này để xí kiểm tra câu lệnh của ta
    // thực thi được hay là không
    return $result;
}
