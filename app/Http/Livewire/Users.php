<?php

namespace App\Http\Livewire;

use App\User;
use App\Wilaya;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    
    public $admin,$miclat,$wilayas,$sid, $name, $email, $first_name, $last_name, $mobile, $wilaya, $role, $grade,$w,$r,$password;
    public $updateMode = false;
    public $isclickAdd = false;
    public $user_role = "Admin";
    public $active ='';
    public function mount()
    {
        
        $this->wilaya = Wilaya::all();
        $this->role = Role::all();
        $this->active = '';
    }
    public function render()
    {
       
        $this->admin = User::Admin();
        $this->miclat = User::Miclat();
       $this->wilayas = User::Wilayas();
        return view('livewire.users');
    }

    /*************************** */

    public function showForm()
    {
       
        $this->isclickAdd = true;
    }

    private function resetInput()
    {
        $this->name = null;
        $this->last_name = null;
        $this->first_name = null;
        $this->email = null;
        $this->grade = null;
        $this->w = null;
        $this->r = null;
        $this->mobile = null;
    }

    public function store()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'wilaya' => 'required',
            'grade' => 'required',
            'email' => 'required',
        ]);

        $usert = User::create([
            'name' => $this->name,
            'last_name' => $this->last_name,
            'first_name' => $this->first_name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'grade' => $this->grade,
            'wilaya_id' => $this->w,
            'password' => Hash::make($this->password),

        ]);
        //$roles = $request->input('roles') ? $request->input('roles') : [];
        $usert->assignRole($this->r);
        Log::info($usert);
         $this->resetInput();
          $this->isclickAdd = false;
    }

    public function edit($id)
    {
        $record = User::findOrFail($id);

        $this->sid = $id;
        $this->name = $record->name;
        $this->first_name = $record->first_name;
        $this->last_name = $record->last_name;
        $this->email = $record->email;
        $this->mobile = $record->mobile;
        $this->grade = $record->grade;
        $this->w = $record->wwilaya_id;
        //$this->r = $record->last_name;

        $this->updateMode = true;
        $this->isclickAdd = true;
    }

    public function update()
    {
        $this->validate([
            'sid' => 'required|numeric',
            'first_name' => 'required',
            'last_name' => 'required',
            'wilaya' => 'required',
            'grade' => 'required',
            'email' => 'required',
        ]);

        if ($this->sid) {
            $record = User::find($this->sid);
         $userU=   $record->update([
                'name' => $this->name,
                'last_name' => $this->last_name,
                'first_name' => $this->first_name,
                'email' => $this->email,
                'mobile' => $this->mobile,
                'grade' => $this->grade,
                'wilaya_id' => $this->w,
            ]);
                   $record->syncRoles($this->r);
              $this->resetInput();
              $this->isclickAdd = false;
              $this->updateMode = false;
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = User::where('id', $id);
            $record->delete();
        }
    }

    public function user_admin()
    {

        $this->user_role = 'Admin';
    }

    public function user_miclat()
    {
        $this->user_role = 'miclat';
    }

    public function user_wilaya()
    {
        $this->user_role = 'wilaya';
    }
}