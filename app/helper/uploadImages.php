<?php


function uploadImage(array $fileData, $targetDir) : string{
    //Pastikan folder storage/FotoBukti/ ada
    //$uploadPath = __DIR__ . '/../../public/' . $targetDir; // Path relatif dari folder helper
    $uploadPath = dirname($_SERVER['DOCUMENT_ROOT']) . '/' . trim($targetDir, '/') . '/';

    // 1. Cek error bawaan PHP
    if ($fileData['error'] !== UPLOAD_ERR_OK) {
        throw new \Exception("Error saat mengupload file. Kode: " . $fileData['error']);
    }

    //Validasi Ukuran (contoh: maks 2MB)
    // $maxSize = 2 * 1024 * 1024; // 2MB
    // if ($fileData['size'] > $maxSize) {
    //     throw new \Exception("Ukuran file terlalu besar. Maksimal 2MB.");
    // }

    //Validasi Tipe File cek sampai ke mime
    $allowedTypes = [
        'jpg' => 'image/jpeg',
        'png' => 'image/png',
        'jpeg' => 'image/jpeg',
    ];
    $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($fileInfo, $fileData['tmp_name']);
    finfo_close($fileInfo);

    $extension = array_search($mimeType, $allowedTypes, true);
    if ($extension === false) {
        throw new \Exception("Tipe file tidak diizinkan. Harap upload JPG atau PNG.");
    }

    //Buat nama file unik
    $fileName = 'fotobukti-' . uniqid() . '.' . $extension;
    $targetFile = $uploadPath . $fileName;

    //Pindahkan file ke $targetFile
    if (move_uploaded_file($fileData['tmp_name'], $targetFile)) {
        return $fileName; // Kembalikan nama file baru jika sukses
    } else {
        throw new \Exception("Gagal memindahkan file yang diupload.");
    }
}


//yang ini kurang aman bisa di inject script
function uploadCover(){
    $namaFile = $_FILES['cover']['name'];
    $error = $_FILES['cover']['error'];
    $tmpName = $_FILES['cover']['tmp_name'];

    // Cek apakah tidak ada file yang diupload
    if ($error === 4) {
        return false; // atau bisa return false jika ingin wajib upload
    }

    // Cek ekstensi file
    $ekstensiValid = ['jpg', 'jpeg', 'png', 'webp'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiValid)){
        echo "<script>alert('File yang anda upload bukan gambar!!!')
        document.location.href='index.php';
        </script>;";
        return false;
    }
    // Generate nama file baru agar unik
    $namaFileBaru = uniqid() . '.' . $ekstensiGambar;

    // Pindahkan file ke folder tujuan
    if (move_uploaded_file($tmpName, '../public/asset/' . $namaFileBaru)) {
        return $namaFileBaru;
    } else {
        return false;
    }   
    }