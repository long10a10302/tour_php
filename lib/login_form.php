<div id="id01" class="modalLogin">
    <form
            class="modal-content animate"
            action=""
            method="post"
            id="loginForm"
    >
        <div class="imgcontainer">
      <span
              onclick="document.getElementById('id01').style.display='none'"
              class="close"
              title="Close Modal"
      >&times;</span
      >
            <img src="./img/avatar.png" alt="Avatar" class="avatar"/>
        </div>
        `
        <div class="container">
            <div>
                <label for="uname"><b>Tên Đăng Nhập</b></label>
                <input
                        type="text"
                        placeholder="Nhập tên đăng nhập"
                        name="username"
                        id="username"
                        value="<?php if (isset($_COOKIE['password'])) {
                            echo $_COOKIE['username'];
                        } ?>"
                        required
                />
                <span id='messageU'></span>

            </div>
            <div>
                <label for="psw"><b>Mật khẩu</b></label>
                <input
                        type="password"
                        placeholder="Nhập mật khẩu"
                        id="password"
                        name="password"
                        value="<?php if (isset($_COOKIE['password'])) {
                            echo $_COOKIE['password'];
                        } ?>"
                        required
                />
                <span id='messageP'></span>

            </div>
            <button type="button" class="loginBtn" onclick="loginLoad()">Đăng Nhập</button>
            <div class="row">
                <div class="col-lg-6">
                    <input type="checkbox" id='rememberPass'/>
                    <label for="">Nhớ mật khẩu</label>
                </div>
                <div class="col-lg-6">
                    <div style="display: flex; justify-content: flex-end">
                        <label for="">Quên mật khẩu</label>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    function loginLoad() {
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            r = this.responseText.trim();
            if (r == 'login_success') {
                window.location.href = "/tour_php/pages/admin/admin_tour.php"
            } else if (r === 'password_fail') {
                document.getElementById('messageP').innerHTML = "wrong_pass"
            } else {
                document.getElementById('messageU').innerHTML = "wrong_user"
            }
        }
        var userName = document.getElementById('username').value;
        var passWord = document.getElementById('password').value;
        var checkRemember = document.getElementById('rememberPass');
        if (checkRemember.checked) {
            rememberPass = 'pass';
        } else {
            rememberPass = 'fail';
        }
        xhttp.open("GET", "./controller/login.php?username=" + userName + "&password=" + passWord + "&rememberPass=" + rememberPass, true);
        xhttp.send();
    }
</script>
