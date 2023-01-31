<?php

namespace App\Http\Livewire\Bp\Profile;

use App\Models\Bp;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Additional extends Component
{
    public array $field = [];
    public $dob;
    public $joining_date;
    public $resigning_date;
    public $bp;

    public function mount()
    {
        $bp = Bp::firstWhere('user_id', Auth::id());
        $this->field = $bp->toArray();
        $this->dob = Carbon::parse($bp->dob)->toDateString();
        $this->joining_date = Carbon::parse($bp->joining_date)->toDateString();
        $this->resigning_date = Carbon::parse($bp->resigning_date)->toDateString();
    }

    /**
     * @throws ValidationException
     */
    public function updated( $propertyName )
    {
        $this->validateOnly( $propertyName,[
            'field.stuff_id' => [
                'required',
                'between:8,10',
                'unique:bps,stuff_id,'.request()->segment(2),
            ],
            'field.pool_number' => [
                'required',
                'min:10',
                'max:11',
                'unique:bps,pool_number,'.request()->segment(2),
            ],
        ]);
    }

    protected array $messages = [
        'field.stuff_id.required' => 'Stuff ID cannot be empty.',
        'field.stuff_id.between' => 'Stuff ID must between 8-10 character.',
    ];

    protected array $validationAttributes = [
        'field.stuff_id' => 'Stuff ID',
        'field.pool_number' => 'Pool Number',
    ];

    public function render(): Factory|View|Application
    {
        return view('livewire.bp.profile.additional');
    }
}
