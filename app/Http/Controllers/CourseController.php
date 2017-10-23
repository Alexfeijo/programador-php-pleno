<?php

namespace App\Http\Controllers;

use App\Repositories\CourseRepository;
use App\Http\Requests\CourseSaveRequest;

class CourseController extends Controller
{
    public function __construct(CourseRepository $courses)
    {
        $this->courses = $courses;
    }

    public function all()
    {
        return response()->json(["data" => ["courses" => $this->courses->getAll()]], 200);
    }

    public function store(CourseSaveRequest $request)
    {
        $courses = $this->courses->create($request->all());

        return response()->json([
                            'status' => 200,
                            'data' => [
                                "course"  => $courses->toArray(),
                                "message" => "Curso inserido com sucesso."
                            ]
                        ], 200);
    }

    public function show($id)
    {
        $course = $this->courses->find($id);

        if(!$course) {
            return response()->json([
                                "status" => 422,
                                "data" => [
                                    "message" => "Curso não encontrado."
                                ]
                            ]);
        }
        return response()->json(['data' => ['course' => $course]]);
    }

    public function update($id, CourseSaveRequest $request)
    {
        $courses = $this->courses->update($id, $request->all());

        return response()->json([
                            'status' => 200,
                            'data' => [
                                'course'  => $this->courses->toArray(),
                                "message" => "Curso atualizado com sucesso."
                            ]
                        ], 200);
    }

    public function destroy($id)
    {
        $courses = $this->courses->getById($id);

        $courses->destroy($id);

        return response()->json([
                            'status' => 200,
                            'data' => [
                                "course"  => $courses,
                                "message" => "Curso excluído com sucesso."
                            ]
                        ],200);
    }
}
