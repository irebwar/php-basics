<?php
$malicios_comment = "<script>alert('XSS Attack!');</script>";

// echo $malicios_comment;

echo htmlspecialchars($malicios_comment);