<?php

namespace App\Http\Controllers;

use App\Employees;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeesController extends Controller
{
    public function create(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'surname' => 'required',
            'patronymic' => 'required',
            'sociability' => 'required|between:0,10',
            'engineeringSkill' => 'required|between:0,10',
            'timeManagement' => 'required|between:0,10',
            'knowledgeOfLanguages' => 'required|between:0,10',
            'avatar' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'projectId' => 'required',
        ]);
        $path = null;
        $dataEmployee = null;

        if ($request->get('timeManagement') < 10 && count(explode(',', $request->get('projectId'))) > 1) {
            $validator->errors()->add('project', 'Something is wrong with this field!');
        }

        if ($validator->fails()) {
            return ['error' => $validator->errors()];
        }

        $dataEmployee = $validator->getData();
        $path = Storage::putFileAs(
            'public/avatars', $request->file('avatar'), time() . '_avatar.jpg'
        );
        $projectsId = explode(',', $dataEmployee['projectId']);

        try {
            $employee = new Employees();
            $employee
                ->setName($dataEmployee['name'])
                ->setSurname($dataEmployee['surname'])
                ->setPatronymic($dataEmployee['patronymic'])
                ->setAvatar($path ?? '')
                ->setSociability($dataEmployee['sociability'])
                ->setEngineeringSkill($dataEmployee['engineeringSkill'])
                ->setTimeManagement($dataEmployee['timeManagement'])
                ->setKnowledgeOfLanguages($dataEmployee['knowledgeOfLanguages'])
                ->save();
                $employee->projects()->sync($projectsId);
        } catch (QueryException $queryException) {
            return ['error' => $queryException->getMessage()];
        }
    }

    public function employees()
    {
       return Employees::with('projects')->get();
    }
}
