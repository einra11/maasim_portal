<template>
  <v-app>
    <v-toolbar
    color="#1E3D5A"
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
          <v-container grid-list-md>
            <v-layout wrap>
              <v-flex xs4>
           <h2 class="ml-4">Requests</h2>
          <v-card flat max-width="800" height="600" data-simplebar data-simplebar-auto-hide="false">
            <v-card-text>
          <div v-for="item in requests" :key="item.index">
            <v-card flat max-width="550">
              <v-card-text>
                 <v-layout align-center mb-1>
                    <v-badge
               
                  color="success"
                  left
                  overlap
                >
                  <v-icon
                   v-if="item.read_tf == 'Y'"
                    slot="badge"
                    dark
                    small
                  >done</v-icon>
                  <v-avatar @click="completeRequest(item)" size="50" color="#E5EFEE" class="mr-3"><v-icon>face</v-icon></v-avatar>
                </v-badge>
                  
                  <strong class="title">Request Entry No.{{item.id}}</strong>
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
                       <v-avatar size="40" color="teal">
                  <span class="white--text headline">S</span>
                </v-avatar>
                      </v-btn>
                <v-card>
                  <v-card-title>
                    <span class="headline">Request profile of request: {{item.id}}</span>
                  </v-card-title>
                  <v-card-text>
                        <v-flex xs12>
                          <v-text-field label="Last name" v-model="item.last_name" disabled></v-text-field>
                        </v-flex>
                         <v-flex xs12>
                           <v-text-field label="First name" v-model="item.first_name" disabled></v-text-field>
                        </v-flex>
                         <v-flex xs12>
                           <v-text-field label="Middle name" v-model="item.middle_name" disabled></v-text-field>
                        </v-flex>
                        <v-flex xs12>
                           <v-text-field label="Email name" v-model="item.email" disabled></v-text-field>
                        </v-flex>
                        <v-flex xs12>
                           <v-text-field label="Contact number" v-model="item.contact_number" disabled></v-text-field>
                        </v-flex>
                        <v-flex xs12>
                           <v-text-field label="Birth date" v-model="item.birthdate" disabled></v-text-field>
                        </v-flex>
                        <v-flex xs12>
                           <v-text-field label="Gender" v-model="item.gender" disabled></v-text-field>
                        </v-flex>
                        <v-flex xs12>
                           <v-text-field label="Requests" v-model="item.type_of_request" disabled></v-text-field>
                        </v-flex>
                         <v-flex xs12>
                           <v-textarea label="Purpose" v-model="item.purpose" disabled></v-textarea>
                        </v-flex>
                  </v-card-text>
                  <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="blue darken-1" flat @click.native="dialog2 = false">Close</v-btn>
                    <v-btn color="blue darken-1" flat  @click.native="dialog2 = false, saveRequest(item)">Finish and Send</v-btn>
                  </v-card-actions>
                </v-card>
                      </v-dialog>
                      <v-btn
                        fab
                        dark
                        small
                        color="red"
                        @click="deleteRequest(item.id)"
                      >
                        <v-icon>delete</v-icon>
                      </v-btn>
                    </v-speed-dial>
                 </v-layout>
                 <p>Requested by: {{item.last_name +' '+item.first_name}}</p>
                
                 <v-chip small label outline color="blue"> <small>Requested at : {{item.created_at}}</small></v-chip>
              </v-card-text>
            </v-card>
          </div>
          </v-card-text>
          </v-card>
          </v-flex>
          <hr>
          <v-flex xs8>
          <h2 class="ml-1">Announcements</h2>
            <v-card v-for="item in announcements" :key="item.id" flat max-width="680">
              <v-card-text>
                 <v-layout align-center mb-3>
                  <v-avatar size="50" color="#E5EFEE" class="mr-3"><v-icon>star</v-icon></v-avatar>
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
                           <v-textarea v-model="item.annc_content" required></v-textarea>
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
                 <v-chip small label outline color="blue"> <small>Posted at : {{item.created_at}}</small></v-chip>
              </v-card-text>
              <hr/>
            </v-card>
          
          <nav aria-label="...">
          <ul class="pager">
            <li :class="[{disabled: !pagination.prev_page_url}]"><a href="#" @click="fetchAnnouncements(pagination.prev_page_url)"><span aria-hidden="true">&larr;</span> Newer</a></li>
            <li :class="[{disabled: !pagination.next_page_url}]"><a href="#"  @click="fetchAnnouncements(pagination.next_page_url)">Older <span aria-hidden="true">&rarr;</span></a></li>
          </ul>
          </nav>
          </v-flex>
           <v-flex xs12>
             <h2>Calendar and Events</h2>
          </v-flex>
          <v-flex xs12 sm6 md3>
                    <v-text-field
                    v-model="addEvent.title"
                      label="Event name"
                    ></v-text-field>
          </v-flex>
           <v-flex xs12 sm6 md3>
                    <v-text-field
                     v-model="addEvent.start"
                      label="Start YYYY-MM-DD"
                    ></v-text-field>
          </v-flex>
          <h2>-</h2>
           <v-flex xs12 sm6 md3>
                    <v-text-field
                     v-model="addEvent.end"
                      label="End YYYY-MM-DD"
                    ></v-text-field>
            </v-flex>
            <v-btn @click.prevent="saveEvent()" dark color="indigo">
                        Add Event
                  </v-btn>
          <v-flex xs12>
          <div class="row">
          <full-calendar local="en"
          :events="fcEvents"
          >
          </full-calendar>
          </div><!--/row-->
          </v-flex>
          <v-flex xs11>
            <h2>Request Reports</h2>
            <v-text-field
              v-model="search"
              append-icon="search"
              label="Search keywords"
              single-line
              hide-details
            ></v-text-field>
            <v-data-table
              :headers="headers"
              :items="requests"
              :search="search"
            >
              <template slot="items" slot-scope="props">
                <td>{{ props.item.id }}</td>
                <td class="text-xs-right">{{ props.item.last_name }}</td>
                <td class="text-xs-right">{{ props.item.first_name }}</td>
                <td class="text-xs-right">{{ props.item.middle_name }}</td>
                <td class="text-xs-right">{{ props.item.contact_number }}</td>
                <td class="text-xs-right">{{ props.item.created_at }}</td>
                <td class="text-xs-right">{{ props.item.type_of_request }}</td>
              </template>
            </v-data-table>
      <v-tooltip bottom>
      <v-btn
        slot="activator"
        color="primary"
        dark
        @click="printme()"
      >
        <v-icon>print</v-icon>
      </v-btn>
      <span>Print Report</span>
    </v-tooltip>
          </v-flex>
          </v-layout>
          </v-container>
        </div><!--/.col-xs-12.col-sm-9-->
      </div><!--/row-->
    </div><!--/.container-->
  </v-app>
