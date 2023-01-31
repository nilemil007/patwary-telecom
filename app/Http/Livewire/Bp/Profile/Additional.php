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
    public $dob,$joining_date,$resigning_date,$bp;

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
            'field.personal_number' => [
                'required',
                'min:10',
                'max:11',
                'unique:bps,personal_number,'.request()->segment(2),
            ],
            'field.gender' => [
                'string'
            ],
            'field.blood_group' => [],
            'field.education' => [
                'string'
            ],
            'field.father_name' => [
                'required',
                'string',
                'min:3',
                'max:50',
            ],
            'field.mother_name' => [
                'required',
                'string',
                'min:3',
                'max:50',
            ],
            'field.division' => [
                'required',
                'string',
                'max:20',
            ],
            'field.district' => [
                'required',
                'string',
                'max:20',
            ],
            'field.thana' => [
                'required',
                'string',
                'max:20',
            ],
            'field.address' => [
                'required',
                'string',
                'max:150',
            ],
            'field.nid' => [
                'required',
                'max:17',
                'unique:bps,nid,'.request()->segment(2),
            ],
            'field.bank_name' => [
                'required',
                'string',
                'max:50',
            ],
            'field.brunch_name' => [
                'required',
                'string',
                'max:50',
            ],
            'field.account_number' => [
                'required',
                'unique:bps,account_number,'.request()->segment(2),
                'max:20',
            ],
            'field.salary' => [
                'required',
                'max:5',
            ],
            'dob' => [
                'required',
                'date',
            ],
            'joining_date' => [
                'required',
                'date',
            ],
            'resigning_date' => [
                'nullable',
                'date',
            ],
        ]);
    }

    protected array $messages = [
        'field.stuff_id.required' => 'Can\'t keep it empty.',
        'field.stuff_id.between' => 'Must between 8-10 character.',
        'field.stuff_id.unique' => 'Already exist.',
    ];

    protected array $validationAttributes = [
        'field.stuff_id'        => 'Stuff ID',
        'field.pool_number'     => 'Pool Number',
        'field.personal_number' => 'Personal Number',
        'field.gender'          => 'Gender',
        'field.blood_group'     => 'Blood Group',
        'field.education'       => 'Education',
        'field.father_name'     => 'Father Name',
        'field.mother_name'     => 'Mother Name',
        'field.division'        => 'Division',
        'field.district'        => 'District',
        'field.thana'           => 'Thana',
        'field.address'         => 'Address',
        'field.nid'             => 'NID',
        'field.bank_name'       => 'Bank Name',
        'field.brunch_name'     => 'Brunch Name',
        'field.account_number'  => 'Account Number',
        'field.salary'          => 'Salary',
        'field.dob'             => 'DOB',
        'field.joining_date'    => 'Joining Date',
        'field.resigning_date'  => 'Resigning Date',
    ];

    public function render(): Factory|View|Application
    {
        return view('livewire.bp.profile.additional');
    }
}
