<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>ToDo</title>
    <style>
        .row-padding {
            margin-top: 25px;
            margin-bottom: 25px;
        }

        .active-link{
            background: #ccc;
        }

        .nav a {
            cursor:pointer;
        }
    </style>
</head>
<body>

<div id="app">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h1>Add new Title</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <form @submit.prevent="addJobs">
                    <input v-model="jobs.title" type="search" id="search" class="form-control"
                           placeholder="Enter Title">
                </form>
            </div>
        </div>
        <br>
        <div class="row" v-if="todos && todos.length">
            <div class="col-lg-12">
                <table class="table" id="table">
                    <tbody>
                        <tr v-for="(todo, index) in todos" :key="todo.id">
                            <td>
                                <input v-model="jobs.activeId" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" :value="todo.id">
                            </td>
                            <td>
                                <form @submit.prevent="changeTitle(todo.id)" v-if="activeIndex === todo.id">
                                    <input id="title"  v-model="jobs.newTitle"  type="text">
                                </form>

                                <p v-else  @click="setEdit(todo.id, todo.title, index)">{{todo.title}}</p>
                            </td>
                            <td>
                                <button @click="removeJob(todo.id)" type="button" class="close" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <hr>
            </div>
        </div>
        <nav class="nav" v-if="todos && todos.length || status === 'complete' || status === 'active'">
            <a v-if="todos" class="nav-link disabled" href="#" >{{todos.length}} items left</a>
            <a :class="{'active-link': status === 'all'}" class="nav-link" @click="getTodoList">All</a>
            <a :class="{'active-link': status === 'active'}"  class="nav-link" @click="setActive" >Active</a>
            <a :class="{'active-link': status === 'complete'}" class="nav-link" @click="getCompleteList">Completed</a>
            <a v-if="status === 'complete'" class="nav-link" @click="clearCompleteList">clear completed</a>
        </nav>
    </div>
</div>
<!-- Optional JavaScript -->
<!--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>-->

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="main.js"></script>


</body>
</html>