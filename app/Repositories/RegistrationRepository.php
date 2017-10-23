<?php 
namespace App\Repositories;

use App\Models\Registration;
use EscapeWork\LaravelSteroids\Repository;

class RegistrationRepository extends Repository
{
	
	function __construct(Registration $registration)
	{
		$this->setModel($registration);
	}

	public function create(array $data)
    {
        $this->model->fill($data);
        $this->model->save();

        return $this->model;
    }

    public function update($id, array $data)
    {
        $this->model = $this->model->findOrFail($id);
        $this->model->fill($data);
        $this->model->save();

        return $this->model;
    }

    public function destroy($id)
    {
        $this->model = $this->model->findOrFail($id);
        $this->model->delete();

        return $this->model;
    }

    public function manager($request)
    {
        $query = $this->model->newQuery();
        $query->join('courses', 'registrations.course_id', '=', 'courses.id');
        $query->join('students', 'registrations.student_id', '=', 'students.id');
        $query->select('students.name as name', 'students.email as email', 'courses.title as title', 'registrations.id as id');

        if ($request->has('name')) {
            $query->where('students.name', 'like', '%'.$request->name.'%');
        }
        if ($request->has('email')) {
            $query->where('students.email', 'like', '%'.$request->email.'%');
        }

        if ($request->has('course')) {
            $query->where('courses.id', '=', $request->course_id);
        }

        return $query->orderBy('registrations.created_at', 'desc')
                     ->paginate();
    }

    public function getAll()
    {
        $query = $this->model->newQuery();

        return $query->get();
    }

    public function getById($id)
    {
        $query = $this->model->newQuery();

        return $query->where('id', $id)->first();
    }
}
