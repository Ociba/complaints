// resources/js/bootstrap.js
import { initializeApp } from 'firebase/app';
import { getMessaging, getToken, onMessage } from 'firebase/messaging';

const firebaseConfig = {
    apiKey: process.env.MIX_FIREBASE_API_KEY,
    projectId: process.env.MIX_FIREBASE_PROJECT_ID,
    messagingSenderId: process.env.MIX_FIREBASE_SENDER_ID,
    appId: process.env.MIX_FIREBASE_APP_ID
};

const app = initializeApp(firebaseConfig);
const messaging = getMessaging(app);

// Request permission
Notification.requestPermission().then(permission => {
    if (permission === 'granted') {
        getToken(messaging, {
            vapidKey: process.env.MIX_FIREBASE_VAPID_KEY
        }).then(token => {
            // Send token to your Laravel backend
            axios.post('/api/notification-token', { token });
        });
    }
});

// Listen for messages
onMessage(messaging, payload => {
    new Notification(payload.notification.title, {
        body: payload.notification.body,
        icon: '/icon.png'
    });
});
