<template>
    <GmapAutocomplete class="table__input form-control" placeholder="Search Location" @place_changed="setPlace"></GmapAutocomplete>
</template>

<script>
export default {
    data() {
        return {
        }
    },
    methods: {
    setPlace(place) {
      this.place = place
    },

    }
}
</script>