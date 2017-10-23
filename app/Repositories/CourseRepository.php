<?php 
namespace App\Repositories;

use App\Models\Course;
use EscapeWork\LaravelSteroids\Repository;

class CourseRepository extends Repository
{
	
	function __construct(Course $course)
	{
		$this->setModel($course);
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

        if ($request->has('title')) {
            $query->where('title', 'like',  '%'.$request->title.'%');
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
