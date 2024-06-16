<div id="id02" class="modalSignup">
    <span onclick="document.getElementById('id02').style.display='none'" class="close"
          title="Close Modal">&times;</span>
    <form class="modal-content animate" action="/action_page.php" id="registration">
        <div class="container">
            <h1>Form Đăng ký</h1>
            <p>Điền vào form để đăng ký tài khoản .</p>
            <hr>
            <div>
                <label for="uname"><b>Tên Đăng Nhập</b></label>
                <input type="text" placeholder="Nhập tên đăng nhập" name="uname" required>
            </div>

            <div>
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>
            </div>

            <div>
                <label for="psw"><b>Mật khẩu</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
            </div>

            <div>
                <label for="psw-repeat"><b>Nhập lại mật khẩu</b></label>
                <input type="password" placeholder="Repeat Password" name="psw_repeat" required>
            </div>

            <label>
                <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
            </label>

            <p> Tạo tài khoản <a href="#" style="color:dodgerblue">Chính sách bảo mật</a>.</p>

            <div class="clearfix">
                <button type="submit" class="loginBtn">Đăng ký</button>
            </div>
        </div>
    </form>
</div>