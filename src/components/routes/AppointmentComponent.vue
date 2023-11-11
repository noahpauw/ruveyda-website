<template>
    <div>
        <div class="container mobile-padding">
            <Breadcrumbs :breadcrumbs="breadcrumbs" class="hide-mobile" />
            <router-link to="/">
                <p class="show-mobile back-button">Terug</p>
            </router-link>
            
            <h1 class="no-top-margin">Afspraak maken</h1>
            <p>Maak gemakkelijk een afspraak met het formulier hieronder.</p>

            <div class="full-width flex d-mobile-block">
                <div
                    :class="!planning ? 'container-appointment padding-6em mobile-padding' : 'container-appointment padding-6em semi-transparent mobile-padding'">
                    <div class="form">
                        <h3>Voornaam<span class="mandatory">*</span></h3>
                        <div class="full-width">
                            <input :value="firstname" @input="val => firstname = val.target.value" placeholder="Voornaam"
                                class="input">
                        </div>
                        <h3>Achternaam<span class="mandatory">*</span></h3>
                        <div class="full-width">
                            <input :value="lastname" @input="val => lastname = val.target.value" placeholder="Achternaam"
                                class="input">
                        </div>
                        <h3>E-mailadres<span class="mandatory">*</span></h3>
                        <div class="full-width">
                            <input type="email" :value="email" @input="val => email = val.target.value"
                                placeholder="E-mailadres" class="input">
                        </div>
                        <h3>Telefoonnummer<span class="mandatory">*</span></h3>
                        <div class="full-width">
                            <input type="phone" :value="phone" @input="val => phone = val.target.value"
                                placeholder="Telefoonnummer" class="input">
                        </div>
                        <h3>Behandeling<span class="mandatory">*</span></h3>
                        <select v-model="selected">
                            <option>Selecteer een behandeling...</option>
                            <optgroup label="ONE BY ONE WIMPER EXTENSTIONS"></optgroup>
                            <option>NIEUWE SET</option>
                            <option>Opvullen 2 weken</option>
                            <option>Opvullen 3 weken</option>
                            <option>Opvullen 4 weken</option>
                            <optgroup label="VOLUME WIMPER EXTENSIONS"></optgroup>
                            <option>Opvullen 2 weken</option>
                            <option>Opvullen 3 weken</option>
                            <option>Opvullen 4 weken</option>
                            <optgroup label="LASH LFITING"></optgroup>
                            <option>Lash lift</option>
                            <option>Lash lift + tint</option>
                            <optgroup label="BROW LAMINATION"></optgroup>
                            <option>Brow lamination</option>
                            <option>Brow lamination + tint</option>
                            <optgroup label="(OMBRÉ) POWDER BROWS"></optgroup>
                            <option>(OMBRÉ) POWDER BROWS incl. nabehandeling</option>
                            <option>Touch up binnen 6 maanden</option>
                            <option>Touch up binnen 1 jaar</option>
                            <optgroup label="LIPBLUSH PMU"></optgroup>
                            <option>PMU LIPBLUSH</option>
                            <option>Touch up binnen 6 maanden</option>
                            <option>Touch up binnen 1 jaar</option>
                            <optgroup label="VERWIJDEREN"></optgroup>
                            <option>Verwijderen wimper extensions</option>
                        </select>
                        <h3>
                            Datum & Tijd<span class="mandatory">*</span>
                        </h3>
                        <div class="full-width date-box-outline">
                            <div v-if="selected !== 'Selecteer een behandeling...'">
                                <div class="flex space full-width">
                                    <img src="../../assets/svg/previous.svg"
                                        :class="chosenDate > 0 ? 'icon-increment left-icon' : 'icon-increment disappear-date left-icon'"
                                        @click="changeDate(-1);">
                                    <div class="current-date fixed-width-300">{{ dateShow(dates[chosenDate].appointmentDate)
                                    }}
                                    </div>
                                    <img src="../../assets/svg/next.svg"
                                        :class="chosenDate < dates.length - 1 ? 'icon-increment right-icon' : 'icon-increment disappear-date right-icon'"
                                        @click="changeDate(1);">
                                </div>
                                <div class="filler-1em"></div>
                                <div class="date-box" id="dateBox">
                                    <div v-for="(  slot, index  ) in dates[chosenDate].slots" :key="slot"
                                        :class="[chosenTime === index ? 'date-available date-chosen' : 'date-available', calculateTimeSlot(slot) ? 'hide-time' : '']"
                                        @click="chosenTime = index">
                                        {{ slot.toString().substring(0, 2) }} : {{ slot.toString().substring(2, 4) }}
                                    </div>
                                    <div v-if="dates[chosenDate].slots.length === 0">
                                        <p>Sorry. Voor deze dag zijn geen plekken beschikbaar.</p>
                                    </div>
                                </div>
                            </div>
                            <div v-else class="padding-box">
                                <h3>Kies eerst een behandeling</h3>
                                <p>De beschikbare tijden zijn afhankelijk van de behandeling die je kiest.</p>
                            </div>
                        </div>
                        <h3>Opmerkingen</h3>
                        <textarea class="textarea" :value="comments" @input="val => comments = val.target.value"></textarea>
                        <h3>Algemene voorwaarden<span class="mandatory">*</span></h3>
                        <label>
                            <input type="checkbox" name="acceptTerms" @click="val => acceptTerms = val.target.checked"
                                :value="acceptTerms">
                            <span>Ik ga akkoord met de <router-link to="/algemene-voorwaarden">Algemene
                                    Voorwaaden</router-link></span>
                        </label>
                        <div class="filler-1em"></div>
                        <div v-for="error in errors" :key="error">
                            <p v-if="error.display" class="error">{{ error.message }}</p>
                        </div>
                        <div class="flex d-mobile-block">
                            <div class="site-button-square" @click="planAppointment()">AFSPRAAK INPLANNEN</div>
                        </div>
                        <p>
                            <small>*) Velden met een sterretje zijn verplicht</small>
                        </p>
                    </div>
                </div>

                <div class="full-width marble hide-mobile" id="marble">
                    <div class="container full-width hours-container transparent-background">
                        <img src="../../assets/lashroom_logo_full.png" class="icon-smaller">
                        <h2>Openingstijden</h2>
                        <div class="flex">
                            <ul>
                                <li>Maandag</li>
                                <li>Dinsdag</li>
                                <li>Woensdag</li>
                                <li>Donderdag</li>
                                <li>Vrijdag</li>
                                <li>Zaterdag</li>
                                <li>Zondag</li>
                            </ul>

                            <ul>
                                <li class="closed">Gesloten</li>
                                <li>11:30 - 19:00</li>
                                <li>10:00 - 17:00</li>
                                <li>10:00 - 17:00</li>
                                <li>10:00 - 17:00</li>
                                <li class="closed">Gesloten</li>
                                <li class="closed">Gesloten</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Breadcrumbs from '../shared/Breadcrumbs.vue';

