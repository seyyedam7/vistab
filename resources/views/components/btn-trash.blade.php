<form action="{{$slot}}" method="post">
    {{csrf_field()}}
    {{method_field('delete')}}
    <button class='btn btn-danger btn-sm' onclick="return confirm('Are you sure?')" ><i class='fa fa-trash-o'></i></button>
</form>
