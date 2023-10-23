<template>
    <div>
        <div class="row-span-1 flex items-center mb-6">
            <nuxt-link to="/" class="mr-2 text-md lg:text-lg md:text-lg">Home</nuxt-link> > <p  class="m-0 text-lg lg:text-xl md:text-xl font-semibold ml-2">{{linkku}}</p> <p  class="m-0   font-semibold ml-2">{{linkku2}}</p><p  class="m-0 text-xl font-semibold ml-2">{{linkku3}}</p>
        </div>
    </div>
</template>

<script>
export default {
    props:[
        'linkku',
        'linkku2',
        'linkku3'
    ],
    data() {
        return {
            linknya:''
        }
    },
    methods: {
        momenketika(){
        
    }
    },
}
</script>