<template>
    <div class="container">
        <div class="instagram-feed" v-for="photo in photos" :key="photos.id">
            <section class="instagram-username">
                <div class="instagram-image">
                    <a href="#"
                    ><img
                            :src="'/img/profile/' + photo.user.photo"
                        /></a>
                </div>
                <div class="insta-id">
                    <p>{{photo.user.username}}</p>
                </div>
            </section>

            <!-- actual post start-->

            <section class="instagram-post">
                <img
                        class="img-responsive"
                        :src="'/img/photo/' + photo.photo"
                />
            </section>
            <section class="btn-group">
                <button type="button" class="btn-love">
                    <i class="material-icons">favorite_border</i>
                </button>
                <!-- <button type="button" class="btn-comment">
                    <i class="far fa-comment fa-lg"></i>
                  </button> -->
<!--                <button type="button" class="btn-share">-->
<!--                    <i class="fas fa-share-alt fa-lg "></i>-->
<!--                </button>-->
            </section>
            <section class="caption">
                <p class="insta-like">{{photo.likes}} likes</p>

                <p>
                    <b><a class="insta-id" href="#">{{photo.user.username}}</a></b>
                   {{photo.caption}}
                </p>
                <p class="time">5 minutes ago</p>
            </section>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                photos: {}
            }
        },
        methods: {
            loadPhotos(){

                axios.get('api/photo')
                    .then(({data}) => {(this.photos = data.data);})
                    .catch((err)=>{
                        console.log(err)
                    });
            },
        },
        mounted() {
            this.$Progress.start();
            this.loadPhotos();
            this.$Progress.finish();
        }
    }
</script>
