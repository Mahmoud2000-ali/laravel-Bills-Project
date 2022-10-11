 <!-- CSS only -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
 integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
@section('title')
تعديل الاقسام
@endsection

 <div class="form-group" style="padding: 30px">
    <h1>تعديل القسم</h1>
    <form method="post" action="{{ route('sections.update',$section->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="exampleInputEmail1">أسم القسم</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="section_name" value="{{ $section->section_name }} "">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">الملاحظات</label>
          <input type="test" class="form-control" id="exampleInputPassword1" name="description" value="{{ $section->description }}">
        </div>
        <button type="submit" class="btn btn-primary">تعديل</button>
      </form>

 </div>
