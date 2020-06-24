<template>
    <div class="card w-100">
        <div class="card-body">
            <router-link :to="{ name:'hotel',params: {id} }">
                <h5 class="card-title">{{ title }}</h5>
            </router-link>
            <p class="card-text">{{ shortText }}</p>
        </div>
        
        
    </div>
</template>


<script>
export default {
    props: {'title':String, 'short-text':String, id: Number}
}
</script>