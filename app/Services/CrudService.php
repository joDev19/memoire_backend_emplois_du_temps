<?php
namespace App\Services;
class CrudService implements ServiceContract
{

    public function __construct(private $model)
    {
        //
    }
    public function index(array $data = null)
    {
        if ($data == null || count($data) == 0) {
            return $this->model->all();
        }
        return $this->filter(collect($data));
    }
    public function store($data)
    {
        return $this->model->create($data);
    }
    public function update($data, $id)
    {
        return $this->show($id)->update($data);
    }
    public function delete($id)
    {
        return $this->show($id)->delete();
    }
    public function show($id)
    {

        return $this->model->findOrFail($id);
    }
    private function filterFormatter($data){
        return $data->map(function ($item, $key) {
            return [$key, '=', $item];
        });
    }
    public function filter($data)
    {
        $formatedData = $this->filterFormatter(collect($data));
        return $this->model->where(
            $formatedData->values()->all()
        );
    }
}
