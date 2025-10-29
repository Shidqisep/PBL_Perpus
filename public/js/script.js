const flashMsg = document.getElementById("flash-message");
            
            // Animasi masuk
            setTimeout(() => {
                flashMsg.classList.remove("opacity-0", "translate-x-10");
                flashMsg.classList.add("opacity-100", "translate-x-0");
            }, 100);
            
            // Auto-hide setelah 3 detik
            setTimeout(() => {
                flashMsg.classList.add("opacity-0", "translate-x-10");
                setTimeout(() => flashMsg.remove(), 500);
            }, 3000);