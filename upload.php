<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تحميل ملف</title>
</head>
<body>
    <h1>تحميل ملف إلى مجلد خاص بالموقع</h1>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file_upload"])) {
        $upload_directory = "uploads/"; // المجلد الذي ترغب في حفظ الملف فيه
        
        $file_name = $_FILES["file_upload"]["name"];
        $file_size = $_FILES["file_upload"]["size"];
        $file_tmp = $_FILES["file_upload"]["tmp_name"];
        $file_error = $_FILES["file_upload"]["error"];
        
        if ($file_error === 0) {
            if (move_uploaded_file($file_tmp, $upload_directory . $file_name)) {
                echo "تم تحميل الملف بنجاح.";
            } else {
                echo "حدثت مشكلة أثناء نقل الملف.";
            }
        } else {
            echo "حدثت مشكلة أثناء تحميل الملف: كود الخطأ " . $file_error;
        }
    }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="file_upload" accept=".pdf, .doc, .docx, .txt" required>
        <button type="submit">تحميل الملف</button>
    </form>
</body>
</html>
