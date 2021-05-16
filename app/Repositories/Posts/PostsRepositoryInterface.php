<?php
namespace App\Repositories\Posts;

interface PostsRepositoryInterface 
{
    public function get();

    public function find(int $id);

}
