<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Category</title>
</head>
<style>
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    background-color: #f0f2f5;
    font-family: 'Segoe UI', Tahoma, sans-serif;
}

.container {
    display: flex;
    flex-direction: row-reverse;
    min-height: 100vh;
}

.main-content {
    flex: 1;
    padding: 30px;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.sidebar {
    width: 250px;
    background: linear-gradient(135deg, #29B587, #7DD570);
    color: white;
    padding-top: 20px;
}

.sidebar h1 {
    font-size: 18px;
    margin-bottom: 30px;
    text-align: center;
}

.sidebar li {
    list-style: none;
    height: 50px;
    display: flex;
}

.sidebar li:hover {
    border-left: 4px solid white;
}

.sidebar a,
.sidebar button {
    width: 100%;
    height: 100%;
    background: none;
    border: none;
    color: white;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    font-weight: 500;
}

.cs,
.cat-con {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

.cs form {
    display: flex;
    gap: 10px;
    align-items: center;
}

.cs h2 {
    margin-right: 10px;
    font-size: 18px;
    color: #333;
}

.cs input {
    flex: 1;
    padding: 10px;
    border-radius: 6px;
    border: 1px solid #ccc;
}

.cs input:focus {
    outline: none;
    border-color: #29B587;
}

.cs button {
    padding: 10px 18px;
    background-color: #29B587;
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
}

.cs button:hover {
    background-color: #1e8c66;
}

.cat-con {
    max-height: 400px;
    overflow-y: auto;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.cat-con::-webkit-scrollbar {
    width: 6px;
}

.cat-con::-webkit-scrollbar-thumb {
    background-color: #29B587;
    border-radius: 10px;
}

.category-item {
    width: 100%;
    padding: 12px 16px;
    border: 1px solid #ddd;
    border-radius: 6px;
    background-color: #fafafa;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.category-item:hover {
    border-color: #29B587;
    background-color: #f3fff9;
}

.category-item h3 {
    font-size: 15px;
    font-weight: 600;
}

.cat-actions {
    display: none;
    gap: 10px;
}

.category-item:hover .cat-actions {
    display: flex;
}

.cat-actions a {
    color: #29B587;
    text-decoration: none;
    font-weight: 600;
}

.cat-actions button {
    background: none;
    border: none;
    color: #e74c3c;
    font-weight: 600;
    cursor: pointer;
}
.category-link {
    color: #333;
    text-decoration: none;
    font-size: 15px;
    font-weight: 600;
    flex: 1;
}

.category-link:hover {
    text-decoration: underline;
}

.category-item {
    cursor: pointer;
}
.suc{
    margin-top: 10px;
    color: #29B587;
}
</style>

<body>
    <div class="container">
        <main class="main-content">
            <div class="cs">
                <form action="/create_cat" method="POST">
                    <h2>Create Category</h2>
                    @csrf
                    <input type="text" name="name" placeholder="Enter category name">
                    <button type="submit">Add</button>
                </form>
                @if (session('success'))
                    <p class="suc">{{ session('success') }}</p>
                @endif
                @if ($errors->any())
                <p>{{ $errors->first() }}</p>
                @endif
            </div>
            <div class="cat-con">
                @forelse ($cats as $cat)
                <div class="category-item">
                    <a class="category-link" href="category/{{ $cat->id }}">{{ $cat->name }}</a>
                      <div class="cat-actions">
                <a href="/edit-category/{{ $cat->id }}">Edit</a>
                <form action="/category-delete/{{ $cat->id }}" method="POST">
                    @csrf
                    <button type="submit">Delete</button>
                </form>
            </div>
                </div>
                @empty
                    <h3>No Categories Has been made</h3>
                @endforelse
            </div>
        </main>
        <aside class="sidebar">
            <div>
                <h1>Welcome Back {{ auth()->user()->name }}</h1>
            </div>
            <div>
                <li><a href="/">Home</a></li>
                <li><a href="/categories">Categories</a></li>
                <li><a href="/links">Links</a></li>
                <li><a href="/favors">favors</a></li>
                <li><a href="/bin">Bin</a></li>
                <li><form action="/logout"><button>Logout</button></form></li>
            </div>
        </aside>
    </div>
</body>
</html>
