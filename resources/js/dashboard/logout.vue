<template>
<div>

</div>
</template>

<script>
export default {
        mounted() {
                localStorage.removeItem('admin');
                localStorage.removeItem('token');
                this.$router.push('/login');
        },
}
</script>
