
var app = new Vue({
        el: '#app',
        data: {
            todos: [],
            jobs: {},
            interval: '',
            loader: false,
            status: '',
            isEdit: false,
            activeIndex: null,
        },
        mounted() {
            this.getTodoList()
        },
        methods: {
            changeTitle(id) {
                this.jobs.changedTitle = document.getElementById("title").value;
                let formData = this.toFormData(this.jobs);
                axios.post('api.php?action=changedTitle&changeId=' + id, formData)
                    .then(response => {
                        if (response.data) {
                            this.jobs.newTitle = '';
                            this.activeIndex = null;
                            this.isEdit = false;
                            this.status = 'all';
                            this.getTodoList();
                        }
                    }).catch(error => {
                    console.log(error);
                })
            },
            removeJob(id) {
                axios.get('api.php?action=deleteJob& deleteId=' + id)
                    .then(response => {
                        this.getTodoList();
                    }).catch(error => {
                    console.log(error);
                })
            },

            setEdit(id, title, key) {
                this.jobs.newTitle = title;
                this.activeIndex = id;
                this.isEdit = true
            },
            getTodoList() {
                this.status = 'all';
                axios.get('api.php?action=index')
                    .then(response => {
                        this.todos = response.data;
                    }).catch(error => {
                    console.log(error);
                })
            },
            addJobs() {
                let formData = this.toFormData(this.jobs);
                axios.post('api.php?action=create', formData)
                    .then(response => {
                        if (response.data) {
                            this.jobs.title = '';
                            this.status = 'all';
                            this.getTodoList();
                        }
                    }).catch(error => {
                    console.log(error);
                })
            },
            setActive() {
                this.status = 'active';
                if (this.jobs.activeId) {
                    axios.get('api.php?action=changeActive&id=' + this.jobs.activeId)
                        .then(response => {
                            if (response.data) {
                                this.jobs.activeId = '';
                                this.getActiveList();
                            }
                        }).catch(error => {
                        console.log(error);
                    })
                } else {
                    this.getActiveList();
                }
            },
            getActiveList() {
                this.status = 'active';
                axios.get('api.php?action=getActive')
                    .then(response => {
                        this.todos = response.data;
                    }).catch(error => {
                    console.log(error);
                })
            },
            getCompleteList() {
                this.status = 'complete';
                axios.get('api.php?action=getCompleted')
                    .then(response => {
                        this.todos = response.data;
                    }).catch(error => {
                    console.log(error);
                })
            },
            clearCompleteList() {
                this.status = 'complete';
                axios.get('api.php?action=clearCompleted')
                    .then(response => {
                        this.getCompleteList();
                    }).catch(error => {
                    console.log(error);
                })
            },
            toFormData(obj) {
                let fd = new FormData;
                for (let i in obj) {
                    fd.append(i, obj[i]);
                }
                return fd;
            }
        }
    })
