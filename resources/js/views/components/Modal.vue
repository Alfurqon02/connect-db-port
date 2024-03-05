<template>
    <div>
        <div class="modal-backdrop">
            <div class="modal">
                <header class="modal-header">
                    <slot name="header">This is the default title!</slot>
                    <button
                        type="button"
                        class="btn-close"
                        @click="close"
                    ></button>
                </header>

                <section class="modal-body">
                    <slot name="body">This is the default body!</slot>
                </section>

                <footer class="modal-footer">
                    <slot name="footer">This is the default footer!</slot>
                </footer>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Modal",
    methods: {
        close() {
            this.$emit("close");
        },
    },
};
</script>

<style>
.modal-backdrop {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    background: rgba(0, 0, 0, 0.3); /* Semi-transparent background */
}

.modal {
    background: #ffffff;
    box-shadow: 2px 2px 20px 1px;
    overflow-x: auto;
    display: flex;
    flex-direction: column;
    width: 85%;
    height: 85%;
    margin-left: 7.5%;
    margin-top: 3.75%;
}
</style>
