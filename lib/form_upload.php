<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
    <select name="type" id="">
        <option value="Tour">Tour</option>
        <option value="Blog">Blog</option>
        <option value="tour_hot">Tour_Hot</option>
    </select>
</form>