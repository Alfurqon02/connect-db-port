<script setup>
import { onMounted, ref } from 'vue'
import axios from 'axios'

const open = ref(false)
let items = ref([])
// let props = defineProps(['id'])
// let name = ref([])
// let stock = ref([])
// let category = ref([])
// const router = useRouter()


onMounted(async () => {
    const response = await axios.get('/api/getData')
    items.value = response.data.items
    console.log(items.value)
})

async function editItem() {

}

// const editNews = async () => {
//     // Add validation / CSRF token

//     const formData = new FormData()
//     formData.append('name', name.value)
//     formData.append('stock', stock.value)
//     formData.append('category', categories.name.value)

//     if (files.value) {
//         for (let i = 0; i < files.value.length; i++) {
//             formData.append(files[${i}], files.value[i])
//         }
//     }

//     try {
//         const response = await axios.post(/api/getData/${props.id}, formData, {
//             headers: {
//                 'Content-Type': 'multipart/form-data'
//             }
//         })
//         console.log(response.data)
//         alert('Item edited')
//     } catch (error) {
//         console.error(error.response.data)
//         alert('Error edit item')
//     }
// }
</script>

<template>
    <main>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Bootstrap CRUD Data Table for Database with Modal Form</title>
        </head>

        <body>
            <div class="container">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-xs-6">
                                    <h2>Manage <b>Employees</b></h2>
                                </div>
                                <div class="col-xs-6">
                                    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i
                                            class="material-icons">&#xE147;</i> <span>Add New Item</span></a>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <!-- <th>#</th> -->
                                    <th>Name</th>
                                    <th>Stock</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in items" :key="item.id">
                                    <td>{{ item.name }}</td>
                                    <td>{{ item.stock }}</td>
                                    <td>{{ item.categories.name }}</td>
                                    <td>
                                        <button @click="open = true">Edit</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Edit Modal HTML -->
            <!-- <div id="addEmployeeModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form>
                            <div class="modal-header">
                                <h4 class="modal-title">Add Employee</h4>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                <input type="submit" class="btn btn-success" value="Add">
                            </div>
                        </form>
                    </div>
                </div>
            </div> -->
            <!-- Delete Modal HTML -->
            <!-- <div id="deleteEmployeeModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form>
                            <div class="modal-header">
                                <h4 class="modal-title">Delete Employee</h4>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to delete these Records?</p>
                                <p class="text-warning"><small>This action cannot be undone.</small></p>
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </div>
                        </form>
                    </div>
                </div>
            </div> -->
            <!-- Modal Test -->
            <!-- <Teleport to="body">
                <div v-if="open" class="modal">
                    <p>Hello from the modal!</p>
                    <button @click="open = false">Close</button>
                </div>
            </Teleport> -->
        </body>

        </html>
    </main>
</template>
