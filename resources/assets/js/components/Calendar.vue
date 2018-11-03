<template>
    <full-calendar local="en"
          :events="fcEvents"
          >
          </full-calendar>
</template>
<script>
export default {
    data(){
        return{
            fcEvents:[],
        }
    },
    created() {
        this.fetchEvents();
    },
    methods:{
        fetchEvents(){
        fetch('api/events')
        .then(res=> res.json())
        .then(res =>{
          this.fcEvents =res.data
          console.log(this.fcEvents)
        })
      }
    }
}
</script>
