<?php
namespace App\Services;
use App\Models\Course;
class CourseService extends CrudService
{
    public function __construct()
    {
        parent::__construct(new Course());
    }

    public function create(int $year, EcService $ecService = new EcService(), UserService $userService = new UserService(), ClasseService $classeService = new ClasseService(), FiliereService $filiereService = new FiliereService()){
        // ecs by year - teachers - classes -
        $data = [
            'ecs' => $ecService->getByYear($year),
            'professeurs' => $userService->getAllProfesseur(),
            'classes' => $classeService->index(),
            'filieres' => $filiereService->index()
        ];
        return $data;
    }
    public function store($data){
        $collectionData = collect($data);
        // $collectionData->except("filieres_id")->dd();
        $course = parent::store($collectionData->except("filieres_id")->toArray());
        $course->filieres()->attach($collectionData->get('filieres_id'));
        $course->refresh();
        return $course->with('filieres')->get();
    }
}
