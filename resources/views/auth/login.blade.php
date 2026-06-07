<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Cuti - Login</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.25);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-500 via-indigo-600 to-purple-700 min-h-screen flex items-center justify-center p-4 sm:p-6 md:p-8">

    <!-- Container Utama -->
    <div class="w-full max-w-md">

        <!-- Logo / Header Atas -->
        <div class="text-center mb-6">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-white text-indigo-600 shadow-lg mb-3">
                <i class="fa-solid fa-calendar-check text-2xl"></i>
            </div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">E-CUTI SYSTEM</h1>
            <p class="text-indigo-100 text-sm mt-1">Silakan masuk untuk mengajukan atau menyetujui cuti</p>
        </div>

        <!-- Kartu Login (Glassmorphism) -->
        <div class="glass-card rounded-2xl shadow-2xl p-6 sm:p-8">
            <h2 class="text-xl font-bold text-gray-800 mb-6">Selamat Datang Kembali</h2>

            <!-- Box Pesan Error / Sukses -->
            <div id="alertBox" class="hidden mb-4 p-4 rounded-lg text-sm flex items-start space-x-2" role="alert">
                <i id="alertIcon" class="fa-solid mt-0.5"></i>
                <span id="alertMessage"></span>
            </div>

            <!-- Form Login -->
            <form id="loginForm" class="space-y-5">
                <!-- Input Email -->
                <div>
                    <label for="email" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Alamat Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <i class="fa-regular fa-envelope"></i>
                        </span>
                        <input type="email" id="email" required
                            class="w-full pl-10 pr-4 py-3 bg-white/70 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:bg-white outline-none transition duration-200 text-sm placeholder-gray-400 text-gray-800"
                            placeholder="nama@perusahaan.com">
                    </div>
                </div>

                <!-- Input Password -->
                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label for="password" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider">Kata Sandi</label>
                        <a href="#" class="text-xs text-indigo-600 hover:text-indigo-800 hover:underline font-medium">Lupa Password?</a>
                    </div>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                        <input type="password" id="password" required
                            class="w-full pl-10 pr-10 py-3 bg-white/70 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:bg-white outline-none transition duration-200 text-sm placeholder-gray-400 text-gray-800"
                            placeholder="••••••••">
                        <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600">
                            <i class="fa-regular fa-eye-slash" id="eyeIcon"></i>
                        </button>
                    </div>
                </div>

                <!-- Remember Me Checkbox -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center cursor-pointer select-none">
                        <input type="checkbox" id="remember" class="w-4 h-4 rounded text-indigo-600 border-gray-300 focus:ring-indigo-500">
                        <span class="ml-2 text-xs text-gray-600">Ingat saya di perangkat ini</span>
                    </label>
                </div>

                <!-- Tombol Submit -->
                <div>
                    <button type="submit" id="submitBtn"
                        class="w-full py-3 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-150 flex items-center justify-center space-x-2 text-sm">
                        <span>Masuk ke Sistem</span>
                        <i class="fa-solid fa-arrow-right" id="btnIcon"></i>
                    </button>
                </div>
            </form>

            <!-- Footer Card -->
            <div class="mt-6 pt-6 border-t border-gray-200/60 text-center">
                <p class="text-xs text-gray-500">Butuh bantuan akses? <a href="#" class="text-indigo-600 font-semibold hover:underline">Hubungi HR / IT Support</a></p>
            </div>
        </div>

        <!-- Copyright Info -->
        <p class="text-center text-xs text-indigo-200/80 mt-6">&copy; 2026 E-Cuti Company. Seluruh Hak Cipta Dilindungi.</p>
    </div>

    <!-- Script Integrasi Client-Side & API -->
    <script>
        const loginForm = document.getElementById('loginForm');
        const submitBtn = document.getElementById('submitBtn');
        const btnIcon = document.getElementById('btnIcon');
        const alertBox = document.getElementById('alertBox');
        const alertIcon = document.getElementById('alertIcon');
        const alertMessage = document.getElementById('alertMessage');
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');
        const eyeIcon = document.getElementById('eyeIcon');

        // Fungsi Tampilkan/Sembunyikan Password
        togglePassword.addEventListener('click', () => {
            const isPassword = passwordInput.getAttribute('type') === 'password';
            passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
            eyeIcon.className = isPassword ? 'fa-regular fa-eye' : 'fa-regular fa-eye-slash';
        });

        // Fungsi Menampilkan Notifikasi/Alert
        function showAlert(type, message) {
            alertBox.classList.remove('hidden', 'bg-red-50', 'text-red-800', 'bg-green-50', 'text-green-800');
            alertIcon.className = 'fa-solid mt-0.5 ';

            if (type === 'error') {
                alertBox.classList.add('bg-red-50', 'text-red-800');
                alertIcon.classList.add('fa-circle-xmark', 'text-red-500');
            } else {
                alertBox.classList.add('bg-green-50', 'text-green-800');
                alertIcon.classList.add('fa-circle-check', 'text-green-500');
            }

            alertMessage.innerText = message;
        }

        // Handle Event Submit Form
        loginForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const email = document.getElementById('email').value;
            const password = passwordInput.value;

            // Set Loading state
            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-85', 'cursor-not-allowed');
            submitBtn.innerHTML = `
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span>Memproses Masuk...</span>
            `;

            try {
                // Ganti URL ini dengan endpoint API Laravel sesungguhnya Anda nanti, contoh: '/api/login'
                const response = await fetch('/api/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ email, password })
                });

                const data = await response.json();

                if (!response.ok) {
                    throw new Error(data.message || 'Email atau Kata Sandi salah!');
                }

                // Berhasil login
                showAlert('success', 'Login Berhasil! Mengalihkan halaman...');

                // Simpan token ke LocalStorage agar Controller dapat menggunakannya lewat $request
                localStorage.setItem('auth_token', data.token);

                // Arahkan ke halaman dashboard aplikasi Anda
                setTimeout(() => {
                    window.location.href = '/dashboard';
                }, 1500);

            } catch (error) {
                // Gagal login
                showAlert('error', error.message);

                // Kembalikan tombol ke keadaan semula
                submitBtn.disabled = false;
                submitBtn.classList.remove('opacity-85', 'cursor-not-allowed');
                submitBtn.innerHTML = `
                    <span>Masuk ke Sistem</span>
                    <i class="fa-solid fa-arrow-right" id="btnIcon"></i>
                `;
            }
        });
    </script>
</body>
</html>
