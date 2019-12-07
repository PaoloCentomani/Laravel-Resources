<template>
    <div>
        <input type="text" class="form-control" :id="id" :name="name" :placeholder="placeholder" :value="address" :required="required" @keypress.enter.prevent>

        <span v-if="notFound" class="invalid-feedback" role="alert">
            Seleziona un indirizzo dal menu a discesa per proseguire.
        </span>

        <input type="hidden" :name="`${name}_lat`" :value="latitude">
        <input type="hidden" :name="`${name}_lng`" :value="longitude">
    </div>
</template>

<script>
    export default {
        data() {
            return {
                address: this.initialAddress,
                autocomplete: null,
                latitude: this.initialLatitude,
                longitude: this.initialLongitude,
                notFound: false
            };
        },

        props: {
            id: {
                type: String,
                required: true
            },

            initialAddress: {
                type: String
            },

            initialLatitude: {
                type: Number
            },

            initialLongitude: {
                type: Number
            },

            name: {
                type: String,
                required: true
            },

            placeholder: {
                type: String,
                required: true
            },

            required: {
                type: Boolean,
                default: false
            }
        },

        mounted() {
            this.autocomplete = new google.maps.places.Autocomplete(document.getElementById(this.id));

            this.autocomplete.addListener('place_changed', this.onPlaceChanged);
        },

        methods: {
            onPlaceChanged() {
                let place = this.autocomplete.getPlace();

                if (! place || ! place.geometry) {
                    this.notFound = true;

                    return;
                }

                this.notFound = false;

                this.address = place.formatted_address.startsWith(place.name) ? place.formatted_address : `${place.name} ${place.formatted_address}`
                this.latitude = place.geometry.location.lat();
                this.longitude = place.geometry.location.lng();
            }
        }
    };
</script>

<style>
    .pac-container {
        @apply rounded-b shadow-xl;
    }

    .pac-icon {
        @apply hidden;
    }

    .pac-item {
        @apply px-2 py-1 font-sans text-gray-600 border-gray-300;

        &.pac-item-selected,
        &:hover {
            @apply text-white bg-red-500;

            .pac-item-query,
            .pac-matched {
                @apply text-white;
            }
        }
    }
</style>
