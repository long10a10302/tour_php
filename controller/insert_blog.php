<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kết nối đến cơ sở dữ liệu
    include '../lib/db_connect.php';

    // Lấy dữ liệu từ biểu mẫu
    $title = $_REQUEST['title'];
    $content = $_REQUEST['content'];
    $imgID = $_REQUEST['img_id'];
    $status = $_REQUEST['status'];

    // Thực hiện truy vấn chèn dữ liệu
    if (empty($title) && empty($content) && empty($imgID)) {
        echo 'Dữ liệu trống vui lòng nhập dữ liệu';
    } else {
        $sql = "INSERT INTO tbl_blog (title, content, img_id, status) VALUES ('$title', '$content', '$imgID', '$status')";

        if (mysqli_query($conn, $sql)) {
            echo "Blog created successfully";
        } else {
            echo "Error: " . mysqli_error($conn);
        }

    }
    // Đóng kết nối
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Create Tour</title>
    <link rel="stylesheet" href="../asset/css/form.css">
    <script
            src="https://cdn.tiny.cloud/1/0i34uy9osgquug3ox8mwbug1demt1my17jfya0qvtj0ytcqq/tinymce/7/tinymce.min.js"
            referrerpolicy="origin"
    ></script>
    <script>
        tinymce.init({
            selector: "textarea",
            plugins:
                "anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown",
            toolbar:
                "undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat",
            tinycomments_mode: "embedded",
            tinycomments_author: "Author name",
            mergetags_list: [
                { value: "First.Name", title: "First Name" },
                { value: "Email", title: "Email" },
            ],
            ai_request: (request, respondWith) =>
                respondWith.string(() =>
                    Promise.reject("See docs to implement AI Assistant")
                ),
        });
    </script>
</head>
<body>
<h1>Create Tour</h1>
<?php include '../lib/form_upload.php'; ?>

<form action="" method="POST">
    Title: <input type="text" name="title" required><br>
    Content: <textarea name="content" id="" cols="50" rows="50"></textarea><br>
    Imgid: <input type="text" name="img_id" required><br>
    Status <input type="text" name="status" id="">
    <input type="submit" value="Create">
</form>

</body>
</html>