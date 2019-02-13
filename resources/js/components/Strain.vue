<template>
<div class="row">
    <div class="container">
        <button @click.prevent="toggleIndex" id="create" class="btn btn-warning">
            <span v-if="index">Create</span>
            <span v-if="! index">Index</span>
        </button>
        <div v-if="! index">
            <button @click.prevent="createNewContentItem" class="btn btn-primary" :disabled="! newContentItem.name">
                New
            </button>
        </div>
        <table v-show="index" class="table table-striped table-inverse">
            <thead class="thead-inverse">
            <tr>
                <th>Title</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody class="resource-list">
            <tr v-for="content in contents" v-bind:key="content.id" class="table-hover">
                <td><strong>{{ content.name }}</strong></td>
                <td><button @click.prevent="(edit(content.id))" role="button" class="btn btn-warning">Edit</button></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="container">
        <hr>
        <form class="form-horizontal new-content" v-if="! index" role="form" enctype="multipart/form-data">
                                <!-- Header Photo Button -->
            <div class="form-group">
                <div class="container">
                    <label type="button" class="btn btn-primary btn-upload" :disabled="newContentItem.busy">
                        <span>Select Header Photo</span>
                        <input v-validate="'mimes:jpg,jpeg,png,gif'" ref="image" type="file" class="form-control" name="image" v-on:change="getImage()">
                    </label>
                    <span class="help">This is optional, a default picture will be placed.</span><br>
                    <span v-show="errors.has('image')" class="help is-danger">{{ errors.first('image') }}</span>
                    <div role="img" class="header-photo-preview"
                         :style="previewStyle">

                    </div>
                </div>
            </div>
            <div class="form-group">
                <div v-show="newContentItem.id" class="col-md-2 hidden-sm hidden-xs">
                    <button :class="{'btn': true, 'btn-primary': true, 'is-danger': newContentItem.saveError }" @click.prevent="update" :disabled="newContentItem.saved">
                            <span v-if="newContentItem.saveBusy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>Updating
                             </span>
                            <span v-else-if="newContentItem.saved">
                                <i class="fa fa-btn fa-check-circle"></i>Saved!
                             </span>
                        <span v-else-if="newContentItem.saved === false">
                                <i class="fa fa-btn fa-check-circle"></i>Update
                             </span>
                            <span v-else>
                                <i class="fa fa-btn fa-check-circle"></i>Updated
                            </span>
                    </button>
                </div>
                <div v-show="! newContentItem.id" class="col-md-2 hidden-sm hidden-xs">
                    <button :class="{'btn': true, 'btn-primary': true, 'is-danger': newContentItem.saveError }" @click.prevent="save" :disabled="newContentItem.saved || newContentItem.saveBusy">
                            <span v-if="newContentItem.saveBusy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>Saving
                             </span>
                            <span v-else-if="newContentItem.id !== null">
                                <i class="fa fa-btn fa-check-circle"></i>Saved!
                             </span>
                            <span v-else>
                                <i class="fa fa-btn fa-check-circle"></i>Save
                            </span>
                    </button>
                </div>
                <div class="col-md-2 hidden-sm hidden-xs">
                    <button @click.prevent="leeroyjenkins" :class="{'btn': true, 'btn-danger': true, }" :disabled="! newContentItem.id">
                        Delete
                    </button>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12"><p>Name:</p>
                    <input v-validate="'required|min:2|max:140'" id="name" name="name" v-model="newContentItem.name"
                           :class="{'form-control': true, 'input': true, 'is-danger': errors.has('name') }" type="text" placeholder="name"
                           style="width:100%">
                    <span v-show="errors.has('name')" class="help is-danger">{{ errors.first('name') }}</span>

                </div>
                <div class="col-md-12">
                    <br>
                        <p>Slug: <span class="help is-success">{{ newContentItem.slug }}</span><br>
                        <span name="slug" v-show="errors.has('slug')" class="help is-danger">
                            {{ newContentItem.slug }}
                        </span>
                    </p>
                </div>
            </div>


            <div class="form-group">
                <div class="col-md-12">
                    <p>Description:</p><small>(optional)</small>
                    <trumbowyg id="trumbowyg" :config="trumbowygConfig" name="description" v-model="newContentItem.description"></trumbowyg>
                </div>
            </div>

            <div class="form-group">
                <div v-show="! newContentItem.id" class="col-md-2 col-sm-12">
                    <button :class="{'btn': true, 'btn-primary': true, 'is-danger': newContentItem.saveError }" @click.prevent="save" :disabled="newContentItem.saved || newContentItem.saveBusy ">
                            <span v-if="newContentItem.saveBusy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>Saving
                             </span>
                            <span v-else-if="newContentItem.id !== null">
                                <i class="fa fa-btn fa-check-circle"></i>Saved!
                             </span>
                            <span v-else>
                                <i class="fa fa-btn fa-check-circle"></i>Save
                            </span>
                    </button>
                </div>
                <div class="col-md-2 col-sm-12">
                    <button @click.prevent="leeroyjenkins" :class="{'btn': true, 'btn-danger': true }" :disabled="! newContentItem.id">
                        Delete
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</template>

