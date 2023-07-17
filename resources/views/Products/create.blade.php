<!DOCTYPE html>
<html>
<head>
    <title>crud</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
<body>
    <h1 class="text-center"> Add Product</h1>
    @if($message = Session::get('success'))
       <div class="alert alert-success alert-block">
            <strong>{{ $message}}</strong>
       </div>
     @endif
     <div class="mb-3">
            <a href="/" class="btn btn-dark m-2">Products List</a>
    </div>
    <div class="container"> 
        <div class="row justify-content-center">
          <div class="col-sm-8">
              <div class="card mt-3" style="padding: 20px;">
                  <form method="POST" action="/products/store">
                     @csrf
                      <div class="form-group">
                         <label for="name">Name:</label>
                         <input type="text" name="name" class="form-control"
                         value="{{ old('name')}}"/>
                         @if($errors->has('name'))
                          <span class="text-danger">{{ $errors->first('name')}}</span>
                         @endif
                      </div>

                      <div class="form-group">
                         <lable>Description</lable>
                        <textarea class="form-control" name="description" rows="4">{{ old('description')}}</textarea>  
                        @if($errors->has('description'))
                          <span class="text-danger">{{ $errors->first('description')}}</span>
                         @endif                       
                     </div>

                      <div class="form-group">
                          <label for="category_id">Category:</label>
                          <select class="form-control" id="category_id" name="category_id">    <!-- Option values will be dynamically populated from the database -->
                            <option value="1">1</option>
                            <option value="2">2</option>
                          </select>
                     </div>

                     <div class="form-group">
                         <label for="price">Price:</label>
                        <input class="form-control" type="number" id="price" name="price" step="0.01" value="{{ old('price')}}">                     
                        @if($errors->has('price'))
                          <span class="text-danger">{{ $errors->first('price')}}</span>
                         @endif
                     </div>

                     <div class="form-group">
                       <label for="discount">Discount:</label>
                       <input class="form-control" type="number" id="discount" name="discount" step="0.01" min="0" max="100" value="0">                            
                     </div>
                                            
                      <button type="submit" class="btn btn-dark mt-3">Submit</button>
                   </form>
               </div>                
            </div>
        </div>            
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>
