@extends('layout.master')

@section('content')
	<div class="card">
	    <div class="card-header">
	        <h1 id="card-titel">Alunos</h1>
	        <button type="button" class="btn btn-primary pull-right">Adicionar</button>
	    </div>
	    <div class="card-body">
	    	<div class="panel">
	    		<div class="panel-body">
		    		<form class="col form mb-5" action="{{ route("students.index") }}" method="GET">
		    			<div class="form-group">
			    			<div class="col-6">
			    				<input class="form-control" type="text" name="name" placeholder="Nome do aluno">
			    				<input class="form-control" type="text" name="email" placeholder="Email do aluno">
			    			</div>
			    			<div class="col-2">
			    				<button class="btn btn-default"  type="submit">Buscar</button>
			    			</div>
			    		</div>
			    	</form>	
			    </div>
	    	</div>
	    	
	        <table class="table table-hover table-stripped table-bordered">
	            <thead>
	                <th>#</th>
	                <th>Nome</th>
	                <th>Email</th>
	                <th>Dt. Nascimento</th>
	                <th>Ações</th>
	            </thead>
	            <tbody>
	            	@foreach($students as $student)
		                <tr>
		                    <td>{{ $student->id }}</td>
		                    <td>{{ $student->name }}</td>
		                    <td>{{ $student->email }}</td>
		                    <td>{{ $student->born_date->format('d/m/Y') }}</td>
		                    <td>
		                    	<a class="btn btn-primary" href="">Editar</a>
		                    	<a class="btn btn-primary" href="">Excluir</a>
		                    </td>
		                </tr>
	                @endforeach
	            </tbody>
	        </table>
	        {!! $students->appends(request()->except('page'))->render() !!}
	    </div>
	</div>
@stop

@section('scripts')
@stop