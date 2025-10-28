<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun</title>
    <link href="/css/output.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-2xl bg-white rounded-lg shadow-lg border-4 border-blue-500 p-8">
            <!-- Back Button -->
            <button class="flex items-center text-gray-700 hover:text-gray-900 mb-6">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                <span class="font-medium">Back</span>
            </button>

            <!-- Header -->
            <div class="text-center mb-8 pb-6 border-b-2 border-dotted border-blue-300">
                <h1 class="text-3xl font-bold text-gray-900">
                    Daftar <span class="text-blue-600">Akun</span>
                </h1>
            </div>

            <!-- Form -->
            <form class="space-y-6" action="/auth/handleRegister/" method="POST" enctype="multipart/form-data">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <!-- Nama -->
                        <div>
                            <label for="nama" class="block text-sm font-semibold text-gray-700 mb-2">
                                Nama
                            </label>
                            <input
                                type="text"
                                id="username"
                                name="username"
                                class="w-full px-4 py-3 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required
                            />
                        </div>

                        <!-- NIM -->
                        <div>
                            <label for="nim" class="block text-sm font-semibold text-gray-700 mb-2">
                                nomor_induk
                            </label>
                            <input
                                type="text"
                                id="nomor_induk"
                                name="nomor_induk"
                                class="w-full px-4 py-3 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required
                            />
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Email PMJ -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                Email PNJ
                            </label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="w-full px-4 py-3 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required
                            />
                        </div>

                        <!-- Jurusan -->
                        <div>
                            <label for="jurusan" class="block text-sm font-semibold text-gray-700 mb-2">
                                Jurusan
                            </label>
                            <input
                                type="text"
                                id="jurusan"
                                name="jurusan"
                                class="w-full px-4 py-3 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required
                            />
                        </div>
                    </div>
                </div>

                <!-- Upload Bukti KuBaca -->
                <div>
                    <label for="buktiKubaca" class="block text-sm font-semibold text-gray-700 mb-2">
                        Upload Bukti Kubaca
                    </label>
                    <input
                        type="file"
                        id="buktiKubaca"
                        name="buktiKubaca"
                        class="w-full px-4 py-3 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-blue-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:bg-gray-600 file:text-white hover:file:bg-gray-500 file:cursor-pointer"
                        required
                    />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                        Password
                    </label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="w-full px-4 py-3 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required
                    />
                </div>

                <!-- Konfirmasi Password -->
                <div>
                    <label for="confirmPassword" class="block text-sm font-semibold text-gray-700 mb-2">
                        Konfirmasi Password
                    </label>
                    <input
                        type="password"
                        id="confirmPassword"
                        name="confirmPassword"
                        class="w-full px-4 py-3 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required
                    />
                </div>

                <!-- Submit Button -->
                <div class="pt-6 border-t-2 border-dotted border-blue-300">
                    <button
                    type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg transition duration-200 shadow-md hover:shadow-lg"
                    >
                        Daftar
                    </button>
                </div>
            </form>

            <!-- Footer Links -->
            <div class="mt-6 text-center text-sm">
                <p class="text-gray-600">
                    Sudah punya akun?
                    <a href="/auth/formLogin" class="text-blue-600 hover:text-blue-700 font-semibold underline">
                        Login
                    </a>
                </p>
                <p class="text-gray-600 mt-2">
                    <a href="/auth/index" class="text-blue-600 hover:text-blue-700 font-semibold underline">
                        Booking Ruang Rapat
                    </a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>