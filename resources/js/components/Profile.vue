<style scoped>
  :root {
    font-size: 10px;
  }
</style>


<template>
  <div>
     <header>
       <link
               href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
               rel="stylesheet"
       />


         <div class="insta-profile-container">
           <div class="profile">
             <div class="profile-image">
               <img
                 :src='"/img/profile/" + user.photo'
                 alt=""
                 class="insta-profile-avatar"
               />
             </div>

             <div class="profile-user-settings">
               <h1 class="profile-user-name">{{user.username}}</h1>

               <router-link to="/editprofile" class="insta-btn profile-edit-insta-btn">
                 Edit Profile
               </router-link>
             </div>

             <div class="profile-stats">
               <ul>
                 <li><span class="profile-stat-count">{{post}}</span> posts</li>
                 <li><span class="profile-stat-count">0</span> followers</li>
                 <li><span class="profile-stat-count">0</span> following</li>
               </ul>
             </div>

             <div class="profile-bio">
               <p>
                 <span class="profile-real-name">{{user.name}}</span>
                 {{user.bio}}
               </p>
             </div>
           </div>
         </div>
       </header>



     <main >

         <div class="insta-profile-container" >
           <div class="gallery" v-for="showposts in groupedPosts">
             <div class="gallery-item" tabindex="0" v-for="userpost in showposts" :key="userpost.id">
               <img
                    :src="'/img/photo/' + userpost.photo"
                    class=""
                    style="width:100%; height:300px"

                 />

            <div class="gallery-item-info">
              <ul>
                  <li class="gallery-item-likes">
                  <span class="visually-hidden">Likes:</span
                  ><i class="fas fa-heart" aria-hidden="true"></i> {{userpost.likes}}
                  </li>
                  <li class="gallery-item-comments">
                  <span class="visually-hidden">Comments:</span
                  ><i class="fas fa-comment" aria-hidden="true"></i> 0
                  </li>
                </ul>
               </div>
             </div>


           </div>
         </div>
    </main>
  </div>
</template>

<script>
    export default {
      data(){
        return {
          user: {},
          post: {},
          showposts: {}

        }
      },
      methods:{
        getUser(){
          axios.get('api/getuser').then(({data}) => (this.user = data))
        },
        countPosts(){
          axios.get('api/countposts').then(({data}) => (this.post = data))
        },
        showPosts(){
          axios.get('api/showposts').then(({data}) => (this.showposts = data.data))
        },


      },
      created() {
        this.getUser();
        this.countPosts();
        this.showPosts();

      },
      computed: {
        groupedPosts() {
          return _.chunk(this.showposts, 3);
          // returns a nested array:
          // [[article, article, article], [article, article, article], ...]
        }
      },
        mounted() {

        }
    }
</script>


