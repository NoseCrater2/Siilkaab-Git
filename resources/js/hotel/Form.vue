<template>
    <div>
        <h2 class="text-uppercase text-secondary font-weight-bolder">AÑADIR HOTEL</h2>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="from">Nombre de Hotel</label>
                <input type="text" name="title" class="form-control form-control-sm" v-model="title">
            </div>

            <div class="form-group col-md-3">
                <label for="from">URL del sitio</label>
                <input type="text" name="url" class="form-control form-control-sm" v-model="url" placeholder="ejemplo: http://www.hotel.com">
            </div>

            <div class="form-group col-md-3">
                <label for="from">Código de Referencia</label>
                <input type="text" name="reference_code" class="form-control form-control-sm" v-model="reference_code" placeholder="ejemplo: HBO">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col">
                
               <div class="input-group-prepend">
                   <span class="input-group-text">Imagen</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01" >
                    <label class="custom-file-label" for="inputGroupFile01">Clic aquí para seleccionar imagen</label>
                    </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col">
                <label for="stext">Texto corto</label>
                <textarea type="text" name="shortText" class="form-control" rows="2" v-model="short_text"></textarea>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col">
                
                <label for="stext">Texto Largo</label>
                <textarea type="text" name="shortText" class="form-control" rows="6" v-model="large_text" @keyup.enter="save"></textarea>

            </div>
        </div>
        <button class="btn btn-secondary btn-block" v-on:click="save">Guardar</button>
    </div>
</template>

<script>
export default {
    data(){
        return{
            title: null,
            url: null,
            reference_code: null,
            image: null,
            short_text:null,
            large_text: null    
        };
    },
    methods:{
        save(){

        }
    }
}
</script>