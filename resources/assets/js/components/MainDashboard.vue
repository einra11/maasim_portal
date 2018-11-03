<template>
  <v-app>
    <v-toolbar
    color="yellow"
    dark
    flat
  >
    <v-toolbar-title>Dashboard</v-toolbar-title>
    <v-divider
      class="mx-3"
      inset
      vertical
    ></v-divider>
    <v-spacer></v-spacer>
    <clock-app></clock-app>
  </v-toolbar>
    <div class="container">
      <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-8">
                    <div v-for="item in requests" :key="item.index" class="container">
            <v-card flat max-width="750">
              <v-card-text>
                 <v-layout align-center mb-3>
                  <v-avatar size="50" color="yellow" class="mr-3"><v-icon>star</v-icon></v-avatar>
                  <strong class="title">{{item.last_name +' '+item.first_name}}</strong>
              <v-speed-dial
                      dark
                      absolute
                      right
                      direction="bottom"
                      small
                      :open-on-hover="hover"
                      transition="slide-y-reverse-transition"
                    >
                      <v-btn
                        slot="activator"
                        color="blue darken-2"
                        dark
                        fab
                        small
                        flat
                      >
                        <v-icon>more_vert</v-icon>
                        <v-icon>close</v-icon>
                      </v-btn>
                      <v-dialog v-model="dialog2" max-width="600">
                      <v-btn
                        fab
                        dark
                        small
                        color="green"
                        slot="activator"
                      >
                        <v-icon>edit</v-icon>
                      </v-btn>
                <v-card>
                  <v-card-title>
                    <span class="headline">Quick Edit Announcement</span>
                  </v-card-title>
                  <v-card-text>
                        <v-flex xs12>
                          <v-text-field v-model="item.last_name" disabled></v-text-field>
                        </v-flex>
                         <v-flex xs12>
                           <v-text-field data-simplebar v-model="item.first_name" disabled></v-text-field>
                        </v-flex>
                         <v-flex xs12>
                           <v-text-field data-simplebar v-model="item.email" disabled></v-text-field>
                        </v-flex>
                  </v-card-text>
                  <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="blue darken-1" flat @click.native="dialog2 = false">Close</v-btn>
                    <v-btn color="blue darken-1" flat  @click.native="dialog2 = false, saveAnnouncement(item)">Save</v-btn>
                  </v-card-actions>
                </v-card>
                      </v-dialog>
                      <v-btn
                        fab
                        dark
                        small
                        color="red"
                        @click="deleteAnnouncement(item.id)"
                      >
                        <v-icon>delete</v-icon>
                      </v-btn>
                    </v-speed-dial>
                 </v-layout>
                 <p>{{item.type_of_request}}</p>
                 <small>Posted at : {{item.created_at}}</small>
              </v-card-text>
            </v-card>
          </div>
          <h2 class="ml-4">Announcements</h2>
          <div v-for="item in announcements" :key="item.id" class="container">
            <v-card flat max-width="750">
              <v-card-text>
                 <v-layout align-center mb-3>
                  <v-avatar size="50" color="yellow" class="mr-3"><v-icon>star</v-icon></v-avatar>
                  <strong class="title">{{item.annc_title}}</strong>
              <v-speed-dial
                      dark
                      absolute
                      right
                      direction="bottom"
                      small
                      :open-on-hover="hover"
                      transition="slide-y-reverse-transition"
                    >
                      <v-btn
                        slot="activator"
                        color="blue darken-2"
                        dark
                        fab
                        small
                        flat
                      >
                        <v-icon>more_vert</v-icon>
                        <v-icon>close</v-icon>
                      </v-btn>
                      <v-dialog v-model="dialog" max-width="600">
                      <v-btn
                        fab
                        dark
                        small
                        color="green"
                        slot="activator"
                      >
                        <v-icon>edit</v-icon>
                      </v-btn>
                <v-card>
                  <v-card-title>
                    <span class="headline">Quick Edit Announcement</span>
                  </v-card-title>
                  <v-card-text>
                        <v-flex xs12>
                          <v-text-field v-model="item.annc_title" required></v-text-field>
                        </v-flex>
                         <v-flex xs12>
                           <v-textarea data-simplebar v-model="item.annc_content" required></v-textarea>
                        </v-flex>
                  </v-card-text>
                  <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="blue darken-1" flat @click.native="dialog = false">Close</v-btn>
                    <v-btn color="blue darken-1" flat  @click.native="dialog = false, saveAnnouncement(item)">Save</v-btn>
                  </v-card-actions>
                </v-card>
                      </v-dialog>
                      <v-btn
                        fab
                        dark
                        small
                        color="red"
                        @click="deleteAnnouncement(item.id)"
                      >
                        <v-icon>delete</v-icon>
                      </v-btn>
                    </v-speed-dial>
                 </v-layout>
                 <p>{{item.annc_content}}</p>
                 <small>Posted at : {{item.created_at}}</small>
              </v-card-text>
            </v-card>
          </div>
          <nav aria-label="...">
          <ul class="pager">
            <li :class="[{disabled: !pagination.prev_page_url}]"><a href="#" @click="fetchAnnouncements(pagination.prev_page_url)"><span aria-hidden="true">&larr;</span> Newer</a></li>
            <li :class="[{disabled: !pagination.next_page_url}]"><a href="#"  @click="fetchAnnouncements(pagination.next_page_url)">Older <span aria-hidden="true">&rarr;</span></a></li>
          </ul>
          </nav>
          <hr>
          <div class="row ml-3">
          <full-calendar local="en"
          :events="fcEvents"
          >
          </full-calendar>
          </div><!--/row-->
        </div><!--/.col-xs-12.col-sm-9-->
        <!-- <div class="col-xs-6 col-sm-4 sidebar-offcanvas">
          <v-card flat max-width="850">
              <v-card-text>
                 <v-layout align-center mb-3>
                  <strong class="title">Request</strong>
                 </v-layout>
                 <div class="list-group" data-simplebar data-simplebar-auto-hide="false">
                <div class="container col-md-12">  
                <button v-for="item in requests"
                :key="item.id"
                @click="test1(item.id)" class="list-group-item">
                {{item.last_name+' '+item.first_name}}
                </button>
              </div> 
            </div>
              </v-card-text>
            </v-card>
        </div> -->
         <div class="col-xs-6 col-sm-4 sidebar-offcanvas">
           <hr>
          <v-card flat max-width="850">
              <v-card-text>
                 <v-layout align-center mb-3>
                  <strong class="title">Events</strong>
                  <v-spacer></v-spacer>
                   <v-btn fab dark flat color="indigo">
                  <v-icon dark large>add_circle_outline</v-icon>
                </v-btn>
                 </v-layout>
                 <div class="list-group" data-simplebar data-simplebar-auto-hide="false">
              <button v-for="item in fcEvents"
            :key="item.id"
              @click="test1(item.title)" class="list-group-item"> {{item.title}}</button>
            </div>
              </v-card-text>
            </v-card>
        </div><!--/.sidebar-offcanvas-->
      </div><!--/row-->
    </div><!--/.container-->
  </v-app>