<script>
"use strict"
// Import this component
import trumbowyg from 'vue-trumbowyg';

import VeeValidate from 'vee-validate';
Vue.use(VeeValidate);
export default {
    props: ['user', 'content_type'],
    validator: null,
    data() {
        return {
            csrf: '',
            index: true,
            contents: null,
            contentType: this.content_type,
            newContentItem:  {
                image: null,
                name: '',
                description: '',
                slug: '',
                breeder: '',
                link: '',
                id: null,
                saveBusy: false,
                saveError: false,
                saved: true,
                serverErrors: null,
                publicationId: null,
                errors: null
            },
            trumbowygConfig: {
                id: 'trumbowyg',
                autogrow: true,
                svgPath: '/images/vendor/trumbowyg/dist/ui/icons.svg',
                btnsDef: {
                    image: {
                        dropdown: ['insertImage', 'upload'],
                        ico: 'insertImage'
                    }
                },
                btns: [
                    ['viewHTML'],
                    ['formatting'],
                    ['strong', 'em', 'underline'],
                    ['link'],
                    ['image'],
                    ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                    ['unorderedList', 'orderedList'],
                    ['horizontalRule'],
                    ['removeformat']
                ],
                plugins: {
                    upload: {
                        serverPath: '/cms/images',
                        fileFieldName: 'image',
                        urlPropertyName: 'large',
                        headers: {
                            'X-CSRF-TOKEN': this.csrf,
                        },
                        xhrFields: {}
                    },
                }
            }
        }
    },
    mounted() {
        this.getIndex()
        let csrf = window.axios.defaults.headers.common['X-CSRF-TOKEN']
    },
    components: {
        trumbowyg
    },
    watch: {
        name(value) {
            this.validator.validate('name', value);
        },
        description(value) {
            this.validator.validate('description', value);
        },

        /**
            * Watch the name and create slug.
        */
        'newContentItem.name': function (val, oldVal) {

            if (this.newContentItem.id === null) {
                if ( this.newContentItem.slug === '' ||
                        this.newContentItem.slug == this.makeSlug(oldVal)
                ) {
                    this.newContentItem.slug = this.makeSlug(val)
                }
            }
            this.newContentItem.saved = false
        },
        'newContentItem.description': function (val, oldVal) {
            this.newContentItem.saved = false
        },
    },
    methods: {
        makeSlug(inputString) {
            return inputString.toLowerCase().trim().replace(/[\s\W-]+/g, '-')
        },

        getIndex() {
            axios.get('/api/strains', {})
            .then(result  => {
                this.contents = result.data
                return this.contents
            })
            .catch(error => {
                return Promise.reject(error)
            })
        },
        toggleIndex() {
            if(this.index == true) {
                return this.index = false
            }
            this.getIndex()
            return this.index = true
        },

        save() {
            this.newContentItem.saveError = false
            this.newContentItem.saveBusy = true
            this.validator.validateAll({
                name: this.newContentItem.name,
                description: this.newContentItem.description,
                slug: this.newContentItem.slug
                }).then((result) => {
                    axios.post('/api/' + this.contentType + '/', {
                                name: this.newContentItem.name,
                                image: this.newContentItem.image,
                                slug:  this.newContentItem.slug,
                                description:  this.newContentItem.description
                            })
                            .then(result  => {
                                this.newContentItem.saveBusy = false
                                this.newContentItem.saved= true
                                this.newContentItem.id = result.data.id
                                swal({
                                    title: 'SUCCESS!',
                                    text: 'The content was saved.',
                                    type: 'success',
                                    timer: 2000
                                });
                                return result
                            })
                            .catch(error => {
                                this.newContentItem.saveError = true
                                this.newContentItem.saveBusy = false
                                var saveErrors = error.response.data.errors
                                var thisError = error.response.data.errors[Object.keys(saveErrors) [0]]
                                swal({
                                    title: 'SAVE FAILED!',
                                    text: thisError,
                                    type: 'error',
                                    timer: 3000,
                                });
                                return Promise.reject(error)
                            })
                        })
            .catch(error => {
                this.newContentItem.saveBusy = false
                this.newContentItem.saveError = true
                var saveErrors = error.response.data.errors
                var thisError = error.response.data.errors[Object.keys(saveErrors) [0]]
                this.errors = Promise.reject(error)
                swal({
                    title: 'SAVE FAILED!',
                    text: thisError,
                    type: 'error',
                    timer: 3000,
                });
                return Promise.reject(error)
            })
        },
        update() {
            axios.put('/api/' + this.contentType  + '/'+ this.newContentItem.id, this.newContentItem)
            .then(result  => {
                this.newContentItem.saveBusy = false
                this.newContentItem.saved = true
                swal({
                    title: 'SUCCESS!',
                    text: 'The content was updated.',
                    type: 'success',
                    timer: 2000
                });
                return result
            })
            .catch(error => {
                this.newContentItem.saveError = true
                this.newContentItem.saveBusy = false
                var saveErrors = error.response.data.errors
                var thisError = error.response.data.errors[Object.keys(saveErrors) [0]]
                swal({
                    title: 'UPDATE FAILED!',
                    text: thisError,
                    type: 'error',
                    timer: 3000,
                });
                return Promise.reject(error)
            })
        },

        leeroyjenkins() {
            if(confirm("Permanently destroy this content?")) {
                axios.delete('/api' + this.contentType + '/' + this.newContentItem.id, {})
                .then(result  => {
                    this.clear()
                })
                .catch(error => {
                    return Promise.reject(error)
                });
            }
        },
        startProcessing() {
            this.saveBusy = true;
        },
        stopProcessing() {
            this.saveBusy = false;
        },
        /**
         * Update the showcase photo.
         */
        getImage(e) {
            e.preventDefault();

            if ( ! this.$refs.image.files.length) {
                return;
            }
            console.log(this.$refs.image.files[0])
            return this.newContentItem.image = this.$refs.image.files[0];

            // var self = this;

            // this.startProcessing();

            // We need to gather a fresh FormData instance with the profile photo appended to
            // the data so we can POST it up to the server. This will allow us to do async
            // uploads of the profile photos. We will update the user after this action.
            // axios.post(this.urlForUpdate, this.gatherFormData())
            //     .then(result  => {
            //         this.newContentItem.image = result.data.large
            //         this.newContentItem.thumbnail = result.data.thumbnail
            //         this.newContentItem.image_id = result.data.image_id
            //         self.finishProcessing();
            //     },
            //     (error) => {
            //         self.newContentItem.setErrors(error.response.data.errors);
            //     }
            // );
            // this.stopProcessing();
        },
        /**
         * Gather the form data for the photo upload.
         */
        gatherFormData() {
            const data = new FormData();

            data.append('newContentItem.image', this.$refs.image.files[0]);

            return data;
        },
        createNewContentItem() {
            if (!this.newContentItem.id) {
                if (confirm('Abandon this content and start over?')) {
                    this.clear()
                }
            } else {
                this.clear()
            }
        },
        clear() {
            this.newContentItem = {
                image: null,
                name: '',
                slug: '',
                description: '',
                link: '',
                id: null,
                saveBusy: false,
                saveError: false,
                saved: true,
                serverErrors: null,
                publishBusy: false,
                published: null,
                publicationId: null,
                errors: null
            }
        },
        edit(id) {
            this.saveBusy = true
            this.index = false
            this.newContentItem.id = id
            axios.get('/api/' + this.contentType + '/' + id , {})
            .then(result => {
                this.newContentItem = result.data;
                this.saveBusy = false
                this.newContentItem.saved = true

                return result.data
                })
            .catch(error => {
                return Promise.reject(error)
            })
        },
    },

    created() {
        this.validator = new VeeValidate.Validator({
            name: 'required|min:2',
            description: 'required|min:40',
            slug: 'required'
        });
    },
    computed: {
        /**
         * Get the URL for updating the team photo.
         */
        urlForUpdate() {
            return '/api/photo';
        },
        /**
         * Calculate the style attribute for the photo preview.
         */
        previewStyle() {
            if (this.newContentItem.image == '' ) {
                return `background-image: url(${this.newContentItem.image});`;
            }
            return `background-image: url(${this.newContentItem.image}); `;
        }
    },
}
</script>
<style>
@import url('https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.14.0/ui/trumbowyg.min.css');
    .help.is-danger {
    color : #ef6f6c;
    }
    .btn.is-danger {
    border-color: #ef6f6c;
    outline: 0;
    box-shadow: inset 0 0 2px red, 0 0 4px red;
    }
    .btn.btn-warning.is-success {
    border-color: #0A8A4A;
    outline: 0;
    box-shadow: inset 0 0 2px #0A8A4A, 0 0 4px #0A8A4A;
    background-color:transparent;
    color: #0A8A4A;
    }
    .btn-warning.disabled:hover, .btn-warning[disabled]:hover,
    fieldset[disabled] .btn:hover,
    .btn.disabled:focus, .btn[disabled]:focus,
    fieldset[disabled] .btn:focus {
    background-color:transparent;
    border:none;
    outline: 0;
    }
    input.is-danger, textarea.is-danger {
    border-color: #ef6f6c;
    outline: 0;
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(239, 111, 108, 0.6);
    }
    .ql-container.ql-snow {
    border-bottom-left-radius: 4px;
    border-bottom-right-radius: 4px;
    }
    .ql-toolbar.ql-snow {
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
    }
    @media (max-width: 991px) {
        .new-content .btn
        {
            width:100%;
            padding:1.34em;
            margin: 0.66em 0;
        }
    }
    .content-index {
        position:relative;
        display:block
    }
    .btn-warning.disabled:hover,
    .btn-warning[disabled]:hover,
    fieldset[disabled] .btn:hover,
    .btn.disabled:focus,
    .btn[disabled]:focus,
    fieldset[disabled] .btn:focus {
        background-color:transparent !important;
    }
</style>
