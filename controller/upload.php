<?php
$target_dir = "/tour_php/asset/img/"; // Đường dẫn thư mục đích của bạn
$target_file = $_SERVER['DOCUMENT_ROOT'] . $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

include '../lib/db_connect.php';
// Kiểm tra xem tệp tin có phải là hình ảnh thực sự hay không
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Kiểm tra xem tệp tin đã tồn tại chưa
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Kiểm tra kích thước tệp tin
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Cho phép chỉ định các định dạng tệp tin cho phép
$allowedExtensions = array("jpg", "jpeg", "png", "gif");
if (!in_array($imageFileType, $allowedExtensions)) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Kiểm tra nếu biến $uploadOk được đặt là 0 do lỗi
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// Nếu mọi thứ đều ổn, thử tải lên tệp tin
} else {
    $src = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$nameFile = $type = $imageFileType;
$srcFile = $src;
if (isset($_REQUEST['type'])) {
    $typeFile = $_REQUEST['type'];
};
$sql = "INSERT INTO tbl_media (name_file,file_type,img_type) VALUES ('$srcFile','$nameFile','$typeFile')";

if ($nameFile != '' && $srcFile != '') {

    if (mysqli_query($conn, $sql)) {
        echo 'Upload thanh cong';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
