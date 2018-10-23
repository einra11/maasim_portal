<template>
  <div id="app">
    <div class="row">
    <div class="panel panel-default">
      <h1 class="panel-heading">Dashboard</h1>
      <div class="panel-body">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Request</h3>
          </div>
          <div class="panel-body">
            
          </div>
        </div>
         <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Calendar</h3>
          </div>
          <div class="panel-body">
                           <full-calendar local="en"
          :events="fcEvents"
          >
          </full-calendar>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
</template>
<script>
var demoEvents=[
          {
            title:'Test Data',
            start: '2018-10-25',
            end:'2018-10-27',
            cssClass : 'family'
          }
          ]
  export default{
    data (){
      return{
        fcEvents:demoEvents
      }
    }
  }
</script>
