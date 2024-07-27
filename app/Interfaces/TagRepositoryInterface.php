<?php

namespace App\Interfaces;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;

interface TagRepositoryInterface
{
    public function all(): Collection;
    public function find(Tag $tag): ?Tag;
    public function create(array $data): Tag;
    public function update(Tag $tag,array $data): Tag;
    public function delete(Tag $tag): bool;

}


