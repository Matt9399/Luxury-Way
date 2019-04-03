<template>

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Users Table</h1>
                        <div class="card-tools">
                            <button class="btn btn-success" @click="newModal">Add New <i class="fas fa-user-plus fa-fw"></i></button>
                        </div>
                        <br>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Registered At</th>
                                <th>Modify</th>
                            </tr>
                            <tr v-for="user in users" :key="user.id"> <!-- ce qu'il y a dans l'objet users est stocké dans user -->
                                <td>{{user.id}}</td>
                                <td>{{user.name}}</td>
                                <td>{{user.email}}</td>
                                <td>Type</td>
                                <td>{{user.created_at | myDate}}</td>
                                <td>
                                    <a href="#" @click="editModal(user)">
                                        <i class="fa fa-edit blue"></i>
                                    </a>
                                    /
                                    <a href="#" @click="deleteUser(user.id)">
                                        <i class="fa fa-trash red"></i>
                                    </a>

                                </td>

                            </tr>

                            </tbody></table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
                <!-- /.box -->
      </div>

        <!-- Modal -->
        <div style="position: absolute" class="modal" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Add New</h5>
                        <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode ? updateUser() : creatUser()">
                        <div class="modal-body">
                            <div class="form-group">
                                <input v-model="form.name" type="text" name="name"
                                       placeholder="Name"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                <has-error :form="form" field="name"></has-error>
                            </div>

                            <div class="form-group">
                                <input v-model="form.email" type="email" name="email"
                                       placeholder="Email Address"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                                <has-error :form="form" field="email"></has-error>
                            </div>

                            <div class="form-group">
                                <input v-model="form.password" type="password" name="password" id="password"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                                <has-error :form="form" field="password"></has-error>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button v-show="!editmode" type="submit" class="btn btn-primary">Create</button>
                            <button v-show="editmode" type="submit" class="btn btn-success">Update</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </div>



</template>


<script>


    export default {
        data(){
            return {
                editmode: true,
                users : {},
                form: new Form({
                    id : '',
                    name : '',
                    email : '',
                    created_at : '',
                    password : ''
                })
            }
        },
        methods: {
            updateUser(){
                this.$Progress.start();
                this.form.put('api/user/'+this.form.id)
                    .then(() => {

                        swal.fire(
                            'Updated!',
                            'Informations has been updated.',
                            'success'
                        )
                        this.$Progress.finish();
                        })
                    .catch(() => {
                        this.$Progress.fail();
                        });

            },
            editModal(user){
                this.editmode = true;
                this.form.reset();
                $("#addNew").modal("show");
                this.form.fill(user);
            },
            newModal(){
                this.editmode = false;
                this.form.reset();
                $("#addNew").modal("show");
            },
            deleteUser(id){
                swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {

                    // Send request to the server
                    if (result.value){
                        this.form.delete('api/user/'+id).then(()=>{
                            swal.fire(
                                'Deleted!',
                                'The user has been deleted.',
                                'success'
                            )
                        }).catch(()=>{
                            swal("Failed!", "User not deleted", "warning");
                        });
                    }



                })
            },
            loadUsers(){
                axios.get("api/user").then(({ data }) => (this.users = data.data));
            },
            creatUser(){
                this.$Progress.start();
                this.form.post('api/user')
                .then(()=>{

                    Toast.fire({
                        type: 'success',
                        title: 'User created successfully'
                    })
                    this.$Progress.finish();
                })
                    .catch(()=>{
                        Toast.fire({
                            type: 'error',
                            title: 'User not created'
                        })
                    })

            }
        },

        created(){
            this.loadUsers();
            setInterval(() => this.loadUsers(), 3000);
        }
    }
</script>