/* eslint-disable */
const newDate = new Date();
const MAX_DAYS_FUTURE = 14;

export default {
    name: "appointment-form",
    components: {
        Breadcrumbs
    }, methods: {
        getAppointments() {
            let xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                const response = xhr.responseText;
                console.log(response);

                // const responseJson = JSON.parse(response);
                // console.log(responseJson);
            }
            xhr.open("GET", "https://65311d8c4d4c2e3f333c66d8.mockapi.io/appointments");
            xhr.send(null);
        }, getListOfDates() {
            let dates = [];
            let index = 0;
            while (dates.length < MAX_DAYS_FUTURE) {
                let date = new Date(newDate.getFullYear(), newDate.getMonth(), newDate.getDate() + index);
                index++;

                if (date.getDay() == 0 || date.getDay() == 1 || date.getDay() == 6)
                    continue;

                let slots = this.getDaySlots(date.getDay());

                let finalSlots = [];
                for (var i = 0; i < slots.length; i++) {
                    let ir = Math.round(Math.random());
                    // if (ir === 1)
                    finalSlots.push(slots[i]);
                }

                dates.push({
                    appointmentDate: date,
                    appointmentAvailable: true,
                    slots: finalSlots
                });
            }
            return dates;
        }, updateParallax() {
            const el = document.getElementById("marble");
            if (!el)
                return;

            const rect = el.getBoundingClientRect();
            const offset = rect.y / 10;

            el.style.backgroundPosition = `50% ${50 + offset}%`;
        }, dateShow(date) {
            let dateString = "";
            let days = ["Zondag", "Maandag", "Dinsdag", "Woensdag", "Donderdag", "Vrijdag", "Zaterdag"];
            let months = ["Januari", "Februari", "Maart", "April", "Mei", "Juni", "Juli", "Augustus", "September", "Oktober", "November", "December"];

            dateString += days[date.getDay()] + " - ";
            dateString += date.getDate() + " ";
            dateString += months[date.getMonth()] + " ";
            dateString += date.getFullYear();

            return dateString;
        }, changeDate(amount) {
            this.chosenDate += amount;
            this.chosenDate = Math.min(this.chosenDate, this.dates.length - 1);
            this.chosenDate = Math.max(this.chosenDate, 0);

            this.chosenTime = -1;

            const dateBox = document.getElementById("dateBox");
            dateBox.style.animationName = "date-animation";
            dateBox.style.animationDuration = "1000ms";
        }, getDaySlots(dayOfWeek) {
            switch (dayOfWeek) {
                case 2:
                    return [
                        1130,
                        1145,
                        1200,
                        1215,
                        1230,
                        1245,
                        1300,
                        1315,
                        1330,
                        1345,
                        1400,
                        1415,
                        1430,
                        1445,
                        1500,
                        1515,
                        1530,
                        1545,
                        1600,
                        1615,
                        1630,
                        1645,
                        1700,
                        1715,
                        1730,
                        1745,
                        1800,
                        1815,
                        1830,
                        1845,
                        1900
                    ];
                case 3: case 4: case 5:
                    return [
                        1000,
                        1015,
                        1030,
                        1045,
                        1100,
                        1115,
                        1130,
                        1145,
                        1200,
                        1215,
                        1230,
                        1245,
                        1300,
                        1315,
                        1330,
                        1345,
                        1400,
                        1415,
                        1430,
                        1445,
                        1500,
                        1515,
                        1530,
                        1545,
                        1600,
                        1615,
                        1630,
                        1645,
                        1700
                    ];
                default:
                    return [];
            }
        }, async planAppointment() {
            let canPlanAppointment = true;

            // Check mandatory fields
            for (let error of this.errors) {
                error.display = false;
            }

            if (this.chosenTime === -1) {
                canPlanAppointment = false;
                this.errors[0].display = true;
            }

            if (this.firstname === "" || this.lastname === "" || this.email === "" || this.phone === "") {
                canPlanAppointment = false;
                this.errors[1].display = true;
            } else {
                if (!this.validateEmail(this.email)) {
                    canPlanAppointment = false;
                    this.errors[3].display = true;
                }
            }

            if (!this.acceptTerms) {
                canPlanAppointment = false;
                this.errors[2].display = true;
            }

            if (!canPlanAppointment)
                return;

            this.planning = true;
            setInterval(() => {
                // Set a cookie
                const COOKIE_CONSENT = localStorage.getItem("cookiesUserConsent");

                if (COOKIE_CONSENT === 'true') {
                    const EXPIRATION_DATE = new Date();
                    const COOKIE_LIFETIME = EXPIRATION_DATE.setTime(EXPIRATION_DATE.getTime() + 3600000 * 24 * 14);
                    this.$cookies.set("appFirstname", this.firstname, COOKIE_LIFETIME);
                    this.$cookies.set("appLastname", this.lastname, COOKIE_LIFETIME);
                    this.$cookies.set("appEmail", this.email, COOKIE_LIFETIME);
                    this.$cookies.set("appPhone", this.phone, COOKIE_LIFETIME);
                    this.$cookies.set("appComments", this.comments, COOKIE_LIFETIME);

                    const appointmentDate = `${this.dateShow(this.dates[this.chosenDate].appointmentDate)} om ${this.dates[this.chosenDate].slots[this.chosenTime]}`;

                    this.$cookies.set("appDate", appointmentDate, COOKIE_LIFETIME);
                }

                if (this.planning)
                    this.$router.push("/bedankt");
                this.planning = false;
            }, 3000);
        }, validateEmail(email) {
            const REGEX = /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            return email.match(REGEX);
        }, getDurations() {
            this.durations.set("NIEUWE SET", 300);
            this.durations.set("Opvullen 2 weken", 30);
            this.durations.set("Opvullen 3 weken", 30);
            this.durations.set("Opvullen 4 weken", 30);
            this.durations.set("Lash lift", 30);
            this.durations.set("Lash lift + tint", 45);
            this.durations.set("Brow lamination", 30);
            this.durations.set("Brow lamination + tint", 45);
            this.durations.set("(OMBRÉ) POWDER BROWS incl. nabehandeling", 60);
            this.durations.set("Touch up binnen 6 maanden", 30);
            this.durations.set("Touch up binnen 1 jaar", 30);
            this.durations.set("PMU LIPBLUSH", 60);
            this.durations.set("Verwijderen wimper extensions", 30);
        }, calculateTimeSlot(slot) {
            const closingHour = 1900;
            const slotConverted = this.durations.get(this.selected) / 15;

            let slotTime = slot;
            for (let i = 0; i < slotConverted; i++) {
                slotTime += 15;
                const m = slotTime % 1000;
                if (m > 45)
                    slotTime += 55;
            }

            console.log(slotTime);

            return (slot + slotConverted > closingHour);
        }
    },
    created() {
        document.addEventListener("scroll", this.updateParallax);
        this.getAppointments();
        this.getDurations();
        // Set title in tab-bar in top of browser
        document.title = "Lash Room Deventer | Afspraak maken";
        this.planning = false;
    }, data() {
        return {
            firstname: "",
            lastname: "",
            email: "",
            phone: "",
            date: new Date(),
            comments: "",
            acceptTerms: false,
            chosenDate: 0,
            chosenTime: -1,
            planning: false,
            selected: "Selecteer een behandeling...",
            available_times: [
                "10:00",
                "11:00",
                "12:00",
                "14:00",
                "15:00",
                "16:00",
                "17:00"
            ], durations: new Map(),
            dates: this.getListOfDates(),
            breadcrumbs: [
                {
                    title: "Home",
                    route: "/"
                },
                {
                    title: "Afspraak maken",
                    route: "/afspraak"
                }
            ],
            errors: [
                {
                    message: "Kies alsjeblieft een tijd.",
                    display: false
                }, {
                    message: "Voer alsjeblieft alle vereiste velden in.",
                    display: false
                }, {
                    message: "Je moet akkoord gaan met onze voorwaarden om een afspraak in te plannen.",
                    display: false
                }, {
                    message: "Voer alsjeblieft een geldig e-mailadres in.",
                    display: false
                }
            ]
        }
    }
}
</script>

