<?php
namespace App\Services;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserService extends CrudService
{
    public function __construct()
    {
        parent::__construct(new User());
    }
    public function userPasswordHasher(array $data)
    {
        if ($data['password'] != null) {
            $data['password'] = Hash::make($data['password']);
        }
        return $data;
    }
    public function update($data, $id)
    {
        $user = $this->show($id);
        foreach ($data as $key => $value) {
            $user->$key = $value;
        }
        $user->save();
        return $this->show($id);
    }

    public function getAllProfesseur()
    {
        $professeurs = User::whereHas('roles', function ($query) {
            $query->where('label', 'professeur');
        });
        return $professeurs->get();
    }
    public function getAllResponsable()
    {
        $responsable = User::whereHas('roles', function ($query) {
            $query->where('label', 'responsable');
        });
        return $responsable->get();
    }
    public function getAllCoordinateur()
    {
        $professeurs = User::whereHas('roles', function ($query) {
            $query->where('label', 'coordinateur');
        });
        return $professeurs->get();
    }

    public function store($data)
    {

        $data_collect = collect($data);
        $user = parent::store($data_collect->except('roles_id')->toArray());
        // attribuer les roles
        User::find($user->id)->roles()->attach($data_collect->get('roles_id'));
        // recharger les relations
        $user->refresh();
        return $user;

    }
    public function getAllRespoByYearAndByFiliere($yearId, $filiereId)
    {
        return User::where([
            ['year_id', '=', $yearId],
            ['filiere_id', '=', $filiereId],
        ])->get();
    }


}