</template>
<script>
import simplebar from 'simplebar'
import 'simplebar/dist/simplebar.css'
import * as jsPDF from 'jspdf'
import * as jsPDFTable from 'jspdf-autotable'
  export default{
    data (){
      return{
        search:'',
        headers: [
          {
            text: 'Request ID',
            align: 'left',
            value: 'id',
            sortable: false,
          },
          { text: 'Last name',sortable: false, value: 'last_name' },
          { text: 'First name',sortable: false, value: 'first_name' },
          { text: 'Middle name',sortable: false, value: 'middle_name' },
          { text: 'Contact number',sortable: false, value: 'contact_number' },
          { text: 'Requested at',sortable: false, align: 'right', value: 'created_at' },
          { text: 'Requested',
          align: 'right',
          value: 'type_of_request',
          sortable: false,
           }
        ],
        hover:true,
        dialog:false,
        dialog2:false,
        addEvent:{
          title:'',
          event_description:'sample',
          start:'',
          end:''
        },
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
      printme(){
        var vm = this
        var columns =[
          {title:'ID', dataKey:"id"},
          {title:'Last Name', dataKey:"last_name"},
          {title:'First Name', dataKey:"first_name"},
          {title:'Middle Name', dataKey:"middle_name"},
          {title:'Contact Number', dataKey:"contact_number"},
          {title:'Requested At', dataKey:"created_at"},
          {title:'Requested', dataKey:"type_of_request"},
        ]
        var doc =new jsPDF('p', 'pt')
        // doc.autoTable(columns, vm.requests)
        doc.autoTable(columns, vm.requests, {
          styles:{
            overflow:'linebreak',
            overflowColumns:false
          },  
          columnStyles: {
            id: {columnWidth: 30},
            // last_name: {columnWidth: 70},
            // first_name: {columnWidth: 70},
            // middle_name: {columnWidth: 70},
            type_of_request: {columnWidth: 80},
          },
          margin: {top: 60},
          addPageContent: function(data) {
            doc.text("Request Report", 40, 30);
          }
      });
        doc.save('reports.pdf')
      },
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
        })
      },
       fetchRequest(){
        fetch('api/apirequests')
        .then(res=> res.json())
        .then(res =>{
          this.requests =res.data
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
      deleteRequest(id){
        if(confirm('Are you sure?')){
          fetch(`api/apirequest/${id}`,{
            method:'delete'
          })
          .then(res=> res.json())
          .then(data =>{
            alert('Request Removed!')
            this.fetchRequest();
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
      saveRequest(item){
        item.read_tf='Y'
        fetch('api/apirequest',{
          method: 'put',
          body: JSON.stringify(item),
          headers:{
            'content-type':'application/json'
          }
        })
          .then(res=>res.json())
          .then(data =>{
          })
          .catch(err=>console.log(err))
      },
      completeRequest(item){
        item.complete_tf='Y'
        fetch('api/apirequest',{
          method: 'put',
          body: JSON.stringify(item),
          headers:{
            'content-type':'application/json'
          }
        })
          .then(res=>res.json())
          .then(data =>{
            alert('A message was sent!')
          })
          .catch(err=>console.log(err))
      },
      saveEvent(){
        fetch('api/event',{
          method: 'post',
          body: JSON.stringify(this.addEvent),
          headers:{
            'content-type':'application/json'
          }
        })
          .then(res=>res.json())
          .then(data =>{
            this.addEvent.title=''
            this.addEvent.event_description=''
            this.addEvent.start=''
            this.addEvent.end=''
            alert('Event Added')
            this.fetchEvents()
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
  .ovr2{
    overflow-y: auto;
}
[data-simplebar]{
  overflow-y: auto;
}
</style>
