<!DOCTYPE html>
<html>
<head>
    <title>crud</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
</head>
<body>    
    <h1  class="text-center">Products List</h1>
    @if($message = Session::get('success'))
       <div class="alert alert-success alert-block">
            <strong>{{ $message}}</strong>
       </div>
     @endif
    <div class="mb-3">
            <a href="products/create" class="btn btn-dark m-2">New Products</a>
    </div>   
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Category</th>
            <th>Action</th>
        </tr>
        @foreach($products as $product)
            <tr>
                <td>{{  $loop->index+1 }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->discount }}%</td>
                <td>{{ $product->category_name }}</td>
                <td>
                      <a href="products/{{ $product->id}}/edit" class="btn btn-success btn-sm">Edit</a>
                     
                      <form method="POST" class="d-inline" action="products/{{ $product->id }}/delete">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Deleted</button>
                      </form>
                </td>
            </tr>
        @endforeach
    </table>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>
