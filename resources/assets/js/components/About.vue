<template>
  <v-timeline>
    <v-timeline-item
      v-for="(year, i) in years"
      :color="year.color"
      :key="i"
      small
    >
      <span
        slot="opposite"
        :class="`headline font-weight-bold ${year.color}--text`"
        v-text="year.year"
      ></span>
      <div class="py-3">
        <h2 :class="`headline font-weight-light mb-3 ${year.color}--text`">Lorem ipsum</h2>
        <div>
          Lorem ipsum dolor sit amet, no nam oblique veritus. Commune scaevola imperdiet nec ut, sed euismod convenire principes at. Est et nobis iisque percipit, an vim zril disputando voluptatibus, vix an salutandi sententiae.
        </div>
      </div>
    </v-timeline-item>
  </v-timeline>
</template>
<script>
  export default {
    data: () => ({
      years: [
        {
          color: 'cyan',
          year: '1920',
          text:`During American period they build the colony at Cotobato. This colony was built
                in order to give service to the people who don't have their own land in Luzon and Visayas. 
                So this is colony 9.`
        },
        {
          color: 'green',
          year: '1965',
          text:`President Diosdado Macapagal release an executive order No.113, for building the Maasim as one of the regular
                municipality and one the barangay of incapsulated with it is barangay Poblacion. Upon building the municipality of Maasim
                through EO N0.113. Vice President Emmanuel Pelaez the rights of President Macapagal to the highest court and he stated that
                the President does not have the power but only the congress.`
        },
        {
          color: 'pink',
          year: 'January 27,1969',
          text:`Congressman James L. Chiongbian, one of the representative from South Cotabato, he passed an ordinance in the congress `
        },
        {
          color: 'amber',
          year: '1990'
        },
        {
          color: 'orange',
          year: '2000',
          text:``
        }
      ]
    })
  }
</script>