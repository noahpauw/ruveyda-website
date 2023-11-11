<template>
    <div id="consent"
        :class="consentCookies !== 'true' && consentCookies !== 'false' ? 'container' : 'container hide-container'"
        v-if="showConsent">
        <h1 class="no-margin">Wij gebruiken cookies 🍪</h1>
        <p>Om afspraken in je browser op te slaan gebruiken wij cookies. Vind je dat goed?</p>
        <div class="flex gap full-width">
            <div class="site-button-square text-center full-width green-button" @click="adjustCookieConsent(true)">Ja,
                dat
                is goed!</div>
            <div class="site-button-square text-center full-width" @click="adjustCookieConsent(false)">Nee,
                liever niet
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "cookies-consent",
    data() {
        return {
            consentCookies: localStorage.getItem("cookiesUserConsent"),
            showConsent: false
        }
    }, methods: {
        adjustCookieConsent(consent) {
            localStorage.setItem("cookiesUserConsent", consent);
            this.consentCookies = localStorage.getItem('cookiesUserConsent');
        }, checkCookieUserConsent() {
            const cookiesUserConsent = localStorage.getItem("cookiesUserConsent");
            this.consentCookies = cookiesUserConsent;

            if (cookiesUserConsent)
                this.showConsent = false;
            else
                this.showConsent = true;
        }
    }, mounted() {
        this.checkCookieUserConsent();
        document.addEventListener("click", () => this.checkCookieUserConsent(true));
    }
}
</script>

<style scoped>
.container {
    padding: 2em 4em 2em 4em;
    box-sizing: border-box;
    text-align: left;
    background-color: rgba(255, 255, 255, 0.65);
    backdrop-filter: blur(16px);
    box-shadow: 2px 3px 42px rgba(0, 0, 0, 0.5);
    border-radius: 16px 16px 0 0;
    border: 1px dashed var(--color-tint2);
    border-bottom: 0;
}

.gap {
    gap: 1em;
}

.no-margin {
    margin: 0;
}

.text-center {
    text-align: center;
}

.green-button {
    background-color: var(--color-accent2);
    color: #fff;
}

.red-button {
    background-color: var(--color-unavailable);
}

.hide-container {
    animation-name: hide-blur;
    animation-duration: 1000ms;
    pointer-events: none;
}

@keyframes hide-blur {
    0% {
        opacity: 1;
        filter: blur(0);
    }

    100% {
        opacity: 0;
        filter: blur(12px);
        display: none;
    }
}
</style>