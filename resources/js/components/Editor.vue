<style>
@import url("https://cdn.quilljs.com/1.3.6/quill.bubble.css");
</style>

<script>
  import Quill from 'quill';

    export default {
        props: {
            value: {
                type: String,
                default: ''
            }
        },

        data() {
            return {
                editor: null,
                text: ''
            };
        },
        mounted() {
            this.editor = new Quill(this.$refs.editor, {
                modules: {
                    toolbar: [
                        [{ header: [1, 2, 3, 4, false] }],
                        ['bold', 'italic', 'underline']
                    ]
                },
                theme: 'bubble',
                formats: ['bold', 'underline', 'header', 'italic']
            });

            this.editor.root.innerHTML = this.value;

            this.editor.on('text-change', () => this.update());
        },

        methods: {
            update() {
                this.$emit('input', this.editor.getText() ? this.editor.root.innerHTML : '');
                this.text = this.editor.getText()
            }
        }
    }
</script>
<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Editor Component</div>

                    <div class="card-body" ref="editor">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
