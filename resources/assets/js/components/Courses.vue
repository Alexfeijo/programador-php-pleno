<template>
	<div class="card">
	    <div class="card-header">
	        <h1 id="card-titel">Cursos</h1>
	        <button type="button" class="btn btn-primary">Adicionar</button>
	    </div>
	    <div class="card-body">
	        <table class="table table-hover table-stripped table-bordered">
	            <thead>
	                <th>#</th>
	                <th>Nome</th>
	                <th>Email</th>
	            </thead>
	            <tbody>
	                <tr>
	                    <td></td>
	                    <td></td>
	                    <td></td>
	                </tr>
	            </tbody>
	        </table>
	    </div>
	</div>
</template>
<script>
    export default {
        data: function() {
            return {
                edit: false,
                list: [],
                course: {
                    id: '',
                    title: '',
                    description: ''
                }
            };
        },
        
        ready: function() {
            this.fetchCourseList();
        },
        
        methods: {
            fetchCourseList: function() {
                this.$http.get('/api/courses').then(function (response) {
                    this.list = response.data
                });
            },
 
            createTask: function () {
                this.$http.post('/api/course/store', this.course)
                this.course.body = ''
                this.edit = false
                this.fetchCourseList()
            },
 
            updateTask: function(id) {
                this.$http.patch('/api/course/' + id, this.course)
                this.course.body = ''
                this.edit = false
                this.fetchCourseList()
            },
 
            showTask: function(id) {
                this.$http.get('/api/course/' + id).then(function(response) {
                    this.course.id = response.data.id
                    this.course.body = response.data.body
                })
                this.$els.courseinput.focus()
                this.edit = true
            },
 
            deleteTask: function (id) {
                this.$http.delete('/api/course/' + id)
                this.fetchCourseList()
            },
        }
    }
</script>