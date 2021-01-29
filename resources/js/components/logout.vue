<template>
<div>

</div>
</template>

<script>
export default {
        mounted() {
                localStorage.removeItem('user');
                localStorage.removeItem('token');
                this.$router.push('/login');
        },
}
</script>
