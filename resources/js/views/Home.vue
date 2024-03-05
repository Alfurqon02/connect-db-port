<script setup>
import { onMounted, ref } from "vue";
import axios from "axios";

let items = ref([]);
let categories = ref([]);

onMounted(async () => {
    const response = await axios.get("/api/getData");
    items.value = response.data.items;
    console.log(items.value);

    const responseCategories = await axios.get("/api/getCategories");
    categories.value = responseCategories.data.categories;
    console.log(categories.value);
});

const editItem = async (nameEdit, stockEdit, id_categoryEdit) => {
    let formData = new FormData();
    formData.append("name", nameEdit);
    formData.append("stock", stockEdit);
    formData.append("id_category", id_categoryEdit);
    alert("Edit item");
    try {
        alert("Edit item");
        const response = await axios.post(
            `/api/editItem/${props.id}`,
            formData,
            {
                headers: {
                    "Content-Type": "multipart/form-data",
                },
            },
        );
        console.log(response.data);
        alert("Item edited");
    } catch (error) {
        alert("Edit item");
        console.error(error.response.data);
        alert("Error editing item");
    }
};

const deleteItem = async (id) => {
    try {
        const response = await axios.delete(`/api/deleteItem/${id}`);
        console.log(response.data);
        alert("Item deleted");
    } catch (error) {
        console.error(error.response.data);
        alert("Error deleting item");
    }
};

const createItem = async (nameCreate, stockCreate, id_categoryCreate) => {
    let formData = new FormData();
    formData.append("name", nameCreate.value);
    formData.append("stock", stockCreate.value);
    formData.append("id_category", id_categoryCreate.value);

    try {
        const response = await axios.post("/api/createItem", formData, {
            headers: {
                "Content-Type": "multipart/form-data",
            },
        });
        console.log(response.data);
        alert("Item created");
    } catch (error) {
        console.error(error.response.data);
        alert("Error creating item");
    }
};
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
                                            <button
                                                @click="
                                                    showModal(
                                                        item.id,
                                                        item.name,
                                                        item.stock,
                                                        item.categories.id,
                                                    )
                                                "
                                            >
                                                Edit
                                            </button>
                                            <button
                                                @click="deleteItem(item.id)"
                                            >
                                                Delete
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
                        <div>
                            <p>Name:</p>
                            <input type="text" v-model="nameEdit" />
                            <br /><br />
                            <br /><br />
                            <p>Stock:</p>
                            <input type="text" v-model="stockEdit" />
                            <br /><br />
                            <br /><br />
                            <p>Category:</p>
                            <select v-if="categories" v-model="id_categoryEdit">
                                <option
                                    v-for="category in categories"
                                    :key="category.id"
                                    :value="category.id"
                                >
                                    {{ category.name }}
                                </option>
                            </select>
                        </div>
                    </template>
                    <template v-slot:footer>
                        <button
                            @click="
                                editItem(nameEdit, stockEdit, id_categoryEdit)
                            "
                        >
                            Edit
                        </button>
                    </template>
                </Modal>
                <Modal v-show="isCreateModalVisible" @close="closeCreateModal">
                    <template v-slot:header>
                        <h2>Create Item</h2>
                    </template>
                    <template v-slot:body>
                        <div>
                            <p>Name:</p>
                            <input type="text" v-model="nameCreate" />
                            <br /><br />
                            <br /><br />
                            <p>Stock:</p>
                            <input type="text" v-model="stockCreate" />
                            <br /><br />
                            <br /><br />
                            <p>Category:</p>
                            <select
                                v-if="categories"
                                v-model="id_categoryCreate"
                            >
                                <option
                                    v-for="category in categories"
                                    :key="category.id"
                                    :value="category.id"
                                >
                                    {{ category.name }}
                                </option>
                            </select>
                        </div>
                    </template>
                    <template v-slot:footer>
                        <button
                            @click="
                                createItem(
                                    nameCreate,
                                    stockCreate,
                                    id_categoryCreate,
                                )
                            "
                        >
                            Create
                        </button>
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
        showModal(id, name, stock, category) {
            this.isModalVisible = true;
            this.itemId = id;
            this.nameEdit = name;
            this.stockEdit = stock;
            this.id_categoryEdit = category;
        },
        closeModal() {
            this.isModalVisible = false;
        },
        showCreateModal() {
            this.isCreateModalVisible = true;
            this.nameCreate = "";
            this.stockCreate = "";
            this.id_categoryCreate = "";
        },
        closeCreateModal() {
            this.isCreateModalVisible = false;
        },
    },
};
</script>
