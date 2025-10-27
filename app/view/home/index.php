
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docker + PHP + Tailwind</title>
    <link href="/css/output.css" rel="stylesheet">
</head>
<body class="bg-gray-300 font-sans">

    <div class="container mx-auto mt-10 p-6 max-w-2xl bg-white rounded-lg shadow-lg">
        
        <h1 class="text-3xl font-bold text-blue-600 mb-4">
            Halo, Duta PNJ!
        </h1>
        
        <p class="text-gray-700 mb-6">
            Jika setup berhasil, halaman ini akan memiliki styling dari Tailwind CSS.
        </p>

        <div class="p-4 bg-gray-50 rounded-md border border-gray-200 mb-6">
            <h2 class="text-xl font-semibold mb-2">Tes Koneksi PHP</h2>
            <p><?php echo "PHP Info: " . phpversion(); ?></p>
        </div>

        <div class="p-4 bg-gray-50 rounded-md border border-gray-200">
            <h2 class="text-xl font-semibold mb-2">Tes Koneksi Database</h2>
            <p class="p-3 rounded-md <?php echo $db_class; ?>">
                <?= "Nanti Dulu"?>
            </p>
        </div>

        <a href="/auth/formLogin">Login</a>

    </div>

    <?php var_dump(__DIR__ . '/../../vendor/autoload.php') ?>

</body>
</html>