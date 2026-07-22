<?php
include_once "config/connect.php";
include_once "util/function.php";
http_response_code(404);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>404 - Page Not Found | NikhilWorks</title>
<meta name="robots" content="noindex, nofollow">
<link rel="canonical" href="https://nikhilworks.com/">
</head>
<body>
<?php include_once "includes/header.php" ?>
<section style="min-height:60vh;display:flex;align-items:center;justify-content:center;background:#f8f9fa;">
  <div class="container text-center py-5">
    <h1 style="font-size:6rem;font-weight:800;color:#0d6efd;margin:0;">404</h1>
    <h2 class="fw-bold mt-2">Oops! Page Not Found</h2>
    <p class="text-muted mb-4">The page you are looking for has been moved, deleted, or never existed.</p>
    <a href="/" class="btn btn-primary btn-lg me-3">Go Home</a>
    <a href="/contact/" class="btn btn-outline-primary btn-lg">Contact Us</a>
    <div class="mt-5">
      <p class="text-muted">Try one of these popular pages:</p>
      <div class="d-flex flex-wrap gap-2 justify-content-center">
        <a href="/services/" class="btn btn-sm btn-outline-secondary">Services</a>
        <a href="/portfolio/" class="btn btn-sm btn-outline-secondary">Portfolio</a>
        <a href="/pricing/" class="btn btn-sm btn-outline-secondary">Pricing</a>
        <a href="/blogs/" class="btn btn-sm btn-outline-secondary">Blog</a>
        <a href="/about/" class="btn btn-sm btn-outline-secondary">About</a>
      </div>
    </div>
  </div>
</section>
<?php include_once "includes/footer.php" ?>
</body>
</html>