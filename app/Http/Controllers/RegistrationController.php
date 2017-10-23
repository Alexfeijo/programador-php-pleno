<?php

namespace App\Http\Controllers;

use App\Repositories\RegistrationRepository;
use App\Http\Requests\RegistrationSaveRequest;

class RegistrationController extends Controller
{
    public function __construct(RegistrationRepository $registrations)
    {
        $this->registrations = $registrations;
    }

    public function all()
    {
        return response()->json(["data" => ["registrations" => $this->registrations->getAll()]], 200);
    }

    public function store(RegistrationSaveRequest $request)
    {
        $registrations = $this->registrations->create($request->all());

        return response()->json([
                            'status' => 200,
                            'data' => [
                                "registration"  => $registrations->toArray(),
                                "message" => "Matrícula inserida com sucesso."
                            ]
                        ], 200);
    }

    public function show($id)
    {
        $registration = $this->registrations->find($id);

        if(!$registration) {
            return response()->json([
                                "status" => 422,
                                "data" => [
                                    "message" => "Matrícula não encontrada."
                                ]
                            ]);
        }
        return response()->json(['data' => ['registration' => $registration->toArray()]]);
    }

    public function update($id, RegistrationSaveRequest $request)
    {
        $registrations = $this->registrations->update($id, $request->all());

        return response()->json([
                            'status' => 200,
                            'data' => [
                                'registration'  => $this->registrations->toArray(),
                                "message" => "Matrícula atualizada com sucesso."
                            ]
                        ], 200);
    }

    public function destroy($id)
    {
        $registrations = $this->registrations->getById($id);

        $registrations->destroy($id);

        return response()->json([
                            'status' => 200,
                            'data' => [
                                "registration" => $registrations,
                                "message" => "Matrícula excluída com sucesso."
                            ]
                        ], 200);
    }
}
