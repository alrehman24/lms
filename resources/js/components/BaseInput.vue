<template>
    <div>
        <label :for="name">{{ label }}</label>
        <input :id="name" :type="type" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)"
            class="form-control" />

        <div v-if="v$ && v$.$error" class="text-danger">
            <span v-if="v$.required?.$invalid">This field is required.</span>
            <span v-if="v$.email?.$invalid">Invalid email format.</span>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        modelValue: [String, Number],
        label: String,
        name: String,
        type: {
            type: String,
            default: 'text'
        },
        v$: Object, // validation object passed from parent
    },
}
</script>
