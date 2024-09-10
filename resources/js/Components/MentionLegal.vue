<script setup>
import { usePage } from '@inertiajs/vue3';

const page = usePage();
console.log(page.props.config.mention)

</script>

<template>
    <label class="block font-medium text-sm text-white">
        {{  page.props.config.mention }}
        
    </label>
</template>
