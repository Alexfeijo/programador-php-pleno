@extends('layout.master')

@section('content')
	<div class="card">
	    <div class="card-header">
	        <h1 id="card-titel">Matrículas</h1>
	        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">Registrar</button>
	    </div>
	    <div class="card-body">
	    	<div class="panel">
	    		<div class="panel-body">
		    		<form class="col form mb-5" action="{{ route("registrations.index") }}" method="GET">
		    			<div class="form-group">
			    			<div class="col-6">
			    				<input class="form-control" type="text" name="name" placeholder="Nome do aluno">
			    				<input class="form-control" type="text" name="email" placeholder="Email do aluno">
			    				<select name="course_id">
			    					<option value="">Pesquise por curso</option>
			    					@foreach($courses as $course) 
			    						<option value="{{ $course->id }}">{{ $course->title }}</option>
			    					@endforeach
			    				</select>
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
	                <th>Curso</th>
	                <th>Ações</th>
	            </thead>
	            <tbody>
	            	@foreach($registrations as $registration)
		                <tr>
		                    <td>{{ $registration->id }}</td>
		                    <td>{{ $registration->name }}</td>
		                    <td>{{ $registration->email }}</td>
		                    <td>{{ $registration->title }}</td>
		                    <td>
		                    	<a class="btn btn-primary" href="">Editar</a>
		                    	<a class="btn btn-primary" href="">Excluir</a>
		                    </td>
		                </tr>
	                @endforeach
	            </tbody>
	        </table>
	        {!! $registrations->appends(request()->except('page'))->render() !!}
	    </div>
	</div>
	<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Matrícula</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form class="form" id="registration-form">
      		<select name="course_id" id="">
      			<option value="">Selecione um Curso</option>
      			@foreach($courses as $course)
      				<option value="{{ $course->id }}">{{ $course->title }}</option>
      			@endforeach
      		</select>
      		<select name="student_id" id="">
      			<option value="">Selecione um Aluno</option>
      			@foreach($students as $student)
      				<option value="{{ $student->id }}">{{ $student->name }}</option>
      			@endforeach
      		</select>
      	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary btn-js-registrar">Registrar</button>
      </div>
    </div>
  </div>
</div>
@stop

@section('scripts')
<script>
	$('#exampleModal').on('shown.bs.modal', function () {
	  $('#myInput').trigger('focus')
	});

	$(function(){
	    $('#registration-form').on('submit', function(e){
	    	var url = "{{ route('course.store') }}"
	        e.preventDefault();
	        $.ajax({
	            url: url, //this is the submit URL
	            type: 'POST', //or POST
	            data: $('#registration-form').serialize(),
	            success: function(data){
	                 alert('successfully submitted')
	            }
	        });
	    });
	});

	
</script>
@stop