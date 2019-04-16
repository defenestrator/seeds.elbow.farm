<script>
var Vue = require('vue');
var axios = require('axios');

export default {
    props: {
        initial_profile: Object,
        initial_user: Object
    },
    data() {
        return {
            baseProfileUrl: '/profile',
            avatarUpdate: '/image',
            image: null,
            user: this.initial_user,
            profile: this.initial_profile,
            headers: {
                    'Content-Type': 'multipart/form-data'
                },
            formBusy: false,
        }
    },
    methods: {
        toggleForm() {
            if( this.formBusy === false) {
                return this.formBusy = true
            }
            return this.formBusy = false
        },
        updateProfile() {
            this.formBusy = true
            let data = {
            'avatar': this.profile.avatar,
            'user_title': this.profile.user_title,
            'chuckers_paradise': this.profile.chuckers_paradise,
            'facebook_url': this.profile.facebook_url,
            'riu_username': this.profile.riu_username,
            'instagram_handle': this.profile.instagram_handle,
            'public': this.profile.public,
            'user_id': this.profile.user_id
            }

            axios.put(this.baseProfileUrl, data, this.headers)
            .then(response => {
                Promise.resolve(response)
                this.toggleForm()
                return swal({
                    title: 'updated!',
                    text: 'profile',
                    icon: 'success',
                    button: {
                        text: "Aww yiss!",
                        color:'#7cd1f9'
                        },
                    timer: 3000
                    })
            })
            .catch(error => {
            })
        },
        updateName() {
            this.formBusy = true
            axios.put('/user/'+ this.user.id,
                {'name': this.user.name},
                {'Content-Type': 'application/json'})

            .then(response => {
                Promise.resolve(response)
                this.toggleForm()
                return swal({
                    title: 'updated!',
                    text: 'user name',
                    icon: 'success',
                    button: "Aww yiss!",
                    timer: 3000
                    })
            })
            .catch(error => {
            })
        },
        updateAvatar() {
            this.formBusy = true
            let formData = new FormData()
            this.image = this.$refs.avatar.files[0];
            formData.append('image', this.image)
            formData.append('imageable_type', "Heisen\\Profile")
            formData.append('imageable_id', this.profile.id)
            this.previewFile()

            axios.post(this.avatarUpdate, formData, this.headers)
            .then(response => {
                this.profile.avatar = response.data.large
                Promise.resolve(response)
                swal({
                    title: 'updated!',
                    text: 'avatar',
                    icon: 'success',
                    button: "Aww yiss!",
                    timer:1500
                })
                this.updateProfile()
                this.formBusy = false
                return Promise.resolve(response)
            })
            .catch(error => {
                this.formBusy = false
                return Promise.reject(error)
            })
        },
        previewFile() {
            var preview = document.querySelector('#preview');
            var reader = new FileReader();

            reader.addEventListener("load", function () {
                preview.src = reader.result
                preview.style = 'width:100%;'
                preview.classList = 'info'
            }, false);

            if (this.image) {
                reader.readAsDataURL(this.image);
            }
        }
    }
}

</script>

<template>
<div class="container">

    <div class="row">
        <div class="col-sm-4 justify-content-right info">
            <img style="max-width:280px;" id="preview" :src="profile.avatar" />
        </div>
        <div class="col-sm-8">

            <form class="form-horizontal new-content"
            role="form"
            enctype="multipart/form-data">
                <div class="form-group row col-md-12">
                    <label class="btn btn-outline-gray btn-file">
                        Change Image
                        <input ref="avatar"
                        type="file"
                        style="display: none;"
                        v-on:change="updateAvatar()"
                        name="image" :disabled="formBusy">
                    </label>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <p>Chucker's Paradise user name:</p>
                        <input id="chuckers_paradise"
                        name="chuckers_paradise"
                        class="form-control input"
                        type="text"
                        v-model="profile.chuckers_paradise">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <p>Facebook URL</p>
                        <input id="facebook_url"
                        name="facebook_url"
                        class="form-control input"
                        type="text"
                        placeholder="Facebook URL"
                        v-model="profile.facebook_url">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <p>Instagram handle:</p>
                        <input id="instagram_handle"
                        name="instagram_handle"
                        class="form-control input"
                        type="text"
                        placeholder="Instagram Handle"
                        v-model="profile.instagram_handle">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <p>RollItUp.org user name:</p>
                        <input id="riu_username"
                        name="riu_username"
                        class="form-control input"
                        type="text"
                        placeholder="RIU User name"
                        v-model="profile.riu_username">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <p>User Title:</p>
                        <input id="user_title"
                        name="user_title"
                        class="form-control input"
                        type="text"
                        v-model="profile.user_title">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <label class="form-check-label" for="public">Make Profile Public?</label>
                        <input v-model="profile.public" class="form-check-inline" type="checkbox" name="public" id="public" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <button style="width:100%;" class="btn btn-primary" v-on:click.prevent.stop="updateProfile()" :disabled="formBusy">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8 offset-sm-4">
            <form class="form-horizontal new-content">
                <div class="form-group row">
                    <div class="col-md-12">
                        <p>Screen Name:</p>
                        <input id="screen_name"
                        name="screen_name"
                        class="form-control input"
                        type="text"
                        v-model="user.name">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <button
                        style="width:100%;" class="btn btn-primary"
                        v-on:click.prevent.stop="updateName()" :disabled="formBusy">Update Screen Name</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</template>
<style>
.formBusy{
          background: #ccc;
       }
</style>