<style scoped>
.filler-1em {
    height: 1em;
}

.center {
    text-align: center;
    justify-content: center;
}

.error {
    font-weight: bold;
    color: var(--color-unavailable);
}

.semi-transparent {
    transition-duration: var(--transition-1000ms);
    opacity: 35%;
}

.padding-box {
    padding: 0 2em 0 2em;
}

.input {
    border: 0;
    border-bottom: 1px solid var(--color-tint1);
    width: 100%;
    font-family: var(--content-font);
    font-size: 16pt;
    box-sizing: border-box;
    padding-left: 0;
}

input:focus {
    outline: 0;
    border-width: 2px;
    border-color: var(--color-tint0);
}

.current-date {
    text-align: center;
    font-family: var(--header-font);
    font-size: 20pt;
}

.hide-time {
    display: none;
}

.container-appointment {
    width: 100%;
    max-width: 760px;
    background-color: #fff;
    text-align: left;
}

.space {
    justify-content: space-around !important;
}

.container {
    padding: 4em;
    box-sizing: border-box;
    text-align: left;
    background-color: var(--color-tint4);
    color: var(--color-dark-tint4);
    width: 100%;
}

.container-gray {
    background-color: var(--color-tint3);
}

.container-dark-gray {
    background-color: var(--color-dark-tint1);
    color: var(--color-tint5);
}

