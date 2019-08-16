<template>
  <div>
    <b-button v-b-modal.modal-prevent-closing>Add Store</b-button>
    <b-modal
        id="modal-prevent-closing"
        ref="modal"
        title="Add Store"
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
                label="Address"
                label-for="address-input"
            >
                <b-form-input
                    id="address-input"
                    v-model="address"
                ></b-form-input>
            </b-form-group>
            <b-form-group
                label="Manager"
            >
                <b-form-select
                    id="address"
                    v-model="user_id"
                    :options="optionUser"
                ></b-form-select>
            </b-form-group>
        </form>
    </b-modal>
  </div>
</template>

<script>
export default {
    data() {
        return {
            optionUser: [],
            code: '',
            name: '',
            address: '',
            user_id: '',
            codeState: null,
            nameState: null,
            submittedCodes: [],
            submittedNames: [],
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
            axios.post('/store', {code: this.code, name: this.name, address: this.address, user_id:this.user_id})
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
    },
    mounted (){
        axios.get('/all-user')
        .then(response =>{
            let dataUser = response.data.map(function(store){
                let newStore = {
                    value: store.id,
                    text: store.account
                }
                return newStore
            })
            this.optionUser = dataUser;
        })
    }
}
</script>