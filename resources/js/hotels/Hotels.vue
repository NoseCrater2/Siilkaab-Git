<template>
  <div>
    <v-btn color="primary" dark class="mb-2">Nuevo Hotel</v-btn>
    <HotelsTable></HotelsTable>
  </div>
</template>

<script>
import HotelsTable from '../components/Hotels/HotelsTable'

export default {
  components: {
    HotelsTable
  }
};
</script>