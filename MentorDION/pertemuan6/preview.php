<?php 
if(isset($_POST["submit"])) {
    $target_dir = "uploads/";  
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]); 
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowed_extensions = array("jpg", "png", "jpeg", "gif");

    if(in_array($imageFileType, $allowed_extensions)) {
        // Coba untuk mengunggah gambar
        if(move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            echo "tampil<br>";
            echo "<img src='$target_file' alt='Gambar yang diunggah'>";
        } else {
            echo "gagal";
        }
    } else {
        echo "gagal pilih format yang benr";
    }
}
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <!-- <img id="imagePreview" src="" name="gambar" id="gambar" alt="Preview Gambar" style="display: none;"> -->
    
    </body>
    <!-- <script>
            const fileInput = document.getElementById('gambar');
    const imagePreview = document.getElementById('imagePreview');

    fileInput.addEventListener('change', function () {
        const file = fileInput.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            };

            reader.readAsDataURL(file);
        } else { 
            imagePreview.style.display = 'none';
        }
    });

        </script> -->
   
    </html>