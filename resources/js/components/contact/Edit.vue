<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update contact</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" v-model="contact.name">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" v-model="contact.email">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="number" class="form-control" v-model="contact.phone">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Country</label>
                                    <input type="text" class="form-control" v-model="contact.country">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" v-model="contact.address">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>State</label>
                                    <input type="text" class="form-control" v-model="contact.state">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Zip code</label>
                                    <input type="text" class="form-control" v-model="contact.zip_code">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        name:"update-contact",
        data(){
            return{
                contact:{
                    name:"",
                    email:"",
                    phone:"",
                    country:"",
                    address:"",
                    state:"",
                    zip_code:"",
                    _method:"patch"
                }
            }
        },
        mounted(){
            this.showcontact()
        },
        methods:{
            async showcontact(){
                await this.axios.get('/api/contact/'+this.$route.params.id).then(response=>{
                    const { name, email, phone, country, address, state, zip_code} = response.data
                    this.contact.name = name
                    this.contact.email = email
                    this.contact.phone = phone
                    this.contact.country = country
                    this.contact.address = address
                    this.contact.state = state
                    this.contact.zip_code = zip_code
                }).catch(error=>{
                    console.log(error)
                })
            },
            async update(){
                await this.axios.post('/api/contact/'+this.$route.params.id, this.contact).then(response=>{
                    this.$router.push({name:"contactList"})
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
</script>