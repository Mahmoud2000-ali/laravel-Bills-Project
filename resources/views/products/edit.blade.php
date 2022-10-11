 <!-- CSS only -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
 @section('title')
     تعديل الاقسام
 @endsection

 <div class="form-group" style="padding: 30px">
     <h1>تعديل المنتج</h1>
     <form method="post" action="{{ route('products.update', $product->id) }}">
         @csrf
         @method('PUT')
         <div class="form-group">
             <label for="exampleInputEmail1">أسم المنتح</label>
             <input type="text" class="form-control" id="exampleInputEmail1" name="Product_name"
                 value="{{ $product->Product_name }} "">
         </div>
         <div class="form-group">
            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">القسم</label>
            <select name="section_id" id="section_id" class="form-control">
            
                @foreach ($sections as $section)
                    <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                @endforeach
            </select>
         </div>

         <div class="form-group">
             <label for="exampleInputPassword1">الملاحظات</label>
             <input type="test" class="form-control" id="exampleInputPassword1" name="description"
                 value="{{ $product->description }}">
         </div>
         <button type="submit" class="btn btn-primary">تعديل</button>
     </form>

 </div>
