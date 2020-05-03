<template>
    <div
        class="confirm-action"
        @click.stop.prevent="confirmAction()"
    >
        <slot name="reference"/>
        <slot/>
    </div>
</template>

<script>
    export default {
        name: "ConfirmAction",

        props: {
            title: {
                type: [String],
                default: 'Confirm action',
            },
        },

        methods: {
            confirmAction() {
                if (confirm(this.title)) {
                    this.$emit('confirm');
                }
            },
        },
    }
</script>
