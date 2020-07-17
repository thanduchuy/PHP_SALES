<?php
include "control/connectDB.php";
$nameRe = $passRe = $repassRe = $errorRe = '';
// đây là nơi khai báo các biến a sẽ hiển thị ở trang register.php
// nameRe (tên tài khoản)
// passRe (mật khẩu )
// repassRe (nhập lại mật khẩu)
// errorRe (lỗi khi đăng kí )
$nameLg = $passLg = $errorLg = '';
// biến để lưu giá trị từ form login.php
// gồm tên tk , mật khẩu và cuối cùng là lỗi đăng nhập
$user = "";
function registerUser() // đây là hàm thực hiện việc đăng ký tài khoản

{
    global $nameRe; // ta dùng global để có thể dùng được biến toàn cục trong hàm của ta
    global $passRe;
    global $repassRe;
    global $errorRe;
    if (isset($_POST['btnRegister'])) {
        // nếu người dùng click vào button đăng ký thì nó mới được thực hiện
        $nameRe = $_POST['name'];
        $passRe = $_POST['password'];
        $repassRe = $_POST['rePassword'];
        // ta sẽ dùng $_POST một biến toàn cục trong php nó sẽ trả về một cái mảng
        // ta chỉ cần gọi đến các key của các phần tử trong mảng
        // thì nó sẽ trả về cho ta value của các phần tử ấy
        // ta sẽ lấy ra tên , mật khẩu và mật khẩu nhập lại để có thể kiểm tra
        if (empty($nameRe) || empty($passRe) || empty($repassRe)) {
            // empty sẽ kiểm tra chuỗi có rổng hay không
            // do ở trên ta lấy ra value từ post gửi về
            // nếu post gửi về rổng thì chứng tỏ người dùng đã bỏ qua một cái input nào đó
            $errorRe = "Không được bỏ trống trường nào.";
            // nên nó sẽ gán giá trị của biến errorRe lại thành cái dòng lỗi kia
            // để hiển thị cho người dùng thấy
        } else {
            if (strlen($passRe) < 6) {
                // strlen sẽ trả về độ dài của một chuỗi
                // nên nếu độ dài của chuỗi password là nhỏ hơn 6 thì nó sẽ báo lỗi
                // độ dài của mật khẩu bặt buộc phải trên 6 ký tự
                $errorRe = "Mật khẩu phải lớn hơn 6 ký tự";
                // và nó sẽ cập nhật lại lỗi và thông báo cho người dùng
            } else {
                if ($passRe == $repassRe) {
                    // nếu hai cái mật khẩu giống nhau thì ta tiếp tục kiểm tra
                    // giờ hãy lướt xuống dưới và xem checkAccount ra sao nhé hihi
                    if (checkAccount($nameRe, $passRe) > 0) {
                        // nếu số dòng trả về lớn hơn 0 chứng tỏ trong table user
                        // đã tồn tại cái nick này rồi
                        // nên ta sẽ không cho nó đăng ký nick này nữa
                        // cập nhật lại lỗi ở bién $errorRe và hiển thị cho người dùng thấy
                        $errorRe = "Tài khoản đã tồn tại";
                    } else {
                        // nếu tài khoản này chưa có ai đăng ký
                        // thì nó sẽ cho phép ta tạo tài khoản
                        createAccount($nameRe, $passRe);
                        // gọi hàm createAccount truyền vào hai tham số cho nó
                        // chính là tên và mật khẩu của caí nick định tạo
                        // rồi ta hãy xuống xem hàm createAccount thôi nào :v
                    }
                } else {
                    // ở register sẽ có nhập lại mật khẩu
                    // nên nếu mật khẩu và mật khẩu nhập lại không giống nhau thì
                    // nó sẽ thông báo lỗi cho ta
                    $errorRe = "Mật khẩu nhập lại không đúng";
                }
            }
        }
    }
}
function checkAccount($name, $pass)
{
    // hàm này sẽ kiểm tra xem tài khoản bạn định đăng ký
    // tên tài khoản đã có ai dùng hay chưa :)
    global $conn;
    global $user;
    $sql = "SELECT * FROM `user` WHERE name='$name' AND pass='$pass'";
    // sử dụng câu lệnh select để lấy ra tất cả bản ghi trong table user
    // với điều kiện name và pass phải giống với hai cái biến ta truyền vào
    // ở hàm này ta truyền vào hai biến
    // hai biến đó chính là tên tk và mật khẩu bạn định đăng ký
    // ta sẽ lấy hai biến này để tìm trong csdl có ai trùng với hai biến này hay không
    $result = mysqli_query($conn, $sql);
    // thực thi câu truy vấn này ta đc kết quả
    $num = mysqli_num_rows($result);
    // sau đó ta đếm số dòng của kết quả mới thu đc
    $u = mysqli_fetch_assoc($result);
    if ($num > 0) {
        $user = $u['name'];
    }
    return $num;
    // và trả về số dòng đó
}
function createAccount($name, $pass)
{
    global $conn;
    $sql = "INSERT INTO `user`(`name`, `pass`)
    VALUES('$name', '$pass')";
    // hàm này đơn giản chỉ là tạo tài khoản thôi
    // nên ta sẽ sài câu lệnh insert để thêm một bản ghi mới vào
    // trong cái table user để có thể tạo tài khoản hihi
    mysqli_query($conn, $sql);
    // thực hiện câu truy vấn trên
    if (mysqli_query($conn, $sql)) {
        // nếu câu trên truy vấn thành công thì ta sẽ chuyển sang trang login
        // để người dùng có thể đăng nhập tài khoản vừa mới tạo
        header('Location:login.php');
        // header (Location : ,,, ) nó sẽ cho ta thay đổi đường dẫn hiện tại của ta
        // giúp ta chuyển sang trang khác theo ý thích của ta
    }
}
function loginAccount()
{
    global $nameLg;
    global $passLg;
    global $errorLg;
    global $user;
    if (isset($_POST['btnLogin'])) {
        // isset kiểm tra một cái biến đã được khởi tạo hay chưa
        // ta sẽ dùng nó để xem người dùng đã bấm vào btn login
        // để đăng nhập hay không
        // nêú người dùng click button login để đăng nhập
        // thì ta sẽ dùng $_POST để lấy ra các giá trị từ thẻ input bên trang login.php
        $nameLg = $_POST['nameLg'];
        $passLg = $_POST['passwordLg'];
        if (empty($nameLg) || empty($passLg)) {
            // empty để kiểm tra xem giá trị hiện tại có rổng hay là không
            // nếu người dùng không nhập một trong hai input thì ta sẽ thông báo
            // lỗi cho người dùng biết
            $errorLg = "Không được bỏ trống trường nào.";
        } else {
            // giờ nếu người dùng đã điền đầy đủ tên tk và mật khẩu
            // ta sẽ lấy đc hai biến có giá trị là nameLg và passLg
            // tại đây ta sẽ dùng lại hàm checkAccount để kiểm tra tên tài khoản và mật khẩu
            // mấy em có nhớ checkAccount được dùng để kiểm tra xem tài khoản và mật khẩu
            // có tồn tại ở trong table user hay là không
            // nó sẽ trả về số các bản ghi khi ta truy vấn trong hàm này với điều kiện tk và mk
            // như đã quy định từ trước nếu trả về lớn hơn 0 thì có nghĩa là :
            // trong table user của ta có tài khoản và mật khẩu này có nghĩa là
            // tài khoản và mật khẩu của người dùng vừa nhập là đúng
            // nếu trả về là 0 thì có nghĩa là tài khoản hoặc mật khẩu không trùng với
            // bản ghi nào trong table user cả
            if (checkAccount($nameLg, $passLg) > 0) {
                $_SESSION['user'] = $user;
                // $user chính là tên tài khoản
                // tiến hành lưu user vào trong session để lưu phiên làm việc của người dùng
                // khi ta thoát trang vào lại nó vẫn lưu sự đăng nhập
                // mà không bắt ta phải đăng nhập lại
                // sau đó dùng header để tiến hành chuyển trang sang trang chủ ...
                header('Location:index.php');
            } else {
                $errorLg = "Tài khoản hoặc mật khẩu không đúng";
            }
        }
    }
}
