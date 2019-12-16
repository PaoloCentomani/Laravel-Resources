<template>
    <div class="map rounded" :id="id"></div>
</template>

<script>
    export default {
        data() {
            return {
                map: null
            };
        },

        props: {
            center: {
                type: Array,
                required: true
            },

            id: {
                type: String,
                required: true
            },

            marker: {
                type: Array
            },

            markers: {
                type: Array
            }
        },

        mounted() {
            this.map = this.createMap();

            if (this.marker) {
                this.addMarker(this.marker[0], this.marker[1], this.marker[2]);
            }

            if (this.markers) {
                this.markers.forEach((marker) => this.addMarker(marker.title, marker.latitude, marker.longitude));
            }
        },

        methods: {
            addMarker(title, latitude, longitude) {
                let marker = new google.maps.Marker({
                    icon: {
                        scaledSize: new google.maps.Size(32, 40),
                        url: `/img/marker.png`
                    },
                    map: this.map,
                    position: {lat: latitude, lng: longitude},
                    title: title
                });

                marker.addListener('click', () => {
                    this.map.panTo({lat: latitude, lng: longitude});
                });
            },

            createMap() {
                const element = document.getElementById(this.id);

                const options = {
                    center: new google.maps.LatLng({
                        lat: this.center[0],
                        lng: this.center[1]
                    }),
                    clickableIcons: false,
                    fullscreenControl: false,
                    mapTypeControl: false,
                    styles: [
                        {
                            featureType: 'poi',
                            elementType: 'labels',
                            stylers: [
                                { visibility: 'off' }
                            ]
                        }
                    ],
                    streetViewControl: false,
                    zoom: 13
                };

                return new google.maps.Map(element, options);
            },
        },
    };
</script>

<style>
    .map {
        width: 100%;
        height: 280px;
    }
</style>
