<?php

namespace Modules\Health\Repositories\Eloquent;

use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\Health\Repositories\AuthorRepository;
use Modules\Health\Events\Author;

class EloquentAuthorRepository extends EloquentBaseRepository implements AuthorRepository
{

    public function create($data)
    {
        $author = $this->model->create($data);

        event(new Author\WasCreated($author, $data));

        return $author;
    }

    public function update($author, $data)
    {
        $author->update($data);

        event(new Author\WasUpdated($author, $data));

        return $author;
    }

    public function destroy($author)
    {
        event(new Author\WasDeleted($author));

        return $author->delete();
    }
}
