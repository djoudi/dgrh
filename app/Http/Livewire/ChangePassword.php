<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;

class ChangePassword extends Component
{

    public $sid,$password;

    public function mount()
    {
       $this->sid = auth()->user()->id;
    }
    public function render()
    {
        //dd(auth()->user()->id);
        return view('livewire.change-password');
    }

     public function update()
    {
        $this->validate([
            'sid' => 'required|numeric',
            'password' => 'required',
        ]);

        if ($this->sid) {
            $record = User::find($this->sid);
         $userU=   $record->update([
                'password' =>Hash::make($this->password),
            ]);
        }
    }
}
