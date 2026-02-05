<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
body {
    margin: 0;
    padding: 0;
    background-color: #f0f2f5;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.container {
    display: flex;
    flex-direction: row-reverse; /* Sidebar on the right */
    min-height: 100vh;
    transition: all 0.3s ease;
}

.main-content {
    flex: 1; 
    padding: 30px;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.sidebar {
    text-align: center;
    background-image: linear-gradient(135deg, #29B587, #7DD570);
    flex-basis: 250px;
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    padding-top: 20px;
    box-sizing: border-box;
    transition: all 0.3s ease;
}

.sidebar h1 {
    font-size: 18px;
    color: white;
    margin-bottom: 30px;
}

.sidebar li {
    height: 50px;
    width: 100%;
    list-style: none;
    display: flex;
    align-items: center;
}

.sidebar li:hover {
    border-left: 4px solid white;
    transition: all 0.2s ease;
}

.sidebar a,
.sidebar button {
    color: white;
    text-decoration: none;
    height: 100%;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background: none;
    border: none;
    cursor: pointer;
    font-weight: 500;
}

.cs, .cat-con {
    background-color: white;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.cs:hover, .cat-con:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 15px rgba(0,0,0,0.15);
}

h2 {
    margin: 0 0 15px 0;
    font-size: 20px;
    color: #333;
}

/* Form with input and button inline */
.cs form {
    display: flex;
    gap: 10px;
}

.cs input[type="text"] {
    flex: 1;
    padding: 10px 15px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 16px;
    outline: none;
    transition: all 0.2s ease;
}

.cs input[type="text"]:focus {
    border-color: #29B587;
    box-shadow: 0 0 5px rgba(41, 181, 135, 0.5);
}

.cs button {
    padding: 10px 20px;
    background-color: #29B587;
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-weight: bold;
    transition: all 0.2s ease;
}

.cs button:hover {
    background-color: #1e8c66;
}

/* Cat container example styling */
.cat-con {
    font-size: 16px;
    color: #555;
    min-height: 150px;
    display: flex;
    justify-content: center;
    align-items: center;
    text-transform: uppercase;
    letter-spacing: 1px;
}
</style>

<body>
    <div class="container">
    <main class="main-content">
        <h1>hello</h1>
    </main>
    <aside class="sidebar">
        <div>
            <h1>Welcome Back {{ auth()->user()->name }}</h1>
        </div>
        <div>
            <li><a href="/">Home</a></li>
            <li><a href="/categories">Categories</a></li>
            <li><a href="/links">Links</a></li>
            <li><a href="">Profile</a></li>
            <li><form action="/logout"><button class="logout">Logout</button></form></li>
        </div>
    </aside>
    </div>
</body>
</html>