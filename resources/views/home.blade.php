<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home page</title>
</head>
<body>
@auth
    <p>You are Logged in !!</p>
    <form action="/logout" method="POST">
        @csrf
        <button>Log out</button>
    </form>
    <div style="border: 3px solid black">
        <h2>Create a new Post</h2>
        <form action="/create-post" method="POST">
            @csrf
            <input type="text" name="title" placeholder="Post title">
            <textarea name="body" placeholder="Your blog post here..."></textarea>
            <button>Save your post</button>
        </form>
    </div>
    <div style="border: 3px solid black">
        <h2>All Posts</h2>
        @foreach($posts as $post)
        <div style="background-color: gray; padding:10px;margin:10px">
            <h3>{{$post['title']}} by {{$post->user->name}}</h3>
            {{$post['body']}}
            <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
            <form action="delete-post/{{$post->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button>Delete</button>
            </form>
        </div>
        @endforeach 
    </div>
@else
    <div style="border: 3px solid black">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Name">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <button>Register</button>
        </form>
    </div>

    <div style="border: 3px solid black">
        <h2>Log in</h2>
        <form action="/login" method="POST">
            @csrf
            <input type="text" name="loginName" placeholder="Name">
            <input type="password" name="loginPassword" placeholder="Password">
            <button>Login</button>
        </form>
    </div>
@endauth
</body>
</html>
