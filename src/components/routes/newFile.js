/* __placeholder__ */
export default (await import('vue')).defineComponent({
name: "appointment-form",
methods: {
getAppointments() {
let xhr = new XMLHttpRequest();
xhr.onreadystatechange = function () {
const response = xhr.responseText;
console.log(response);

const responseJson = JSON.parse(response);
console.log(responseJson);
};
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
};
}
});
