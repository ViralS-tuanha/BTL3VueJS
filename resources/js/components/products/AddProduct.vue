<template>
  <div>
    <b-button v-b-modal.modal-prevent-closing>Add product</b-button>
    <b-modal
        id="modal-prevent-closing"
        ref="modal"
        title="Submit Your Name"
        @show="resetModal"
        @hidden="resetModal"
        @ok="handleOk"
    >
        <form ref="form" @submit.stop.prevent="handleSubmit">
            <b-form-group
                :state="codeState"
                label="Code"
                label-for="code-input"
                invalid-feedback="Code is required"
            >
                <b-form-input
                    id="code-input"
                    v-model="code"
                    :state="codeState"
                    required
                ></b-form-input>
            </b-form-group>
            <b-form-group
                :state="nameState"
                label="Name"
                label-for="name-input"
                invalid-feedback="Name is required"
            >
                <b-form-input
                    id="name-input"
                    v-model="name"
                    :state="nameState"
                    required
                ></b-form-input>
            </b-form-group>
            <b-form-group
                :state="descState"
                label="Description"
                label-for="desc-input"
                invalid-feedback="Description is required"
            >
                <b-form-input
                    id="desc-input"
                    v-model="desc"
                    :state="descState"
                    required
                ></b-form-input>
            </b-form-group>
        </form>
    </b-modal>
  </div>
</template>

<script>
  export default {
    data() {
        return {
            code: '',
            name: '',
            desc: '',
            codeState: null,
            nameState: null,
            descState: null,
            submittedCodes: [],
            submittedNames: [],
            submittedDescs: []
        }
    },
    methods: {
        checkFormValidity() {
            const valid = this.$refs.form.checkValidity()
            this.nameState = valid ? 'valid' : 'invalid'
            return valid
        },
        resetModal() {
            this.name = ''
            this.nameState = null
        },
        handleOk(bvModalEvt) {
            // Prevent modal from closing
            bvModalEvt.preventDefault()
            // Trigger submit handler
            this.handleSubmit()
        },
        handleSubmit() {
            // Exit when the form isn't valid
            if (!this.checkFormValidity()) {
                return
            }
            // Push the name to submitted names
            axios.post('/product', {code: this.code, name: this.name, desc: this.desc})
            .then(response => {
                console.log(response.data)
            })
            .catch(error => {
                console.log(error)
            })
            // Hide the modal manually
            this.$nextTick(() => {
                this.$refs.modal.hide()
            })
        }
    }
  }
</script>