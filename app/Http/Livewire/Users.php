<?php

namespace App\Http\Livewire;

use App\User;
use App\Wilaya;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;

class Users extends Component
{
    public $user, $name, $email, $first_name, $last_name, $mobile, $wilaya, $role, $grade;
    public $updateMode = false;
    public $isclickAdd = false;
    public function mount()
    {
        $this->wilaya = Wilaya::all();
        $this->role = Role::all();
    }
    public function render()
    {
        $this->user = User::all();
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
        $this->wilaya_id = null;
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
            'wilaya_id' => $this->wilaya,

        ]);
        //$roles = $request->input('roles') ? $request->input('roles') : [];
        $usert->assignRole($this->role);
        Log::info($usert);
        //  $this->resetInput();
    }

    public function edit($id)
    {
        $record = User::findOrFail($id);

        $this->selected_id = $id;
        $this->name = $record->name;
        $this->phone = $record->phone;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selected_id' => 'required|numeric',
            'name' => 'required|min:5',
            'phone' => 'required'
        ]);

        if ($this->selected_id) {
            $record = User::find($this->selected_id);
            $record->update([
                'name' => $this->name,
                'phone' => $this->phone
            ]);

            $this->resetInput();
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

    /*************************** */
}