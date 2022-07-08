<template>
    <div class="control mt-5">
        <input 
        class="input" 
        :type="type" 
        :value="value"
        v-on:input="$emit('input',$event.target.value)"
        :placeholder="placeholder">
    </div>
</template>
<script>
    export default {
        name:"text-input",
        props:['value','type','placeholder'],
    }
</script>
