<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Định dạng toàn bộ form */
form {
  background-color: #f2f2f2;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  max-width: 400px;
  margin: 0 auto;
}

/* Định dạng các nhãn */
label {
  display: block;
  font-weight: bold;
  margin-bottom: 5px;
}

/* Định dạng các trường nhập liệu */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

/* Định dạng nút submit */
button[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  width: 100%;
}

button[type=submit]:hover {
  background-color: #45a049;
}
    </style>
</head>
<body>
<form  method = "POST">
  <label for="username">Tên đăng nhập:</label>
  <input type="text" id="username" name="username" required>

  <label for="password">Mật khẩu:</label>
  <input type="password" id="password" name="password" required>

  <button type="submit" onclick="loginLoad()">Đăng nhập</button>
</form>
<script>
     function loginLoad() {
       
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            var response = this.responseText.trim();
            if (response.startsWith('login_success')) {
                window.location.href = "./pages/admin/admin_dashboard.php";           } else if (response === 'password_fail') {
                document.getElementById('messageP').innerHTML = "Sai mật khẩu";
            } else {
                document.getElementById('messageU').innerHTML = "Tên đăng nhập không tồn tại";
            }
        }

        var userName = document.getElementById('username').value;
        var passWord = document.getElementById('password').value;

       

        xhttp.open("GET", "./controller/login_admin.php?username=" + userName + "&password=" + passWord , true);
        xhttp.send();
    }
</script>
</body>
</html>