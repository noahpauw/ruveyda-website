<template>
    <div class="main-container">
        <div class="container padding-6em">
            <h1 class="no-top-margin">Afspraak maken</h1>
            <div class="form">
                <h3>Voornaam</h3>
                <div class="full-width">
                    <input :value="firstname" @input="val => firstname = val.target.value">
                </div>
                <h3>Achternaam</h3>
                <div class="full-width">
                    <input :value="lastname" @input="val => lastname = val.target.value">
                </div>
                <h3>E-mailadres</h3>
                <div class="full-width">
                    <input type="email" :value="email" @input="val => email = val.target.value">
                </div>
                <h3>Telefoonnummer</h3>
                <div class="full-width">
                    <input type="phone" :value="phone" @input="val => phone = val.target.value">
                </div>
                <h3>
                    Datum & Tijd
                </h3>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "appointment-form",
    methods: {
        getAppointments() {
            let xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                const response = xhr.responseText;
                console.log(response);

                // const responseJson = JSON.parse(response);
                // console.log(responseJson);
            }
            xhr.open("GET", "https://65311d8c4d4c2e3f333c66d8.mockapi.io/appointments");
            xhr.send(null);
        }
    },
    created() {
        this.getAppointments();
    }, data() {
        return {
            firstname: "",
            lastname: "",
            email: "",
            phone: "",
            date: new Date(),
            available_times: [
                "10:00",
                "11:00",
                "12:00",
                "14:00",
                "15:00",
                "16:00",
                "17:00"
            ]
        }
    }
}
</script>

<style scoped>
input {
    border: 0;
    border-bottom: 1px solid var(--color-tint1);
    width: 100%;
    font-family: "Nunito" sans-serif;
    font-size: 16pt;
    box-sizing: border-box;
    padding-left: 0;
}

input:focus {
    outline: 0;
    border-width: 2px;
    border-color: var(--color-tint0);
}

.container {
    width: 100%;
    max-width: 760px;
    background-color: #fff;
    text-align: left;
}

.main-container {
    display: flex;
    justify-content: center;
}
</style>