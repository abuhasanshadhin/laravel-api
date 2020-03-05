<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/bootstrap.min.css') }}">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="container" id="app">
                
                <div class="row mt-5">
                    <div class="col-md-6 offset-md-3">

                        <table class="table table-bordered">
                            <tr>
                                <th>Sl</th>
                                <th>Title</th>
                                <th>Description</th>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>

                        <form @submit.prevent="addTask" method="POST">
                            <div class="form-group row">
                                <label for="" class="col-md-3">Title</label>
                                <div class="col-md-9">
                                    <input type="text" v-model="task.title" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-3">Description</label>
                                <div class="col-md-9">
                                    <textarea v-model="task.description" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-9 offset-md-3">
                                    <input type="submit" value="Submit" class="btn btn-primary">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>

        <script src="{{ asset('assets/vue.js') }}"></script>
        <script src="{{ asset('assets/axios.min.js') }}"></script>
        <script>
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTU4MzQwODY5OCwiZXhwIjoxNTgzNDEyMjk4LCJuYmYiOjE1ODM0MDg2OTgsImp0aSI6IlQxaHltb0tJTnZXNW1odGciLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.sNAut7HlflNJgT0UMP0QDR1xPEtVdyzpBKN2LuxJvAg";
            new Vue({
                el: "#app",
                data: {
                    tasks: [],
                    task: {
                        title: 'sdfsdfds',
                        description: 'fsdfsdf',
                    }
                },
                created() {
                    this.getTasks()
                },
                methods: {
                    addTask() {
                        axios.post('api/tasks', this.task).then((response) => {
                            this.task.title = ''
                            this.task.description = ''
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                    },
                    getTasks() {
                        axios.get('api/tasks').then((response) => {
                            console.log(response)
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                    }
                }
            });
        </script>
    </body>
</html>
