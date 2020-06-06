<template>
    <div>
        <h6 class="text-uppercase text-secondary font-weight-bolder">Check Availibility</h6>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="from">From</label>
                <input type="text" name="from" id="" class="form-control form-control-sm" 
                placeholder="Start date"
                v-model="from"
                @keyup.enter="check">
            </div>

            <div class="form-group col-md-6">
                <label for="to">To</label>
                <input type="text" name="to" id="" class="form-control form-control-sm" 
                placeholder="End date"
                v-model="to"
                @keyup.enter="check">
            </div>
        </div> 
        <button class="btn btn-secondary btn-block" @click= "check">Check</button>  
    </div>
</template>

<script>
export default {
    data(){
        return{
            from: null,
            to: null
        }
    },
    methods:{
        check(){
            alert("I will check something now");
        }
        
    }
}
</script>

<style scoped>
label{
    font-size: 0.7em;
    text-transform: uppercase;
    color: gray;
    font-weight: bolder;
}
</style>