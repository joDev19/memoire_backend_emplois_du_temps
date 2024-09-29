<?php
namespace App\Services;
use Illuminate\Support\Collection;
interface ServiceContract{
    public function index();
    public function store($data);
    public function update($data, $id);
    public function delete($id);
    public function show($id);
    public function filter(Collection $data);
}
