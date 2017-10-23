<?php 
namespace App\Repositories;

use App\Models\Student;
use EscapeWork\LaravelSteroids\Repository;

class StudentRepository extends Repository
{
	
	function __construct(Student $student)
	{
		$this->setModel($student);
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

        if ($request->has('name')) {
            $query->where('name', 'like', '%'.$request->name.'%');
        }

        if ($request->has('email') && $request->get('email') != null) {
            $query->where('email', 'like', '%'.$request->email.'%');
        }

        return $query->orderBy('created_at', 'desc')
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
