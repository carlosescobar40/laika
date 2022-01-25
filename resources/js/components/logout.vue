<template>

    <span>
        <a href="#" @click.prevent="logout()">Logout</a>
    </span>

</template>

<script>
    export default {
        name: "Logout",
        methods: {
            logout() {
                axios.post('/logout')
                    .catch(error => {
                       window.location.href = '/login';
                    });
            }
        }
    }
</script>