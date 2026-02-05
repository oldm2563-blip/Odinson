<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: 'Segoe UI', Tahoma, sans-serif;
}

body {
    background: #f0f2f5;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Card */
.auth-card {
    width: 100%;
    max-width: 380px;
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 6px 15px rgba(0,0,0,0.12);
}

/* Title */
.auth-card h1 {
    text-align: center;
    margin-bottom: 25px;
    color: #333;
}

/* Input group */
.auth-card form div {
    position: relative;
    margin-bottom: 18px;
}

/* Inputs */
.auth-card input {
    width: 100%;
    padding: 12px 10px;
    border: 1px solid #ccc;
    border-radius: 6px;
    outline: none;
    font-size: 14px;
}

/* Floating label */
.auth-card label {
    position: absolute;
    top: 50%;
    left: 10px;
    color: #777;
    font-size: 13px;
    pointer-events: none;
    transform: translateY(-50%);
    background: white;
    padding: 0 5px;
    transition: 0.2s ease;
}

/* Float label on focus or input */
.auth-card input:focus + label,
.auth-card input:not(:placeholder-shown) + label {
    top: -8px;
    font-size: 12px;
    color: #29B587;
}

/* Focus */
.auth-card input:focus {
    border-color: #29B587;
}

/* Button */
.auth-card button {
    width: 100%;
    padding: 12px;
    background: #29B587;
    color: white;
    border: none;
    border-radius: 6px;
    font-weight: 600;
    cursor: pointer;
    margin-top: 10px;
}

.auth-card button:hover {
    background: #1e8c66;
}

/* Errors / messages */
.auth-card p {
    margin-top: 10px;
    font-size: 14px;
    color: #e74c3c;
    text-align: center;
}

/* Footer links */
.auth-card a {
    color: #29B587;
    text-decoration: none;
    font-weight: 600;
}

.auth-footer {
    margin-top: 15px;
    text-align: center;
    font-size: 14px;
}
</style>

<body>
    <div class="auth-card">
        <h1>Make an Account</h1>

        <form action="/register" method="POST">
            @csrf

            <div>
                <input type="text" name="name" placeholder=" " required>
                <label>Username</label>
            </div>

            <div>
                <input type="email" name="email" placeholder=" " required>
                <label>Email</label>
            </div>

            <div>
                <input type="password" name="password" placeholder=" " required>
                <label>Password</label>
            </div>

            <button>Register</button>
        </form>

        @if ($errors->any())
            <p>{{ $errors->first() }}</p>
        @endif

        <div class="auth-footer">
            Already have an account?
            <a href="/login">Login</a>
        </div>
    </div>
</body>

</html>