<template>
    <div class="cst-container bg-diamonds-dark">
        <div class="position-relative">
            <img src="@/assets/lashroom_diamonds.png" class="position-absolute opacity-25 top-0 pe-none">
            <div class="w-100 p-4 p-lg-5">
                <div class="p-0 p-lg-5">
                    <div class="p-0 p-lg-5 py-3 py-lg-5">
                        <Breadcrumbs :breadcrumbs="breadcrumbs" class="hide-mobile" />
                        <h1 class="no-top-margin mb-3 display-1 border-0 text-light">Inloggen</h1>
                        <div class="row mt-5">
                            <div class="col-md-5 mx-auto">
                                <form method="POST" id="loginForm" action="">
                                    <p class="text-light">Gebruikersnaam</p>
                                    <input type="text" id="username" class="form-control rounded-1">
                                    <p class="mt-4 text-light">Wachtwoord</p>
                                    <input type="password" id="password" class="form-control rounded-1">
                                    <p class="text-danger mt-3 mb-0" id="passwordWrong" style="display: none">Wachtwoord/gebruikersnaam onjuist. Probeer het nog eens.</p>
                                    <button type="submit" class="btn btn-dark btn-lg rounded-1 mt-4 float-start">INLOGGEN</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
import Breadcrumbs from '@/components/shared/Breadcrumbs.vue';
import $ from 'jquery';
export default {
    name: 'login-component',
    components: {
        Breadcrumbs,
    },
    data() {
        return {
            breadcrumbs: [
            ]
        }
    },
    mounted() {
        $("#loginForm").on('submit', async (e) => {
            e.preventDefault();
            $("#passwordWrong").hide(400);
            // let passwordHash = bcrypt.hashSync($("#password").val(), 12);

            var settings = {
                'cache': false,
                'dataType': "json",
                "async": true,
                "url": `https://www.lashroomdeventer.nl/ruveyda-website/webcontent/auth/login.php?username=${$("#username").val()}&password=${$("#password").val()}`,
                "method": "POST",
                "Access-Control-Allow-Origin": "*",
            }

            $.ajax(settings)
                .done((e) => {
                    if(!e.validate_login) {
                        $("#password").val("");
                        $("#passwordWrong").show(400);
                        return;
                    }
                    localStorage.setItem("user_id", e.user_id);
                    this.$router.push("/cms/home");
                });
        })
    }
}
</script>