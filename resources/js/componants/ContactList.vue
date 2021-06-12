<template>
    <div class="container">
        <h1 class="text-center p-2">Contacts</h1>
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Bio</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody v-for="contact in contacts" :key='contact.id'>
            <tr>
                <th scope="row">{{ contact.id }}</th>
                <td>{{ contact.name }}</td>
                <td>{{ contact.email }}</td>
                <td>{{ contact.bio }}</td>
                <td><button class="btn btn-danger btn-sm">Delete</button></td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
    name:'Contact',
    created() {
        this.loadData();
    },
    methods:{
        loadData() {
            let url = '/api/getContacts';
            this.axios.get(url).then(response => {
                this.contacts = response.data
                console.log(response.data)
            });
        }
        },
        mounted(){
            console.log('CC mounted');
        },
        data(){
            return{
                url: document.head.querySelector('meta[name="url"]').content,
                contacts:[]
            }
        }
}
</script>
