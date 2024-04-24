<template>
     <Head>
        <title> Users </title>
                <meta name="description" content="users info  " head-key="description">

        </Head>
        <h1   class="text-2xl " > Hello Users </h1>
   

        <div style="margin-top: 600px;">
            the current time is {{ time }}
            <br>
            <Link href="/users" class="text-red-600" preserveScroll >Refresh</Link>
        </div>
    
</template>


<script >
 import {Link} from '@inertiajs/vue3';
 export default {
        components: {Link},
        props :{
            time : String 
        }
    };
</script>