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
        <h2 :class="`headline font-weight-light mb-3 ${year.color}--text`">The year that we rembered...</h2>
        <div>
          {{year.text}}
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
          color: 'red',
          year: '1961',
          text:` Miss Kumala Basa a muslim, was rape by a fellow Muslim. After that incident, the suspect was seize and arrested in accordance to the victims statement. Right away, Felipe Uy make an action, a local Tenyente Del Bario in Poblacion. He arrested the suspect
          and put the suspect behind bars. in the City of Kiamba because on that day Maasim was under the City Kiamba.`
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
          color: 'red',
          year: '1967',
          text:` Miss Kumala Basa a muslim, was rape by a fellow Muslim. After that incident, the suspect was seize and arrested in accordance to the victims statement. Right away, Felipe Uy make an action, a local Tenyente Del Bario in Poblacion. He arrested the suspect
          and put the suspect behind bars. in the City of Kiamba because on that day Maasim was under the City Kiamba.`
        },
        {
          color: 'pink',
          year: '1969',
          text:`Congressman James L. Chiongbian, one of the representative from South Cotabato, passed an ordinance to the Congress on the creation of Municipality of Maasim. After the concise investigation this ordinance was approved on June 21, 1969 through the Republic Act No. 5866
                and with that the return of Barangay Poblacion.`
        }
      ]
    })
  }
</script>