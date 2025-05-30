<?php

namespace Aaran\Core\User\Livewire\Class;

use Aaran\Assets\Services\ImageService;
use Aaran\Assets\Traits\ComponentStateTrait;
use Aaran\Core\User\Models\UserDetail;
use Aaran\Devops\Models\TaskImage;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserDetailShow extends Component
{

    use ComponentStateTrait, WithFileUploads;

    #[Validate]
    public string $vname = '';
    public string $email = '';

    public string $dob = '';
    public string $gender = '';
    public string $marital_status = '';
    public string $nationality = '';
    public mixed $photo;
    public string $mobile_number = '';
    public string $alter_mobile_number = '';
    public string $residential_address = '';
    public string $city_id = '';
    public string $state_id = '';
    public string $country_id = '';
    public string $pincode_id = '';
    public string $professional_details = '';
    public string $highest_qualification = '';
    public string $occupation = '';
    public string $company_name = '';
    public string $industry_type = '';
    public string $experience = '';
    public bool $active_id = true;

    public function rules(): array
    {
        return [
            'vname' => 'required'
            ];
    }

    public function messages(): array
    {
        return [
            'vname.required' => ':attribute is missing.',
            'vname.unique' => 'This :attribute is already created.',
        ];
    }

    public function validationAttributes(): array
    {
        return [
            'vname' => 'UserDetail name',
        ];
    }

    public function getSave(): void
    {
        $this->validate();


        UserDetail::updateOrCreate(
            ['id' => $this->vid],
            [
                'user_id' => auth()->id(),
                'vname' => Str::ucfirst($this->vname),
                'email' => $this->email,
                'photo' => $this->photo,
                'mobile_number' => $this->mobile_number,
                'alter_mobile_number' => $this->alter_mobile_number,
                'gender' => $this->gender,
                'dob' => $this->dob,
                'marital_status' => $this->marital_status,
                'nationality' => $this->nationality,
                'residential_address' => $this->residential_address,
                'city_id' => $this->city_id,
                'state_id' => $this->state_id,
                'pincode_id' => $this->pincode_id,
                'country_id' => $this->country_id,
                'professional_details' => $this->professional_details,
                'highest_qualification' => $this->highest_qualification,
                'occupation' => $this->occupation,
                'company_name' => $this->company_name,
                'industry_type' => $this->industry_type,
                'active_id' => $this->active_id,
            ],
        );

        $this->dispatch('notify', ...['type' => 'success', 'content' => ($this->vid ? 'Updated' : 'Saved') . ' Successfully']);
        $this->clearFields();
    }
    public function clearFields(): void
    {
        $this->vid = null;
        $this->vname = '';
        $this->email = '';
        $this->dob = '';
        $this->gender = '';
        $this->marital_status = '';
        $this->nationality = '';
        $this->photo = '';
        $this->mobile_number = '';
        $this->alter_mobile_number = '';
        $this->residential_address = '';
        $this->city_id = '';
        $this->state_id = '';
        $this->country_id = '';
        $this->pincode_id = '';
        $this->professional_details = '';
        $this->highest_qualification = '';
        $this->occupation = '';
        $this->company_name = '';
        $this->industry_type = '';
        $this->experience = '';
        $this->active_id = true;
        $this->searches = '';
    }

    public function getObj(int $id): void
    {
        if ($obj = UserDetail::find($id)) {
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->email = $obj->email;
            $this->gender = $obj->gender;
            $this->photo = $obj->photo;
            $this->dob = $obj->dob;
            $this->marital_status = $obj->marital_status;
            $this->nationality = $obj->nationality;
            $this->mobile_number = $obj->mobile_number;
            $this->alter_mobile_number = $obj->alter_mobile_number;
            $this->residential_address = $obj->residential_address;
            $this->city_id = $obj->city_id;
            $this->state_id = $obj->state_id;
            $this->pincode_id = $obj->pincode_id;
            $this->country_id = $obj->country_id;
            $this->professional_details = $obj->professional_details;
            $this->highest_qualification = $obj->highest_qualification;
            $this->occupation = $obj->occupation;
            $this->company_name = $obj->company_name;
            $this->industry_type = $obj->industry_type;
            $this->experience = $obj->experience;
            $this->active_id = $obj->active_id;
        }
    }

    public function getList()
    {
        return UserDetail::active($this->activeRecord)
            ->when($this->searches, fn($query) => $query->searchByName($this->searches))
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function deleteFunction(): void
    {
        if (!$this->deleteId) return;

        $obj = UserDetail::find($this->deleteId);
        if ($obj) {
            $obj->delete();
        }
    }
    public function saveImage($id, $photo): void
    {
        $imageService = app(ImageService::class);

        foreach ($this->photo as $image) {
            TaskImage::on($this->getTenantConnection())->create([
                'task_id' => $id,
                'image' => $imageService->save($image),
            ]);
        }
    }

    public function render()
    {
        return view('user::user-details-list', [
            'list' => $this->getList()
        ]);
    }

}
