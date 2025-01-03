<?php
// like.php

// Lakukan semua langkah validasi dan keamanan yang diperlukan di sini

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $postId = $_POST['id'];

    // Lakukan operasi database untuk menambah "like" ke post dengan ID tertentu
    // Misalnya:
    // $post = getPostById($postId);
    // $post['like_count'] += 1;
    // updatePost($post);

    // Setelah update, kirim kembali respon JSON dengan jumlah like yang diperbarui
    $response = [
        'success' => true,
        'likeCount' => $post['like_count'] // Update dengan jumlah like yang sesuai setelah operasi database
    ];
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Jika bukan metode POST atau post_id tidak ada, kirim respon dengan kesalahan
    $response = [
        'success' => false,
        'error' => 'Invalid request'
    ];
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>