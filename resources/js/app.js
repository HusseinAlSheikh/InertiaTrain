import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { InertiaProgress } from '@inertiajs/progress';
import Layout from './Shared/Layout';

createInertiaApp({
//   resolve: name => {
//     const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
//     return pages[`./Pages/${name}.vue`]
//   },
    resolve: (name) => {
      let page = require(`./Pages/${name}.vue`).default;

      // if(!page.layout){
      //   page.layout = Layout;
      // }
      page.layout ??= Layout;


      return page ; 
    },

  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el)
  },
});

InertiaProgress.init({
    color: 'red',
    showSpinner: true
  });