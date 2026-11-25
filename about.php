<?php
// Phase 1 scaffold only — no transactions or submissions are enabled.
$pageTitle = 'About Us';
require __DIR__ . '/includes/header.php';
?>
<section class="phase-banner">
  <span class="badge">Phase 1 · Project setup</span>
  <h1><?= e($pageTitle) ?></h1>
  <p>This page is reserved for Phase 4 — Company information.</p>
  <p>No quotation, order or job application is accepted by this setup page.</p>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
