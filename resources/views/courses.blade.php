@extends('layout.master')

@section('content')
	<div class="card">
	    <div class="card-header">
	        <h1 id="card-titel">Cursos</h1>
	        <button type="button" class="btn btn-primary pull-right">Adicionar</button>
	    </div>
	    <div class="card-body">
	    	<div class="panel">
	    		<div class="panel-body">
		    		<form action="{{ route("courses.index") }}" method="GET">
			    		<input type="text" name="title">
			    		<button type="submit">Buscar</button>
			    	</form>	
			    </div>
	    	</div>
	    	
	        <table class="table table-hover table-stripped table-bordered">
	            <thead>
	                <th>#</th>
	                <th>Título</th>
	                <th>Descrição</th>
	                <th>Ações</th>
	            </thead>
	            <tbody>
	            	@foreach($courses as $course)
		                <tr>
		                    <td>{{ $course->id }}</td>
		                    <td>{{ $course->title }}</td>
		                    <td>{!! $course->description !!}</td>
		                    <td>
		                    	<a class="btn btn-primary" href="">Editar</a>
		                    	<a class="btn btn-primary" href="">Excluir</a>
		                    </td>
		                </tr>
	                @endforeach
	            </tbody>
	        </table>
	        {!! $courses->appends(request()->except('page'))->render() !!}
	    </div>
	</div>
@stop

@section('scripts')
@stop