.textarea {
    transition-duration: var(--transition-200ms);
    width: 100%;
    resize: none;
    height: 100px;
    border: 1px solid var(--color-tint3);
    font-family: var(--content-font);
    font-size: 12pt;
}

.textarea:focus {
    outline: 0;
    border-color: var(--color-tint1);
}

.date-box {
    transition-duration: var(--transition-500ms);
    display: flex;
    flex-wrap: wrap;
    gap: 2em;
    justify-content: center;
    overflow: hidden;
    animation-name: fade-in;
    animation-duration: var(--transition-400ms);
}

.date-box-outline {
    padding-top: 2em;
    padding-bottom: 2em;
    border: 1px solid var(--color-tint2);
    background-image: url("../../assets/stripes_light.png");
}

.date-available {
    transition-duration: var(--transition-200ms);
    padding: 1em;
    box-sizing: border-box;
    background-color: var(--color-dark-tint2);
    color: white;
    width: 210px;
    text-align: center;
    border: 1px solid transparent;
}

.date-unavailable {
    background-color: var(--color-unavailable);
}

.date-available:hover {
    background-color: #eee;
    border: 1px solid var(--color-tint3);
    color: var(--color-dark-tint2);
    cursor: pointer;
}

.date-available:active {
    transform: scale(110%);
}

