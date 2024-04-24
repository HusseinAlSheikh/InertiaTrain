<template>
     <Head>
        <!-- <title> My App  </title> -->
        <meta name="description" content="info about what ever " head-key="description">
    </Head>

    <section class="p-6 bg-gray-200">

        <header class="flex justify-between">
            <div class="flex items-center">
                <h1 class="font-bold text-lg">My App</h1>
                <p class="ml-4">
                    welcome back {{ username }}
                </p>
            </div>

            <Nav />
        </header>
    </section>
    <section>
        <div class="max-w-3xl mx-auto">
                        <slot/>
        </div>
    </section>

</template>


<script>
    import { Head } from '@inertiajs/vue3';
    import Nav from './Nav.vue';
    export default {
        components : {Nav,Head} , 
        computed:{
            username(){
                return this.$page.props.auth.user.username;
            },
        }
        
    };
</script>