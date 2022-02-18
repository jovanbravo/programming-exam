<?php

namespace App\Http\Livewire;

use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;


class ResultComponent extends Component
{

    public $type;
    public $searchs;
    public $totalTypes;
    public $users;

    /** 
     * @param Request $request
     */
    public function mount(Request $request)
    {
        $search = $request->search;
        $type = $request->type_name;
        $searchValues = preg_split('/\s+/', $search, -1, PREG_SPLIT_NO_EMPTY);
        $searchs = User::query()
            ->join('types as type', 'type.id', '=', 'users.type_id')
            ->join('types as subtype', 'subtype.id', '=', 'users.subtype_id')
            ->join('types as subsubtype', 'subsubtype.id', '=', 'users.subsubtype_id')
           -> where(function ($q) use ($searchValues) {
                foreach ($searchValues as $value) {
                $q->orWhere('type.type_name', 'like', "%{$value}%");
                $q->orWhere('subtype.type_name', 'like', "%{$value}%");
                $q->orWhere('subsubtype.type_name', 'like', "%{$value}%");
                }
            })
           
            ->select('users.*', 'type.type_name', 'subtype.type_name as subtype_name', 'subsubtype.type_name as subsubtype_name')
            ->get();
        if ($request->search != '' || $request->type != '') {
            $this->searchs = $searchs;
        }
    }


    public function render()
    {
        $totalTypes = Type::get()->toTree();
        $this->totalTypes = $totalTypes->toArray();


        return view('livewire.result-component')->extends('layouts.app')->section('content');
    }

    /** Get users by ID
     * @param $id
     */
    public function getUsers($id)
    {
        $users = User::query()
            ->join('types as type', 'type.id', '=', 'users.type_id')
            ->join('types as subtype', 'subtype.id', '=', 'users.subtype_id')
            ->join('types as subsubtype', 'subsubtype.id', '=', 'users.subsubtype_id')
            ->where('type_id', $id)
            ->orWhere('subtype_id', $id)
            ->orWhere('subsubtype_id', $id)
            ->select('users.*', 'type.type_name', 'subtype.type_name as subtype_name', 'subsubtype.type_name as subsubtype_name')
            ->get();
        $this->users = $users;
    }

    /** Count all users with this type
     * @param $type_id
     * @return int
     */
    public static function countType($type_id)
    {
        return User::query()->where('type_id', $type_id)->groupBy('type_id')->count();
    }

    /** Count all users with this subtype
     * @param $subtype_id
     * @return int
     */
    public static function countSubtype($subtype_id)
    {
        return User::query()->where('subtype_id', $subtype_id)->groupBy('subtype_id')->count();
    }

    /** Count all users with this subsubtype
     * @param $subsubtype_id
     * @return int
     */
    public static function countSubsubtype($subsubtype_id)
    {
        return User::query()->where('subsubtype_id', $subsubtype_id)->groupBy('subsubtype_id')->count();
    }
}
