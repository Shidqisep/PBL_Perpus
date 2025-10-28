<?php
class File extends Controller{

    public function showBukti($filename = ''){
        if (empty($filename)) {
            http_response_code(404);
            die('file tidak ditemukan');
        }

        $basePath = dirname($_SERVER['DOCUMENT_ROOT']) . '/storage/fotobukti/';
        $filePath = realpath($basePath . $filename);

        //Cek otorisasi
        // Misalnya, hanya admin atau user yang login boleh lihat
        // if (!isset($_SESSION['user_id'])) {
        //     http_response_code(403);
        //     die('Anda harus login untuk melihat file ini.');
        // }

        if ($filePath === false || strpos($filePath, $basePath) !== 0) {
        http_response_code(404);
        die('Akses ditolak atau file tidak ditemukan.');

        //Tampilkan file
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $filePath);
        finfo_close($finfo);

        header('Content-Type: ' . $mimeType);
        header('Content-Length: ' . filesize($filePath));
        
        //Baca file dan kirim ke output
        readfile($filePath);
        exit;
    }

    }
}