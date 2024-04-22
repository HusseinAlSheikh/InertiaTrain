<template>
    <h1 class="text-4xl font-bold" > Hello Users </h1>
    <Nav/>

    <div style="margin-top: 600px;">
        the current time is {{ time }}
        <br>
        <Link href="/users" class="text-red-600" preserveScroll >Refresh</Link>
    </div>
</template>


<script>

    import Nav from '../Shared/Nav.vue';
    import {Link} from '@inertiajs/vue3';
    export default {
        components : {Nav,Link},
        props:{
            time : String
        }
    };
</script>