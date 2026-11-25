/* RUTSIRO MINING LTD — main.js (Phase 1 foundation) */
document.addEventListener('DOMContentLoaded', () => {
  // Auto year in footer (Phase 2 footer will use this)
  document.querySelectorAll('[data-year]').forEach(el => el.textContent = new Date().getFullYear());
  // TODO Phase 2: sticky nav behaviour, mobile menu, smooth scroll, counters
  console.log('[Rutsiro Mining] Phase 1 foundation loaded.');
});
