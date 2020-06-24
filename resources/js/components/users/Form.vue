<template>
    <div class="users-form row">
        <form  novalidate method="POST" v-on:submit.prevent="$emit('adduser')">
            <div class="col-md-12">
                <div class="form-group col-xs-5">
                    <label for="user">User</label>
                    <input 
                        v-model="user.username"
                        name="user"
                        id="user"
                        type="text"
                        class="form-control"
                    />
                </div>

                  <div class="form-group col-xs-5">
                    <label for="user">User</label>
                    <input 
                        v-model="user.email"
                        name="email"
                        id="email"
                        type="email"
                        class="form-control"
                    />
                </div>

                <div class="form-group col-xs-2">
                    <button
                        type="submit"
                        class="btn btn-block btn-success"
                    >Enviar</button>
                </div>
            </div>
        </form>
    </div>
</template>


<script>

import Vue from 'vue';

export default {
    props: ['user']
}
</script>