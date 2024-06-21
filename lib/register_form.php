<div id="id02" class="modalSignup">
    <span onclick="document.getElementById('id02').style.display='none'" class="close"
          title="Close Modal">&times;</span>
    <form class="modal-content animate" action="" id="registration">
        <div class="container">
            <h1>Form Đăng ký</h1>
            <p>Điền vào form để đăng ký tài khoản .</p>
            <hr>
            <div>
                <label for="psw"><b>Họ tên khách hàng/b></label>
                <input type="password" placeholder="Nhập họ tên" name="name" required>
            </div>
            <div>
                <label for="uname"><b>Tên Đăng Nhập</b></label>
                <input type="text" placeholder="Nhập tên đăng nhập" name="uname" required>
            </div>

            <div>
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Nhập  Email" name="email" required>
            </div>
            <div>
                <label for="email"><b>Số điện thoại</b></label>
                <input type="text" placeholder="Nhập  Số điện thoại" name="phone" required>
            </div>
            <div>
                <label for="psw"><b>Mật khẩu</b></label>
                <input type="password" placeholder="Nhập mật khẩu" name="psw" required>
            </div>

            <div>
                <label for="psw-repeat"><b>Nhập lại mật khẩu</b></label>
                <input type="password" placeholder="Nhập lại mật khẩu" name="psw_repeat" required>
            </div>

            <label>
                <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
            </label>
            <div class="clearfix">
                <button type="submit" class="loginBtn">Đăng ký</button>
            </div>
        </div>
    </form>
</div>