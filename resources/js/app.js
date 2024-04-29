import { createApp, h } from 'vue';
import { createInertiaApp ,Head} from '@inertiajs/vue3';
import { InertiaProgress } from '@inertiajs/progress';
import Layout from './Shared/Layout';

createInertiaApp({
//   resolve: name => {
//     const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
//     return pages[`./Pages/${name}.vue`]
//   },
    resolve: async name => {
      let page = (await import(`./Pages/${name}.vue`)).default;

      if(page.layout === undefined){
        page.layout = Layout;
      }

      // page.layout ??= Layout;


      return page ; 
    },

  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .component('Head' , Head)
      .mount(el)
  },
  title : title  => `My Application | ${title}`
});

InertiaProgress.init({
    color: 'red',
    showSpinner: true
  });