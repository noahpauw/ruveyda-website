<template>
    <div>
        <div class="cst-container bg-diamonds position-relative">
            <div class="confirm-appointment p-2 p-lg-5">
                <img src="@/assets/sade.png" class="sade">
                <span class="position-absolute display-1 fw-normal mt-0 ms-2" role="button" @click="unconfirmAppointment">×</span>
                <div class="myx-auto">
                    <h2 class="h1 display-1 text-center">Je afspraak</h2>
                    <div class="justify-content-center">
                        <div class="row row-cols-1 mt-5">
                            <h4 class="col h5 fw-normal text-center display-6">
                                {{ dateShow(dates[chosenDate].appointmentDate).dateString }}
                                <br/>
                                {{ dates[chosenDate]?.slots[chosenTime]?.hour < 10 ? "0" + dates[chosenDate]?.slots[chosenTime]?.hour : dates[chosenDate]?.slots[chosenTime]?.hour }}:{{ dates[chosenDate]?.slots[chosenTime]?.minutes < 10 ? "0" + dates[chosenDate]?.slots[chosenTime]?.minutes : dates[chosenDate]?.slots[chosenTime]?.minutes }}
                            </h4>
                            <p class="col fs-3 px-3 fw-normal text-center mt-4">
                                {{ selected }}
                            </p>
                            <div class="col text-center mt-4 confirm-app">
                                <div class="confirmation-button"><i class="fa fa-check"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-4 p-lg-5">
                <div class="p-0 p-lg-5">
                    <div class="p-0 p-lg-5 py-3 py-lg-5">
                        <Breadcrumbs :breadcrumbs="breadcrumbs" />

                        <h1 class="no-top-margin display-1 border-0">Afspraak maken</h1>
                        <template v-if="canMakeAppointment">
                            <div class="row position-relative">
                                <div class="cst-container-appointment mx-auto mt-2 mt-md-5 p-3 p-lg-5 rounded-1 subtle-shadow border border-light">
                                    <div class="p-1 p-md-2 p-xl-5">
                                        <div class="form position-relative">
                                            <img src="../../assets/lashroom_logo_full.png" class="lash-logo hide-mobile"
                                                alt="Logo van Lash Room Deventer">
                                            <!-- First name -->
                                            <form method="post"
                                                action="https://lashroomdeventer.nl/php/appointment_scripts/create_appointment.php">
                                                <h4>Voornaam<span class="mandatory">*</span></h4>
                                                <div class="full-width">
                                                    <input :value="firstname" @input="val => firstname = val.target.value"
                                                        placeholder="Voornaam" class="input" name="firstname" required>
                                                </div>

                                                <!-- Last name -->
                                                <h4>Achternaam<span class="mandatory">*</span></h4>
                                                <div class="full-width">
                                                    <input :value="lastname" @input="val => lastname = val.target.value"
                                                        placeholder="Achternaam" class="input" name="lastname" required>
                                                </div>

                                                <!-- Emailaddress -->
                                                <h4>E-mailadres<span class="mandatory">*</span></h4>
                                                <div class="full-width">
                                                    <input type="email" :value="email"
                                                        @input="val => email = val.target.value" placeholder="E-mailadres"
                                                        class="input" name="email" required>
                                                </div>

                                                <!-- Phone number -->
                                                <h4>Telefoonnummer<span class="mandatory">*</span></h4>
                                                <div class="full-width">
                                                    <input type="phone" :value="phone"
                                                        @input="val => phone = val.target.value"
                                                        placeholder="Telefoonnummer" class="input" name="phonenumber"
                                                        required>
                                                </div>

                                                <!-- Types of appointments. Value is used to calculate available time slots -->
                                                <h4>Behandeling<span class="mandatory">*</span></h4>
                                                <select v-model="selected" @change="() => calculateTimeSlotAvailability()"
                                                    name="appointment_type" required>
                                                    <option>Selecteer een behandeling...</option>
                                                    <option v-for="treatment in treatments" :key="treatment.id" :value="treatment.title">
                                                        {{ treatment.title }}
                                                    </option>
                                                    <!-- <optgroup label="ONE BY ONE WIMPER EXTENSTIONS"></optgroup>
                                                    <option value="ONE BY ONE WIMPER EXTENSIONS - Nieuwe set">Nieuwe set
                                                    </option>
                                                    <option value="ONE BY ONE WIMPER EXTENSIONS - Opvullen 2 weken">Opvullen
                                                        2
                                                        weken
                                                    </option>
                                                    <option value="ONE BY ONE WIMPER EXTENSIONS - Opvullen 3 weken">Opvullen
                                                        3
                                                        weken
                                                    </option>
                                                    <option value="ONE BY ONE WIMPER EXTENSIONS - Opvullen 4 weken">Opvullen
                                                        4
                                                        weken
                                                    </option>
                                                    <optgroup label="VOLUME WIMPER EXTENSIONS"></optgroup>
                                                    <option value="VOLUME WIMPER EXTENSIONS - Opvullen 2 weken">Opvullen 2
                                                        weken
                                                    </option>
                                                    <option value="VOLUME WIMPER EXTENSIONS - Opvullen 3 weken">Opvullen 3
                                                        weken
                                                    </option>
                                                    <option value="VOLUME WIMPER EXTENSIONS - Opvullen 4 weken">Opvullen 4
                                                        weken
                                                    </option>
                                                    <optgroup label="LASH LFITING"></optgroup>
                                                    <option value="Lash lift">Lash lift</option>
                                                    <option value="Lash lift + tint">Lash lift + tint</option>
                                                    <optgroup label="BROW LAMINATION"></optgroup>
                                                    <option value="Brow lamination">Brow lamination</option>
                                                    <option value="Brow lamination + tint">Brow lamination + tint</option>
                                                    <optgroup label="(OMBRÉ) POWDER BROWS"></optgroup>
                                                    <option value="(OMBRÉ) POWDER BROWS incl. nabehandeling">(OMBRÉ) POWDER
                                                        BROWS incl.
                                                        nabehandeling</option>
                                                    <option value="(OMBRÉ) POWDER BROWS - Touch up binnen 6 maanden">Touch
                                                        up
                                                        binnen 6
                                                        maanden
                                                    </option>
                                                    <option value="(OMBRÉ) POWDER BROWS - Touch up binnen 1 jaar">Touch up
                                                        binnen 1 jaar
                                                    </option>
                                                    <optgroup label="LIPBLUSH PMU"></optgroup>
                                                    <option>PMU LIPBLUSH</option>
                                                    <option value="PMU LIPBLUSH - Touch up binnen 6 maanden">Touch up binnen
                                                        6
                                                        maanden
                                                    </option>
                                                    <option value="PMU LIPBLUSH - Touch up binnen 1 jaar">Touch up binnen 1
                                                        jaar
                                                    </option>
                                                    <optgroup label="VERWIJDEREN"></optgroup>
                                                    <option value="Verwijderen wimper extensions">Verwijderen wimper
                                                        extensions
                                                    </option> -->
                                                </select>

                                                <!-- Explainer how long each appointment is going to take -->
                                                <p v-if="selected !== 'Selecteer een behandeling...'">
                                                    Deze behandeling duurt ongeveer <b>{{ durations.get(selected) }}
                                                        minuten.</b>
                                                </p>

                                                <!-- Date and time -->
                                                <h4>
                                                    Datum & Tijd<span class="mandatory">*</span>
                                                </h4>

                                                <div class="full-width date-box-outline pb-0">
                                                    <div v-if="selected !== 'Selecteer een behandeling...'">
                                                        <div class="flex space pt-5 full-width">
                                                            <img src="../../assets/svg/previous.svg"
                                                                :class="chosenDate > 0 ? 'icon-increment left-icon' : 'icon-increment disappear-date left-icon'"
                                                                @click="changeDate(-1);">
                                                            <div class="current-date fixed-width-300">{{
                                                                dateShow(dates[chosenDate].appointmentDate).dateString
                                                            }}
                                                            </div>
                                                            <img src="../../assets/svg/next.svg"
                                                                :class="chosenDate < dates.length - 1 ? 'icon-increment right-icon' : 'icon-increment disappear-date right-icon'"
                                                                @click="changeDate(1);">
                                                        </div>
                                                        <div class="move-middle">
                                                            <small>
                                                                {{ dateShow(dates[chosenDate].appointmentDate).dateDay }}
                                                            </small>
                                                        </div>
                                                        <div class="filler-1em"></div>
                                                        <div class="date-box row my-2 my-md-4 mx-auto row-cols-2 row-cols-md-3"
                                                            id="dateBox">
                                                            <div v-for="(  slot, index  ) in dates[chosenDate].slots"
                                                                class="col col-md-3 p-1" :key="slot">
                                                                <div :class="[chosenTime === index ? 'date-available date-chosen' : 'date-available', availableSlots[index].available ? 'available' : 'unavailable']"
                                                                    @click="function () {
                                                                        if (availableSlots[index].available)
                                                                            updateChosenTime(index)
                                                                    }">
                                                                    {{ slot.hour }} : {{ slot.minutes < 10 ? slot.minutes
                                                                        + '0' : slot.minutes }} </div>
                                                                        <div v-if="dates[chosenDate].slots.length === 0">
                                                                            <p>Sorry. Voor deze dag zijn geen plekken
                                                                                beschikbaar.
                                                                            </p>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div v-else class="padding-box">
                                                            <h4>Kies eerst een behandeling</h4>
                                                            <p>De beschikbare tijden zijn afhankelijk van de behandeling die
                                                                je
                                                                kiest.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <h4>Opmerkingen</h4>
                                                    <textarea class="textarea" :value="comments"
                                                        @input="val => comments = val.target.value"
                                                        name="comments"></textarea>
                                                    <h4>Algemene voorwaarden<span class="mandatory">*</span></h4>
                                                    <label>
                                                        <input type="checkbox" name="acceptTerms"
                                                            @click="val => acceptTerms = val.target.checked"
                                                            :value="acceptTerms">
                                                        <span>&nbsp;Ik ga akkoord met de <router-link
                                                                to="/algemene-voorwaarden">Algemene
                                                                Voorwaaden</router-link></span>
                                                    </label>
                                                    <div v-for="error in errors" :key="error">
                                                        <p v-if="error.display" class="error">{{ error.message }}</p>
                                                    </div>
                                                    <div class="flex d-mobile-block mt-3">
                                                        <div v-if="formIsValid()" class="site-button-square"
                                                            @click="confirmAppointment">AFSPRAAK INPLANNEN</div>
                                                        <div class="site-button-square opacity-50" v-else>
                                                            AFSPRAAK INPLANNEN
                                                    </div>
                                                    </div>
                                                    <p>
                                                        <small>*) Velden met een sterretje zijn verplicht</small>
                                                    </p>

                                                    <!-- Hidden values -->
                                                    <input type="text" class="hidden-input" name="date_time"
                                                        :value="appointmentTimeDate">
                                                    <input type="text" class="hidden-input" name="duration_minutes"
                                                        :value="durations.get(selected)">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                        <template v-else>
                            <p>We zijn nog even bezig met het inrichten van het afspraaksysteem. Binnenkort zul je hier
                                gemakkelijk en
                                overzichtelijk afspraken kunnen inplannen.</p>
                            <p>Maak gemakkelijk een afspraak door een <a
                                    href="https://www.instagram.com/lashroomdeventerr/">DM te
                                    sturen op Instagram</a>.</p>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
