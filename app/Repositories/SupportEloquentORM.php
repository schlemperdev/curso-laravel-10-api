<?php

use App\DTOs\CreateSupportDTO;
use App\DTOs\UpdateSupportDTO;
use App\Models\Support;
use App\Repositories\SupportRepositoryInterface;
use stdClass;

class SupportEloquentORM implements SupportRepositoryInterface
{
    public function __construct(
        protected Support $model
    ){}

    public function getAll(string $filter = null): array
    {
        return $this->model
                    ->where(function ($query) use ($filter) {
                        if ($filter) {
                            return $query
                            ->where('subject', $filter)
                            ->orWhere('message', 'like', "%{$filter}%");
                        }
                    })
                    ->all()
                    ->toArray();
    }

    public function findOne(string $id): stdClass|null
    {
        $support = $this->model->find($id);

        if (!$support) {
            return null;
        }

        return (object) $support->toArray();
    }

/*  FIX THESE LINES--------------------------------------------

    public function new(CreateSupportDTO $dto): stdClass
    {
        $support = new Support();
        $support->name = $dto->name;
        $support->email = $dto->email;
        $support->phone = $dto->phone;
        $support->save();

        return $support;
    }

    public function update(UpdateSupportDTO $dto): stdClass|null
    {
        $support = Support::find($dto->id);
        $support->name = $dto->name;
        $support->email = $dto->email;
        $support->phone = $dto->phone;
        $support->save();

        return $support;
    }

    FIX THESE LINES --------------------------------------------*/

    public function delete(string $id): void
    {
        $this->model->findorFail($id)->delete();
    }
}
