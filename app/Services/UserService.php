<?php
namespace App\Services;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
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
    public function login($email, $password, $matricule = null)
    {
        // dd($email, $password, $matricule);
        $user = null;
        if ($matricule == null) {
            // c'est un prof
            $user = $this->filter(['email' => $email])->first();
            if ($user == null) {
                abort(404, 'This email is not found');
            }
            // vérifier son mot de passe
            if(!Hash::check($password, $user->password)){
                abort(401, "Bad credentials");
            }
            // good ! We can login teacher
            Auth::login($user);
            return $user;
        }
        // c'est un responsable
        $user = $this->filter(['matricule' => $matricule])->first();
        if ($user == null) {
            abort(404, 'This matricule is not found');
        }
        // vérifier son mot de passe
        if(!Hash::check($password, $user->password)){
            abort(401, "Bad credentials");
        }
        // good ! We can login class prefect
        Auth::login($user);
        return $user;
    }

    function logout(){
        return Auth::logout();
    }


}
