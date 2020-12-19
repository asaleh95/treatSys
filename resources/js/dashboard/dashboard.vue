<template>
<div class="main-wrapper no-js" lang="ar" dir="rtl">

        <!-- Header Section Start -->
        <header-section></header-section>
        <!-- Side Header Start -->
        <side-header></side-header>

        <!-- Content Body Start -->
        <router-view name="helper"></router-view>

        <!-- Footer Section Start -->
        <footer-bottom></footer-bottom>

</div>
</template>

<script>
export default {
        data() {
                return {
                        is_toggle_header: "show",
                };
        },
        methods: {
                toggHeader() {
                        if (this.is_toggle_header == "show") {
                                this.is_toggle_header = "hide";
                        } else {
                                this.is_toggle_header = "show";
                        }
                        // alert(this.is_togg);
                },
        },
};
</script>
