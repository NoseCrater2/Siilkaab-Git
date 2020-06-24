<template>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div v-if="!loading">
                         <h2>{{ hotel.Title}}</h2>
                        <hr/>
                        <article>{{ hotel.ShortText }}</article>
                    </div>

                    <div v-else>Loading...</div>
                   
                </div>
            </div>
        </div>
        <div class="col md-4">
            <Details></Details>
        </div>
    </div>
</template>

<script>



export default {

   
    data(){
        return{
            hotel: null,
            loading: false
        };
    },
    created(){
        this.loading= true;
    axios
    .get(`/api/hotels/${this.$route.params.id}`)
    .then(response => {
        this.hotel = response.data.data;
        this.loading = false;
        });
    }
}
</script>