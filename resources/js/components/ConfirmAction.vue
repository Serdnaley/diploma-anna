<template>
    <div class="confirm-action-container d-inline-block">

        <!-- Trigger for modal -->
        <div
            class="confirm-action-trigger"
            data-toggle="modal"
            :data-target="'#' + id"
        >
            <slot name="reference"/>
        </div>

        <!-- Modal -->
        <div class="modal fade" :id="id" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ title }}</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <slot/>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            :class="cancelButtonClass"
                            data-dismiss="modal"
                        >
                            {{ cancelButtonText }}
                        </button>
                        <button
                            type="button"
                            :class="confirmButtonClass"
                            @click="$emit('confirm')"
                        >
                            {{ confirmButtonText }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    const randomBigNumber = () => Math.round(Math.random() * 9999999999);

    export default {
        name: "ConfirmAction",

        props: {
            title: {
                type: [String],
                default: 'Confirm action',
            },
            cancelButtonText: {
                type: [String],
                default: 'Cancel',
            },
            cancelButtonClass: {
                type: [String],
                default: 'btn btn-secondary',
            },
            confirmButtonText: {
                type: [String],
                default: 'Ok',
            },
            confirmButtonClass: {
                type: [String],
                default: 'btn btn-primary',
            },
        },

        data() {
            return {
                id: 'conform-action-modal-' + randomBigNumber(),
            }
        },
    }
</script>
