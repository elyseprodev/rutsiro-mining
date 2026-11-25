<?php
/** RUTSIRO MINING LTD — Site header (Phase 1 placeholder; full design in Phase 2/3) */
require_once __DIR__ . '/functions.php';
$pageTitle = $pageTitle ?? 'Rutsiro Mining Ltd';
$base = '/rutsiro-mining';
?><!DOCTYPE html>
<html lang="<?= e(currentLang()) ?>">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= e($pageTitle) ?> | Rutsiro Mining Ltd</title>
<meta name="description" content="Rutsiro Mining Ltd — Reliable mineral supply from Rwanda to the world. Coltan and Tin trading.">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:wght@600;700;800&display=swap" rel="stylesheet">
<link href="<?= $base ?>/assets/css/style.css" rel="stylesheet">
<link href="<?= $base ?>/assets/css/responsive.css" rel="stylesheet">
</head>
<body>
<header class="site-header">
  <div class="container d-flex justify-content-between align-items-center py-2">
    <strong>RUTSIRO MINING LTD</strong>
    <nav>
      <a href="<?= $base ?>/index.php">Home</a> |
      <a href="<?= $base ?>/about.php">About Us</a> |
      <a href="<?= $base ?>/products.php">Our Minerals</a> |
      <a href="<?= $base ?>/how-it-works.php">How It Works</a> |
      <a href="<?= $base ?>/careers.php">Careers</a> |
      <a href="<?= $base ?>/contact.php">Contact</a>
      <a class="btn btn-gold ms-2" href="<?= $base ?>/request-quote.php">Request a Quote</a>
    </nav>
  </div>
</header>
<main class="container py-4">
