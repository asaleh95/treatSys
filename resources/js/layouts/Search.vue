<template>
<div class="col-auto">
        <div class="row align-items-center">
                <!--Side Header Toggle-->
                <div class="col-auto">
                        <button class="side-header-toggle" @click="toggHeader()">
                                <i class="zmdi zmdi-menu"></i>
                        </button>
                </div>

                <!--Header Search-->
                <div class="col-auto">
                        <div class="header-search">
                                <button class="header-search-open d-block d-xl-none">
                                        <i class="zmdi zmdi-search"></i>
                                </button>

                                <div class="header-search-form">
                                        <form action="#" @submit.prevent="submit">
                                                <input type="text" v-model="$root.search" placeholder="ابحث بالمستشفى او الطبيب" />
                                                <button type="submit"><i class="zmdi zmdi-search"></i></button>
                                        </form>
                                        <button class="header-search-close d-block d-xl-none">
                                                <i class="zmdi zmdi-close"></i>
                                        </button>
                                </div>
                        </div>
                </div>
        </div>
</div>
<!-- Side Header Toggle & Search End -->
</template>

// 

<script>
export default {
        methods: {
                toggHeader() {
                        if (this.$root.header == "hide") {
                                this.$root.header = "show";
                        } else {
                               this.$root.header = "hide"; 
                        }
                },
        },
};
//
</script>
