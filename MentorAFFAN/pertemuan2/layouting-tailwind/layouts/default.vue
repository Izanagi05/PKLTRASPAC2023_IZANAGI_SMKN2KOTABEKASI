<template>
    <div> 
        <slot />
    </div>
</template>
<script>
import LinkKuVue from '../components/LinkKu.vue' 
import NavHeader from '~/components/NavHeader.vue'
import NumHeader from '~/components/NumHeader.vue'
export default {
    components: {
        NavHeader,
        NumHeader,
        LinkKuVue
    }, 
}
</script>