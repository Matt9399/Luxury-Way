<template>

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Item Table</h1>
                        <div class="card-tools">
                            <button class="btn btn-success" @click="newModal">Add New <i class="fas fa-shopping-bag"></i></button>
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
                                <th>Type</th>
                                <th>Price</th>
                                <th>Current Stock</th>
                                <th>Stock</th>
                                <th>Added At</th>
                                <th>Modify</th>
                            </tr>
                            <tr v-for="item in items" :key="item.id"> <!-- ce qu'il y a dans l'objet users est stocké dans user -->
                                <td>{{item.id}}</td>
                                <td>{{item.name}}</td>
                                <td>{{item.type}}</td>
                                <td>{{item.price}}</td>
                                <td>{{item.current_stock}}</td>
                                <td>{{item.stock}}</td>
                                <td>{{item.created_at | myDate}}</td>
                                <td>
                                    <a href="#" @click="editModal(item)">
                                        <i class="fa fa-edit blue"></i>
                                    </a>
                                    /
                                    <a href="#" @click="deleteItem(item.id)">
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
                        <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode ? updateItem() : creatItem()">
                        <div class="modal-body">
                            <div class="form-group">
                                <input v-model="form.name" type="text" name="name"
                                       placeholder="Name"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                <has-error :form="form" field="name"></has-error>
                            </div>

                            <div class="form-group">
                                <input v-model="form.type" type="text" name="type"
                                       placeholder="Type"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
                                <has-error :form="form" field="type"></has-error>
                            </div>

                            <div class="form-group">
                                <input v-model="form.current_stock" type="text" name="current_stock"
                                       placeholder="Current Stock"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('current_stock') }">
                                <has-error :form="form" field="current_stock"></has-error>
                            </div>

                            <div class="form-group">
                                <input v-model="form.stock" type="text" name="stock"
                                       placeholder="Stock"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('stock') }">
                                <has-error :form="form" field="stock"></has-error>
                            </div>

                            <div class="form-group">
                                <input v-model="form.price" type="text" name="price" id="price" placeholder="Price"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('price') }">
                                <has-error :form="form" field="price"></has-error>
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
                items : {},
                form: new Form({
                    id : '',
                    name : '',
                    type : '',
                    created_at : '',
                    price : '',
                    current_stock : '',
                    stock : ''
                })
            }
        },
        methods: {
            updateItem(){
                this.$Progress.start();
                this.form.put('api/item/'+this.form.id)
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
            editModal(item){
                this.editmode = true;
                this.form.reset();
                $("#addNew").modal("show");
                this.form.fill(item);
            },
            newModal(){
                this.editmode = false;
                this.form.reset();
                $("#addNew").modal("show");
            },
            deleteItem(id){
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
                        this.form.delete('api/item/'+id).then(()=>{
                            swal.fire(
                                'Deleted!',
                                'The product has been deleted.',
                                'success'
                            )
                        }).catch(()=>{
                            swal("Failed!", "Product not deleted", "warning");
                        });
                    }



                })
            },
            loadItem(){
                axios.get("api/item").then(({ data }) => (this.items = data.data));
            },
            creatItem(){
                this.$Progress.start();
                this.form.post('api/item')
                    .then(()=>{

                        Toast.fire({
                            type: 'success',
                            title: 'Product created successfully'
                        })
                        this.$Progress.finish();
                    })
                    .catch(()=>{
                        Toast.fire({
                            type: 'error',
                            title: 'Item not created'
                        })
                    })

            }
        },

        created(){
            this.loadItem();
            setInterval(() => this.loadItem(), 3000);
        }
    }
</script>
