// Fix untuk offcanvas yang konflik dengan template
document.addEventListener("DOMContentLoaded", function () {
    // Override existing offcanvas functionality
    const originalOffcanvas = document.querySelector(".right_menu_togle");
    if (originalOffcanvas) {
        originalOffcanvas.style.display = "none";
    }

    // Initialize new offcanvas
    const offcanvas = document.getElementById("jp-offcanvas");
    const toggleBtn = document.getElementById("nav-expander");
    const closeBtn = document.getElementById("jp-offcanvas-close");
    const overlay = document.getElementById("jp-offcanvas-overlay");

    if (!offcanvas || !toggleBtn || !closeBtn) {
        console.error("Required offcanvas elements not found");
        return;
    }

    // Functions
    function openOffcanvas() {
        offcanvas.classList.add("jp-active");
        if (overlay) overlay.classList.add("jp-active");
        document.body.style.overflow = "hidden";
    }

    function closeOffcanvas() {
        offcanvas.classList.remove("jp-active");
        if (overlay) overlay.classList.remove("jp-active");
        document.body.style.overflow = "";
    }

    // Remove existing event listeners
    const newToggleBtn = toggleBtn.cloneNode(true);
    toggleBtn.parentNode.replaceChild(newToggleBtn, toggleBtn);

    // Add new event listeners
    newToggleBtn.addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        openOffcanvas();
    });

    closeBtn.addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        closeOffcanvas();
    });

    if (overlay) {
        overlay.addEventListener("click", function (e) {
            e.preventDefault();
            closeOffcanvas();
        });
    }

    // Navigation links
    const navLinks = document.querySelectorAll(".jp-offcanvas-nav a");
    navLinks.forEach((link) => {
        link.addEventListener("click", function (e) {
            const targetId = this.getAttribute("href");

            // Tutup offcanvas dulu
            closeOffcanvas();

            // Jika href diawali dengan '#' → scroll ke elemen di halaman ini
            if (targetId.startsWith("#")) {
                e.preventDefault();
                const targetElement = document.querySelector(targetId);

                if (targetElement) {
                    setTimeout(() => {
                        targetElement.scrollIntoView({ behavior: "smooth" });
                    }, 300);
                }
            }
            // Jika href mengandung URL penuh atau route lain → biarkan browser navigasi normal
            else {
                // jangan e.preventDefault()
                // browser otomatis redirect ke halaman tujuan
                setTimeout(() => {
                    window.location.href = targetId;
                }, 500);
            }
        });
    });
});