.date-chosen {
    background-color: #fff;
    border: 1px solid var(--color-tint3);
    color: var(--color-dark-tint2);
}

.date-chosen:hover {
    background-color: #fff;
    border: 1px solid var(--color-tint3);
    color: var(--color-dark-tint2);
}

.slots {
    position: relative;
    right: 0;
    float: right;
}

.hidden {
    display: none;
}

.icon-increment {
    opacity: 30%;
    transition-duration: var(--transition-200ms);
    width: 32px;
}

.icon-increment:hover {
    opacity: 100%;
    cursor: pointer;
}

.disappear-date {
    opacity: 0;
}

.disappear-date:hover {
    opacity: 0;
    cursor: default;
}

.fixed-width-300 {
    width: 440px;
}

.left-icon:active {
    transform: translateX(-8px);
}

.right-icon:active {
    transform: translateX(8px);
}

.mandatory {
    color: var(--color-accent3);
}

label:hover {
    cursor: pointer;
}

select {
    width: 100%;
    padding: 0.5em;
    border: 1px solid var(--color-tint3);
    border-bottom: 1px solid var(--color-tint1);
    font-family: var(--content-font);
    font-size: 12pt;
    box-sizing: border-box;
}

select option,
select optgroup {
    font-family: var(--content-font);
    font-size: 12pt;
    padding: 0.2em;
    box-sizing: border-box;
}

.select:focus {
    outline: 0;
}

@keyframes date-animation {
    0% {
        opacity: 0;
        max-height: 0;
    }

    100% {
        opacity: 1;
        max-height: 300px;
    }
}

@keyframes fade-in {
    0% {
        opacity: 0;
    }

    100% {
        opacity: 1;
    }
}

.hours-container {
    top: 4em;
    position: sticky;
    height: 400px;
    max-height: 400px;
}

ul {
    padding-right: 4em;
}

ul,
li {
    padding-left: 0;
}

li {
    list-style-type: none;
    padding-bottom: 1em;
}

.icon-smaller {
    width: 30%;
    border-radius: 50%;
    position: absolute;
    float: right;
    right: 4em;
}

.closed {
    font-weight: bold;
    color: var(--color-accent3);
}

.transparent-background {
    background-color: transparent;
}
</style>