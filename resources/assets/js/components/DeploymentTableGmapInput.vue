<template>
    <GmapAutocomplete class="table__input form-control" placeholder="Search Location" @place_changed="setPlace"></GmapAutocomplete>
</template>

<script>
// Import google maps EventBus

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

//Create the search box and link it to the UI element.
// var input = document.getElementById('pac-input');
// var searchBox = googleMapsClient.places.SearchBox(input);
</script>