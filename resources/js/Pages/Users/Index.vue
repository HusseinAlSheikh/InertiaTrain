<template>
     <Head>
        <title> Users </title>
                <meta name="description" content="users info  " head-key="description">

        </Head>
        <div class="flex justify-between mb-6 mt-6">
            <div class="flex items-center">
              <h1   class="text-2xl bold " >Users </h1>
              <Link as="button" href="/users/create" class="text-blue-600 text-sm ml-2">Create User</Link>
            </div>
            
            <input v-model="search" type="text" placeholder="Search" class="border px-2 rounded-lg">
        </div>
      

<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <tbody>
            <tr 
                v-for="user in users.data"
                :key="user.id"
                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ user.name }}
                </th>
                <td class="px-6 py-4">
                    <Link :href="'/users/'+user.id+'/edit'" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                        Edit
                    </Link>
                </td>
            </tr>
           
        </tbody>
    </table>

    <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
  <div class="flex flex-1 justify-between sm:hidden">
    <a href="#" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
    <a href="#" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
  </div>
  <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
    <div>
      <p class="text-sm text-gray-700">
        Showing
        <span class="font-medium">{{ users.from }}</span>
        to
        <span class="font-medium">{{ users.to }}</span>
        of
        <span class="font-medium">{{ users.total }}</span>
        results
      </p>
    </div>
    <div>
      <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
        
            <!-- <Link
             :href="users.prev_page_url" 
             :disabled="!users.prev_page_url"
              class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                <span class="sr-only">Previous</span>
                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                </svg>
            </Link> -->
        
<!-- 
            <component
                 :is="link.url ? 'Link' : 'span'"
                 v-for="link in  users.links"
                 :key="link.label"
                 :href="link.url" 
                  v-html="link.label"
                  class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"
                  :class="{ 'bg-blue-600' :link.active}">
             </component> -->
   
             <Pagination :links="users.links"></Pagination>

            <!-- <Link 
            :href="users.next_page_url" 
            :class="{ 'disabled' :!users.next_page_url}" 
            class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                <span class="sr-only">Next</span>
                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                </svg>
            </Link> -->
        
        

      </nav>
    </div>
  </div>
</div>

</div>


        <!-- <ul role="list" class="divide-y divide-gray-100">
            <li 
                v-for="user in users"
                :key="user.id"
                 class="flex justify-between gap-x-6 py-5"
                 v-text="user.name"
            >
            </li>
        </ul> -->
    
</template>


<script setup>
 import Pagination from '../../Shared/Pagination.vue';
import { ref ,watch} from 'vue';
import { router ,Link } from '@inertiajs/vue3';
import debounce from 'lodash/debounce';

 let props = defineProps({
    users:Object ,
    filters : Object
 });
 let search = ref(props.filters.search);
 watch(search , 
 debounce(function(value){
    router.get('/users',{search:value},{
        preserveState : true,
        replace:true
    });
 } , 500)
 
 
 );
</script>