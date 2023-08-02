// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  devtools: { enabled: true },
  app: {
    head: {
        link: [
        //   {
        //   type:"text/css",
        //   rel:"stylesheet",
        //   href:"https://unpkg.com/bootstrap/dist/css/bootstrap.min.css",
        //   },
        // {
        //   type:"text/css",
        //   rel:"stylesheet",
        //   href:"https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.css"
        // },
        // { rel:"preconnect" ,href:"https://fonts.googleapis.com"},
        // { rel:"preconnect", href:"https://fonts.gstatic.com", crossorigin},
        {  rel:"stylesheet" , href:"https://fonts.googleapis.com/css2?family=Rubik+Moonrocks&display=swap"},
        {rel: 'stylesheet', href: 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap' },
        { rel: 'stylesheet', href: 'https://fonts.googleapis.com/css2?family=Comic+Sans+MS&display=swap' },
            {
                rel: 'stylesheet',
                href: 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css',
                integrity: 'sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD',
                crossorigin: 'anonymous'
            },
            {
                rel: 'preconnect',
                href: 'https://fonts.googleapis.com'
            },
            {
                rel: 'stylesheet',
                href: 'https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600&display=swap'
            }
        ],
        script: [
          // { src:"https://unpkg.com/vue"},
          // { src:"https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.js"},
            {
                src: 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js',
                integrity: 'sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN',
                crossorigin: 'anonymous'
            },
            { src: '/bootstrap.bundle.min.js'}
            
        ],
    }
},  
css:[ 'bootstrap-icons/font/bootstrap-icons.css',
"~/node_modules/bootstrap/dist/css/bootstrap.min.css"

],
        modules: ['bootstrap-vue/nuxt'],
        plugins:[ 
            {src: '@/plugins/plugku'},
            { src: "~/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js", mode: "client" },
            { src: '~/assets/bootstrap/mystyle.scss'} 
        ]


})
