<script setup>
import { onMounted, ref } from "vue";
import axios from "axios";

let items = ref([]);

onMounted(async () => {
    const response = await axios.get("/api/getData");
    items.value = response.data.items;
    console.log(items.value);
});
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
                                    <div
                                        class="col-xs-6 container d-flex justify-content-end text-black pe-5"
                                    >
                                        <button @click="showCreateModal">
                                            Add New
                                        </button>
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
                                            <button @click="showModal(10)">
                                                Edit
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <Modal v-show="isModalVisible" @close="closeModal">
                    <template v-slot:header>
                        <h2>Edit Item {{ itemId }}</h2>
                    </template>
                    <template v-slot:body>
                        <div>Edit</div>
                    </template>
                    <template v-slot:footer>
                        <button @click="closeModal">Edit</button>
                    </template>
                </Modal>
                <Modal v-show="isCreateModalVisible" @close="closeCreateModal">
                    <template v-slot:header>
                        <h2>Create Item</h2>
                    </template>
                    <template v-slot:body>
                        <div>Create</div>
                    </template>
                    <template v-slot:footer>
                        <button @click="closeModal">Create</button>
                    </template>
                </Modal>
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
            isCreateModalVisible: false,
            itemId: 0,
        };
    },
    methods: {
        showModal(id) {
            this.isModalVisible = true;
            this.itemId = id;
        },
        closeModal() {
            this.isModalVisible = false;
        },
        showCreateModal() {
            this.isCreateModalVisible = true;
        },
        closeCreateModal() {
            this.isCreateModalVisible = false;
        },
    },
};
</script>
