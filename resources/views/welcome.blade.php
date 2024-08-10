<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900">
    <div class="px-10 mx-auto ">

<div class="flex justify-between my-5 ">
    <h2 class="text-red-500 text-xl">Home</h2>
        <a href="/create" class="bg-green-600 text-white rounded py-2 px-4">Add new</a>
</div>

    @if (@session('success'))

        <h2 class="text-green-600 py-5 max-auto">{{ session('success') }}</h2>
        
    @endif

    <div>
        <!-- component -->
<div class="flex min-h-screen items-center justify-center">
    <div class="overflow-x-auto">
      <table class="min-w-full bg-white shadow-md rounded-xl">
        <thead>
          <tr class="bg-blue-gray-100 text-gray-700">
            <th class="py-3 px-4 text-left">ID</th>
            <th class="py-3 px-4 text-left">Name</th>
            <th class="py-3 px-4 text-left">Description</th>
            <th class="py-3 px-4 text-left">Image</th>
            <th class="py-3 px-4 text-left">Action</th>
          </tr>
        </thead>
        <tbody class="text-blue-gray-900">

            @foreach ($posts as $post)
            <tr class="border-b border-blue-gray-200">
                <td class="py-3 px-4"> {{ $post->id }} </td>
                <td class="py-3 px-4"> {{ $post->name }} </td>
                <td class="py-3 px-4"> {{ $post->description }} </td>
                <td class="py-3 px-4"> <img src="images/{{$post->image}}" alt="" width="80px "> </td>
                <td class="py-3 px-4">
                  <a href=" {{route('edit', $post->id)}} " class="font-medium text-blue-600 hover:text-blue-800">Edit</a>
                  <a href=" {{route('delete', $post->id)}} " class="font-medium text-blue-600 hover:text-blue-800">Delete</a>
                </td>
            @endforeach

        
            
        </tbody>
      </table>
      {{ $posts->links() }}
    </div>
  </div>
    </div>
        
    </div>
</body>
</html>