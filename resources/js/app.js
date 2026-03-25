import './bootstrap';

import { createIcons, icons } from 'lucide';
import AOS from 'aos';
import 'aos/dist/aos.css';

// ── Globals Exposure ──
// We MUST expose these to window for the legacy/inline scripts across the app
window.lucide = { createIcons, icons };
window.createIcons = createIcons;
window.icons = icons;
window.AOS = AOS;

console.log('Éclore App: Modules loaded and globals exposed.');

// ── Module Initialization ──
function initializeModules() {
    console.log('Éclore App: Initializing Lucide and AOS...');
    
    // Initialize Lucide
    if (typeof createIcons === 'function' && typeof icons === 'object') {
        createIcons({ 
            icons,
            attrs: {
                // strokeWidth: 1.5,
                // class: 'lucide-icon'
            }
        });
        console.log('Éclore App: Lucide icons initialized.');
    } else {
        console.error('Éclore App: Lucide createIcons or icons not found!', { createIcons, icons });
    }
    
    // Initialize AOS
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            once: true,
            offset: 50,
            easing: 'ease-out-cubic'
        });
        console.log('Éclore App: AOS initialized.');
    }
}

// ── Execute Initialization ──
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializeModules);
} else {
    initializeModules();
}

// ── Import Legacy Scripts ──
// These depend on the globals set above
import './legacy/config.js';
import './legacy/api.js';
import './legacy/auth.js';
import './legacy/payment-methods.js';
import './legacy/checkout.js';
import './legacy/app.js';

