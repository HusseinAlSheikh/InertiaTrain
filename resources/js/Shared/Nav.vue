<template>
    <nav class=" ">
        <ul class="flex  space-x-4 ">
            <li>
                <NavLink href="/" :active="$page.component==='Home'">Home</NavLink>
            </li>
    
            <li>
                <NavLink href="/users" :active="$page.component==='Users'">Users</NavLink>
            </li>
            
            <li>
                <NavLink href="/settings" :active="$page.component==='Settings'">Settings</NavLink>
            </li>

            
            <li>
                <NavLink href="/logout"  method="post">Logout</NavLink>
            </li>
        </ul>
    </nav>
</template>


<script>

import {Link} from '@inertiajs/vue3';
    import NavLink from './NavLink.vue';
    export default {
        components : {NavLink,Link}
        
    };
</script>