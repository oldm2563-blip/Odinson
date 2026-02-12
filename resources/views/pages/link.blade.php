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
    min-width: 0; 
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


.cs {
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

.suc {
    margin-top: 10px;
    color: #29B587;
}
.cs form {
    display: flex;
    flex-wrap: wrap;     
    gap: 10px;
    align-items: center;
}

.cs input,
.cs select {
    flex: 1 1 200px;     
    padding: 10px;
    border-radius: 6px;
    border: 1px solid #ccc;
    min-width: 0;        
}

.cs button {
    flex-shrink: 0;       
}

.cat-con {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
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
    display: flex;
    align-items: center;
    padding: 12px 16px;
    border: 1px solid #ddd;
    border-radius: 6px;
    background-color: #fafafa;
    width: 100%;        
    overflow: hidden; 
    min-width: 0;      
}


.category-item:hover {
    border-color: #29B587;
    background-color: #f3fff9;
}

.category-link {
    color: #333;
    font-size: 14px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    width: 100%;
}

.category-link:hover {
    text-decoration: underline;
}


.cat-actions {
    display: none;
    gap: 10px;
    flex-shrink: 0;
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
.category-item {
    display: flex;
    flex-direction: column; 
    align-items: flex-start;
    padding: 12px 16px;
    border: 1px solid #ddd;
    border-radius: 6px;
    background-color: #fafafa;
    width: 100%;        
    overflow: hidden; 
    min-width: 0;
}

.category-item:hover {
    border-color: #29B587;
    background-color: #f3fff9;
}

.category-title {
    font-weight: 600;
    color: #29B587;
    text-decoration: none;
    margin-bottom: 4px;
    font-size: 16px;
}

.category-title:hover {
    text-decoration: underline;
}
.tags-container {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.tag {
    padding: 6px 12px;
    font-size: 13px;
    border-radius: 20px;
    background-color: rgba(41, 181, 135, 0.12);
    color: #29B587;
    border: 1px solid rgba(41, 181, 135, 0.4);
    cursor: pointer;
    transition: all 0.2s ease;
    user-select: none;
}

.tag:hover {
    background-color: #29B587;
    color: white;
    border-color: #29B587;
}

.tag.active {
    background-color: #29B587;
    color: white;
}
.category-item.tags-container {
    flex-direction: row;   
    align-items: center;
    flex-wrap: wrap;   
}



</style>

<body>
    <div class="container">
        @can('view', $link)
        <main class="main-content">
            <h1>{{ $link->title }} 
                <form action="/favor/{{ $link->id }}" method="POST">
                    @csrf
                    <button>Favorite</button>
                </form>
            </h1>
            <div class="cat-con">
                <div class="category-item">
                    <h2 class="category-title">Link <a href="/share-link/{{ $link->id }}">Share</a></h2>
                    <a class="category-link" href="{{ $link->link }}" title="{{ $link->link }}">{{ $link->link }}</a>
                </div>
            </div>
            <div class="cat-con">
            <h2 class="category-title">Tags</h2>

            <div class="category-item tags-container">
                @forelse ($togs as $tog)
                    <span class="tag">{{ $tog->name }}</span>
                @empty
                    <span class="tag">No Tags</span>
                @endforelse
            </div>
            </div>
            @can('update', $link)
            <div class="cs">
                <form action="/assign_tag/{{ $link->id }}" method="POST">
                    <h2>choose from avaible Tags</h2>
                    @csrf
                    <select name="tag_id" id="">
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit">Add</button>
                </form>
                @if (session('success'))
                    <p class="suc">{{ session('success') }}</p>
                @endif
            </div>
            <div class="cs">
                <form action="/create_tag" method="POST">
                    <h2>Add a new Tag</h2>
                    @csrf
                    <input type="text" name="name" placeholder="Enter tag name">
                    <button type="submit">Add</button>
                </form>
                @if (session('success'))
                    <p class="suc">{{ session('success') }}</p>
                @endif
                @if ($errors->any())
                <p>{{ $errors->first() }}</p>
                @endif
            </div>
            @endcan
        </main>
        @endcan
        @cannot('view', $link)
        <main class="main-content">
            <h1>You Cannot Look Here :)</h1>
        </main>
        @endcannot
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
