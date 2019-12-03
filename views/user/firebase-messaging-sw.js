importScripts('https://www.gstatic.com/firebasejs/4.13.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/4.13.0/firebase-messaging.js');
var config = {
    apiKey: "AIzaSyDfgjYjmgrVT1kS50jCJ0F-tF_GUQ-nP98",
    authDomain: "hashroot-67762.firebaseapp.com",
    databaseURL: "https://hashroot-67762.firebaseio.com",
    projectId: "hashroot-67762",
    storageBucket: "hashroot-67762.appspot.com",
    messagingSenderId: "411271185311"
};
firebase.initializeApp(config);

const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function (payload) {
    const data = payload.data;
    console.log(data);
    const title = data.alert;
    const options = {
        "click_action": data.click_action,
        "icon": "https://www.hashroot.com/assets/images/favicon.png",
        "body": data.alert,
    };
    return self.registration.showNotification(title, options);
});