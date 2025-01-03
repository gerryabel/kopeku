<?php

namespace App\Controllers;

use App\Models\PostModel;
use CodeIgniter\Controller;
use App\Models\CommentModel;

class ForumController extends Controller
{
    public function index()
    {
        $postModel = new PostModel();
        $data['posts'] = $postModel->findAll();

        return view('forum', $data);
    }
    
    // Method submit dalam ForumController
    public function submit()
    {
        $postModel = new PostModel();

        $judul = $this->request->getPost('judul');
        $nama_pengirim = $this->request->getPost('nama_pengirim');
        $deskripsi = $this->request->getPost('deskripsi');
        $gambar = $this->request->getFile('gambar');

        // Periksa apakah file gambar valid sebelum memprosesnya
        if ($gambar->isValid() && !$gambar->hasMoved()) {
            $gambarName = $gambar->getRandomName();
            $gambar->move(ROOTPATH . 'public/uploads', $gambarName); // Pindahkan ke folder public/gambar
        } else {
            $gambarName = null;
        }

        $data = [
            'judul' => $judul,
            'nama_pengirim' => $nama_pengirim,
            'deskripsi' => $deskripsi,
            'gambar' => $gambarName, // Simpan nama gambar ke dalam database
            'created_at' => date('Y-m-d H:i:s') // Tambahkan waktu pembuatan
        ];

        $postModel->save($data);

        // Redirect kembali ke halaman forum setelah submit berhasil
        return redirect()->to('/forum');
    }
    public function detail($postId)
    {
        $postModel = new PostModel();
        $post = $postModel->find($postId);

        // Fetch comments for the specific post
        // Assuming you have a CommentModel
        // Adjust this according to your actual model and database structure
        $commentModel = new CommentModel();
        $comments = $commentModel->where('post_id', $postId)->findAll();

        $data = [
            'post' => $post,
            'comments' => $comments
        ];

        return view('detailforum', $data);
    }
    public function comment()
    {
        $commentModel = new CommentModel();

        $postId = $this->request->getPost('post_id');
        $author = $this->request->getPost('author');
        $content = $this->request->getPost('content');

        // Menyimpan komentar ke database
        $data = [
            'post_id' => $postId,
            'author' => $author,
            'content' => $content,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $commentModel->saveComment($data);

        // Redirect kembali ke halaman detail forum setelah komentar berhasil disimpan
        return redirect()->to("/detailforum/$postId");
    }
}
