import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// ===== Mobile Sidebar Toggle =====
document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('toggleSidebar');
    const sidebar = document.querySelector('aside');

    if (btn && sidebar) {
        btn.addEventListener('click', () => {
            sidebar.classList.toggle('hidden');
        });
    }
});
