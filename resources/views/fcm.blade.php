<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>fcm </title>
    <!-- firebase integration started -->

    <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase.js"></script>
    <!-- Firebase App is always required and must be first -->
    <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-app.js"></script>

    <!-- Add additional services that you want to use -->
    <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-firestore.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-messaging.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-functions.js"></script>

    <!-- firebase integration end -->

    <!-- Comment out (or don't include) services that you don't want to use -->
    <!-- <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-storage.js"></script> -->

    <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.8.0/firebase-analytics.js"></script>
</head>

<body>
<h1>Hello World</h1>
<a href="{{url("sn")}}">send</a>
</body>
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>

<script type="text/javascript">
    // Your web app's Firebase configuration
var firebaseConfig = {
    apiKey: "AIzaSyD2gjUNFB6lmDx4qWHZUrlFpmbT3lTkY3Q",
    authDomain: "web-notification-2480c.firebaseapp.com",
    // databaseURL: "https://web-notification-2480c.firebaseio.com",
    projectId: "web-notification-2480c",
    storageBucket: "web-notification-2480c.appspot.com",
    messagingSenderId: "411648972177",
    appId: "1:411648972177:web:88cfbbc7d01c61ee377630",
    measurementId: "G-6SE4VXSFGZ"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);
//firebase.analytics();
const messaging = firebase.messaging();
	messaging
.requestPermission()
.then(function () {
//MsgElem.innerHTML = "Notification permission granted."
	console.log("Notification permission granted.");

     // get the token in the form of promise
	return messaging.getToken()
})
.then(function(token) {
 // print the token on the HTML page
  console.log(token);



})
.catch(function (err) {
	console.log("Unable to get permission to notify.", err);
});

messaging.onMessage(function(payload) {
    console.log(payload);
    var notify;
    notify = new Notification(payload.notification.title,{
        body: payload.notification.body,
        icon: payload.notification.icon,
        tag: "Dummy"
    });
    console.log(payload.notification);
});

    //firebase.initializeApp(config);
var database = firebase.database().ref().child("/users/");

database.on('value', function(snapshot) {
    renderUI(snapshot.val());
});

// On child added to db
database.on('child_added', function(data) {
	console.log("Comming");
    if(Notification.permission!=='default'){
        var notify;

        notify= new Notification('CodeWife - '+data.val().username,{
            'body': data.val().message,
            'icon': 'bell.png',
            'tag': data.getKey()
        });
        notify.onclick = function(){
            alert(this.tag);
        }
    }else{
        alert('Please allow the notification first');
    }
});

self.addEventListener('notificationclick', function(event) {
    event.notification.close();
});


</script>
</html>
{{-- AAAASxvGu0I:APA91bHCxU7WxBgAPmwfoypuTBOLAqFmFvOm45RDKTFBSwuNEUu3LbdoP2YG7iFulC1Cja6ZgNCE4y5C_nlXeSMb4G7duEjxmfcRlb3eFEvndatkUWn4VIkjllAMVQSvDUjhPtePX8nu --}}


{{-- 322588556098 --}}
