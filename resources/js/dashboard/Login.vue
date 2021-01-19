<template>
<div>

<form action="#" @submit.prevent="submit" @keydown="error.clear($event.target.name)" @change="error.clear($event.target.name)">
<div>
    <label for="email">email:</label>
	<br></br>
    <input type="text" v-model="email" id="email" name="email">
</div>

<div>
    <label for="pass">Password (8 characters minimum):</label>
	<br></br>

    <input type="password" v-model="password" id="pass" name="password" minlength="8" required>
</div>

<input type="submit" value="Sign in">

<!-- <button type="submit">Place an order</button> -->
<span style="color: red;" v-text="error.get('error')"></span>
</form>
</div>
</template>



<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
		return {
			email: '',
			password: '',
			error: window.obj,
		}
	},
        methods:{
            submit() {
			//this.products = JSON.parse(localStorage.getItem('products'));
			let all = {
				"email": this.email,
				"password": this.password,
			}
			console.log(all)
			axios.post('/login',all).then((result) => {
			console.log(result.data);
			localStorage.setItem('atoken', JSON.stringify(result.data.token.access_token));
			localStorage.setItem('auser', JSON.stringify(result.data.user));

			this.$router.push('/');
			}).catch((err) => {
				// this.error = "خطأ فى الباسورد او الايميل"
				console.log(err.error);
			});
		},
        }
    }
</script>