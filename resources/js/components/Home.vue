<template>
    <div class="container">
        <div class="instagram-feed">
            <section class="instagram-username">
                <div class="instagram-image">
                    <a href="#"
                    ><img
                            src="https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png?fit=256%2C256&quality=100&ssl=1"
                    /></a>
                </div>
                <div class="insta-id">
                    <a href="#">obavigo</a>
                </div>
            </section>

            <!-- actual post start-->

            <section class="instagram-post">
                <img
                        class="img-responsive"
                        src="https://www.todaysparent.com/wp-content/uploads/2017/06/when-your-kid-becomes-a-meme-1024x576-1497986561.jpg"
                />
            </section>
            <section class="btn-group">
                <button type="button" class="btn-love">
                    <i class="far fa-heart fa-lg"></i>
                </button>
                <!-- <button type="button" class="btn-comment">
                    <i class="far fa-comment fa-lg"></i>
                  </button> -->
                <button type="button" class="btn-share">
                    <i class="fas fa-share-alt fa-lg "></i>
                </button>
            </section>
            <section class="caption">
                <p class="insta-like">20 likes</p>

                <p>
                    <b><a class="insta-id" href="#">obavigo</a></b>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam
                    rutrum, purus ut consequat convallis, nulla nisl tincidunt
                    nulla, sed pulvinar.
                </p>
                <p class="time">5 minutes ago</p>
            </section>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
