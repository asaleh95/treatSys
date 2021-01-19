<template>
<div>

</div>
</template>

<script>
export default {
        mounted() {
                localStorage.removeItem('auser');
                localStorage.removeItem('atoken');
                this.$router.push('/login');
        },
}
</script>
