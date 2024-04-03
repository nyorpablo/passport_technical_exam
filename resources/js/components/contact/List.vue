<template>
    <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to='{name:"categoryAdd"}' class="btn btn-primary"></router-link>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Contacts</h4>
                </div>
                <div class="card-body">
                    <div class="table-resposive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Country</th>
                                    <th>Address</th>
                                    <th>State</th>>
                                    <th>Zip Code</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody v-if="contact.length > 0">
                                <tr v-for="(contact,key) in contacts" key="key">
                                    <td>{{ contact.id }}</td>
                                    <td>{{ contact.name }}</td>
                                    <td>{{ contact.email }}</td>
                                    <td>{{ contact.phone }}</td>
                                    <td>{{ contact.country }}</td>
                                    <td>{{ contact.address }}</td>
                                    <td>{{ contact.state }}</td>
                                    <td>{{ contact.zip_code }}</td>
                                    <td>
                                        <router-link :to='{name:"contactEdit", params:{id:contact.id}}' class="btn btn-info">Edit</router-link>
                                        <button type="button" @click="deleteContact(contact.id)" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="8" align="center">No Contacts Found.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name:"contacts",
        data(){
            return{
                contacts:[]
            }
        },
        mounted(){
            this.getContacts()
        },
        methods:{
            async getContacts(){
                await this.axios.get('/api/contact').then(response=>{
                    this.contacts = response.data
                }).catch(error=>{
                    console.log(error)
                    this.contacts = []
                })
            },
            deleteContacts(id){
                if(confirm("Are you sure you want to delete contact?")){
                    this.axios.delete('/api/contact/${id}').then(response=>{
                        this.getContacts()
                    }).catch(error=>{
                        console.log(error)
                    })
                }
            }
        }
    }
</script>