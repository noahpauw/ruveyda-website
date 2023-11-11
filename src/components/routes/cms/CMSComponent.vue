<template>
    <div class="container">
        <h1>CMS</h1>
        <p>Welkom op het CMS, het Content Management Systeem. Op deze pagina's kun je de inhoud van de website aanpassen.
        </p>
        <div class="flex full-width center gap">
            <div :class="currentCMS === 0 ? 'site-button site-button-perma-active' : 'site-button'"
                @click="changeCurrentCMS(0)">Tekstinhoud</div>
            <div :class="currentCMS === 1 ? 'site-button site-button-perma-active' : 'site-button'"
                @click="changeCurrentCMS(1)">Afbeeldingen</div>
            <div :class="currentCMS === 2 ? 'site-button site-button-perma-active' : 'site-button'"
                @click="changeCurrentCMS(2)">Afspraken & Planning</div>
            <div :class="currentCMS === 3 ? 'site-button site-button-perma-active' : 'site-button'"
                @click="changeCurrentCMS(3)">Openingstijden</div>
        </div>
        <div class="filler"></div>
        <hr>
        <div v-if="currentCMS === 0">
            <h2 id="inhoud"># Tekstinhoud</h2>
            <p>Verander hier gemakkelijk de tekstinhoud op de website. Deze veranderingen zul je direct kunnen zien nadat je
                het
                opslaat..</p>
            <div v-for="c of content" :key="c">
                <h3>{{ c }}</h3>
                <textarea class="textarea" :value="getContent(c)"
                    @input="val => updateContent(c, val.target.value)"></textarea>
                <button class="site-button-square" :disabled="!usages.includes(c)" @click="saveContent(c)">Opslaan</button>
                <div class="filler"></div>
            </div>
        </div>

        <div v-if="currentCMS === 1">
            <h2 id="afbeeldingen"># Afbeeldingen</h2>
            <p>Pas hier de afbeeldingen aan door nieuwe te uploaden of oude te verwijderen.</p>
        </div>

        <div v-if="currentCMS === 2">
            <h2 id="afspraken-planning"># Afspraken & Planning</h2>
            <p>Pas hier de beschikbare tijden en datums aan waarop mensen afspraken kunnen maken. Pas hier gelijk ook aan
                hoe
                lang iedere behandeling ongeveer duurt.</p>
            <table>
                <tr>
                    <th>Maandag</th>
                    <th>Dinsdag</th>
                    <th>Woensdag</th>
                    <th>Donderdag</th>
                    <th>Vrijdag</th>
                    <th>Zaterdag</th>
                    <th>Zondag</th>
                </tr>
                <tr>
                    <td v-for="(slot, slotIndex) in availableSlots" :key="slot.day"
                        :class="(slotIndex === 0 || slotIndex === 5 || slotIndex === 6) ? 'closed-day' : ''">
                        <p class="time-slot" v-if="slotIndex !== 0 && slotIndex !== 5 && slotIndex !== 6">
                            Nieuwe tijd toevoegen
                            <span class="remove add"
                                @click="() => addTimeSlot = (addTimeSlot !== slotIndex) ? slotIndex : -1">+</span>
                        </p>
                        <p class="time-slot" v-if="addTimeSlot === slotIndex">
                            <input placeholder="Voer een tijd in" @input="event => newTimeSlot = event.target.value"
                                class="input" @keyup.enter="createNewTimeSlot(slotIndex, newTimeSlot)">
                        </p>
                        <p v-for="(timeSlot, index) in slot.slots" :key="timeSlot"
                            :class="index % 2 === 0 ? 'time-slot' : 'time-slot uneven'">
                            {{ timeSlot }}
                            <span class="remove" @click="removeTimeSlot(slotIndex, index)">-</span>
                        </p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    name: "cms-component",
    data() {
        return {
            welcomeHeader: localStorage.getItem("welcomeHeader"),
            welcomeMessage: localStorage.getItem("welcomeMessage"),
            afspraakHeader: localStorage.getItem("afspraakHeader"),
            afspraakContent: localStorage.getItem("afspraakContent"),
            addTimeSlot: -1,
            newTimeSlot: "",
            currentCMS: 0,
            content: [
                "welcomeHeader",
                "welcomeMessage",
                "afspraakHeader",
                "afspraakContent"
            ],
            availableSlots: [
                {
                    day: 0,
                    slots: []
                }, {
                    day: 1,
                    slots: this.getTimeSlots(true)
                }, {
                    day: 2,
                    slots: this.getTimeSlots()
                }, {
                    day: 3,
                    slots: this.getTimeSlots()
                }, {
                    day: 4,
                    slots: this.getTimeSlots()
                }, {
                    day: 5,
                    slots: []
                }, {
                    day: 6,
                    slots: []
                }
            ],
            usages: []
        }
    }, methods: {
        updateContent(contentType, content) {
            switch (contentType) {
                case "welcomeHeader":
                    this.welcomeHeader = content;
                    break;
                case "welcomeMessage":
                    this.welcomeMessage = content;
                    break;
                case "afspraakHeader":
                    this.afspraakHeader = content;
                    break;
                case "afspraakContent":
                    this.afspraakContent = content;
                    break;
            }

            this.updateUsage(contentType);
        }, saveContent(contentType) {
            let content = "";
            switch (contentType) {
                case "welcomeHeader":
                    content = this.welcomeHeader;
                    break;
                case "welcomeMessage":
                    content = this.welcomeMessage;
                    break;
                case "afspraakHeader":
                    content = this.afspraakHeader;
                    break;
                case "afspraakContent":
                    content = this.afspraakContent;
                    break;
            }
            this.usages = [];
            localStorage.setItem(contentType, content);
        }, getContent(contentType) {
            switch (contentType) {
                case "welcomeHeader":
                    return this.welcomeHeader;
                case "welcomeMessage":
                    return this.welcomeMessage;
                case "afpsraakHeader":
                    return this.afspraakHeader;
                case "afspraakContent":
                    return this.afspraakContent;
            }
        }, updateUsage(contentType) {
            if (!this.usages.includes(contentType)) {
                this.usages.push(contentType);
                console.log("It was added!");
                return;
            }
        }, getTimeSlots(tuesday = false) {
            if (tuesday)
                return ["11:30", "12:00", "12:30", "13:00", "13:30", "14:00", "14:30", "15:00", "16:30", "17:00", "17:30", "18:00", "18:30"];
            return ["10:00", "10:30", "11:00", "11:30", "12:00", "12:30", "13:00", "13:30", "14:00", "14:30", "15:00", "15:30", "16:00", "16:30"];
        }, removeTimeSlot(slotIndex, timeIndex) {
            this.availableSlots[slotIndex].slots.splice(timeIndex, 1);
        }, createNewTimeSlot(slotIndex, time) {
            this.addTimeSlot = -1;
            this.availableSlots[slotIndex].slots.push(time);
            this.sortTimes(slotIndex, this.availableSlots[slotIndex].slots);
        }, changeCurrentCMS(newCMS) {
            this.currentCMS = newCMS;
        }, sortTimes(slotIndex, slotsArray) {
            let arr = [];
            for (let i = 0; i < slotsArray.length; i++)
                arr.push(parseInt(slotsArray[i].split(":").join("")));

            arr = arr.sort(function (a, b) {
                return a - b;
            });

            for (let i = 0; i < arr.length; i++) {
                let temp = arr[i];
                let tempString = arr[i].toString();
                if (temp < 1000) {
                    temp = `0${tempString.substring(0, 1)}:${tempString.substring(1, 3)}`;
                } else {
                    temp = `${tempString.substring(0, 2)}:${tempString.substring(2, 4)}`;
                }
                arr[i] = temp;
            }

            this.availableSlots[slotIndex].slots = arr;
        }
    }, created() {
        document.title = "Lash Room Deventer | CMS";
    }
}
</script>

