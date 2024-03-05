<script setup>
import { onMounted, ref } from "vue";
import axios from "axios";

const open = ref(false);
let items = ref([]);
// let props = defineProps(['id'])
// let name = ref([])
// let stock = ref([])
// let category = ref([])
// const router = useRouter()

onMounted(async () => {
    const response = await axios.get("/api/getData");
    items.value = response.data.items;
    console.log(items.value);
});

async function editItem() {}

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
        <!doctype html>
        <html lang="en">
            <head>
                <meta charset="utf-8" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                <meta
                    name="viewport"
                    content="width=device-width, initial-scale=1"
                />
                <title>
                    Bootstrap CRUD Data Table for Database with Modal Form
                </title>
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
                                        <a
                                            href="#addEmployeeModal"
                                            class="btn btn-success"
                                            data-toggle="modal"
                                            ><i class="material-icons"
                                                >&#xE147;</i
                                            >
                                            <span>Add New Item</span></a
                                        >
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
                                            <button @click="showModal">
                                                Edit
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <Modal v-show="isModalVisible" @close="closeModal" />
            </body>
        </html>
    </main>
</template>

<script>
import Modal from "./components/Modal.vue";

export default {
    components: {
        Modal,
    },
    data() {
        return {
            isModalVisible: false,
        };
    },
    methods: {
        showModal() {
            this.isModalVisible = true;
        },
        closeModal() {
            this.isModalVisible = false;
        },
    },
};
</script>
