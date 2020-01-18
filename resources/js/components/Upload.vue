<template>
    <div class="container">
        <form >
        <div class="instagram-feed" style="padding: 15px 15px 15px 15px">

                <div class="form-group">
                    <label>Upload a Photo</label>
                    <div class="col-sm-12" style="padding-left: 0px !important;">
                        <input  @change="uploadPicture" type="file" name="file-input" id="file-input">
                    </div>
                </div>


            <div class="form-group">
                <label for="caption">Caption</label>
                <textarea
                        style="height: 150px !important;"
                        name="caption"
                        id="caption"
                        v-model="form.caption"
                        cols="30"
                        rows="10"
                        class="multisteps-form__input form-control"
                ></textarea>
            </div>

            <button
                    class="btn btn-primary btn-lg"
                    type="button"
                    @click="createPost"
                    title="upload"
            >Upload</button>
        </div>
        </form>

    </div>


</template>

<script>
    export default {
        data(){
            return {
                form: new Form({
                    id: '',
                    caption: '',
                    photo: ''
                })
            }
        },
        methods: {
            uploadPicture(e){
                // console.log('uploading');
                let file = e.target.files[0];
                // console.log(file);
                let reader = new FileReader();

                if(file) {
                    if (file['size'] < 2111775) {
                        reader.onloadend = (file) => {

                            // console.log('RESULT', reader.result)
                            this.form.photo = reader.result;
                        }

                        reader.readAsDataURL(file)
                        // console.log(file['size']);
                    } else {
                        // swal.fire({
                        //     icon: 'error',
                        //     title: 'Oops...',
                        //     text: 'Image cannot be more than 2 megabytes'
                        // })
                    }
                }



            },
            createPost() {
                this.$Progress.start();
                this.form.post('api/photo').then(() => {
                    this.form.reset();
                    console.log('created');
                    // show sweet alert notification
                    // success
                    // Swalla.fire(
                    //     'Success!',
                    //     'Photo has been added.',
                    //     'success'
                    // )
                    toast.fire({
                        icon: 'success',
                        title: 'Photo added successfully'
                    })
                    this.$Progress.finish();
                    this.$router.push('home');
                }).catch(() => {
                    this.$Progress.fail();
                });
            }
        },
        mounted() {
        }
    }
</script>