</template>
<script>
import simplebar from 'simplebar'
import 'simplebar/dist/simplebar.css'
  export default{
    data (){
      return{
        hover:false,
        dialog:false,
        dialog2:false,
        fcEvents:[],
        requests:[],
        announcements:[],
        pagination:{},
      }
    },
    created() {
      this.fetchAnnouncements();
      this.fetchEvents();
      this.fetchRequest();
    },
    methods:{
      fetchAnnouncements(page_url){
        let vm = this;
        page_url = page_url|| '/api/vueannouncements'
        fetch(page_url)
          .then(res => res.json())
            .then(res => {
              this.announcements = res.data
              vm.makePagination(res.meta, res.links)
        })
        .catch(err =>console.log(err))
      },
      fetchEvents(){
        fetch('api/events')
        .then(res=> res.json())
        .then(res =>{
          this.fcEvents =res.data
          console.log(this.fcEvents)
        })
      },
       fetchRequest(){
        fetch('api/apirequests')
        .then(res=> res.json())
        .then(res =>{
          this.requests =res.data
          console.log(this.requests)
        })
      },
      test1(title){
        alert('I am Clicked! '+ title)
      },
      makePagination(meta, links){
        let pagination ={
          current_page:meta.current_page,
          last_page: meta.last_page,
          next_page_url: links.next,
          prev_page_url: links.prev
        }
        this.pagination = pagination
      },
      deleteAnnouncement(id){
        if(confirm('Are you sure?')){
          fetch(`api/vueannouncement/${id}`,{
            method:'delete'
          })
          .then(res=> res.json())
          .then(data =>{
            alert('Announcement Removed!')
            this.fetchAnnouncements();
          })
          .catch(err => console.log(err))
        }
      },
      saveAnnouncement(item){
        fetch('api/vueannouncement',{
          method: 'put',
          body: JSON.stringify(item),
          headers:{
            'content-type':'application/json'
          }
        })
          .then(res=>res.json())
          .then(data =>{
            alert('Announcement Updated!')
          })
          .catch(err=>console.log(err))
      },
      saveEvent(item){
        fetch('api/apirequest',{
          method: 'post',
          body: JSON.stringify(item),
          headers:{
            'content-type':'application/json'
          }
        })
          .then(res=>res.json())
          .then(data =>{
            alert('Event Added')
          })
          .catch(err=>console.log(err))
      }
    }
  }
</script>
<style>
  .list-group{
    max-height: 200px;
}
[data-simplebar]{
  overflow-y: auto;
}
</style>