<style scoped>
.container {
    padding: 4em;
    box-sizing: border-box;
    text-align: left;
    background-color: var(--color-tint4);
    color: var(--color-dark-tint4);
    width: 100%;
}

.gap {
    gap: 1em;
}

.filler {
    height: 1em;
}

.container-gray {
    background-color: var(--color-tint3);
}

.textarea {
    transition-duration: var(--transition-200ms);
    width: 100%;
    resize: none;
    height: auto;
    border: 1px solid var(--color-tint3);
    font-family: var(--content-font);
    font-size: 12pt;
}

.textarea:focus {
    outline: 0;
    border-color: var(--color-tint1);
}

.site-button-square:disabled {
    background-color: var(--color-tint1);
    border-color: var(--color-tint1);
    color: var(--color-dark-tint2);
}

table {
    width: 100%;
    border-collapse: collapse;
    border: 1px solid var(--color-tint1);
    table-layout: fixed;
}

table td,
table td * {
    vertical-align: top;
}

tr,
th,
td {
    padding: 1em;
    box-sizing: border-box;
    border: 1px solid var(--color-tint2);
    margin: 0;
}

td {
    padding: 0;
}

.time-slot {
    border-bottom: 1px solid var(--color-tint2);
    padding: 1em;
    box-sizing: border-box;
    margin: 0;
}

.uneven {
    background-color: var(--color-tint3);
}

.remove {
    position: relative;
    float: right;
    background-color: var(--color-unavailable);
    color: white;
    font-weight: bold;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    text-align: center;
    font-size: 10pt;
    line-height: 20px;
}

.remove:hover {
    opacity: 50%;
    cursor: pointer;
}

.add {
    background-color: var(--color-accent2);
}

.input {
    border: 0;
    border-bottom: 1px solid var(--color-tint1);
    font-family: var(--content-font);
    font-size: 12pt;
    box-sizing: border-box;
    padding-left: 0;
    width: 100%;
}

input:focus {
    outline: 0;
    border-width: 2px;
    border-color: var(--color-tint0);
}

.closed-day {
    background-image: url("../../../assets/closed_day.png");
}
</style>