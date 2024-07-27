<?php

namespace App\Repository;

use App\Interfaces\TagRepositoryInterface;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;

class TagRepository implements TagRepositoryInterface
{
    public function all(): Collection
    {
        return Tag::all();
    }

    public function find(Tag $tag): ?Tag
    {

        return $tag;
    }

    public function create(array $data): Tag
    {
        return Tag::create($data);
    }

    public function update(Tag $tag, array $data): Tag
{
    $tag->update($data);
    return $tag;
}

    public function delete(Tag $tag): bool
    {
        return $tag->delete();
    }
}
