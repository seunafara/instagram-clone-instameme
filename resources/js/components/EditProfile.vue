

<template>

    <div class="container">
        <link
                href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
                rel="stylesheet"
        />

        <div class="row">
            <!-- <not-found></not-found> -->
            <div
                    class="col-12 col-lg-8 m-auto"
                    style="margin-top:30px !important; margin-bottom: 10px !important;"
            >
                <form class="multisteps-form__form">
                    <div
                            class="multisteps-form__panel shadow p-4 rounded bg-white js-active"
                            data-animation="scaleIn"
                    >
                        <h3 class="multisteps-form__title">Edit Your Profile</h3>
                        <hr style="width: 65px !important" />

                        <div class="container">
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type="file" @change="uploadPicture" id="image" accept=".png, .jpg, .jpeg" />
                                    <label for="image"></label>
                                </div>
                                <div class="avatar-preview">
                                    <div
                                            id="imagePreview"
                                            :style="{ 'background-image': 'url(' + getProfilePhoto() + ')' }"
                                    ></div>
                                </div>
                            </div>
                        </div>

                        <div class="multisteps-form__content">
                            <div class="form-row mt-4">
                                <div class="col-12 col-sm-6">
                                    <label >Full Name</label>
                                    <input
                                            autocomplete="off"
                                            class="multisteps-form__input form-control"
                                            type="text"
                                            v-model="form.name"
                                            placeholder="Full Name"
                                    />
                                </div>
                                <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                    <label >Email Address</label>
                                    <input
                                            autocomplete="off"
                                            class="multisteps-form__input form-control"
                                            type="text"
                                            v-model="form.email"
                                            placeholder="Email Address"
                                    />
                                </div>
                            </div>
                            <div class="form-row mt-4">
                                <div class="col-12">
                                    <label for="bio">Bio</label>
                                    <textarea
                                            style="height: 150px !important;"
                                            name="bio"
                                            id="bio"
                                            cols="30"
                                            v-model="form.bio"
                                            rows="10"
                                            class="multisteps-form__input form-control"
                                    ></textarea>
                                </div>
                            </div>
                            <div class="form-row mt-4">
                                <div class="col-12 col-sm-6" >
                                    <label>Password (Leave blank to remain unchanged)</label>
                                    <input
                                            class="multisteps-form__input form-control"
                                            type="password"
                                            v-model="form.password"
                                            placeholder="Enter New Password"
                                    />
                                </div>

                                <div class="col-12 col-sm-6 mt-4 mt-sm-0" >
                                    <label>Username</label>
                                    <input
                                            class="multisteps-form__input form-control"
                                            type="text"
                                            v-model="form.username"
                                            placeholder="Enter New Username"
                                    />
                                </div>
                            </div>

                            <div class="button-row d-flex mt-4">
                                <button
                                        class="btn btn-primary ml-auto js-btn-next"
                                        @click.prevent="updateInfo"
                                        type="button"
                                        title="Save"
                                >Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
      data(){
        return {
          form: new Form({
            id: "",
            name: "",
            email: "",
            bio: "",
            username: "",
            photo: "",
            password: ""
          })
        
        }
      },
      methods:{
          getProfilePhoto() {
              let photo =
                  this.form.photo.length > 200
                      ? this.form.photo
                      : "img/profile/" + this.form.photo;
              return photo;
          },
          uploadPicture(e) {
              // console.log('uploading');
              let file = e.target.files[0];
              // console.log(file);
              let reader = new FileReader();

              if (file) {
                  if (file["size"] < 2111775) {
                      reader.onloadend = file => {
                          // console.log('RESULT', reader.result)
                          this.form.photo = reader.result;
                      };

                      reader.readAsDataURL(file);
                      // console.log(file['size']);
                  } else {
                      // swal.fire({
                      //     icon: "error",
                      //     title: "Oops...",
                      //     text: "Image cannot be more than 2 megabytes"
                      // });
                  }
              }
          },
        getUser(){
          axios.get('api/getuser').then(({data}) => this.form.fill(data))
        },
          updateInfo() {
              this.$Progress.start();
              this.form
                  .put("api/profile/")
                  .then(() => {
                      // success
                      Swalla.fire("Updated!", "Your profile has been updated.", "success");

                      this.$Progress.finish();
                  })
                  .catch(() => {
                      this.$Progress.fail();
                  });
          }


      },
      created() {
        this.getUser();

      },
        mounted() {

        }
    }
</script>


