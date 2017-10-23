<?php

namespace App\Http\Controllers;

use App\Repositories\StudentRepository;
use App\Http\Requests\StudentSaveRequest;

class StudentController extends Controller
{
    public function __construct(StudentRepository $students)
    {
        $this->students = $students;
    }

    public function all()
    {
        return response()->json(["data" => ["students" => $this->students->getAll()]], 200);
    }

    public function store(StudentSaveRequest $request)
    {
        $students = $this->students->create($request->all());

        return response()->json([
                            'status' => 200,
                            'data' => [
                                "student"  => $students->toArray(),
                                "message" => "Aluno inserido com sucesso."
                            ]
                        ], 200);
    }

    public function show($id)
    {
        $student = $this->students->find($id);

        if(!$student) {
            return response()->json([
                                "status" => 422,
                                "data" => [
                                    "message" => "Aluno não encontrado."
                                ]
                            ]);
        }
        return response()->json(['data' => ['student' => $student->toArray()]]);
    }

    public function update($id, StudentSaveRequest $request)
    {
        $students = $this->students->update($id, $request->all());

        return response()->json([
                            'status' => 200,
                            'data' => [
                                'student'  => $this->students->toArray(),
                                "message" => "Aluno atualizado com sucesso."
                            ]
                        ], 200);
    }

    public function destroy($id)
    {
        $students = $this->students->getById($id);

        $students->destroy($id);

        return response()->json([
                            'status' => 200,
                            'data' => [
                                "student" => $students,
                                "message" => "Aluno excluído com sucesso."
                            ],
                        ], 200);
    }
}
