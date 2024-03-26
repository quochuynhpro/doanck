<div class="container" >
    <div class="row justify-content-center">
      <div class="card-header">Quản lý máy tính</div>
        <div class="card-body">
          @if(session('status'))
            <div class="alert alert-success" role="alert">
                {{session('status')}}
            </div>
            @endif
            @if(!isset($computer))
            {!! Form::open(['route'=>'computer.store','method'=>'POST'])!!}
            @else
            {!! Form::open(['route'=>['computer.update',$computer->id],'method'=>'PUT'])!!}
            <div class="form-group">
                {!! Form::label('LabID','LabID ',[])!!}
                {!! Form::text('LabID',isset($computer)? $computer->LabID:'',['class'=>'form-control','placeholder'=>'Nhập phòng máy...','id'=>'LabID'])!!}
              </div>
              <div class="form-group">
                {!! Form::label('Name','Name',[])!!}
                {!! Form::text('Name',isset($computer)? $computer->Name:'',['class'=>'form-control','placeholder'=>'Máy số...','id'=>'Name'])!!}
              </div>
              <div class="form-group">
                {!! Form::label('OperatingSystem','OperatingSystem',[])!!}
                {!! Form::text('OperatingSystem',isset($computer)? $computer->OperatingSystem:'',['class'=>'form-control','placeholder'=>'Hệ điều hành...','id'=>'OperatingSystem'])!!}
              </div>
              <div class="form-group">
                {!! Form::label('Specifications','Specifications',[])!!}
                {!! Form::text('Specifications',isset($computer)? $computer->OperatingSystem:'',['class'=>'form-control','placeholder'=>'Thông số kỹ thuật...','id'=>'Specifications'])!!}
              </div>
              <div class="form-group">
                {!! Form::label('Status','Status',[])!!}
                {!! Form::select('Status',['2'=>'Đang hoạt động','1'=>'Hư hỏng','0'=>'Bảo trì'],isset($computer)? $computer->Status:'',['class'=>'form-control'])!!}
              </div>
              {!! Form::submit('Thêm máy',['class'=>'btn btn-success'])!!}
            {!! Form::close() !!}
        </div>
        </div>
        <table class="table">
            <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">LabID </th>
            <th scope="col">Name</th>
            <th scope="col">OperatingSystem</th>
            <th scope="col">Specifications</th>
            <th scope="col">Status</th>
            <th scope="col">Xóa</th> </tr>
        </thead>
        <tbody>
           @foreach ($list as  $key => $computer)
            <tr>

                <th scope="row">{{$key}}</th>
                <td>{{ $computer->LabID }}</td>
                <td>{{ $computer->Name }}</td>
                 <td>{{ $computer->OperatingSystem }}</td>
                 <td>{{ $computer->Specifications }}</td>
                 <td>
                    @if($computer->Status = 2)
                        Đang hoạt động
                    @elseif($computer->Status = 1)
                         Hư hỏng
                    @else
                        Bảo trì
                    @endif
                 </td>
                 <td>
                        {!!Form::open(['method'=>'DELETE','route'=>['computer.destroy',$computer->id],'onsubmit'=>'return confirm ("Xóa hay không?")'])!!}
                            {!!Form::submit('Xóa',['class'=>'btn btn-danger'])!!}
                        {!!Form::close()!!}
                        <a href="{{route('computer.edit',$computer->id)}}"class="btn btn-warning">Sửa</a>
                </tr>
                 @endforeach
                </tbody>
             </table>
    </div>
  </div>
</div>
