<?php 

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table = 'comments';
    protected $allowedFields = ['post_id', 'author', 'content', 'created_at'];

    // Method untuk menyimpan komentar ke database
    public function saveComment($data)
    {
        return $this->insert($data);
    }

    // Method untuk mengambil komentar berdasarkan id postingan
    public function getCommentsByPostId($postId)
    {
        return $this->where('post_id', $postId)->findAll();
    }
}
