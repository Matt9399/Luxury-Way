<template>

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Product Table</h1>
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
                                <th>Title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Added At</th>
                                <th>Modify</th>
                            </tr>
                            <tr v-for="product in products" :key="product.id"> <!-- ce qu'il y a dans l'objet users est stocké dans user -->
                                <td>{{product.id}}</td>
                                <td>{{product.title}}</td>
                                <td>{{product.description}}</td>
                                <td>{{product.price}}</td>
                                <td>{{product.created_at | myDate}}</td>
                                <td>
                                    <a href="#" @click="editModal(product)">
                                        <i class="fa fa-edit blue"></i>
                                    </a>
                                    /
                                    <a href="#" @click="deleteProduct(product.id)">
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
                    <form @submit.prevent="editmode ? updateProduct() : creatProduct()">
                        <div class="modal-body">
                            <div class="form-group">
                                <input v-model="form.title" type="text" name="title"
                                       placeholder="Title"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('title') }">
                                <has-error :form="form" field="title"></has-error>
                            </div>

                            <div class="form-group">
                                <input v-model="form.description" type="text" name="description"
                                       placeholder="Description"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('description') }">
                                <has-error :form="form" field="description"></has-error>
                            </div>

                            <div class="form-group">
                                <input v-model="form.imagePath" type="text" name="imagePath"
                                       placeholder="Image Path"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('imagePath') }">
                                <has-error :form="form" field="imagePath"></has-error>
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
                products : {},
                form: new Form({
                    id : '',
                    title : '',
                    description : '',
                    created_at : '',
                    price : '',
                    imagePath : ''
                })
            }
        },
        methods: {
            updateProduct(){
                this.$Progress.start();
                this.form.put('api/product/'+this.form.id)
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
            editModal(product){
                this.editmode = true;
                this.form.reset();
                $("#addNew").modal("show");
                this.form.fill(product);
            },
            newModal(){
                this.editmode = false;
                this.form.reset();
                $("#addNew").modal("show");
            },
            deleteProduct(id){
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
                        this.form.delete('api/product/'+id).then(()=>{
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
            loadProduct(){
                axios.get("api/product").then(({ data }) => (this.products = data.data));
            },
            creatProduct(){
                this.$Progress.start();
                this.form.post('api/product')
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
                            title: 'Product not created'
                        })
                    })

            }
        },

        created(){
            this.loadProduct();
            setInterval(() => this.loadProduct(), 3000);
        }
    }
</script>
