<?php

namespace App\Repositories\Posts;

use App\Models\Post;
use Illuminate\Cache\CacheManager;

class PostsCacheRepository implements PostsRepositoryInterface
{
    protected $repo;

    protected $cache;

    const TTL = 1440; # 1 day

    public function __construct(CacheManager $cache, PostsRepository $repo) {
        $this->repo = $repo;
        $this->cache = $cache;
    }

    public function get() {
        return $this->cache->remember('posts', self::TTL, function () {
            return $this->repo->get();
        });
    }

    public function find(int $id) {
        return $this->cache->remember('posts.'.$id, self::TTL, function () {
            return $this->repo->find($id);
        });
    }
}