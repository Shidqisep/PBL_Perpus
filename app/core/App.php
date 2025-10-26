<?php
class App {
    // Properti untuk menyimpan Controller, Method, dan Parameter default
    protected $controller = 'Home'; // Controller default
    protected $method = 'index';     // Method default
    protected $params = [];          // Parameter default

    public function __construct() {
        $url = $this->parseURL();

        // --- 1. Mengurus CONTROLLER ---
        // Cek apakah ada controller dengan nama yang sesuai
        // $url[0] adalah bagian pertama dari URL (e.g., 'users')
        if (isset($url[0])) {
            $controllerName = ucfirst($url[0]); // 'users' -> 'Users'
            if (file_exists('../app/controllers/' . $controllerName . '.php')) {
                $this->controller = $controllerName;
                unset($url[0]); // Hapus dari array agar sisa parameternya saja
            }
        }

        // Panggil file controller-nya
        require_once '../app/controllers/' . $this->controller . '.php';
        // Buat objek dari kelas controller tersebut
        $this->controller = new $this->controller;

        // --- 2. Mengurus METHOD ---
        // $url[1] adalah bagian kedua dari URL (e.g., 'profile')
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]); // Hapus dari array
            }
        }

        // --- 3. Mengurus PARAMETER ---
        // $url sisanya adalah parameter
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // --- 4. JALANKAN! ---
        // Panggil method di controller dengan parameter yang ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    /**
     * Metode untuk mem-parsing URL dari .htaccess
     */
    public function parseURL() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/'); // Hilangkan / di akhir
            $url = filter_var($url, FILTER_SANITIZE_URL); // Bersihkan URL
            $url = explode('/', $url); // Pecah URL berdasarkan /
            return $url;
        }
        return []; // Jika tidak ada URL, kembalikan array kosong
    }
}