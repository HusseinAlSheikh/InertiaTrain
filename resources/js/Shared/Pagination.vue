<template>
    <component
         :is="link.url ? 'Link' : 'span'"
         v-for="link in  links"
         :key="link.label"
         :href="link.url" 
         v-html="link.label"
         class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"
         :class="{ 'bg-blue-600' :link.active}">
    </component>

</template>
<script>

import {Link} from '@inertiajs/vue3';
export default {
    props :{
        links : Array
    }, 
    components:{Link}
};
</script>