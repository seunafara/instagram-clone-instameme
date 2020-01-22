<template>
    <div class="container">
        <div class="instagram-feed" v-for="photo in list" :key="photo.id">
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

            <section class="instagram-post"  style="position: relative">
                <img
                        class="img-responsive"
                        :src="'/img/photo/' + photo.photo"

                        v-on:dblclick="likePhoto(photo.id, photo.likes)"
                />

                <i class="material-icons" :id="'lovelike'+photo.id" style="color: whitesmoke; position:absolute;top:33%;left:30%;font-size:160px;display: none">favorite</i>
            </section>
            <section class="btn-group">
                <button type="button" class="btn-love" @click="likePhoto(photo.id, photo.likes)">
                    <i class="material-icons"  :id="'favorite_love'+photo.id">favorite_border</i>
                </button>

                <!-- <button type="button" class="btn-comment">
                    <i class="far fa-comment fa-lg"></i>
                  </button> -->
<!--                <button type="button" class="btn-share">-->
<!--                    <i class="fas fa-share-alt fa-lg "></i>-->
<!--                </button>-->
            </section>
            <section class="caption">
                <p class="insta-like" :id="'insta-like'+photo.id">{{photo.likes}}<span> likes</span></p>

                <p>
                    <b><a class="insta-id" href="#">{{photo.user.username}}</a></b>
                   {{photo.caption}}
                </p>
                <p class="time">5 minutes ago</p>
            </section>
        </div>
        <infinite-loading spinner="waveDots" @infinite="infiniteHandler">
            <span slot="no-more"></span>
        </infinite-loading>
    </div>
</template>

<script>
    import InfiniteLoading from 'vue-infinite-loading';
    export default {
        components: {
            InfiniteLoading,
        },
        data(){
            return {
                page: 1,
                list: [],
            }
        },
        methods: {
            infiniteHandler($state) {
                axios.get('api/photo?page=', {
                    params: {
                        page: this.page,
                    },
                }).then(({ data }) => {
                    if (data.data.length) {
                        this.page += 1;
                        this.list.push(...data.data);
                        $state.loaded();
                    } else {
                        $state.complete();
                    }
                });
            },

            likePhoto(id, likes){



               axios.put(`api/photo/${id}`).then(()=> {


                   setTimeout(() => {
                       document.querySelector(`#lovelike${id}`).style.display = 'block';
                       // console.log('I worked');
                   }, 1000);

                   setTimeout(() => {
                       document.querySelector(`#lovelike${id}`).style.display = 'none';
                       document.querySelector(`#favorite_love${id}`).textContent = 'favorite';
                       document.querySelector(`#favorite_love${id}`).style.color = 'red';
                       let incser = likes + 1;

                       return   document.querySelector(`#insta-like${id}`).textContent = incser + ' likes';

                   }, 1500);


                }).catch(()=>{

                });










            }

        },
        created(){

        },
        mounted() {

            this.$Progress.start();

            this.$Progress.finish();
        }
    }
</script>
