<template>
     <Head>
        <title> Create Users </title>
                <meta name="description" content="users info  " head-key="description">

        </Head>
        <div class="flex justify-between mb-6 mt-6">
            <h1   class="text-2xl " > Create New User </h1>
           
        </div>
      
        <form @submit.prevent="submit" class="max-w-md mx-auto mt-8">
           
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name"> 
                    Name
                </label>
                <input class="border border-gray-400 p-2 w-full"
                  type="text"
                  name="name"
                  id="name"
                  
                  v-model="form.name"
                >
                <div v-if="errors.name" v-text="errors.name" class="text-red-500 text-xs mt-1">
                  </div>
            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email"> 
                    Email
                </label>
                <input class="border border-gray-400 p-2 w-full"
                  type="email"
                  name="email"
                  id="email"
                  
                  v-model="form.email"
                >
                <div v-if="errors.email" v-text="errors.email" class="text-red-500 text-xs mt-1">
                  </div>
            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password"> 
                    Password
                </label>
                <input class="border border-gray-400 p-2 w-full"
                  type="password"
                  name="password"
                  id="password"
                  v-model="form.password"
                >
                <div v-if="errors.password" v-text="errors.password" class="text-red-500 text-xs mt-1">
                  
                </div>
            </div>

            <div class="mb-6">
               <button type="submit" class="bg-blue-400 text-white rounded p-2 hover:bg-blue-500">
                  Submit
               </button>
            </div>

        </form>
    
</template>


<script setup>
  import { reactive } from 'vue';
  import { router } from '@inertiajs/vue3';

  defineProps({
    errors : Object
  });

  let form = reactive({
    name:'' , 
    email:'',
    password:''
  });

  let submit = () => {
        router.post('/users',form);
  };
</script>