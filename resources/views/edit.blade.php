<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-500">
    <div class="px-10 mx-auto">

<div class="flex justify-between my-5">
    <h2 class="text-red-500 text-xl">Edit - {{ $ourPost->name }} </h2>
        <a href="/" class="bg-green-600 text-white rounded py-2 px-4">Back to home</a>
</div>

  <div>

    <form method="POST" action="{{ route('update', $ourPost->id) }}" enctype="multipart/form-data"> 
      @csrf
      <div class="flex flex-col  gap-5">
        <label for="">Name</label>
        <input type="text" name="name" value="{{ $ourPost->name }}">

        @error('name')
          <p class="text-red-600"> {{ $message }} </p>
        @enderror

        <label for="">Description</label>
        <input type="text" name="description" value="{{ $ourPost->description }}">

        @error('description')
          <p class="text-red-600"> {{$message}} </p>
        @enderror

        <label for="">Image</label>

        @error('image')
          <p class="text-red-600"> {{$message}} </p>
        @enderror

        <input type="file" name="image">
        <div>
          <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded">Submit</button>
        </div>
      </div>
    </form>

  </div>
        
    </div>
</body>
</html>