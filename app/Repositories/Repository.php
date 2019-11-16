<?php


namespace App\Repositories;


use App\User;
use Illuminate\Database\Eloquent\Model;

abstract class Repository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create(array $data) : ?Model
    {
        return $this->model->create($data);
    }

    public function update(array $data, $element) : ?Model
    {
        return $this->getModelInstance($element)->update($data);
    }

    public function delete($element)
    {
        return $this->getModelInstance($element)->delete();
    }

    public function find($element) : ?Model
    {
        return $this->getModelInstance($element);
    }

    public function show($element) : ?Model
    {
        return $this->getModelInstance($element);
    }

    protected function getModelInstance($element)
    {
        if (!($element instanceof Model))
            $element = $this->model->findOrFail($element);

        return $element;
    }
}
