<?php
namespace App\Services;
use App\Http\Resources\UeRessource;
use App\Models\Ue;
class UeService extends CrudService {
    public function __construct(){
        parent::__construct(new Ue());
    }

    public function index(array|null $data = null){
        return UeRessource::collection(parent::index($data));
    }
    public function show($id){
        return new UeRessource(parent::show($id));
    }
    public function store($data){
        dd($data);
    }
}