/* eslint-disable */
import Breadcrumbs from '../shared/Breadcrumbs.vue';
import axios from 'axios';

const newDate = new Date();
const MAX_DAYS_FUTURE = 14;

export default {
    name: "appointment-form",
    components: {
        Breadcrumbs
    }, methods: {
        formIsValid() {
            if (this.selected !== "Selecteer een behandeling..." && this.firstname !== "" && this.lastname !== "" && this.validateEmail(this.email) && this.chosenTime !== -1 && this.acceptTerms)
                return true;
            return false;
        }, updateChosenTime(index) {
            this.chosenTime = index;
            this.calculateTimeOfAppointment();
        }, getAppointments() {
            if (this.$shouldFetch) {
                fetch('https://lashroomdeventer.nl/php/appointment_scripts/get_appointments.php')
                    .then((response) => response.json())
                    .then((data) => {
                        this.allAppointments = data;
                    });
            }
        }, getListOfDates() {
            let dates = [];
            let index = 0;
            while (dates.length < MAX_DAYS_FUTURE) {
                let date = new Date(newDate.getFullYear(), newDate.getMonth(), newDate.getDate() + index);
                index++;

                if (date.getDay() == 0 || date.getDay() == 1 || date.getDay() == 6)
                    continue;

                let slots = this.getDaySlots(date.getDay());

                dates.push({
                    appointmentDate: date,
                    appointmentAvailable: true,
                    slots: slots
                });
            }

            // Check if first date is current date and if so, remove first element
            let first = dates[0].appointmentDate;
            let now = new Date();
            if (first.getDate() === now.getDate() && first.getMonth() === now.getMonth() && first.getFullYear() === now.getFullYear())
                dates.splice(0, 1);

            return dates;
        }, dateShow(date) {
            let dateString = "";
            let days = ["Zondag", "Maandag", "Dinsdag", "Woensdag", "Donderdag", "Vrijdag", "Zaterdag"];
            let months = ["Januari", "Februari", "Maart", "April", "Mei", "Juni", "Juli", "Augustus", "September", "Oktober", "November", "December"];

            dateString += date.getDate() + " ";
            dateString += months[date.getMonth()] + " ";
            dateString += date.getFullYear();

            return {
                dateString: dateString,
                dateDay: days[date.getDay()]
            };
        }, changeDate(amount) {
            this.chosenDate += amount;
            this.chosenDate = Math.min(this.chosenDate, this.dates.length - 1);
            this.chosenDate = Math.max(this.chosenDate, 0);

            this.chosenTime = -1;

            const dateBox = document.getElementById("dateBox");
            dateBox.style.animationName = "date-animation";
            dateBox.style.animationDuration = "1000ms";

            this.calculateTimeSlotAvailability();
        }, getDaySlots(dayOfWeek) {
            // Use opening and closing hours to dynamically create hour slots
            const workingHours = this.getAvailableTimeSlots(dayOfWeek);
            let currentHour = workingHours.startingHour;
            const closingHour = workingHours.closingHour;

            let slots = [];
            let minutes = 0;
            while (currentHour < closingHour) {
                slots.push({
                    hour: currentHour,
                    minutes: minutes
                });
                minutes += 30;
                if (minutes > 30) {
                    minutes = 0;
                    currentHour++;
                }
            }

            if (workingHours.startingHour === 11)
                slots.splice(0, 1);

            // Remove final element if interval is shorter than 30 minutes
            if (this.INTERVAL < 30)
                slots.pop();
            return slots;
        }, getAvailableTimeSlots(dayOfWeek) {
            if (dayOfWeek === 2) {
                return {
                    startingHour: 11,
                    closingHour: 19
                }
            } else if (dayOfWeek === 3 || dayOfWeek === 4 || dayOfWeek === 5) {
                return {
                    startingHour: 10,
                    closingHour: 17
                }
            }
            return {
                startingHour: 0,
                closingHour: 0
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
            setTimeout(() => {
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

                    this.$cookies.set("appDate", dateUnix, COOKIE_LIFETIME);
                }

                if (this.planning)
                    this.$router.push("/bedankt");
                this.planning = false;
            }, 3000);
        }, calculateTimeOfAppointment() {
            try {
                const appDate = this.dates[this.chosenDate].appointmentDate;
                const appTime = this.dates[this.chosenDate].slots[this.chosenTime];
                const SECONDS = 0;
                const newDate = new Date(appDate.getFullYear(), appDate.getMonth(), appDate.getDate(), appTime.hour, appTime.minutes, SECONDS);

                // Calculate new time and return it
                this.appointmentTimeDate = Math.floor(newDate.getTime() / 1000);
            } catch (err) {
                this.appointmentTimeDate = 0;
            }
        }, validateEmail(email) {
            const REGEX = /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            return email.match(REGEX);
        }, calculateTimeSlotAvailability() {
            this.availableSlots = [];
            let curDate = this.dates[this.chosenDate];
            this.chosenTime = -1;

            let date = curDate.appointmentDate;
            let slots = curDate.slots;

            for (let i = 0; i < slots.length; i++) {
                const avSlot = Math.floor(new Date(date.getFullYear(), date.getMonth(), date.getDate(), slots[i].hour, slots[i].minutes).getTime() / 1000);
                this.availableSlots.push({
                    slot: avSlot,
                    available: true
                });
            }

            const closingHour = this.availableSlots[this.availableSlots.length - 1];

            for (let i = 0; i < this.availableSlots.length; i++) {
                let slot = this.availableSlots[i];

                // Check whether appointment overlaps with other appointments
                // If it does, disable the time slot
                for (let j = 0; j < this.allAppointments.length; j++) {
                    const chosenDuration = this.durations.get(this.selected) * 60;

                    const app = this.allAppointments[j];
                    const startAppointment = parseInt(app.date_time);
                    const duration = parseInt(app.duration_minutes) * 60;
                    const endAppointment = parseInt(startAppointment) + duration;

                    if ((slot.slot >= startAppointment - chosenDuration && slot.slot < endAppointment)) {
                        this.availableSlots[i].available = false;
                    }
                }

                const overtime = Math.max(Math.floor(this.durations.get(this.selected) / 30) - 1, 0);

                // Also check whether chosen time does not overlap
                for (let k = 0; k < overtime; k++) {
                    this.availableSlots[this.availableSlots.length - k - 1].available = false;
                }
            }
        }, confirmAppointment() {
            $(".confirm-appointment").animate({
                left: 0,
            }, 600);
        }, unconfirmAppointment() {
            $(".confirm-appointment").animate({
                left: "100vw",
            }, 600);
        }
    },
    mounted() {
        fetch("https://www.lashroomdeventer.nl/ruveyda-website/webcontent/treatments/get_treatments.php")
            .then((response) => {
                return response.json();
            })
            .then((res) => {
                this.treatments = res;
                this.treatments.forEach((t) => {
                    this.durations.set(t.title, parseInt(t.duration_minutes));
                });
            })
        $(".confirm-app").on('click', () => {
            if($(".fa-check").length) {
                $(".fa-check").removeClass('fa-check').addClass('fa-spinner fa-pulse');
                setTimeout(() => {
                    /*
                    canMakeAppointment: true,
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
            allAppointments: [],
            appointmentTimeDate: 0,
            INTERVAL: 30,
            durations: new Map(),
            dates: this.getListOfDates(),
            availableSlots: [],
            */
                    this.calculateTimeOfAppointment();
                    let paramString = `?name=${this.firstname} ${this.lastname}&email=${this.email}&phone=${this.phone}&treatment_id=${4}&date_time=${this.appointmentTimeDate}&comments=${this.comments}&agreed_to_terms=${this.acceptTerms}`;
                    fetch('https://www.lashroomdeventer.nl/ruveyda-website/webcontent/appointments/add_appointment.php' + paramString)
                        .then(() => {
                            let time = (this.dates[this.chosenDate]?.slots[this.chosenTime]?.hour < 10 ? "0" + this.dates[this.chosenDate]?.slots[this.chosenTime]?.hour : this.dates[this.chosenDate]?.slots[this.chosenTime]?.hour) + ":" +
                                (this.dates[this.chosenDate]?.slots[this.chosenTime]?.minutes < 10 ? "0" + this.dates[this.chosenDate]?.slots[this.chosenTime]?.minutes : this.dates[this.chosenDate]?.slots[this.chosenTime]?.minutes);
                            localStorage.setItem("local_appointment", JSON.stringify({
                                'name': this.firstname,
                                'email': this.email,
                                'date': (this.dateShow(this.dates[this.chosenDate].appointmentDate).dateString + " om " + time).toLowerCase(),
                            }));
                            this.$router.push('/bedankt');
                        });
                }, 1500);
            }
        });
    },
    created() {
        this.getAppointments();
        this.calculateTimeSlotAvailability();
        // Set title in tab-bar in top of browser
        document.title = "Lash Room Deventer | Afspraak maken";
        this.planning = false;
    }, data() {
        return {
            canMakeAppointment: true,
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
            allAppointments: [],
            appointmentTimeDate: 0,
            INTERVAL: 30,
            durations: new Map(),
            dates: this.getListOfDates(),
            availableSlots: [],
            treatments: [],
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

.myx-auto {
    margin-top: calc(50vh - 300px);
}

.confirm-appointment {
    position: fixed;
    width: 100vw;
    height: 100%;
    left: 100vw;
    top: 0;
    background-color: rgba(24, 23, 25, 0.985);
    color: #fff;
    z-index: 9999999;
}

.confirmation-button {
    width: 50%;
    max-width: 200px;
    max-height: 200px;
    aspect-ratio: 1/1;
    border-radius: 50%;
    text-align: center;
    border: 4px solid rgb(64, 255, 144);
    font-size: 64px;
    color: rgb(64, 255, 144);
    margin-left: auto;
    margin-right: auto;
}

.confirmation-button > i {
    margin-top: calc(50% - 32px);
    transition: transform 500ms;
}

.confirmation-button:hover > i {
    transform: rotateZ(360deg);
}

.confirmation-button:hover {
    transform: scale(1.05);
    cursor: pointer;
}

.center {
    text-align: center;
    justify-content: center;
}

h4 {
    margin-top: 1em;
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
    width: 60%;
    font-family: var(--content-font);
    font-size: 14pt;
    box-sizing: border-box;
    padding-left: 0;
}

select {
    width: 100%;
    max-width: 640px;
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

.sade {
    width: 100%;
    height: 100%;
    position: absolute;
    left: 0;
    top: 0;
    opacity: 0.2;
    object-fit: cover;
    pointer-events: none;
}

.hide-time {
    display: none;
}

.cst-container-appointment {
    width: 100%;

    background-color: #fff;
    text-align: left;
}

.space {
    justify-content: space-around !important;
}

.cst-container {
    box-sizing: border-box;
    text-align: left;
    background-color: var(--color-tint4);
    color: var(--color-dark-tint4);
    width: 100%;
}

.cst-container-gray {
    background-color: var(--color-tint3);
}

.cst-container-dark-gray {
    background-color: var(--color-dark-tint1);
    color: var(--color-tint5);
}

.hidden-input {
    visibility: hidden;
}

input {
    font-size: 16px !important;
}

.textarea {
    transition-duration: var(--transition-200ms);
    width: 100%;
    resize: none;
    height: 200px;
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
    overflow: hidden;
    animation-name: fade-in;
    animation-duration: var(--transition-400ms);
    max-width: 1280px;
    padding: 1em;
}

.date-box-outline {
    border: 1px solid var(--color-tint2);
    background-image: url("../../assets/stripes_light.png");
}

.date-available {
    transition-duration: var(--transition-200ms);
    padding: 1em;
    box-sizing: border-box;
    background-color: var(--color-dark-tint2);
    color: white;
    text-align: center;
    border: 1px solid rgba(255, 255, 255, 0.2);
    animation: fade-in var(--transition-1000ms) ease forwards;
}

@keyframes fade-in {
    from {
        filter: opacity(0);
    }

    to {
        filter: opacity(100%);
    }
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

.lash-logo {
    position: absolute;
    right: 1%;
    top: 1%;
    width: 15vw;
    border-radius: 50%;
    box-shadow: 3px 4px 18px rgba(0, 0, 0, 0.1);
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

.unavailable {
    opacity: 35%;
    background-color: var(--color-dark-tint2) !important;
    color: #fff !important;
    border-color: var(--color-dark-tint2) !important;
    cursor: not-allowed !important;
    transform: 0 !important;
}

.unavailable:hover {
    opacity: 33% !important;
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

small {
    text-align: center;
}

.move-middle {
    display: flex;
    justify-content: center;
    margin-bottom: 1em;
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
    width: 60%;
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

@media only screen and (max-width: 868px) {
    select {
        width: 100%;
    }

    .input {
        width: 100%;
    }
}

.hours-cst-container {
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
}</style>