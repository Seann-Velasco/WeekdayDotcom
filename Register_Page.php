<!DOCTYPE html>
<html>
    <head>
        <title>Weekday - Register</title>
        <link rel = "stylesheet" href = "Register_Style.css"/>
    </head>
    <body>
        <div class="container">
        <div class="form-box">
            <h2>Register</h2>
            <form>
                <div class="input-group">
                    <label for="first-name">First Name</label>
                    <input type="text" id="first-name" name="first-name" required>
                </div>
                <div class="input-group">
                    <label for="last-name">Last Name</label>
                    <input type="text" id="last-name" name="last-name" required>
                </div>
                <div class="input-group">
                    <label for="birthdate">Birthdate</label>
                    <input type="date" id="birthdate" name="birthdate" required>
                </div>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="btn">Create Account</button>
            </form>
            <div class="link">
                <p>Already have an account? <a href="#">Log in</a></p>
            </div>
        </div>
        </div>
    </body>
    <script type="module">
        // Import the functions you need from the SDKs you need
        import { initializeApp } from "https://www.gstatic.com/firebasejs/11.3.1/firebase-app.js";
        import { getDatabase,  set, ref } from "https://www.gstatic.com/firebasejs/11.3.1/firebase-database.js";
        import { getAuth, createUserWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/11.3.1/firebase-auth.js";
        // TODO: Add SDKs for Firebase products that you want to use
        // https://firebase.google.com/docs/web/setup#available-libraries
        // Your web app's Firebase configuration
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        
        const firebaseConfig = {
            apiKey: "AIzaSyCLa6YaAEBDkZbSc7XA6BooKYWvMIiuTIg",
            authDomain: "weekdayprojectmanagement.firebaseapp.com",
            databaseURL: "https://weekdayprojectmanagement-default-rtdb.firebaseio.com",
            projectId: "weekdayprojectmanagement",
            storageBucket: "weekdayprojectmanagement.firebasestorage.app",
            messagingSenderId: "726978080282",
            appId: "1:726978080282:web:5809c71247ae2cee5a2ba3",
            measurementId: "G-GVT9CCZJLD"
        };
        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        const database = getDatabase(app);
        const auth = getAuth();
        //Send data into the database
        document.getElementById("registration-form").addEventListener("submit", function(event) {
            event.preventDefault();

            var email = document.getElementById('email').value;
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;
            
            createUserWithEmailAndPassword(auth, email, password)
                .then((userCredential) => {
                    // Signed up 
                    const user = userCredential.user;

                    set(ref(database, 'users/' + user.uid),{
                        username: username,
                        email: email
                    }
                })
                .catch((error) => {
                    const errorCode = error.code;
                    const errorMessage = error.message;
                });
        });
    </script>
</html>
